@extends('layouts.backend.main')

@section('title', 'View User')
@section('page-title', 'View User')

@section('breadcrumb')
    <div class="breadcrumb-item">User</div>
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
                        <label for="title" class="col-md-2 control-label">Username</label> :
                        {{ $data->username }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Phone Number</label> :
                        {{ $data->phone }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Address</label> :
                        {{ $data->address }}
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Status</label> :
                        {{ $data->status }}
                    </div>
                    <div class="form-group">
                        @if ($data->status == 'inactive')
                        <label for="action" class="col-md-2 control-label">Action</label>
                            <form action="{{ route('user.activate', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Aktifkan Akun</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-actions float-right">
                <a class="btn btn-danger" href="{{ route('user.index') }}">Back </a>
            </div>
        </div>
    </div>
@endsection
