<?php

namespace App\Actions;

use Lorisleiva\Actions\Action;

class UserNotificationsIndex extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function handle()
    {
        return $this->user()->unreadNotifications;
    }
}