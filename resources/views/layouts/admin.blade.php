<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GlobalScopeNEWS Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Templates" name="keywords">
    <meta content="Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('asset/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    @livewireStyles

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrapper {
            flex-grow: 1; /* Ensures that this section takes available space */
        }
        footer {
            margin-top: auto; /* Pushes footer to bottom */
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" id="dynamicTime" href="#">Loading time...</a>
                            <script>
                                const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                                const dynamicTimeElement = document.getElementById('dynamicTime');
                                const now = new Date();
                                const formattedTime = now.toLocaleString('en-US', {
                                    timeZone: timezone,
                                    weekday: 'long',
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                });
                                dynamicTimeElement.textContent = formattedTime;
                            </script>
                        </li>
                        <li class="nav-item ml-4">
                            <span class="nav-link text-yellow-400 small">
                                Welcome, {{ Auth::check() ? Auth::user()->name : 'Admin' }}
                            </span>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0"> 
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item ml-auto">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-white bg-transparent border-0 p-0 font-weight-bold">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="/admin" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">GlobalScope<span class="text-secondary font-weight-normal">NEWS Admin</span></h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="/" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">GlobalScope<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('admin.posts') }}" class="nav-item nav-link">All Posts</a>
                    <a href="{{ route('admin.categories') }}" class="nav-item nav-link">All Categories</a>
                    <a href="{{ route('admin.tags') }}" class="nav-item nav-link">All Tags</a>
                </div>
                <div class="d-lg-none mt-2">
                    @if(Auth::check())
                        <!-- Logout Button for Small Screens -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 mb-2">
                                Logout
                            </button>
                        </form>
                    @else
                        <!-- Login Button for Small Screens -->
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">
                            Login
                        </a>
                    @endif
                </div>
                
            </div>
        </nav>
        
    </div>
    <!-- Navbar End -->

    <!-- Main Content Section -->
    <div class="content-wrapper container mt-4">
        {{ $slot }}
    </div>

    <!-- Footer Start -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} GlobalScopeNews. All rights reserved.</p>
            <small>Powered by Laravel</small>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('asset/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    

    <!-- Template Javascript -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    @livewireScripts
</body>
</html>
