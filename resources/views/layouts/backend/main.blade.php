<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Ximperpus | @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">

    @stack('styles')
    @yield('css')

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- navbar --}}
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            {{-- end navbar --}}
            {{-- sidebar --}}
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand p-2 mb-4">
                        <img src="{{asset('assets/images/logo.png')}}" width="50px" alt="">
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">Xply</a>
                    </div>
                    {{-- side dashboard --}}
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="dashboard"><i class="fa fa-solid fa-chart-line"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    {{-- end side dashboard --}}
                    {{-- side master --}}
                    <ul class="sidebar-menu">
                        <li class="menu-header">Master Data</li>
                        <li class="{{ request()->is('books') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('book.index')}}"><i class="fa fa-solid fa-book"></i>
                                <span>Books</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('categories') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('category.index')}}"><i class="fa fa-solid fa-list"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('users') ? 'active' : '' }}">
                            <a class="nav-link" href="users"><i class="fa fa-solid fa-users"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('histories') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('history.index')}}"><i class="fa fa-solid fa-history"></i>
                                <span>Borrowing</span>
                            </a>
                        </li>
                    </ul>
                    {{-- end side master --}}

                </aside>
            </div>
            {{-- endsidebar --}}

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('page-title')</h1>
                        <div class="section-header-breadcrumb">
                            @yield('breadcrumb')
                        </div>
                    </div>
                    @yield('content')
                </section>
            </div>
            {{-- end content --}}

            {{-- footer --}}
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div><a href="https://nauval.in/">Dimas Wicaksono</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
            {{-- end footer --}}
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/popper.js') }}"></script>
    <script src="{{ asset('stisla/modules/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/moment.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}"></script>

    @stack('scripts')
    @yield('script')
</body>

</html>
