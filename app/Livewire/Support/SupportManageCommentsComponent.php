<?php

namespace App\Livewire\Support;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class SupportManageCommentsComponent extends Component
{
    use WithPagination;

    public $commentId, $post_id, $name, $email, $message, $isEditMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required|string|max:1000',
    ];

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $this->commentId = $comment->id;
        $this->post_id = $comment->post_id;
        $this->name = $comment->name;
        $this->email = $comment->email;
        $this->message = $comment->message;
        $this->isEditMode = true;
    }

    public function updateComment()
    {
        $this->validate();

        $comment = Comment::findOrFail($this->commentId);
        $comment->update([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        session()->flash('message', 'Comment updated successfully!');
        $this->resetForm();
    }

    public function deleteComment($id)
    {
        Comment::findOrFail($id)->delete();
        session()->flash('message', 'Comment deleted successfully!');
    }

    public function resetForm()
    {
        $this->commentId = null;
        $this->post_id = null;
        $this->name = '';
        $this->email = '';
        $this->message = '';
        $this->isEditMode = false;
    }

    public function render()
    {
        return view('livewire.support.support-manage-comments-component', [
            'comments' => Comment::paginate(10),
        ])->layout('layouts.support');
    }
}

