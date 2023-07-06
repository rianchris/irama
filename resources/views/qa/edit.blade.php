@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('qa.index') }}"><i class='bx bx-left-arrow-alt me-2'></i>Quality Assurance</a>
                    </li>
                </ul>


                <div class="card">
                    <h5 class="card-header"> {{ $bu->sima_klpbu->nama_klpbu }} </h5>
                    {{-- {{ dd($bu->param) }} --}}
                    {{-- <div class="card-body"> --}}
                    <div class="card-datatable ">
                        <table class="table table-responsive table-bordered" id="qa">
                            <thead>
                                <tr class="align-middle text-center">
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Dimensi</th>
                                    <th rowspan="2">Deskripsi</th>
                                    <th rowspan="2">Skor</th>
                                    <th colspan="3">File Pendukung: </th>
                                </tr>
                                <tr>
                                    <th>Pdf</th>
                                    <th>Docx</th>
                                    <th class="border-0">Xlsx</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($param as $param)
                                    {{-- {{ dd($param->dimensi->deskripsi) }} --}}
                                    <tr>
                                        <td>{{ $param->id }}</td>
                                        <td>{{ $param->dimensi->deskripsi }}</td>
                                        <td>{{ $param->deskripsi }}</td>
                                        <td>
                                            @if ($param->bu->where('id', $bu->id)->isNotEmpty())
                                                {{ $param->bu->where('id', $bu->id)->first()->pivot->skorparam }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($param->bu->where('id', $bu->id)->isNotEmpty())
                                                {{ $param->bu->where('id', $bu->id)->first()->pivot->filepdf }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($param->bu->where('id', $bu->id)->isNotEmpty())
                                                {{ $param->bu->where('id', $bu->id)->first()->pivot->filedocx }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($param->bu->where('id', $bu->id)->isNotEmpty())
                                                {{ $param->bu->where('id', $bu->id)->first()->pivot->filexlsx }}
                                            @endif
                                        </td>

                                        {{-- <td>{{ $param->dimensi->deskripsi }}</td>
                                            <td>{{ $param->deskripsi }}</td>
                                            <td>{{ $param->pivot->skorparam }}</td>
                                            <td>{{ $param->pivot->filepdf }}</td>
                                            <td>{{ $param->pivot->filedocx }}</td>
                                            <td>{{ $param->pivot->filexlsx }}</td> --}}
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

    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#qa').DataTable();
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
@endsection
