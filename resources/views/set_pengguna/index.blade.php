@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <ul class="nav nav-pills flex-row flex-md-row p-3">
                <li class="nav-item">
                    <a class="m-1 btn btn-outline-primary" href="{{ route('setpengguna.index') }}"><i class="bx bx-user me-1"></i> Data Pengguna</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-pengguna">
                        <span class="tf-icons bx bx-plus"></span>&nbsp; PIC
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-wargaqa">
                        <span class="tf-icons bx bx-plus"></span>&nbsp; Warga QA
                    </button>
                </li>
            </ul>
        </div>

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
                                    <th>Kode BU</th>
                                    <th>Nama BU</th>
                                    <th>Klaster</th>
                                    <th>PIC (Mitra)</th>
                                    <th>Kontak PIC</th>
                                    <th>Warga QA</th>
                                    @can('superadmin')
                                        <th>Actions</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($bu as $bu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($bu->sima_klpbu)
                                                {{ $bu->sima_klpbu->kode_klpbu }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bu->sima_klpbu)
                                                {{ $bu->sima_klpbu->nama_klpbu }}
                                            @endif
                                        </td>
                                        <td>{{ $bu->klaster->nama_klaster }}</td>
                                        <td>
                                            @if ($bu->myprofileMitra)
                                                {{ $bu->myprofileMitra->user->username }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bu->myprofileMitra)
                                                {{ $bu->myprofileMitra->phone }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bu->myprofileWarga)
                                                {{ $bu->myprofileWarga->user->username }}
                                            @endif
                                        </td>
                                        @can('superadmin')
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form action="{{ route('setpengguna.destroy', $bu->id) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @endcan
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
    <!-- Modal tambah Warga qa -->
    @include('set_pengguna.modal_tambah_wargaqa')
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
