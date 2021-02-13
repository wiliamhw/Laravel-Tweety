<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsController extends Controller
{

    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => [
                'required_without:image_tweet',
                'max:255'
            ],
            'image_tweet' => [
                'image',
                'required_without:body'
            ],
        ]);

        if (request('image_tweet')) {
            $attributes['image_tweet'] = request('image_tweet')->store('image_tweets');
        }

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $attributes['image_tweet']
        ]);

        return redirect()->route('home');
    }

    public function show($tweet)
    {
        $tweet = Tweet::where('id', $tweet)->withLikes()->first();

        return view('tweets.show-tweet', [
            'tweet' => $tweet
        ]);
    }
}
