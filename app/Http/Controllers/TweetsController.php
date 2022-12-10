<?php

namespace App\Http\Controllers;

use App\Services\DeleteFileService;
use App\Models\Tweet;
use Illuminate\Support\Facades\Cache;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => [
                'required_without:image_tweet',
                'max:280'
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

        Cache::forget(Tweet::USER_TWEETS_CACHE_KEY);

        return redirect()->route('home')->with('success','Tweet posted successfully!');
    }

    public function destroy(Tweet $tweet, DeleteFileService $deleteFileService)
    {
        $this->authorize('edit', $tweet->user);
        if ($tweet->image) {
            $response = $deleteFileService->deleteLocalFile($tweet->image_path);
        } else {
            $response['type'] = 'success';
        }
        if ($response['type'] == 'success') {
            $tweet->delete();
            $response['message'] = 'Tweet successfully deleted';
        }

        Cache::forget(Tweet::USER_TWEETS_CACHE_KEY);

        return back()->with($response['type'], $response['message']);
    }
}
