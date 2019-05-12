<?php

namespace App\Actions;

use App\Reply;
use App\Thread;
use Lorisleiva\Actions\Action;
use App\Exceptions\ThrottleException;

class RepliesStore extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function authorize()
    {
        return $this->can('create', Reply::class);
    }

    protected function failedAuthorization()
    {
        throw new ThrottleException(
            'You are replying too frequently. Please take a break.'
        );
    }

    public function rules()
    {
        return [
            'body' => 'required|spamfree',
        ];
    }

    public function withValidator($validator, Thread $thread)
    {
        $validator->after(function ($validator) use ($thread) {
            if ($thread->locked) {
                $validator->errors()->add('thread', 'Thread is locked.');
            }
        });
    }

    public function handle(Thread $thread, $body)
    {
        return $thread->addReply([
            'body' => $body,
            'user_id' => $this->user()->id
        ])->load('owner');
    }
}