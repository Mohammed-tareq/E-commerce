<?php

namespace App\Livewire\Website\CheckOut;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use Livewire\Component;

class ShippingDetails extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $country;
    public $governorate;
    public $city;
    public $countryId, $governorateId, $cityId;


    public function SendDataUser()
    {
        $user = auth('web')->user();

        $this->fname = $user->first_name ?? '';
        $this->lname = $user->last_name ?? '';
        $this->email = $user->email ?? '';
        $this->phone = $user->phone ?? '';
        $this->country = $user->country ?? '';
        $this->governorate = $user->governorate ?? '';
        $this->city = $user->city ?? '';

    }

    public function render()
    {
        $countries = Country::active()->get();
        if ($this->governorateId)
            $governorates = Governorate::active()->where('country_id', $this->countryId)->get() ?? [];
        if ($this->cityId)
            $cities = City::where('governorate_id', $this->governorateId)->get();
        return view('livewire.website.check-out.shipping-details', compact('countries', 'governorates', 'cities'));
    }
}
