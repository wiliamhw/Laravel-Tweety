<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class LikeButtons extends Component
{
    public Tweet $tweet;
    public int $likes;
    public int $dislikes;
    public bool $isLiked;
    public bool $isDisliked;

    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
        $this->likes = $tweet->likes ?: 0;
        $this->dislikes = $tweet->dislikes ?: 0;
        $this->isLiked = $tweet->isLikedBy(auth()->user());
        $this->isDisliked = $tweet->isDislikedBy(auth()->user());
    }

    public function render()
    {
        return view('livewire.like-buttons');
    }

    public function like()
    {
        if ($this->isLiked) {
            $this->tweet->reset();
            $this->likes--;
            $this->isLiked = false;
        } else {
            $this->tweet->like();
            $this->likes++;
            $this->isLiked = true;

            if ($this->isDisliked) {
                $this->dislikes--;
                $this->isDisliked = false;
            }
        }
        Cache::forget($this->tweet->user->getTweetsCacheKey());
    }

    public function dislike()
    {
        if ($this->isDisliked) {
            $this->tweet->reset();
            $this->dislikes--;
            $this->isDisliked = false;
        } else {
            $this->tweet->dislike();
            $this->dislikes++;
            $this->isDisliked = true;

            if ($this->isLiked) {
                $this->likes--;
                $this->isLiked = false;
            }
        }
        Cache::forget($this->tweet->user->getTweetsCacheKey());
    }
}
