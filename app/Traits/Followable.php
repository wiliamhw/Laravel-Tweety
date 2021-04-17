<?php

namespace App\Traits;
use App\Models\User;
use Illuminate\Support\Facades\DB;

trait Followable
{
    public function follow(User $user) {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user) {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user) {
        if ($this->following($user)) {
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }

    public function following(User $user) {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows() {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id', 'following_user_id'
        )->withTimestamps();
    }

    public function getFollowers() {
        return DB::table('follows')
            ->where('following_user_id', $this->id)
            ->count();
    }

    public function getFollowings() {
        return $this->follows()->count();
    }
}
