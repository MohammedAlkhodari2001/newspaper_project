<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class SingleComponent extends Component
{
    public $selectedPostId;  // Selected post ID from dropdown
    public $currentPost;     // Current post to display

    public function mount($id = null)
    {
        // Fetch the post by ID, default to the latest post if no ID is provided
        $this->currentPost = $id ? Post::with(['category', 'user'])->find($id) : Post::with(['category', 'user'])->latest()->first();
    }

    public function updatedSelectedPostId($postId)
    {
        // Update the current post when a new post is selected
        $this->currentPost = Post::with(['category', 'user'])->findOrFail($postId);
    }

    public function render()
    {
        return view('livewire.single-component', [
            'slider_news' => Post::where('slider_news', 1)->limit(4)->get(),
            'bracking_news' => Post::where('bracking_news', 1)->latest()->limit(3)->get(),  // Fetch 3 latest breaking news
            'tags' => Tag::where('status', 1)->get(),
            'posts' => Post::latest()->limit(4)->get(),
            'popular_news' => Post::where('popular_news', 1)->limit(10)->get(),
            'latest_news' => Post::latest()->limit(6)->get(),
            'currentPost' => $this->currentPost,  // Pass the current post to Blade
            'shor_desc' => $this->currentPost->shor_desc ?? 'No short description available',  // Correct property
            'long_desc' => $this->currentPost->long_desc ?? 'No long description available',  // Correct property
            'category_name' => optional($this->currentPost->category)->name ?? 'Uncategorized',  // Get category name
            'author_name' => optional($this->currentPost->user)->name ?? 'Author Unknown',  // Get author name
            'image' => $this->currentPost->image,
        ]);
    }
}
