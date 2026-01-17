<?php

namespace App\Repositories\Dashboard;

use App\Models\Contact;

class ContactRepository
{
    public function getContacts($search)
    {
        return Contact::with('user')
            ->searchContact($search)
            ->where('spam', 0)
            ->latest()->paginate(5);
    }

    public function getContact($id)
    {
        return Contact::with('user')->find($id);
    }

    public function getLastestContact()
    {
        return Contact::with('user')->latest()->first();
    }

    public function getDeletedContact($id)
    {
        return Contact::with('user')->onlyTrashed()->find($id);
    }

    public function getReadedContacts($search)
    {
        return Contact::with('user')
            ->searchContact($search)
            ->read()
            ->latest()->paginate(5);
    }

    public function getReplayedContacts($search)
    {
        return Contact::with('user')
            ->searchContact($search)
            ->replay()
            ->latest()->paginate(5);
    }

    public function getSpamContacts($search)
    {
        return Contact::with('user')
            ->searchContact($search)
            ->spam()
            ->latest()->paginate(5);
    }

    public function getStarContacts($search)
    {
        return Contact::with('user')
            ->searchContact($search)
            ->star()
            ->latest()->paginate(5);
    }

    public function getTrashContacts($search)
    {
        return Contact::with('user')
            ->searchContact($search)
            ->onlyTrashed()
            ->latest()->paginate(5);
    }

    public function deleteMessage($contact)
    {
        return $contact->delete();
    }

    public function forceDeleteContact($contact)
    {
        return $contact->forceDelete();
    }

    public function restoreContact($contact)
    {
        return $contact->restore();
    }

    public function markAsRead($contact)
    {
        return $contact->update([
            'is_read' => true
        ]);
    }

    public function markAsReadOrNot($contact)
    {
        return $contact->update([
            'is_read' => !$contact->is_read
        ]);
    }

    public function markAsStarOrNot($contact)
    {
        return $contact->update([
            'star' => !$contact->star
        ]);
    }

    public function markAsSpamOrNot($contact)
    {
        return $contact->update([
            'spam' => !$contact->spam
        ]);
    }

    public function maskAsReplay($contact)
    {
        return $contact->update([
            'replayed' => true
        ]);
    }

    public function markAllAsRead()
    {
        $contacts = Contact::unread()->get();

        foreach ($contacts as $contact) {
            $contact->update([
                'is_read' => true
            ]);
        }
        return true;
    }
    public function deleteAllContactForce()
    {
        $contacts = Contact::onlyTrashed()->get();

        foreach ($contacts as $contact) {
            $contact->forceDelete();
        }
        return true;
    }
    public function deleteAllSpamContactForce()
    {
        $contacts = Contact::spam()->get();

        foreach ($contacts as $contact) {
            $contact->forceDelete();
        }
        return true;
    }
}
