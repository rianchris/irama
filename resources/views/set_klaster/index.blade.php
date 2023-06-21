@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('setklaster.index') }}"><i class='bx bxs-category-alt me-1'></i> Data Klaster Badan Usaha</a>
            </li>
            <li class="nav-item ms-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-klaster">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Klaster
                </button>
            </li>
        </ul>
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
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="set_klaster">
                                <thead>
                                    <tr>
                                        <th>PIC </th>
                                        <th>Role </th>
                                        <th>KODE BU</th>
                                        <th>Nama BU</th>
                                        <th>Klaster </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($bu as $bu)
                                        <tr>
                                            <td>{{ $bu->myprofile->name }}</td>
                                            <td>{{ $bu->myprofile->role }}</td>
                                            <td>{{ $bu->sima_klpbu->kode_klpbu }}</td>
                                            <td>{{ $bu->sima_klpbu->nama_klpbu }}</td>
                                            <td>{{ $bu->klaster->nama_klaster }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item edit-klaster" data-bs-toggle="modal" data-bs-target="#edit-klaster" data-id="{{ $bu->id }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <form action="{{ route('setklaster.destroy', $bu) }}" method="post">
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
    </div>
    <!--/ Hoverable Table rows -->

    <!-- Modal tambah klaster -->
    @include('set_klaster.modal_tambah_klaster')
    <!--/ Modal tambah klaster -->

    <!-- Modal edit klaster -->
    @include('set_klaster.modal_edit_klaster')
    <!--/ Modal edit klaster -->

    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#set_klaster').DataTable();
                $('#edit-klaster').on('click', '.edit-klaster', function() {
                    var id_klaster = $(this).attr('data-id');

                    if (id_klaster) {

                        // AJAX request
                        var url = "{{ route('setklaster.edit', [':setklaster']) }}";
                        url = url.replace(':setklaster', id_klaster);

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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    @endpush

    @push('vendorjs')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    @endpush
@endsection
