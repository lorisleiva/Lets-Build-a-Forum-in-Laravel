<?php

namespace App\Actions;

use App\Thread;
use App\Trending;
use Lorisleiva\Actions\Action;

class ThreadsSearch extends Action
{
    public function handle()
    {
        //
    }

    public function jsonResponse()
    {
        return Thread::search($this->q)->paginate(25);
    }

    public function htmlResponse()
    {
        return view('threads.search', [
            'trending' => app(Trending::class)->get()
        ]);
    }
}