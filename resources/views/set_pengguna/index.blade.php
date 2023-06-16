@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Settings /</span> Pengguna Aplikasi</h4>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

    <!-- Modal tambah pengguna -->
    <div class="modal fade" id="tambah-pengguna" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('setpengguna.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Tambah Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="username" class="form-label">Username (*) </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" />
                        </div>
                        <div class="col mb-3">
                            <label for="password" class="form-label">Password (*)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="organization" class="form-label">Organization</label>
                            <input type="text" name="organization" id="organization" class="form-control" placeholder="Enter Organization" />
                        </div>
                        <div class="col mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
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
    <!--/ Modal tambah pengguna -->

    <!-- Modal edit pengguna -->
    <div class="modal fade" id="edit-pengguna" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('setpengguna.store') }}" method="post">
                @method('put')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Edit Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="username" class="form-label">Username (*) </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" value="123" />
                        </div>
                        <div class="col mb-3">
                            <label for="password" class="form-label">Password (*)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="organization" class="form-label">Organization</label>
                            <input type="text" name="organization" id="organization" class="form-control" placeholder="Enter Organization" />
                        </div>
                        <div class="col mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
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
    <!--/ Modal edit pengguna -->

    @push('lokaljs')
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
@endsection
