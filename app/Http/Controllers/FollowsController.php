<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\Followable;

class FollowsController extends Controller
{
    public function store(User $user) {
        auth()
            ->user()
            ->toggleFollow($user);

        return back()->with('success',
            (auth()->user()->following($user) ? 'Follow ' : 'Unfollow ')
            . $user->name . ' successfully!'
        );
    }
}
