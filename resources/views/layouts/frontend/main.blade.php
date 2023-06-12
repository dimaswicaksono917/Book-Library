<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ximperpus | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/edit-bootstrap.css') }}">
    @stack('styles')
    @yield('css')
</head>

<body>
    {{-- navbar --}}
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/images/logonav.png') }}" width="130px" alt="" srcset="">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('landing')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('allbook')}}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('profile')}}">Profile</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">
                                    <button class="button button-primary">Logout</button>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <button class="button button-secondary">Login</button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="button button-primary">Register</button>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    {{-- end navbar --}}
    @yield('content')
    {{-- footer --}}
    <section class="">
        <footer class="py-3 bg-dark-blue">
            <ul class="nav justify-content-center  pb-3 mb-3 text-white">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Book</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Profile</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Login</a></li>
            </ul>
            <p class="text-center text-white">&copy; 2023 Dimas Wicaksono</p>
        </footer>
    </section>
    {{-- end footer --}}

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
    @yield('script')
</body>

</html>
