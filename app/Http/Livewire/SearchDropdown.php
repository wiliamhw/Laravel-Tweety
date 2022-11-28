<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $users;
    public $search;
    public $searchResults = [];

    public function updatedSearch($newValue)
    {
        if (strlen($this->search) < 3) {
            $this->searchResults = [];
            return;
        }

        $this->searchResults = array_filter($this->users, function ($user) use ($newValue) {
            return ( (stripos($user['name'], $newValue) !== false)
                || (stripos($user['username'], $newValue) !== false)
            );
        });
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
