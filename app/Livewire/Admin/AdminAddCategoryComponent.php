<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $home_category = 0; // Default value

    // Validation rules
    public $rules = [
        'name' => 'required|unique:categories|max:255',
        'slug' => 'required',
        'home_category' => 'required'
    ];

    // Generate slug when typing name
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    // Real-time validation
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }

    // Store category in the database
    public function CategoryStore()
    {
        $this->validate($this->rules);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->home_category = $this->home_category;
        $category->save();

        session()->flash('message', 'Category Added Successfully!');
        $this->reset(['name', 'slug', 'home_category']); // Clear form fields
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.admin');
    }
}


