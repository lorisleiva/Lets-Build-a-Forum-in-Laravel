<?php

namespace App\Actions;

use App\Thread;
use Lorisleiva\Actions\Action;

class ThreadsUnlock extends Action
{
    public function register()
    {
        $this->middleware('admin');
    }
    
    public function handle(Thread $thread)
    {
        $thread->update(['locked' => false]);
    }
}