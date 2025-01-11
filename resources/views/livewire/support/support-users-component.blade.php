<div>
    <div class="container mt-4">
        <h2 class="text-center">Manage Users</h2>

        @if(session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <!-- Users Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>
                                <button wire:click="edit({{ $user->id }})" class="btn btn-warning">Edit</button>
                                <button wire:click="deleteConfirmation({{ $user->id }})" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $users->links() }}
        </div>

        <!-- Edit User Modal -->
        <!-- Edit User Modal -->
        @if($isEditMode)
            <div class="modal show fade" tabindex="-1" role="dialog" style="display:block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" wire:click="resetForm" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="updateUser">
                                <!-- Name Field -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" wire:model.defer="name" placeholder="Enter user name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" wire:model.defer="email" placeholder="Enter user email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- User Type Selection -->
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select class="form-control" wire:model.defer="type">
                                        <option value="">Select user type</option>
                                        <option value="ADMIN">Admin</option>
                                        <option value="USER">User</option>
                                        <option value="SUPPORT_IT">Support IT</option>
                                    </select>
                                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>


                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <button type="button" wire:click="resetForm" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
