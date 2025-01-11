<div class="col-lg-4">
                <!-- Social Follow Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                            <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Fans</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                            <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                            <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Connects</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                            <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                            <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Subscribers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                            <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Ads Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                    </div>

                    @forelse($advertisements as $advertisement)
                        <div class="bg-white text-center border border-top-0 p-3">
                            <!-- Advertisement Title in Bold -->
                            <p class="font-weight-bold text-dark" style="word-break: break-word;">{{ $advertisement->title }}</p>

                            <!-- Advertisement Description with line breaks -->
                            <p class="text-dark" style="word-break: break-word;">{{ $advertisement->description }}</p>
                        </div>
                    @empty
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>No advertisements available.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Ads End -->

                <!-- Breaking News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Breaking News</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                    @foreach($bracking_news as $bracking_new)
                        <div class="d-flex bg-white mb-3 p-2 border">
                            <div class="w-100 h-100 d-flex flex-column justify-content-center">
                                <div class="mb-2">
                                    <!-- Category Badge -->
                                    <span class="badge badge-warning text-uppercase font-weight-bold p-1 mr-2">
                                        {{ optional($bracking_new->category)->name ?? 'Uncategorized' }}
                                    </span>
                                    <!-- Date -->
                                    <small class="text-body">{{ $bracking_new->created_at->format('M d, Y') }}</small>
                                </div>
                                <!-- Post Title -->
                                <a class="h6 text-dark text-uppercase font-weight-bold mb-0" href="{{ route('post.single', $bracking_new->id) }}">
                                    {{ $bracking_new->title }}
                                </a>
                            </div>
                        </div>
                    @endforeach


                    </div>
                </div>
                <!-- Breaking News End -->

                
            </div>

                    