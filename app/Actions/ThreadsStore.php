<?php

namespace App\Actions;

use App\Thread;
use Lorisleiva\Actions\Action;

class ThreadsStore extends Action
{
    public function register()
    {
        $this->middleware(['auth', 'must-be-confirmed']);
    }

    public function rules()
    {
        return [
            'title' => 'required|spamfree',
            'body' => 'required|spamfree',
            'channel_id' => 'required|exists:channels,id',
        ];
    }

    public function handle()
    {
        return Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => $this->channel_id,
            'title' => $this->title,
            'body' => $this->body,
        ]);
    }

    public function htmlResponse($thread)
    {
        return redirect($thread->path())->with('flash', 'Your thread has been published!');
    }

    public function jsonResponse($thread)
    {
        return response($thread, 201);
    }
}