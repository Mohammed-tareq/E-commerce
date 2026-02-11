<?php

namespace App\Livewire\Website\ContactUs;

use App\Models\Admin;
use App\Models\Contact;
use App\Notifications\ContactUsNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Contactus extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $phone;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'phone' => ['required', 'string', 'min:11', 'max:15'],
            'subject' => ['required', 'string', 'min:3', 'max:50'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();
        $contact = Contact::create([
            'user_id' => auth('web')->check() ? auth('web')->id() : null,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        if (!$contact) {
            $this->dispatch('error_contact', __('website.error_contact'));
        }

        $admins = Admin::active()->whereHas('role', function ($q) {
            $q->whereJsonContains('permissions', 'contact');
        })->get();
        if ($admins) {
            Notification::send($admins, new ContactUsNotification($contact));
        }
        $this->reset();
        $this->dispatch('success_contact', __('website.success_contact'));

    }

    public function render()
    {
        return view('livewire.website.contact-us.contactus');
    }
}
