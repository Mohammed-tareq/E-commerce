<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\ContactService;
use Livewire\Component;

class ContactSideBar extends Component
{
    public $screen = 'index';

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

    public function getScreen($screen)
    {
        $this->screen = $screen;
        $this->dispatch('open-selected-screen', $screen);
    }

    public function markAllAsRead()
    {
        $this->contactService->markAllAsRead();
        $this->dispatch('update-contact-read');
    }

    public function deleteAllSpam()
    {
        $this->contactService->deleteAllSpamContactForce();
        $this->dispatch('update-contact-spam');

    }

    public function deleteAllTrash()
    {
        $this->contactService->deleteAllContactForce();
        $this->dispatch('force-message-deleted');
    }

    public function render()
    {
        return view('livewire.dashboard.contact.contact-side-bar', [
            'inboxCount' => $this->contactService->getContacts()->total(),
            'replayedCount' => $this->contactService->getReplayedContacts()->total(),
            'spamCount' => $this->contactService->getSpamContacts()->total(),
            'starCount' => $this->contactService->getStarContacts()->total(),
            'readedCount' => $this->contactService->getReadedContacts()->total(),
            'trashedCount' => $this->contactService->getTrashContacts()->total(),
        ]);
    }
}
