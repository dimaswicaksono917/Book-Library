@extends('layouts.backend.main')
@section('title', 'User')
@section('page-title', 'User')

@section('css')
    <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">User</div>
    <div class="breadcrumb-item active">Index </div>
@endsection
@section('content')
    {{-- card data --}}
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

                <a href="{{ route('user.inactive') }}" class="btn btn-orange float-right mb-4"><i
                        class="fa fa-plus-info"></i>See inactive user</a>

                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>username</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">
                                        @if ($item->phone)
                                            {{ $item->phone }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->status }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-circle btn-info" href="{{ route('user.view', $item->id) }}"
                                            data-toggle="tooltip" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
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
        $(function() {
            $('#myTable').DataTable({
                "order": []
            });
        });
    </script>
@endsection
