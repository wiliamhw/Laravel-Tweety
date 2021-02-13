<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Likable;

class Tweet extends Model
{
    use HasFactory, Likable;

    protected $fillable = ['user_id', 'body', 'image'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($value) {
        return $value ? asset('storage/' . $value) : false;
    }
}
