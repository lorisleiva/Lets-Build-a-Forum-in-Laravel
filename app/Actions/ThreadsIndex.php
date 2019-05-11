<?php

namespace App\Actions;

use App\Thread;
use App\Channel;
use App\Trending;
use App\Filters\ThreadFilters;
use Lorisleiva\Actions\Action;

class ThreadsIndex extends Action
{
    public function handle(Channel $channel, ThreadFilters $filters)
    {
        return Thread::query()
            ->when($channel->exists, function ($query) use ($channel) {
                return $query->where('channel_id', $channel->id);
            })
            ->latest()
            ->filter($filters)
            ->paginate(25);
    }

    public function htmlResponse($threads)
    {
        return view('threads.index', [
            'threads' => $threads,
            'trending' => app(Trending::class)->get()
        ]);
    }
}