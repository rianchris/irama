@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Settings /</span> Klaster Badan Usaha</h4>
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('setklaster.index') }}"><i class="bx bx-user me-1"></i> Data klaster</a>
            </li>
            <li class="nav-item ms-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-klaster">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Data
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Klaster</th>
                                        <th>Created At</th>
                                        <th>Update At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($klaster as $klaster)
                                        <tr>
                                            <td>{{ $klaster->id }}</td>
                                            <td>{{ $klaster->nama_klaster }}</td>
                                            <td>{{ $klaster->created_at }}</td>
                                            <td>{{ $klaster->updated_at }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item edit-klaster" data-bs-toggle="modal" data-bs-target="#edit-klaster" data-id="{{ $klaster->id }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <form action="{{ route('setklaster.destroy', $klaster) }}" method="post">
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
    <div class="modal fade" id="tambah-klaster" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('setklaster.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Tambah Data klaster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Klaster</label>
                            <input type="text" name="klaster" id="name" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!--/ Modal tambah klaster -->

    <!-- Modal edit klaster -->
    <div class="modal fade" id="edit-klaster" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('setklaster.store') }}" method="post">
                @method('put')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Edit Data klaster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="klaster" class="form-label">Nama Klaster </label>
                            <input type="text" name="klaster" id="klaster" class="form-control" placeholder="Enter Klaster" value="123" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!--/ Modal edit klaster -->

    @push('lokaljs')
        <script>
            $(document).ready(function() {
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
@endsection
