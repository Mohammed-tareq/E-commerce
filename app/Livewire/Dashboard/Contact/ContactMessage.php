<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessage extends Component
{
    use WithPagination;

    public $itemSearch, $page = 1;
    public $screen = 'index';
    public $messageSelected;
    protected $contactService;

    protected $listeners = [
        'message-deleted' => '$refresh',
        'update-contact-read' => '$refresh',
        'update-contact-restore' => '$refresh',
        'update-contact-spam' => '$refresh',
        'force-message-deleted' => '$refresh',
        'update-contact-star' => '$refresh',

    ];

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
        $this->dispatch('show-message', $msgId);
        $this->messageSelected = $msgId;
        $this->contactService->markAsRead($msgId);
    }

    public function showDeletedMessage($msgId)
    {
        $this->dispatch('show-deleted-message', $msgId);
        $this->messageSelected = $msgId;
        $this->contactService->markAsRead($msgId);
    }

    #[On('open-selected-screen')]
    public function setScreen($screen)
    {
        $this->screen = $screen;
    }


    public function render()
    {
        if ($this->screen === 'readed') {
            $messages = $this->itemSearch ?
                $this->contactService->getReadedContacts($this->itemSearch)
                : $this->contactService->getReadedContacts();

        } elseif ($this->screen === 'answered') {
            $messages = $this->itemSearch ?
                $this->contactService->getReplayedContacts($this->itemSearch)
                : $this->contactService->getReplayedContacts();

        } elseif ($this->screen === 'stared') {
            $messages = $this->itemSearch ?
                $this->contactService->getStarContacts($this->itemSearch)
                : $this->contactService->getStarContacts();

        } elseif ($this->screen === 'spamed') {
            $messages = $this->itemSearch ?
                $this->contactService->getSpamContacts($this->itemSearch)
                : $this->contactService->getSpamContacts();
        } elseif ($this->screen === 'trashed') {
            $messages = $this->itemSearch ?
                $this->contactService->getTrashContacts($this->itemSearch)
                : $this->contactService->getTrashContacts();
        } else {

            $messages = $this->itemSearch ? $this->contactService->getContacts($this->itemSearch) : $this->contactService->getContacts();
        }

        return view('livewire.dashboard.contact.contact-message', [
            'messages' => $messages
        ]);
    }
}
