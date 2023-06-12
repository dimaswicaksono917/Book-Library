@extends('layouts.frontend.main')
@section('title', 'View Book')
@section('css')
@endsection
@section('content')

    <section class="half-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-detail-book">
                        <div class="row">
                            <div class="d-flex justify-content-center col-6">
                                <img src="{{ asset($data->image) }}" alt="" srcset="">
                            </div>
                            <div class="col-6">
                                <div class="detail-book">
                                    <h2 class="text-uppercase">{{ $data->title }}</h2>
                                    <p class="mt-4 mb-4">{{ $data->desc }}</p>
                                    <h6 class="">Author : <span
                                            class="text-uppercase text-orange">{{ $data->author }}</span></h6>
                                    <h6 class="">ISBN : <span
                                            class="text-uppercase text-orange">{{ $data->isbn }}</span> </h6>
                                    <h6 class="">Category : <span
                                            class="text-uppercase text-orange">{{ $data->category }}</span> </h6>
                                    <h6 class="">Status : <span
                                            class="text-uppercase text-orange">{{ $data->status }}</span></h6>
                                    <a href="{{ route('allbook') }}" class="btn button-outline mt-4">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
