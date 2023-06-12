@extends('layouts.backend.main')

@section('title', 'Create Book')
@section('page-title', 'Create Book')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">Book</div>
    <div class="breadcrumb-item active">Create </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="m-b-0 text-white">Form Create Book</h4>
        </div>

        <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ route('book.store') }}
            "
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="link" class="col-md-2 control-label">ISBN<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input id="link" type="text" class="form-control" name="isbn" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-md-2 control-label">Title<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input id="link" type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-md-2 control-label">Author<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input id="link" type="text" class="form-control" name="author" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-md-2 control-label">Description<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input id="link" type="text" class="form-control" name="desc" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="value" class="col-md-2 control-label">Cover<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="file" name="image" class="form-control" id="picture"
                                        data-max-file-size="1M" accept="image/*" required />
                                    <small class="text-danger">*) Max File Size 1M | Image Only</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-2 control-label">Category<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select name="category" id="category" class="form-control"  required>
                                        <option value="" disabled>Choose Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions float-right">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a class="btn btn-danger" href="{{ route('book.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script> --}}

@endsection
