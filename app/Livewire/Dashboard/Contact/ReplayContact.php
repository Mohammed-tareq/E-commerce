<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;

class ReplayContact extends Component
{
    public $id, $email, $subject, $name, $replayMessage;

    protected $contactService;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    #[On('call-replay-contact-component')]
    public function launchModel($msgId)
    {
        logger('test');
        $contact = $this->contactService->getContact($msgId);
        if (!$contact) {
            return false;
        }
        $this->setDataInAttributes($contact);
        $this->dispatch('launch-replay-contact-model');

    }


    public function setDataInAttributes($contact)
    {
        $this->id = $contact->id;
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->subject = $contact->subject;
    }

    public function replayContact()
    {
        $replayContact = $this->contactService->replayContact($this->id , $this->replayMessage);
        if(!$replayContact){
            return;
        }
        $this->dispatch('close-model');

    }

    public
    function render()
    {
        return view('livewire.dashboard.contact.replay-contact');
    }
}
