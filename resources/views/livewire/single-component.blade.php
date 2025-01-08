<div>
    <div class="container-fluid mt-5 mb-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold">Trending</h4>
                    </div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                        style="width: calc(100% - 180px); padding-right: 100px;">
                        @foreach($popular_news as $popular_new)
                            <div class="text-truncate">
                                <a class="text-secondary text-uppercase font-weight-semi-bold" href="{{ route('post.single', $popular_new->id) }}">
                                    {{ $popular_new->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <div class="bg-white border border-top-0 p-4">
                        <!-- Image Box Added Here -->
                        <div class="imageBox mb-3">
                            <img class="img-fluid rounded" src="{{ asset('asset/admin/images/posts/' . ($currentPost->image ?? 'default.jpg')) }}" alt="{{ $currentPost->title }}" style="width: 100%; height: 400px; object-fit: cover;">
                        </div>

                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="{{ route('category', ['id' => $currentPost->category->id ?? '']) }}">
                                <p>{{ $currentPost->category->name ?? 'Uncategorized' }}</p>
                            </a>
                            <a class="text-body" href="">{{ $currentPost->created_at->format('M d, Y') }}</a>
                        </div>

                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $currentPost->title }}</h1>
                        <p style="word-break: break-word;">{{ $currentPost->shor_desc ?? 'Short description not available.' }}</p>
                        <p style="word-break: break-word;">{{ $currentPost->long_desc ?? 'Long description not available.' }}</p>
                        <div class="d-flex justify-content-between bg-white border-top-0 p-3">
                            <div class="d-flex align-items-center">
                                <span>{{ $author_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="mt-4">
                    <livewire:comment-section :postId="$currentPost->id" />
                </div>
                <!-- Comment List End -->

            </div>

            @livewire('right-component')
        </div>
    </div>
</div>

