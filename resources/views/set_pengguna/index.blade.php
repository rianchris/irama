@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-row flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('setpengguna.index') }}"><i class="bx bx-user me-1"></i> Data Pengguna</a>
            </li>
            <li class="nav-item ms-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-pengguna">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Data
                </button>
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
                    <div class="card-datatable">
                        <table class="table table-responsive table-bordered table-hover" id="set_pengguna">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Kode BU</th>
                                    <th>Nama BU</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($pengguna as $pengguna)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengguna->user->username }}</td>
                                        <td>{{ $pengguna->name }}</td>
                                        <td>
                                            @if ($pengguna->bu)
                                                {{ $pengguna->bu->kode_klpbu_id }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pengguna->bu)
                                                {{ $pengguna->bu->sima_klpbu->nama_klpbu }}
                                            @endif
                                        </td>
                                        <td>{{ $pengguna->role }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td> <a target="blank" href="https://wa.me/62{{ $pengguna->phone }}">{{ '+62' . $pengguna->phone }}</a> </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form action="{{ route('setpengguna.destroy', $pengguna->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Modal tambah pengguna -->
    @include('set_pengguna.modal_tambah_pengguna')
    <!--/ Modal tambah pengguna -->

    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#set_pengguna').DataTable();
                $('#edit-pengguna').on('click', '.edit-pengguna', function() {
                    var id_pengguna = $(this).attr('data-id');

                    if (id_pengguna) {

                        // AJAX request
                        var url = "{{ route('setpengguna.edit', [':setpengguna']) }}";
                        url = url.replace(':setpengguna', id_pengguna);

                        // Empty modal data
                        // $('#rincianTabel tbody').empty();

                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(response) {

                                $('input #name').value(response.name);

                                // Display Modal
                                $('#rincianModal').modal('show');
                            }
                        });
                    }
                });

            });
        </script>
    @endpush

    @push('vendorcss')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    @endpush

    @push('pagejs')
        {{-- <script src="{{ asset('assets/js/app-user-list.js') }}"></script> --}}
    @endpush
@endsection
