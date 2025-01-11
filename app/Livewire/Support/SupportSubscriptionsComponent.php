<?php

namespace App\Livewire\Support;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subscription;

class SupportSubscriptionsComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function deleteSubscription($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        session()->flash('message', 'Subscription deleted successfully!');
    }

    public function render()
    {
        $subscriptions = Subscription::paginate(10);
        return view('livewire.support.support-subscriptions-component', ['subscriptions' => $subscriptions])
            ->layout('layouts.support');
    }
}
