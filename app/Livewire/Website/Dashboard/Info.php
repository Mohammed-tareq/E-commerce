<?php

namespace App\Livewire\Website\Dashboard;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\Utils\ImageManagement;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Info extends Component
{
    use WithFileUploads;

    public $screen = 'dashboard';
    public $user;
    public $first_name, $last_name, $email, $phone, $city_id, $governorate_id, $country_id, $image;
    public $countries, $governorates, $cities;
    protected $imageManager;

    public function boot(ImageManagement $imageManagement)
    {
        $this->imageManager = $imageManagement;
    }

    public function mount($authUser)
    {
        $this->user = $authUser;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->city_id = $this->user->city_id;
        $this->governorate_id = $this->user->governorate_id;
        $this->country_id = $this->user->country_id;
        $this->image = $this->user->image ?? null;
    }

    protected function rules()
    {
        return [
            'first_name' => ['sometimes', 'string', 'min:3', 'max:15'],
            'last_name' => ['sometimes', 'string', 'min:3', 'max:20'],
            'email' => ['sometimes', 'string', 'email', 'max:30', 'unique:users,email,' . $this->user->id],
            'phone' => ['sometimes', 'string', 'max:20', 'unique:users,phone,' . $this->user->id],
            'country_id' => ['sometimes', 'integer', 'exists:countries,id'],
            'governorate_id' => ['sometimes', 'integer', 'exists:governorates,id'],
            'city_id' => ['sometimes', 'integer', 'exists:cities,id'],
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5048',

        ];
    }

    #[On('change-screen')]
    public function changeScreen($screen)
    {
        $this->screen = $screen;
    }

    public function updateProfile()
    {
        try {
            $this->validate();
            DB::beginTransaction();
            $userUpdated = $this->user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'city_id' => $this->city_id,
                'governorate_id' => $this->governorate_id,
                'country_id' => $this->country_id,
            ]);
            if ($this->image) {
                $this->updateImageUser();
            }
            DB::commit();
            $this->dispatch('success', __('website.success_profile'));
        } catch (\Exception $e) {
            $this->dispatch('error', __('website.error_profile'));
        }


    }

    public function updateImageUser()
    {
        if ($this->user->image !== null) {
            $this->imageManager->deleteImageFromLocal($this->user->image);
        }
        $this->user->update([
            'image' => $this->imageManager->uploadSingleImage('/', $this->image, 'users'),
        ]);

    }

    public function render()
    {
        $this->countries = Country::all();
        $this->governorates = $this->country_id ? Governorate::where('country_id', $this->country_id)->get() : [];
        $this->cities = $this->governorate_id ? City::where('governorate_id', $this->governorate_id)->get() : [];
        return view('livewire.website.dashboard.info', [
            'countries' => $this->countries,
            'governorates' => $this->governorates,
            'cities' => $this->cities,
        ]);
    }
}
