<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Likable;

class Tweet extends Model
{
    use HasFactory, Likable;

    const USER_TWEETS_CACHE_KEY = 'user_tweets';

    protected $fillable = ['user_id', 'body', 'image'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($value) {
        return $value ? asset('storage/' . $value) : false;
    }

    public function getImagePathAttribute() {
        return getRaws($this->image);
    }
}
