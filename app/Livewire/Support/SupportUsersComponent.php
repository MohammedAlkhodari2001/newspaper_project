<?php

namespace App\Livewire\Support;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class SupportUsersComponent extends Component
{
    use WithPagination;

    public $name, $email, $type, $password, $userId;
    public $isEditMode = false;
    public $isCreateMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'type' => 'required|in:ADMIN,USER,SUPPORT_IT',
        'password' => 'nullable|min:6'  // Only required when creating a new user
    ];

    // Show the "Edit User" modal
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->type = $user->type;
        $this->isEditMode = true;  // Enable edit mode
        $this->isCreateMode = false;  // Ensure the create mode is disabled
    }

    // Update the user details
    public function updateUser()
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'type' => 'required|in:ADMIN,USER,SUPPORT_IT',
        ]);

        $user = User::find($this->userId);
        if ($user) {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'type' => $this->type,  // Ensure user type is updated
            ]);

            session()->flash('message', 'User type updated successfully!');
            $this->resetForm();
            $this->isEditMode = false;
        } else {
            session()->flash('error', 'User not found.');
        }
    }


    // Reset the form fields
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->type = '';
        $this->password = '';
        $this->userId = null;
        $this->isEditMode = false;
        $this->isCreateMode = false;
    }

    // Delete a user
    public function deleteConfirmation($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully!');
        } else {
            session()->flash('error', 'User not found.');
        }
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.support.support-users-component', ['users' => $users])
            ->layout('layouts.support');
    }
}
