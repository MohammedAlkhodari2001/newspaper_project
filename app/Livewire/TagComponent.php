<?php

namespace App\Livewire;
use App\Models\Tag;
use Livewire\Component;

class TagComponent extends Component
{
    public function render()
    {
        $tags=Tag::where('status',1)->get();
        return view('livewire.tag-component',['tags'=>$tags]);
    }
}
