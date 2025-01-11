<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchBarComponent extends Component
{
    public $search = "";  // Holds the search term
    public $allPosts = [];  // Holds all posts

    public function mount()
    {
        // Fetch posts as Eloquent objects, not arrays
        $this->allPosts = Post::all();  // Removed toArray() to keep them as objects
    }

    public function render()
    {
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Post::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('short_desc', 'like', '%' . $this->search . '%')  // Fixed "short_desc"
                ->limit(5)
                ->get();  // Get the results as objects
        }

        return view('livewire.search-bar', [
            'posts' => $results,
        ]);
    }
}
