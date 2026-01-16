<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;

class ContactShow extends Component
{
    protected $contactService;
    public $lastMessage;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function mount()
    {
        $this->lastMessage = $this->contactService->getContact();
    }

    #[On('show-message')]
    public function showMessage($msgId)
    {
        $this->lastMessage = $this->contactService->getContact($msgId);
    }

    #[On('delete-message')]
    public function deleteMessage($id)
    {
        $this->contactService->deleteMessage($id);
        $this->dispatch('message-deleted', __('dashboard.operation_success'));
        $this->lastMessage = $this->contactService->getContact();

    }

    public function render()
    {
        return view('livewire.dashboard.contact.contact-show');
    }
}
