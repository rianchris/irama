@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('set_simaklpbu') }}"><i class='bx bxs-category-alt me-1'></i> Data Sima KLPBU</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="sima_klpbu">
                                <thead>
                                    <tr>
                                        <th>Kode KLPBU</th>
                                        <th>Nama KLPBU </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($sima_klpbu as $data)
                                        <tr>
                                            <td>{{ $data->kode_klpbu }}</td>
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
    </div>
    @push('vendorcss')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    @endpush
    @push('vendorjs')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    @endpush
    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#sima_klpbu').DataTable();
            });
        </script>
    @endpush
@endsection
