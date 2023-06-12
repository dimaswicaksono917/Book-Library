@extends('layouts.backend.main')

@section('title', 'View Book')
@section('page-title', 'View Book')

@section('breadcrumb')
    <div class="breadcrumb-item">Book</div>
    <div class="breadcrumb-item active">View </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="m-b-0 text-white">View Data</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">ISBN</label> :
                        {{ $data->isbn }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Title</label> :
                        {{ $data->title }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Author</label> :
                        {{ $data->author }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Category</label> :
                        {{ $data->category }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Status</label> :
                        {{ $data->status }}
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Cover</label> :
                        <img src="{{ asset($data->image) }}" style="width: 25%;" />
                    </div>
                </div>
            </div>
            <div class="form-actions float-right">
                <a class="btn btn-danger" href="{{ route('book.index') }}">Back </a>
            </div>
        </div>
    </div>
@endsection
