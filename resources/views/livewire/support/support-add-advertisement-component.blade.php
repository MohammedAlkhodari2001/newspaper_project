<div>
    <div class="container mt-4">
        <h2 class="text-center">Add New Advertisement</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="storeAdvertisement">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" wire:model="title" placeholder="Enter title">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" wire:model="description" placeholder="Enter description"></textarea>
            </div>

            

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
