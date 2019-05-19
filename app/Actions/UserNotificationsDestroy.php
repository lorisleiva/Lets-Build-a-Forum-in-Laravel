<?php

namespace App\Actions;

use Lorisleiva\Actions\Action;

class UserNotificationsDestroy extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function handle($notification)
    {
        $this->user()->notifications()->findOrFail($notification)->markAsRead();
    }
}