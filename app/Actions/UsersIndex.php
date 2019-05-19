<?php

namespace App\Actions;

use App\User;
use Lorisleiva\Actions\Action;

class UsersIndex extends Action
{
    public function handle($name)
    {
        return User::where('name', 'LIKE', "%$name%")
            ->take(5)
            ->pluck('name');
    }
}