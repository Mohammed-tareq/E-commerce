<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\ContactService;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessage extends Component
{
    use WithPagination;

    public $itemSearch, $page = 1;
    public $messageSelected;
    protected $contactService;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function updatingItemSearch()
    {
        $this->resetPage();
    }

    public function showMessage($msgId)
    {
        $this->dispatch('show-message',$msgId);
        $this->messageSelected = $msgId;
    }


    public function render()
    {
        $messages = $this->itemSearch ? $this->contactService->getContacts($this->itemSearch) : $this->contactService->getContacts();

        return view('livewire.dashboard.contact.contact-message', [
            'messages' => $messages
        ]);
    }
}
