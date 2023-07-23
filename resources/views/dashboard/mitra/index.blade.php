@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- baris 1 --}}
        <div class="row g-3">
            <div class="col-lg-8 ">
                @include('dashboard.mitra.welcome')
            </div>
            <div class="col-lg-4 ">
                @include('dashboard.mitra.timeline')
            </div>

            <div class="col-lg-12">
                @include('dashboard.mitra.skor_full')
            </div>
            {{-- 
            <div class="col-lg-8">

            </div>
            <div class="col-lg-4">
                @include('dashboard.mitra.skor_akhir')
            </div> --}}
        </div>

        {{-- baris 2 --}}
        <div class="mt-2 row g-2">
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
        <script src="{{ asset('assets/js/dashboards.js') }}"></script>
    @endpush
@endsection
