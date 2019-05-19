<?php

namespace App\Actions;

use App\Thread;
use Lorisleiva\Actions\Action;

class ThreadSubscriptionsStore extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function handle(Thread $thread)
    {
        $thread->subscribe();
    }
}