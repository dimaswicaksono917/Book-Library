@extends('layouts.backend.main')
@section('title', 'Category')
@section('page-title', 'Category')

@section('css')
    <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">Categories</div>
    <div class="breadcrumb-item active">Index </div>
@endsection
@section('content')
    {{-- card data --}}
    <section>
        <div class="card">
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible"> <i class="fas fa-check"></i> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                @endif

                @if(Session::has('message_error'))
                    <div class="alert alert-warning alert-dismissible"> <i class="fas fa-ban"></i> {{ Session::get('message_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                @endif

                <a href="{{route('category.create')}}" class="btn btn-orange float-right mb-4"><i class="fa fa-plus-circle"></i> Create New</a>

                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Category</th>
                                <th width="25%" >action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-circle btn-success" href="{{ route('category.edit', $item->id) }}" data-toggle="tooltip" title="Update"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('category.delete', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data ??')" >
                                                <i class="fa fa-btn fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="10">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{-- end card data --}}
@endsection
@section('script')
    <script src="{{ asset('stisla/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function(){
            $('#myTable').DataTable({
                "order": []
            });
        });
    </script>
@endsection
