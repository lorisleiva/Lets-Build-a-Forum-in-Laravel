<?php

namespace App\Actions;

use App\Thread;
use Lorisleiva\Actions\Action;

class ThreadsUpdate extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function authorize(Thread $thread)
    {
        return $this->can('update', $thread);
    }
    
    public function handle(Thread $thread)
    {
        $thread->update(request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]));

        return $thread;
    }
}