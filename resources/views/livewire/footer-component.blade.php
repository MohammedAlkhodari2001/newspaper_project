<div>
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
             <!-- Popular News Section -->
             <div class="col-lg-4 col-md-6 mb-5" >
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                @foreach($popularPosts as $post)
                    <div class="text-truncate px-3">
                        <div class="mb-2">
                            <!-- Category Badge -->
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('category', ['id' => $post->category->id ?? '']) }}">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </a>
                            <!-- Date -->
                            <a class="text-body" href="{{ route('post.single', ['id' => $post->id]) }}">
                                <small>{{ $post->created_at->format('M d, Y') }}</small>
                            </a>
                        </div>
                        <!-- Post Title -->
                        <a class="small text-body text-uppercase font-weight-medium" href="{{ route('post.single', ['id' => $post->id]) }}">
                            {{ \Illuminate\Support\Str::limit($post->title, 70) }}
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Categories Section -->
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    @foreach($categories as $category)
                    <a href="{{ route('category', ['id' => $category->id]) }}" class="btn btn-sm btn-secondary m-1">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
</div>
