<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\post;

class AdminPostsComponent extends Component
{
    public function deletePost($id)
    {
        $post=Post::find($id);
        $post->delete();
        session()->flash('message','post Deleted');
    }
    public function render()
    {
        $posts=Post::paginate(8);
        return view('livewire.admin.admin-posts-component',['posts'=>$posts])->layout('layouts.admin') ;
    }
}
