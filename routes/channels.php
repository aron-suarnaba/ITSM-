<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

Broadcast::channel('requests.status.manager', function (User $user) {
    // Replace this with your actual manager/authorization logic
    return $user->isManager();
});
