<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Advertisement;  // Import Advertisement model
use Livewire\Component;

class RightComponent extends Component
{
    public $selectedPostId;  // Selected post ID from dropdown
    public $currentPost;     // Current post to display

    public function mount($id = null)
    {
        $this->currentPost = $id ? Post::with(['category', 'user'])->find($id) : Post::with(['category', 'user'])->latest()->first();
    }

    public function updatedSelectedPostId($postId)
    {
        $this->currentPost = Post::with(['category', 'user'])->find($postId);
    }

    public function render()
    {
        return view('livewire.right-component', [
            'slider_news' => Post::where('slider_news', 1)->limit(4)->get(),
            'bracking_news' => Post::where('bracking_news', 1)->latest()->limit(3)->get(),
            'tags' => Tag::where('status', 1)->get(),
            'posts' => Post::latest()->limit(4)->get(),
            'popular_news' => Post::where('popular_news', 1)->limit(10)->get(),
            'latest_news' => Post::latest()->limit(6)->get(),
            'advertisements' => Advertisement::latest()->limit(1)->get(),  // Fetch latest advertisement
        ]);
    }
}
