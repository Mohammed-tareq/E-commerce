<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;

class ContactShow extends Component
{
    public $lastMessage;

    public $screen = null;

    protected $contactService;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function mount()
    {
        $this->lastMessage = $this->contactService->getLastestContact() ?? null;
    }


    #[On('show-message')]
    public function showMessage($msgId)
    {

        $this->lastMessage = $this->contactService->getContact($msgId);
    }

    #[On('show-deleted-message')]
    public function showDeletedMessage($msgId)
    {

        $this->lastMessage = $this->contactService->getDeletedContact($msgId);
    }

    #[On('delete-message')]
    public function deleteMessage($id)
    {
        $this->contactService->deleteMessage($id);
        $this->dispatch('message-deleted');
        $this->lastMessage = $this->contactService->getLastestContact();

    }

    public function forceDeleteMessage($id)
    {
        $this->contactService->forceDeleteContact($id);
        $this->dispatch('force-message-deleted');
        $this->lastMessage = $this->contactService->getLastestContact();
    }

    #[On('open-selected-screen')]
    public function setScreen($screen)
    {
        $this->screen = $screen;
    }

    public function repalyContact($msgId)
    {
        $this->dispatch('call-replay-contact-component', $msgId);

    }

    public function changeReadStatus($msgId)
    {
        $updateStatus = $this->contactService->markAsReadOrNot($msgId);

        $this->dispatch('update-contact-read', $updateStatus);
    }

    public function changeSpamStatus($msgId)
    {
        $updateStatus = $this->contactService->markAsStarOrNot($msgId);

        $this->dispatch('update-contact-spam', $updateStatus);

    }

    public function changeStarStatus($msgId)
    {
        $updateStatus = $this->contactService->markAsSpamOrNot($msgId);
        $this->dispatch('update-contact-star', $updateStatus);
    }

    public function restoreContact($msgId)
    {
        $restoreStatus = $this->contactService->restoreContact($msgId);
        $this->dispatch('update-contact-restore', $restoreStatus);
    }

    public function render()
    {
        return view('livewire.dashboard.contact.contact-show');
    }
}
