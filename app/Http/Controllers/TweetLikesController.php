<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function like(Tweet $tweet)
    {
        $tweet->like();
        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $tweet->dislike();
        return back();
    }

    public function reset(Tweet $tweet)
    {
        $tweet->reset();
        return back();
    }
}
