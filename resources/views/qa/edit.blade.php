@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('qa.index') }}"><i class='bx bx-left-arrow-alt me-2'></i>Quality Assurance</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bx bx-bell me-1"></i> Notifications</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bx bx-link-alt me-1"></i> Connections</a>
                    </li> --}}
                </ul>
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
