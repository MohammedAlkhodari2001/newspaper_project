<div class="container mt-4">
    <h2 class="text-center">Manage Advertisements</h2>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Add New Advertisement Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Advertisements List</h4>
        <a href="{{ route('support.advertisements.add') }}" class="btn btn-primary">Add New Advertisement</a>
        </div>

    <!-- Advertisements Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($advertisements as $advertisement)
                    <tr>
                        <td>{{ $advertisement->id }}</td>
                        <td>{{ $advertisement->title }}</td>
                        <td>{{ $advertisement->description }}</td>
                        <td>
                            <button wire:click="edit({{ $advertisement->id }})" class="btn btn-warning btn-sm">
                                Edit
                            </button>
                            <button wire:click="deleteConfirmation({{ $advertisement->id }})" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No advertisements found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $advertisements->links() }}
    </div>

    <!-- Edit Advertisement Modal -->
    @if ($isEditMode)
        <div class="modal show fade" tabindex="-1" role="dialog" style="display:block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Advertisement</h5>
                        <button wire:click="$set('isEditMode', false)" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updateAdvertisement">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" wire:model.defer="title" placeholder="Enter title">
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" wire:model.defer="description" rows="3" placeholder="Enter description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button wire:click="$set('isEditMode', false)" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
