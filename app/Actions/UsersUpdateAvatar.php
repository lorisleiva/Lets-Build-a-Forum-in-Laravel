<?php

namespace App\Actions;

use App\User;
use Lorisleiva\Actions\Action;

class UsersUpdateAvatar extends Action
{
    public function register()
    {
        $this->middleware('auth');
    }

    public function rules()
    {
        return [
            'avatar' => ['required', 'image'],
        ];
    }

    public function handle($avatar)
    {
        $this->user()->update([
            'avatar_path' => $avatar->store('avatars', 'public')
        ]);

        return response([], 204);
    }
}