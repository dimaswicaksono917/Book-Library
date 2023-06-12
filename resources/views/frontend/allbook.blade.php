@extends('layouts.frontend.main')
@section('title', 'Books')
@section('css')
@endsection
@section('content')

    {{-- hero section --}}
    <section class="half-section">
        <div id="carouselExample" class="container carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/bg-hero.png') }}" class="d-block w-100" alt="...">
                    <div class="row">
                        <div class="col-5 carousel-caption ">
                            <h1 class="text-white">Find The Book<br>You Want Here !</h1>
                            <div class="search-container mt-4">
                                <form action="#" method="get">
                                    <input type="text" name="search" placeholder="Search ...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 carousel-images">
                <img src="{{ asset('assets/images/people-allbook.png') }}" alt="" srcset="">
            </div>
        </div>
    </section>
    {{-- end hero section --}}

    <section class="half-section">

        <div class="container">
            <div class="row">
                {{-- <div class="col-md-3 text-white">
                    <!-- Sidebar -->
                    <div class="sidebars">
                        <h2 class="text-dark">Category</h2>
                        <ul class="sidebar">
                            @foreach ($category as $item)
                                <li class="sidebar-link">
                                    <a class="sidebar-item" href="#">{{$item->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="row">
                        @if ($book->count() > 0)
                            @foreach ($book as $item)
                                <div class="col-3">
                                    <a href="{{ route('allbook.view', $item->id) }}" class="card-link">
                                        <div class="card-book justify-content-center text-center">
                                            <div class="card-image">
                                                <img src="{{ asset($item->image) }}" alt="">
                                            </div>
                                            <div class="text-card-book">
                                                <h4 class="mt-4 text-black text-uppercase">{{ $item->title }}</h4>
                                                <h6 class="text-semi-black">{{ $item->category }}</h6>
                                                <h6 class="text-orange">by {{ $item->author }}</h6>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h3>no book data</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
