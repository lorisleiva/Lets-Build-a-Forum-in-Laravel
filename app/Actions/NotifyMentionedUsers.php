<?php

namespace App\Actions;

use App\User;
use Lorisleiva\Actions\Action;
use App\Notifications\YouWereMentioned;

class NotifyMentionedUsers extends Action
{
    public function handle($reply)
    {
        User::whereIn('name', $reply->mentionedUsers())
            ->get()
            ->each->notify(new YouWereMentioned($reply));
    }
}
