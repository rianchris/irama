@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light"> Settings /</span> Pengguna Aplikasi</h4>
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
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
        @include('set_pengguna.statistic')
        <!-- Users List Table -->
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
            <div class="card-header border-bottom">
                {{-- <h5 class="card-title">Data Pengguna</h5> --}}
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Organization</th>
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
                                <td>{{ $pengguna->organization }}</td>
                                <td>{{ $pengguna->role }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->phone }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item edit-pengguna" data-bs-toggle="modal" data-bs-target="#edit-pengguna" data-id="{{ $pengguna->id }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('setpengguna.destroy', $pengguna) }}" method="post">
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

            <div class="card-footer border-top">
                {{--  --}}
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Modal tambah pengguna -->
    @include('set_pengguna.modal_tambah_pengguna')
    <!--/ Modal tambah pengguna -->

    <!-- Modal edit pengguna -->
    @include('set_pengguna.modal_edit_pengguna')
    <!--/ Modal edit pengguna -->

    @push('inlinejs')
        <script>
            $(document).ready(function() {
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
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    @endpush

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    @endpush

    @push('pagejs')
        <script src="{{ asset('assets/js/app-user-list.js') }}"></script>
    @endpush
@endsection
