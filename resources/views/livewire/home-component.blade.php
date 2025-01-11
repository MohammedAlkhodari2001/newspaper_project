<div>
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <!-- Main Slider Section -->
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach ($slider_news as $slider_new)
                        <div class="position-relative overflow-hidden rounded-lg shadow-lg" style="height: 500px;">
                            <a href="{{ route('post.single', $slider_new->id) }}">
                                <img class="img-fluid w-100 h-100" src="{{ asset('asset/admin/images/posts/' . ($slider_new->image ?? 'default.jpg')) }}" alt="{{ $slider_new->title }}" style="object-fit: cover; border-radius: 10px;">
                            </a>
                            <div class="overlay p-4 position-absolute w-100 h-100 d-flex flex-column justify-content-end" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="{{ optional($slider_new->category)->id ? route('category', ['id' => $slider_new->category->id]) : '#' }}">
                                        {{ optional($slider_new->category)->name ?? 'Uncategorized' }}
                                    </a>
                                    <span class="text-white small">{{ $slider_new->created_at->format('M d, Y') }}</span>
                                </div>
                                <a href="{{ route('post.single', $slider_new->id) }}" class="h2 m-0 text-white text-uppercase font-weight-bold">
                                    {{ \Illuminate\Support\Str::title($slider_new->title) }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Mini Post Section -->
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach($all_posts as $all_post)
                        <div class="col-md-6 px-1">
                            <div class="position-relative overflow-hidden rounded-lg shadow-md" style="height: 250px;">
                                <a href="{{ route('post.single', $all_post->id) }}">
                                    <img class="img-fluid w-100 h-100 rounded" src="{{ asset('asset/admin/images/posts/' . ($all_post->image ?? 'default.jpg')) }}" alt="{{ $all_post->title }}" style="object-fit: cover; border-radius: 10px;">
                                </a>
                                <div class="overlay p-3 position-absolute w-100 h-100 d-flex flex-column justify-content-end" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                                    <div class="mb-2">
                                        <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                                            {{ optional($all_post->category)->name ?? 'Uncategorized' }}
                                        </span>
                                        <span class="text-white small">{{ $all_post->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <a href="{{ route('post.single', $all_post->id) }}" class="h6 m-0 text-white font-weight-bold">
                                        {{ \Illuminate\Support\Str::title($all_post->title) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Breaking News Section -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="bg-primary text-center text-dark font-weight-medium py-2 px-4 rounded-lg">Breaking News</div>
                <div class="owl-carousel tranding-carousel d-inline-flex align-items-center ml-3 overflow-hidden" style="width: calc(100% - 190px);">
                    @foreach($bracking_news as $bracking_new)
                        <div class="text-truncate px-2">
                            <a class="text-white text-uppercase font-weight-bold hover:underline" href="{{ route('post.single', $bracking_new->id) }}">
                                {{ \Illuminate\Support\Str::title($bracking_new->title) }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- Latest News Section -->
    <div class="container-fluid" style="width: 80%; max-width: 100%; margin: auto;">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="text-uppercase font-weight-bold">Latest News</h4>
                        </div>
                    </div>
                    @foreach($latest_news as $latest_new)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="box shadow-sm border rounded p-3">
                                <div class="imageBox mb-3">
                                    <a href="{{ route('post.single', $latest_new->id) }}">
                                        <img class="img-fluid rounded" src="{{ asset('asset/admin/images/posts/' . ($latest_new->image ?? 'default.jpg')) }}" alt="{{ $latest_new->title }}" style="height: 200px; object-fit: cover; width: 100%;">
                                    </a>
                                </div>
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('post.single', $latest_new->id) }}" class="text-dark">{{ \Illuminate\Support\Str::limit($latest_new->title, 50) }}</a>
                                </h4>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge badge-warning text-uppercase p-2">{{ optional($latest_new->category)->name ?? 'Uncategorized' }}</span>
                                    <span class="text-muted small">{{ $latest_new->created_at->format('M d, Y') }}</span>
                                </div>
                                <div>
                                    <p class="text-clamp" style="word-break: break-word;">
                                        {{ \Illuminate\Support\Str::limit($latest_new->short_desc ?? 'No description available') }}
                                        <a href="{{ route('post.single', $latest_new->id) }}" class="text-primary font-weight-bold">Read more...</a>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="{{ asset('asset/img/user.jpg') }}" width="25" height="25" alt="User Avatar">
                                        <small>{{ optional($latest_new->user)->name ?? 'John Doe' }}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $latest_new->views ?? '0' }}</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ $latest_new->comments_count ?? '0' }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
