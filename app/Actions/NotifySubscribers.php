<?php

namespace App\Actions;

use Lorisleiva\Actions\Action;

class NotifySubscribers extends Action
{
    public function handle($reply)
    {
        $reply->thread->subscriptions
            ->where('user_id', '!=', $reply->user_id)
            ->each->notify($reply);
    }
}
