<?php

namespace App\Http\Controllers;

use File;
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
        $this->deleteImage($tweet->image_path);
        $tweet->delete();
        return back()->with('success','Tweet deleted successfully!');
    }

    public function deleteImage($path_to_file)
    {
        if (!$path_to_file) return;

        if (File::exists(public_path($path_to_file))) {
            File::delete(public_path($path_to_file));
        } else {
            abort(404, 'File does not exists');
        }
    }
}
