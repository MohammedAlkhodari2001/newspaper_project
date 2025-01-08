<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;


class CommentSection extends Component
{
    public $postId;         // ID of the post
    public $name;           // Name of the commenter
    public $email;          // Email of the commenter
    public $message;        // Comment message
    public $comments = [];  // Comments list

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->loadComments();
    }

    public function loadComments()
    {
        // Load comments for the current post
        $this->comments = Comment::where('post_id', $this->postId)->latest()->get()->toArray();
    }

    public function submitComment()
    {
        // Validate inputs
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Create the comment
        Comment::create([
            'post_id' => $this->postId,
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Clear input fields after submission
        $this->name = '';
        $this->email = '';
        $this->message = '';

        // Reload the comments
        $this->loadComments();
        session()->flash('success', 'Comment added successfully!');
    }

    public function render()
    {
        return view('livewire.comment-section');
    }
}
