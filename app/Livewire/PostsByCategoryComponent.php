<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;

class PostsByCategoryComponent extends Component
{
    public $selectedCategory;
    public $posts = [];
    public $allCategories = [];

    public function mount($id)
    {
        $this->allCategories = Category::all();
        $this->selectedCategory = Category::findOrFail($id);  // Find category by ID
        $this->posts = Post::where('category_id', $id)->latest()->get();  // Get posts for the category
    }

    public function redirectToCategory($categoryId)
    {
        return redirect()->route('category.posts', ['id' => $categoryId]);  // Redirect to a new category page
    }

    public function render()
    {
        return view('livewire.posts-by-category-component', [
            'categoryName' => $this->selectedCategory->name,
            'posts' => $this->posts,
            'allCategories' => $this->allCategories,
        ]);
    }
}
