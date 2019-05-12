<?php

namespace App\Actions;

use App\Thread;
use Lorisleiva\Actions\Action;

class ThreadsDestroy extends Action
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
        $thread->delete();
    }

    public function jsonResponse()
    {
        return response([], 204);
    }

    public function htmlResponse()
    {
        return redirect('/threads');
    }
}