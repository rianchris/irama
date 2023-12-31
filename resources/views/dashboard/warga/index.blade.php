@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- baris 1 --}}
        <div class="row g-4">
            <div class="col-lg-8 col-md-8">
                @include('dashboard.warga.welcome')
            </div>
            <div class="col-lg-4 col-md-4">
                @include('dashboard.warga.skor_akhir')
            </div>

            <div class="col-lg-12">
                @include('dashboard.warga.skor_full')
            </div>
        </div>

        {{-- baris 2 --}}
        <div class="row">
            <div class="col-lg-4 col-md-6">

            </div>
            <div class="col-lg-4 col-md-6"></div>
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
        <script src="{{ asset('assets/js/dashboards-warga.js') }}"></script>
    @endpush
@endsection
