<div id="search-bar" class="d-flex justify-content-end items-center flex-grow-1 position-relative">
    <form class="d-flex w-full max-w-md" role="search">
        <!-- Search Input Field -->
        <input wire:model.live="search" type="search" class="form-control me-2 border rounded-lg" placeholder="Search" aria-label="Search">
    </form>

    <!-- Dropdown Results -->
    @if (!empty($posts) && count($posts) > 0)
        <div class="dropdown-menu d-block mt-2 bg-white shadow-lg rounded-lg w-full position-absolute" style="top: 100%; left: 0; width: 100%; max-width: 300px; z-index: 999;">
            @foreach ($posts as $post)
                <a href="{{ route('post.single', $post->id) }}" class="px-3 py-2 border-bottom d-block text-decoration-none">
                    <div class="d-flex flex-column">
                        <span style="word-break: break-word;" class="font-bold text-lg text-black">{{ $post->title, 30 }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    @elseif(strlen($search) > 0)
        <div class="dropdown-menu d-block mt-2 bg-white shadow-lg rounded-lg w-full position-absolute" style="top: 100%; left: 0; width: 100%; max-width: 300px; z-index: 999;">
            <p class="px-3 py-2 text-black">No posts found for "{{ $search }}"</p>
        </div>
    @endif
</div>
