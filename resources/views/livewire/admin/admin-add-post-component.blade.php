<div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Title and Back Button -->
                    <h3>Admin Add Post</h3>
                    <a href="{{ route('admin.posts') }}" class="btn btn-primary mb-3">All Posts</a>

                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Post Form -->
                    <form wire:submit.prevent="PostStore">

                        <!-- Category Selection -->
                        <div class="form-group">
                            <label for="category_id">Category Name</label>
                            <select class="form-control" name="category_id" wire:model="category_id">
                                <option value="0">Select Category</option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option value="">No Categories Available</option>
                                @endforelse
                            </select>
                            @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Tag Selection -->
                        <div class="form-group">
                            <label for="tag_id">Tag Name</label>
                            <select class="form-control" name="tag_id" wire:model="tag_id">
                                <option value="0">Select Tag</option>
                                @forelse ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @empty
                                    <option value="">No Tags Available</option>
                                @endforelse
                            </select>
                            @error('tag_id') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Post Title -->
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Post Title" wire:model="title" wire:keyup="generateSlug">
                            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Post Slug -->
                        <div class="form-group">
                            <label for="slug">Post Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Post Slug" wire:model="slug">
                            @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="form-group">
                            <label for="short_desc">Short Description</label>
                            <textarea class="form-control" placeholder="Short Description" wire:model="short_desc"></textarea>
                            @error('short_desc') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Long Description -->
                        <div class="form-group">
                            <label for="long_desc">Long Description</label>
                            <textarea class="form-control" placeholder="Long Description" wire:model="long_desc"></textarea>
                            @error('long_desc') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Slider News -->
                        <div class="form-group">
                            <label for="slider_news">Slider News</label>
                            <select class="form-control" wire:model="slider_news">
                                <option value="0">Select Please</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('slider_news') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Breaking News -->
                        <div class="form-group">
                            <label for="bracking_news">Breaking News</label>
                            <select class="form-control" wire:model="bracking_news">
                                <option value="0">Select Please</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('bracking_news') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Popular News -->
                        <div class="form-group">
                            <label for="popular_news">Popular News</label>
                            <select class="form-control" wire:model="popular_news">
                                <option value="0">Select Please</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('popular_news') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Post Status -->
                        <div class="form-group">
                            <label for="status">Post Status</label>
                            <select class="form-control" wire:model="status">
                                <option value="0">Select Please</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image">Post Image</label>
                            <input type="file" wire:model="image" class="form-control">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="Preview Image" class="img-fluid mt-2" style="max-width: 200px;">
                            @endif
                            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
