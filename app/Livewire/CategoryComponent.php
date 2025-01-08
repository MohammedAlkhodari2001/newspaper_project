<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;

class CategoryComponent extends Component
{
    public $selectedCategory = 1;  // Default category ID
    public $posts = [];
    public $allCategories = [];

    public function mount()
    {
        $this->allCategories = Category::all();
        $this->posts = Post::where('category_id', $this->selectedCategory)->latest()->get();
    }

    public function redirectToCategory($categoryId)
    {
        return redirect()->route('category.posts', ['id' => $categoryId]);  // Redirect to posts-by-category page
    }

    public function render()
    {
        return view('livewire.category-component', [
            'allCategories' => $this->allCategories,
            'posts' => $this->posts,
        ]);
    }
}
