<?php

namespace App\Repositories\Dashboard;

use App\Models\Contact;

class ContactRepository
{
    public function getContacts($search)
    {
        return Contact::with('user')->when($search, function ($q) use ($search) {
            $q->where('email', "like", "%" . $search . "%");
        })->latest()->paginate(5);
    }

    public function getContact($id)
    {
        return Contact::with('user')->when($id, fn($q) => $q->where('id', $id))->latest()->first();
    }

    public function deleteMessage($id)
    {
        return Contact::where('id' , $id)->delete();
    }
}
