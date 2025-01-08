<div class="container-fluid mt-5 pt-3 px-3">
    <div class="row justify-content-center">
        <!-- Content Section (70% of the width) -->
        <div class="col-lg-7 col-md-8 col-sm-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="section-title d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0 text-uppercase font-weight-bold">
                            Category: {{ $categoryName }}
                        </h4>

                        <!-- Dropdown to Select Category -->
                        <div>
                            <select wire:change="redirectToCategory($event.target.value)" class="form-control w-auto">
                                <option value="" selected disabled>Choose a Category</option>
                                @foreach($allCategories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $selectedCategory->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                @forelse($posts as $post)
                    <!-- Post Box: Adjusted to fit 3 in a row on large screens -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="box shadow-sm border rounded p-3 h-100">
                            <div class="imageBox mb-3">
                                <img class="img-fluid rounded" src="{{ asset('asset/admin/images/posts/' . ($post->image ?? 'default.jpg')) }}" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                            </div>
                            <h4 class="font-weight-bold">
                                <a href="{{ route('post.single', $post->id) }}" class="text-dark">{{ $post->title }}</a>
                            </h4>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                            <div>
                                <p style="word-break: break-word;">
                                    {{ Str::limit($post->shor_desc) }}
                                    <a href="{{ route('post.single', $post->id) }}" class="text-primary font-weight-bold">Read more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No posts available for this category.</p>
                    </div>
                @endforelse
            </div>
        </div>
            @livewire('right-component')
        </div>
    </div>
</div>
