@extends('layouts.frontend.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endsection
@section('title', 'Landing')
@section('content')
    {{-- hero section --}}
    <section class="half-section">
        <div id="carouselExample" class="container carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/bg-hero.png') }}" class="d-block w-100" alt="...">
                    <div class="row">
                        <div class="col-5 carousel-caption ">
                            <h1 class="text-white">Reading Is An Adventure, Come Join Our Library !</h1>
                            <p class="mt-3">"Discover a world of imagination and learning in our library, where books open
                                doors to new horizons."</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 carousel-images ">
                <img src="{{ asset('assets/images/people-hero.png') }}" alt="" srcset="">
            </div>
        </div>
    </section>
    {{-- end hero section --}}
    {{-- keunggulan --}}
    <section class="extra-small-section">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="icon-feature">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa fa-solid fa-user me-4"></i>
                            <div class="text-icon-feature">
                                <span class="text-black text-uppercase">Friendly Staff</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="icon-feature">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa fa-solid fa-book me-4"></i>
                            <div class="text-icon-feature">
                                <span class="text-black text-uppercase">Complete Book</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="icon-feature">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa fa-solid fa-list me-4"></i>
                            <div class="text-icon-feature">
                                <span class="text-black text-uppercase">Various Categories</span>
                                <p class="text-semi-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore,
                                    quo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end keunggulan --}}
    {{-- new book  --}}
    <section class="half-section">
        <div class="container">
            <div class="text-center">
                <h1 class="title-section">New Book</h1>
            </div>
            <div class="row">
                <!-- Card-->
                @if ($booknew->count() > 0)
                @foreach ($booknew as $item)
                    <div class="col-3">
                        <div class="card-book justify-content-center text-center">
                            <div class="card-image">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                            <div class="text-card-book">
                                <h4 class="mt-4 text-black">{{ $item->title }}</h5>
                                    <h6 class="text-semi-black">by {{ $item->author }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <h6>no book data</h6>
                </div>
            @endif
                {{-- endcard --}}
                <div class="col-12 text-center mt-4">
                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- end new book --}}
    {{-- category --}}
    <section class="small-section">
        <div class="container">
            <div class="text-center">
                <h1 class="title-section">Category</h1>
            </div>
            <div class="row">
                <div class="card-category">
                    @foreach ($category as $item)
                        <a href="">
                            <div class="card-categorys"
                                style="background: url('{{ asset('assets/images/bg-cate.png') }}');">
                                <div
                                    class="card-categorys-text d-flex flex-column justify-content-center align-items-center p-4">
                                    <div class="card-icon card-icon-large"><i class="fa fa-solid fa-book"></i>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        </div>

        </div>
    </section>
    {{-- end category --}}
    {{-- best book  --}}
    <section class="half-section">
        <div class="container">
            <div class="text-center">
                <h1 class="title-section">Featured Book</h1>
            </div>
            <div class="row">
                <!-- Card-->
                @if ($allbook->count() > 0)
                    @foreach ($allbook as $item)
                        <div class="col-3">
                            <div class="card-book justify-content-center text-center">
                                <div class="card-image">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="text-card-book">
                                    <h4 class="mt-4 text-black">{{ $item->title }}</h5>
                                        <h6 class="text-semi-black">by {{ $item->author }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <h6>no book data</h6>
                    </div>
                @endif

                {{-- endcard --}}
                <div class="col-12 text-center mt-4">
                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- end new book --}}
    {{-- start cta --}}
    <section class="parallax-cta">
        <div class="parallax" data-parallax="scroll" data-image-src="{{ asset('assets/images/bg-cta.jpg') }}">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title">Welcome to our library</h2>
                    <h3 class="cta-subtitle">find a variety of interesting books and reading materials</h3>
                    <a href="allbook" class="button-outline">Explore Collections</a>
                </div>
            </div>
        </div>
    </section>
    {{-- end cta --}}
    {{-- start testimonial --}}
    <section class="half-section">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h1 class="title-section">Testimonial</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial">
                        <div class="testimonial-content text-center">
                            <p>"Perpustakaan ini memiliki koleksi buku yang sangat lengkap dan fasilitas yang nyaman. Saya
                                sangat puas menjadi anggota."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="User Image">
                            <h4>John Doe</h4>
                            <span>Anggota Perpustakaan</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial">
                        <div class="testimonial-content text-center">
                            <p>"Pelayanan dari tim perpustakaan sangat ramah dan responsif. Selalu siap membantu dengan
                                segala pertanyaan saya."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="User Image">
                            <h4>Jane Smith</h4>
                            <span>Anggota Perpustakaan</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial">
                        <div class="testimonial-content text-center">
                            <p>"Pelayanan dari tim perpustakaan sangat ramah dan responsif. Selalu siap membantu dengan
                                segala pertanyaan saya."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="User Image">
                            <h4>Jane Smith</h4>
                            <span>Anggota Perpustakaan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end testimonial --}}



@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.card-category').slick({

            arrows: false,
            speed: 4,
            infinite: true,
            slidesToShow: 3,
        });

        var parallax = new Parallax('.parallax');
    </script>
@endsection
