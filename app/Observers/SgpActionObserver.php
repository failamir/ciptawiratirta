<?php

namespace App\Observers;

use App\Models\Sgp;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SgpActionObserver
{
    public function created(Sgp $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Sgp'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Sgp $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Sgp'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Sgp $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Sgp'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
