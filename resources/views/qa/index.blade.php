@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <ul class="nav nav-pills flex-column flex-md-row p-3">
                        <li class="nav-item">
                            <a class="m-1 btn btn-outline-primary" href="javascript:void(0);"><i class='bx bxs-category me-2'></i> Quality Assurance</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-datatable">
                        <table class="table table-responsive table-bordered" id="qa">
                            <thead>
                                <tr>
                                    <th>Kode BU</th>
                                    <th>Klaster</th>
                                    <th>Badan Usaha</th>
                                    <th>PIC</th>
                                    <th>Warga</th>
                                    <th>Progres</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bu as $bu)
                                    @if ($bu->sima_klpbu)
                                        <tr>
                                            <td>{{ $bu->sima_klpbu->kode_klpbu }}</td>
                                            <td>{{ $bu->klaster->nama_klaster }}</td>
                                            <td>{{ $bu->sima_klpbu->nama_klpbu }}</td>
                                            <td>{{ $bu->myprofileMitra->user->username }}</td>
                                            <td>{{ $bu->myprofileWarga->user->username }}</td>
                                            <td>
                                                {{ $bu->param->count() . '/100' }}
                                            </td>
                                            <td>
                                                <button id="rincian" type="button" class="mb-1 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#rincianparam" data-id="{{ $bu->id }}">
                                                    <i class='bx bx-show-alt'></i>
                                                </button>
                                                @if ($bu->myprofile_warga_id == auth()->user()->myprofile->id)
                                                    <a href="{{ route('qa.edit', $bu->id) }}" class="mb-1 btn btn-sm btn-warning">
                                                        <i class='bx bx-edit'></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rincianparam" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="namabu"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Param</th>
                                    <th>Skor</th>
                                    <th>File Pendukung</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
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
                $('#qa').DataTable();

                $('#qa').on('click', '#rincian', function() {
                    var idBu = $(this).attr("data-id");

                    if (idBu) {
                        var url = "{{ route('qa.show', [':qa']) }}";
                        url = url.replace(':qa', idBu);

                        $('#rincianparam modal-content').empty();

                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(response) {
                                $('h5#namabu').html(response.bu_details.sima_klpbu.nama_klpbu);
                                $.each(response, function(key, value) {
                                    var skorparam = response.skorparam;
                                    console.log(skorparam);
                                    var row = '<tr>' +
                                        '<td>' + key + '</td>' +
                                        '<td>' + skorparam + '</td>' +
                                        '</tr>';
                                    $('#rincianparam tbody').html(row);
                                });


                                $('#rincianparam').modal('show');
                            }
                        })

                    }
                })
            })
        </script>
    @endpush
@endsection
