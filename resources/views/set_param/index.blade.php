@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('setparam.index') }}"><i class="bx bx-list-ul me-1"></i> Data Parameter</a>
            </li>
        </ul>

        <!-- Statistic users -->
        {{-- @include('set_pengguna.statistic') --}}
        <!-- Users List Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-primary my-3 mx-3 alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('deleted'))
                        <div class="alert alert-danger my-3 mx-3 alert-dismissible" role="alert">
                            {{ session('deleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive table-nowrap">
                            <table class="table table-hover" id="set_param">
                                <thead>
                                    <tr>
                                        <th>PK</th>
                                        <th>FK</th>
                                        <th>Tujuan</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <div class="row">
                                        @foreach ($param as $param)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $param->dimensi_id }}</td>
                                                <td>{{ $param->tujuan }}</td>
                                                <td>{{ $param->deskripsi }}</td>
                                                <td>
                                                    <a class="btn text-white btn-sm btn-warning editparam" href="{{ route('setparam.edit', $param->id) }}">
                                                        <i class="bx bxs-pencil"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </div>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer border-top">
                            {{--  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    @push('vendorcss')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    @endpush

    @push('vendorjs')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    @endpush

    @push('pagejs')
        {{-- <script src="{{ asset('assets/js/app-user-list.js') }}"></script> --}}
    @endpush
    <!-- Ineline JS-->.
    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#set_param').DataTable();
            })
        </script>
    @endpush
@endsection
