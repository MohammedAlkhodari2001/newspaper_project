<div class="bg-white p-4 rounded shadow-sm">
    <h4 class="mb-3">Comments</h4>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        @foreach($comments as $comment)
            <div class="border-bottom mb-2 pb-2">
                <strong>{{ $comment['name'] }}</strong> ({{ $comment['email'] }})
                <p>{{ $comment['message'] }}</p>
                <small>{{ \Carbon\Carbon::parse($comment['created_at'])->format('M d, Y H:i') }}</small>
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="submitComment">
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" class="form-control" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="message">Comment *</label>
            <textarea id="message" class="form-control" wire:model="message" rows="3"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>
