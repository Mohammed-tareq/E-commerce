<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\ContactRepository;

class ContactService
{

    public function __construct(protected ContactRepository $contactRepository)
    {

    }

    public function getContacts($search = null)
    {
        return $this->contactRepository->getContacts($search);
    }

    public function getContact($id = null)
    {
        return $this->contactRepository->getContact($id);
    }

    public function deleteMessage($id)
    {
        return $this->contactRepository->deleteMessage($id);
    }
}
