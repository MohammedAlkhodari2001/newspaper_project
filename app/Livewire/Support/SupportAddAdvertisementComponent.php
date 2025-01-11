<?php

namespace App\Livewire\Support;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Advertisement;

class SupportAddAdvertisementComponent extends Component
{
    use WithFileUploads;

    public $title, $description, $image;

    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'nullable|string',
    ];

    public function storeAdvertisement()
    {
        $this->validate();

        $imageName = $this->image ? $this->image->store('advertisements', 'public') : null;

        Advertisement::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imageName,
            'status' => 1,
        ]);

        session()->flash('message', 'Advertisement added successfully!');
        $this->reset(['title', 'description', 'image']);
    }

    public function render()
    {
        return view('livewire.support.support-add-advertisement-component')->layout('layouts.support');
    }
}
