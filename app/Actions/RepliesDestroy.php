<?php

namespace App\Actions;

use App\Reply;
use Lorisleiva\Actions\Action;

class RepliesDestroy extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function authorize(Reply $reply)
    {
        return $this->can('update', $reply);
    }

    public function handle(Reply $reply)
    {
        $reply->delete();
    }

    public function jsonResponse()
    {
        return response(['status' => 'Reply deleted']);
    }

    public function htmlResponse()
    {
        return back();
    }
}