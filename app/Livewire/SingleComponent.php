<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class SingleComponent extends Component
{
    public $currentPost;  // Current post to display

    /**
     * Mount the component and load the post.
     */
    public function mount($id = null)
    {
        // Fetch the post by ID, or the latest post if no ID is provided
        $this->currentPost = Post::with(['category', 'user'])->find($id) ?? Post::with(['category', 'user'])->latest()->first();
    }

    /**
     * Render the post details page.
     */
    public function render()
    {
        return view('livewire.single-component', [
            'slider_news' => Post::where('slider_news', 1)->limit(4)->get(),
            'bracking_news' => Post::where('bracking_news', 1)->latest()->limit(3)->get(),  // Fetch 3 latest breaking news
            'tags' => Tag::where('status', 1)->get(),
            'posts' => Post::latest()->limit(4)->get(),
            'popular_news' => Post::where('popular_news', 1)->limit(10)->get(),
            'latest_news' => Post::latest()->limit(6)->get(),
            'currentPost' => $this->currentPost,
            'short_desc' => $this->currentPost->short_desc ?? 'No short description available',  // Handle null case
            'long_desc' => $this->currentPost->long_desc ?? 'No long description available',  // Handle null case
            'category_name' => optional($this->currentPost->category)->name ?? 'Uncategorized',  // Handle null case
            'author_name' => optional($this->currentPost->user)->name ?? 'Author Unknown',  // Handle null case
            'image' => $this->currentPost->image ?? 'default.jpg',  // Handle missing image
        ]);
    }
}
