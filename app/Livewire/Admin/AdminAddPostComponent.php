<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminAddPostComponent extends Component
{
    use WithFileUploads;

    public $category_id, $tag_id, $title, $slug, $short_desc, $long_desc, $status;
    public $slider_news, $bracking_news, $popular_news, $image;

    // Generate a slug based on the post title
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);  // Automatically generate slug
    }

    // Validate individual form fields as they are updated
    public function updated($field)
    {
        $this->validateOnly($field, [
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_desc' => 'required|min:20',
            'long_desc' => 'required|min:50',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    // Store the post in the database
    public function PostStore()
    {
        if (!Auth::check()) {  // Corrected auth check
            session()->flash('error', 'Please log in to create a post.');
            return redirect()->route('login');
        }

        $this->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_desc' => 'required|min:20',
            'long_desc' => 'required|min:50',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),  // Store the authenticated user's ID
            'title' => $this->title,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'tag_id' => $this->tag_id ?? null,
            'short_desc' => $this->short_desc,
            'long_desc' => $this->long_desc,
            'status' => $this->status,
            'slider_news' => $this->slider_news ?? 0,
            'bracking_news' => $this->bracking_news ?? 0,
            'popular_news' => $this->popular_news ?? 0,
            'image' => $this->uploadImage(),
        ]);

        session()->flash('message', 'Post Added Successfully!');
        $this->resetForm();  // Reset form fields after saving the post
    }

    // Handle image upload
    protected function uploadImage()
    {
        if ($this->image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('posts', $imageName);
            return $imageName;
        }
        return null;  // No image uploaded
    }

    // Reset the form fields
    public function resetForm()
    {
        $this->category_id = '';
        $this->tag_id = '';
        $this->title = '';
        $this->slug = '';
        $this->short_desc = '';
        $this->long_desc = '';
        $this->status = '';
        $this->slider_news = 0;
        $this->bracking_news = 0;
        $this->popular_news = 0;
        $this->image = null;
    }

    // Render the form view
    public function render()
    {
        $categories = Category::all();  // Fetch all categories
        $tags = Tag::all();  // Fetch all tags
        return view('livewire.admin.admin-add-post-component', [
            'categories' => $categories,
            'tags' => $tags,
        ])->layout('layouts.admin');
    }
}
