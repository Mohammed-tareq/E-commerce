<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('admins.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
},['guards' => 'admin']);
