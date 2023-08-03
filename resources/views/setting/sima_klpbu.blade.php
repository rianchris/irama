@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <ul class="nav nav-pills flex-column flex-md-row m-3">
                <li class="nav-item">
                    <a class="m-1 btn btn-outline-primary" href="{{ route('set_simaklpbu') }}"><i class='bx bxs-category-alt me-1'></i> Data Sima KLPBU</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-datatable">
                        <table class="table table-responsive table-bordered table-hover" id="sima_klpbu">
                            <thead>
                                <tr>
                                    <th>Kode KLPBU</th>
                                    <th>Nama KLPBU </th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($sima_klpbu as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->nama_klpbu }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('vendorcss')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    @endpush
    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#sima_klpbu').DataTable();
            });
        </script>
    @endpush
@endsection
