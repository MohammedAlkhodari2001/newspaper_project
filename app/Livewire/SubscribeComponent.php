<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;

class SubscribeComponent extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|unique:subscriptions,email'
    ];

    public function subscribe()
    {
        $this->validate();

        Subscription::create([
            'email' => $this->email,
        ]);

        session()->flash('message', 'Thank you for subscribing!');
        $this->reset('email');  // Clear the input field
    }

    public function render()
    {
        return view('livewire.subscribe-component');
    }
}
