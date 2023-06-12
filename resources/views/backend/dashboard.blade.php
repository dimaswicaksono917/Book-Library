@extends('layouts.backend.main')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')

@section('breadcrumb')
    <div class="breadcrumb-item active">Dashboard</div>
@endsection

<div class="section-Body mb-4">
    <h3 class="text-dark">Wellcome {{ Auth::user()->username }} </h3>
</div>
{{-- end header --}}
{{-- card data --}}
<section>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-solid fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Books</h4>
                    </div>
                    <div class="card-body">
                        {{ $bookcount }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-solid fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body">
                        {{ $categorycount }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $usercount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end card data --}}
@endsection
