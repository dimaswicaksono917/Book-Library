@extends('layouts.backend.main')

@section('title', 'Create Borrowing')
@section('page-title', 'Create Borrowing')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">Borrowing</div>
    <div class="breadcrumb-item active">Create </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="m-b-0 text-white">Form Create Borrowing</h4>
        </div>

        <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ route('history.store') }}
            "
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="category" class="col-md-2 control-label">Username<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select name="user_id" id="user" class="form-control js-example-basic-single"
                                        required>
                                        <option value="" disabled>Choose Category</option>
                                        @foreach ($username as $item)
                                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-2 control-label">Book<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control js-example-basic-single" name="book_id" id="book" required>
                                        <option value="Choose Book" disabled>Choose Book</option>
                                        @foreach ($book as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
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

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

@endsection
