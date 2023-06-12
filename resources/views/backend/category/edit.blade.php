@extends('layouts.backend.main')

@section('title', 'Create Category')
@section('page-title', 'Create Category')

@section('css')
    <link href="{{ asset('themplate/modules/dropify/dist/css/dropify.css') }}" rel="stylesheet" />
    <link href="{{ asset('themplate/modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('themplate/modules/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">Category</div>
    <div class="breadcrumb-item active">Edit </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="m-b-0 text-white">Form Edit Category</h4>
        </div>

        <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ route('category.update', $data->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="link" class="col-md-2 control-label">Category <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name"  value="{{ $data->name }} ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions float-right">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a class="btn btn-danger" href="{{ route('category.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
