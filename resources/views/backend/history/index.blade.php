@extends('layouts.backend.main')
@section('title', 'History')
@section('page-title', 'History')

@section('css')
    <style>
        .bg-success {
            background-color: #63ED7A !important;
            color: white !important;
        }

        .bg-danger {
            background-color: #ed6363 !important;
            color: white !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">History</div>
    <div class="breadcrumb-item active">Index </div>
@endsection
@section('content')
    {{-- data --}}
    <section>
        <div class="card">
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible"> <i class="fas fa-check"></i>
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                aria-hidden="true">&times;</span> </button>
                    </div>
                @endif

                @if (Session::has('message_error'))
                    <div class="alert alert-danger alert-dismissible"> <i class="fas fa-ban"></i>
                        {{ Session::get('message_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                aria-hidden="true">&times;</span> </button>
                    </div>
                @endif

                <div class="d-flex justify-content-end">
                    <a href="{{ route('history.return') }}" class="btn btn-info mb-4 mr-2"><i class="fa fa-plus-circle"></i> Return</a>
                    <a href="{{ route('history.create') }}" class="btn btn-success float-right mb-4 ml-2"><i class="fa fa-plus-circle"></i> Create New</a>


                </div>


                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Actual Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrow as $item)
                                <tr
                                    class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->user->username }}</td>
                                    <td class="text-center">{{ $item->book->title }}</td>
                                    <td class="text-center">{{ $item->rent_date }}</td>
                                    <td class="text-center">{{ $item->return_date }}</td>
                                    <td class="text-center">{{ $item->actual_return_date }}</td>
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
    {{-- card data --}}
@endsection
@section('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('stisla/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#myTable').DataTable({
                "order": []
            });
        });
    </script>
@endsection
