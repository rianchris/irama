@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- baris 1 --}}
        <div class="row g-4">
            @if (session()->has('checkdata'))
                <div class="col-12 py-0 my-0">
                    <div class="alert alert-danger d-flex justify-content-between mt-4" role="alert">
                        <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i class="bx bx-command fs-6"></i></span>
                        <div class="d-flex flex-row ps-1">
                            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1"> {{ session('checkdata') }}
                            </h6>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="col-lg-8 col-md-7">
                @include('dashboard.mitra.welcome')
            </div>
            <div class="col-lg-4 col-md-5">
                @include('dashboard.mitra.skor_akhir')
            </div>

            <div class="col-lg-12">
                @include('dashboard.mitra.skor_full')
            </div>

        </div>

        {{-- baris 2 --}}
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
            </div>
            <div class="col-lg-4 col-md-6">
            </div>
        </div>
    </div>



    <!-- / Content -->
    @push('vendorcss')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    @endpush
    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    @endpush
    @push('pagejs')
        <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/dashboards-crm.js') }}"></script> --}}
        <script src="{{ asset('assets/js/dashboards-mitra.js') }}"></script>
    @endpush
@endsection
