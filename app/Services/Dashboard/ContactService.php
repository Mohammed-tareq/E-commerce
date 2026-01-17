<?php

namespace App\Services\Dashboard;

use App\Mail\ReplayContact;
use App\Repositories\Dashboard\ContactRepository;
use Illuminate\Support\Facades\Mail;

class ContactService
{

    public function __construct(protected ContactRepository $contactRepository)
    {

    }

    public function getContacts($search = null)
    {
        return $this->contactRepository->getContacts($search);
    }

    public function getReadedContacts($search = null)
    {
        return $this->contactRepository->getReadedContacts($search);
    }

    public function getReplayedContacts($search = null)
    {
        return $this->contactRepository->getReplayedContacts($search);
    }

    public function getSpamContacts($search = null)
    {
        return $this->contactRepository->getSpamContacts($search);
    }

    public function getStarContacts($search = null)
    {
        return $this->contactRepository->getStarContacts($search);
    }

    public function getTrashContacts($search = null)
    {
        return $this->contactRepository->getTrashContacts($search);
    }


    public function getLastestContact()
    {
        return $this->contactRepository->getLastestContact() ?? false;
    }

    public function getContact($id)
    {
        return $this->contactRepository->getContact($id) ?? false;
    }

    public function getDeletedContact($id)
    {
        return $this->contactRepository->getDeletedContact($id) ?? false;
    }


    public function deleteMessage($contactId)
    {
        $contact = $this->getContact($contactId);
        if (!$contact) {
            return false;
        }
        return $this->contactRepository->deleteMessage($contact);
    }

    public function forceDeleteContact($contactId)
    {
        $contact = $this->getDeletedContact($contactId);
        if (!$contact) {
            return false;
        }
        return $contact->forceDelete();
    }

    public function restoreContact($contactId)
    {
        $contact = $this->getDeletedContact($contactId);
        if (!$contact) {
            return false;
        }
        return $contact->restore();
    }

    public function replayContact($contactId, $replayMessage)
    {
        $contact = $this->getContact($contactId);
        if (!$contact) {
            return false;
        }
        $this->contactRepository->maskAsReplay($contact);
        Mail::to($contact->email)->send(new  ReplayContact($contact, $replayMessage));
        return true;

    }


    public function markAsRead($contactId)
    {
        $contact = $this->getContact($contactId);
        if (!$contact) {
            return false;
        }

        return $this->contactRepository->markAsRead($contact);
    }

    public function markAsReadOrNot($contactId)
    {
        $contact = $this->getContact($contactId);
        if (!$contact) {
            return false;
        }

        return $this->contactRepository->markAsReadOrNot($contact);
    }

    public function markAsStarOrNot($contactId)
    {
        $contact = $this->getContact($contactId);
        if (!$contact) {
            return false;
        }

        return $this->contactRepository->markAsStarOrNot($contact);
    }

    public function markAsSpamOrNot($contactId)
    {
        $contact = $this->getContact($contactId);
        if (!$contact) {
            return false;
        }

        return $this->contactRepository->markAsSpamOrNot($contact);
    }

    public function markAllAsRead()
    {
        return $this->contactRepository->markAllAsRead();
    }

    public function deleteAllContactForce()
    {
        return $this->contactRepository->deleteAllContactForce();
    }

    public function deleteAllSpamContactForce()
    {
        return $this->contactRepository->deleteAllSpamContactForce();
    }
}
