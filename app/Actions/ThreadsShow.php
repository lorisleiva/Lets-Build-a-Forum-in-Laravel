<?php

namespace App\Actions;

use App\Thread;
use App\Trending;
use Lorisleiva\Actions\Action;

class ThreadsShow extends Action
{
    public function handle($channel, Thread $thread, Trending $trending)
    {
        if ($user = $this->user()) {
            $user->read($thread);
        }

        $trending->push($thread);

        $thread->increment('visits');

        return view('threads.show', compact('thread'));
    }
}