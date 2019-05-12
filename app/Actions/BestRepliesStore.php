<?php

namespace App\Actions;

use App\Reply;
use Lorisleiva\Actions\Action;

class BestRepliesStore extends Action
{
    public function authorize(Reply $reply)
    {
        return $this->can('update', $reply->thread);
    }
    
    public function handle(Reply $reply)
    {
        $reply->thread->markBestReply($reply);
    }
}