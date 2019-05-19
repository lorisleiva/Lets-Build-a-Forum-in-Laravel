<?php

namespace App\Actions;

use App\Reply;
use Lorisleiva\Actions\Action;

class FavoritesStore extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function handle(Reply $reply)
    {
        $reply->favorite();
    }
}