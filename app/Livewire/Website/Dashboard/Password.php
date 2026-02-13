<?php

namespace App\Livewire\Website\Dashboard;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class Password extends Component
{
    public $screen = 'dashboard';
    public $oldPassword;
    public $newPassword;
    public $newPassword_confirmation;


    public function rules()
    {
        return [
            'oldPassword' => 'required|max:60',
            'newPassword' => 'required|min:8|max:30|confirmed',
            'newPassword_confirmation' => 'required|same:newPassword',
        ];
    }

    public function updatePassword()
    {
        $this->validate();

        if (Hash::check($this->oldPassword, auth('web')->user()->password)) {
            auth('web')->user()->update([
                'password' => Hash::make($this->newPassword)
            ]);
            $this->resetForm();
            return $this->dispatch('password-updated', __('website.success_change_password'));
        }
        return $this->dispatch("error_password", __('website.error_change_password'));

    }

    public function resetForm()
    {
        $this->oldPassword = '';
        $this->newPassword = '';
        $this->newPassword_confirmation = '';
    }

    #[On('change-screen')]
    public function changeScreen($screen)
    {
        $this->screen = $screen;
    }

    public function render()
    {
        return view('livewire.website.dashboard.password');
    }
}
