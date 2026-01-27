<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\UserRepository;
use Yajra\DataTables\DataTables;

class UserService
{

    public function __construct(protected UserRepository $userRepository)
    {

    }

    public function getUsers()
    {
        $users = $this->userRepository->getUsers();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('country' ,fn($user)=> $user->country->getTranslation('name' , app()->getLocale()))
            ->addColumn('governorate' ,fn($user)=> $user->governorate->getTranslation('name' , app()->getLocale()))
            ->addColumn('city' ,fn($user)=> $user->city->getTranslation('name' , app()->getLocale()))
            ->addColumn('image', fn($user) => view('dashboard.user.data-table.image', compact('user')))
            ->addColumn('action', fn($user) => view('dashboard.user.data-table.action', compact('user')))
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function getUser($id)
    {
        return $this->userRepository->getUser($id) ?? false;
    }

    public function createUser($data)
    {
        return $this->userRepository->createUser($data);
    }

    public function changeStatus($id)
    {
        $user = $this->getUser($id);
        return $this->userRepository->changeStatus($user);
    }

    public function deleteUser($id)
    {
       $user =  $this->userRepository->getUser($id);
       if(!$user){
           return false;
       }
       foreach ($user->orders as  $order)
       {
         if($order->status === 'pending')
         {
             return false;
         }
       }
       return $this->userRepository->deleteUser($user);
    }
}