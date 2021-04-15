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
        } else {
            $attributes['image_tweet'] = null;
        }

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $attributes['image_tweet']
        ]);

        return redirect()->route('home')->with('success','Tweet posted successfully!');
    }

    public function destroy(Tweet $tweet)
    {
        $this->authorize('edit', $tweet->user);
        $tweet->delete();
        return back()->with('success','Tweet deleted successfully!');
    }
}
