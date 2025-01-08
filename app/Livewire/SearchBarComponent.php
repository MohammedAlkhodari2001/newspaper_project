<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchBarComponent extends Component
{
    public $search = "";  // This defines the $search property to be used in the view.
    public $allPosts=[];
    public function mount()
    {
        // Optionally fetch posts during component initialization.
        $this->allPosts = Post::all()->toArray();
    }

    public function render()
    {
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Post::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('shor_desc', 'like', '%' . $this->search . '%')
                ->limit(5)
                ->get();
        }

        return view('livewire.search-bar', [
            'posts' => $results,
        ]);
    }
}
