<div class="subscribe-widget">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="subscribe">
        <div class="input-group">
            <input type="email" class="form-control" placeholder="Your Email" wire:model.defer="email">
            <div class="input-group-append">
                <button type="submit" class="btn btn-warning">Sign Up</button>
            </div>
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <small class="text-muted">Thank you for helping us</small>
    </form>
</div>
