<?php

namespace App\Actions;

use App\Reply;
use Lorisleiva\Actions\Action;

class RepliesUpdate extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function authorize(Reply $reply)
    {
        return $this->can('update', $reply);
    }

    public function rules()
    {
        return [
            'body' => 'required|spamfree'
        ];
    }

    public function handle(Reply $reply)
    {
        $reply->update($this->validated());
    }
}