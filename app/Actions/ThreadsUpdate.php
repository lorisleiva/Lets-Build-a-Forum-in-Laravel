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

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
        ];
    }
    
    public function handle(Thread $thread)
    {
        $thread->update($this->validated());

        return $thread;
    }
}