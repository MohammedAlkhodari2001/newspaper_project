<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class FooterComponent extends Component
{
    public $allPosts=[];
    public function mount()
    {
        // Optionally fetch posts during component initialization.
        $this->allPosts = Post::all()->toArray();
    }

    public function render()
    {
        // Fetch all categories
        $categories = Category::all();

        // Fetch popular posts (modify as needed, e.g., most viewed)
        $popular_news=Post::latest()->limit(3)->get();

        return view('livewire.footer-component', [
            'categories' => $categories,
            'popularPosts' => $popular_news,
        ]);
    }
}

