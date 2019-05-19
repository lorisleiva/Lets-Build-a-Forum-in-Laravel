<?php

namespace App\Actions;

use App\User;
use App\Activity;
use Lorisleiva\Actions\Action;

class UsersShow extends Action
{
    public function handle(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
            'activities' => Activity::feed($user)
        ]);
    }
}