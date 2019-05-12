<?php

namespace App\Actions;

use App\Thread;
use Lorisleiva\Actions\Action;

class RepliesIndex extends Action
{
    public function handle(Thread $thread)
    {
        return $thread->replies()->paginate(20);
    }
}