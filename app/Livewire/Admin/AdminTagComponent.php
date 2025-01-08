<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tag;

class AdminTagComponent extends Component
{
    public function deleteTag($id)
    {
        $category=Tag::find($id);
        $category->delete();
        session()->flash('message','Tag Deleted');
    }

    public function render()
    {
        $tags=Tag::all();

        return view('livewire.admin.admin-tag-component',['tags'=>$tags])->layout('layouts.admin') ;
    }
}
