<?php

namespace App\Actions;

use Lorisleiva\Actions\Action;

class ThreadsCreate extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }
    
    public function handle()
    {
        return view('threads.create');
    }
}