@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-datatable">
                        <table class="table table-hover table-responsive table-bordered" id="rincian">
                            <thead>
                                <tr>
                                    <th>Kode BU</th>
                                    <th>Nama BU</th>
                                    <th>Klaster</th>
                                    <th>Pic</th>
                                    <th>QA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bu as $bu)
                                    <tr>
                                        <td>{{ $bu->kode_klpbu_id }}</td>
                                        <td>{{ $bu->sima_klpbu->nama_klpbu }}</td>
                                        <td>{{ $bu->klaster->nama_klaster }}</td>
                                        <td>{{ $bu->myprofileMitra->user->username }}</td>
                                        <td>{{ $bu->myprofileWarga->user->username }}</td>
                                        <td>
                                            <a class="btn text-white btn-sm btn-info rincianskor" data-bs-toggle="modal" data-bs-target="#rincianbu" data-id-bu="{{ $bu->id }}">
                                                Rincian
                                            </a>
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

    <div class="modal fade" id="rincianbu" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rincian Skor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-datatable">
                        <table class="w-100 table table-bordered" id="rincianTabel">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FK</th>
                                    <th>Skor Mitra</th>
                                    <th>Skor Warga</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Extra Large Modal-->



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
    <!-- Ineline JS-->.
    @push('inlinejs')
        <script>
            $(document).ready(function() {
                //data tabel
                $('#rincian').DataTable();

                //modal rincian
                $('#rincian').on('click', '.rincianskor', function() {
                    var id_bu = $(this).attr('data-id-bu');
                    if (id_bu) {
                        var url = "{{ route('dashboard.show', [':id']) }}";
                        url = url.replace(':id', id_bu);
                        console.log(url);

                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(response) {
                                $('#rincianbu tbody').html(response.html);
                                console.log(response);
                            }
                        })
                    }
                })

            })
        </script>
    @endpush
@endsection
