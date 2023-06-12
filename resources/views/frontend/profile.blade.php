@extends('layouts.frontend.main')
@section('title', 'View Book')
@section('css')
@endsection
@section('content')

    <section class="half-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-section">Data Borowing</h1>
                </div>
                @foreach ($history as $item)
                    <div class="card-detail-book mb-4">
                        <div class="row">
                            <div class="col-6">
                                <div class="detail-book">
                                    <h6>Title : {{ $item->book->title }}</h6>
                                    <h6>ISBN : {{ $item->book->isbn }}</h6>
                                    <h6>Borrowing Date : {{ $item->rent_date }}</h6>
                                    <h6>Return Date : {{$item->return_date}}</h6>
                                </div>
                            </div>
                            <div class="col-6 justify-content-end d-flex">
                                <img src="{{asset($item->book->image)}}" alt="" style="width:120px; height:160px" >
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection
