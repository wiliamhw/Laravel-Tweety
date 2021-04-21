<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'avatar',
        'profile_banner',
        'profile_text',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value) {
        return asset('storage/' . ($value ?: 'avatars/default-avatar.jpeg'));
    }

    public function getProfileBannerAttribute($value) {
        return asset('storage/' . ($value ?: 'profile-banners/default-profile-banner.jpg'));
    }

    public function getAvatarPathAttribute() {
        return getRaws($this->avatar);
    }

    public function getProfileBannerPathAttribute() {
        return getRaws($this->profile_banner);
    }

    public function timeline($onlyThisUser = False) {
        $follower = $this->follows()->pluck('id');

        if ($onlyThisUser) {
            $tweets = Tweet::where('user_id', $this->id)
                ->withLikes()
                ->latest()
                ->paginate(getPaginate());
        } else {
            $tweets = Tweet::where('user_id', $this->id)
                ->orWhereIn('user_id', $follower)
                ->withLikes()
                ->latest()
                ->paginate(getPaginate());
        }
        foreach ($tweets as $tweet) {
            if ($tweet->created_at->diffInDays(now()) != 0) {
                $tweet['interval'] = $tweet->created_at->isoFormat('D MMMM');
            }
            else if ($tweet->created_at->diffInHours(now()) > 0) {
                $tweet['interval'] = $tweet->created_at->diffInHours(now()) . 'h';
            }
            else if ($tweet->created_at->diffInMinutes(now()) > 0) {
                $tweet['interval'] = $tweet->created_at->diffInMinutes(now()) . 'm';
            }
            else {
                $tweet['interval'] = 'now';
            }
        }
        return $tweets;
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function path($append = '') {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
