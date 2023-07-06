@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y ">
        <div class="card overflow-hidden ">
            <!-- Popular Articles -->
            <div class="help-center-popular-articles py-4">
                <div class="container-xl">
                    <h4 class="text-center">Dimensi : {{ $dimensi->deskripsi }}</h4>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="row mb-2 d-flex justify-content-center">
                                <div class="col-md-8 mb-md-0 mb-2 ">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center">
                                            @if (request('dimensi') == 1)
                                                <img style="filter: grayscale(100)" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen1.jpg') }}" height="450" alt="Help center articles" />
                                                <h5>Total Parameter : {{ $total = $dimensi->param->count() }}</h5>
                                                <p>
                                                </p>
                                            @elseif (request('dimensi') == 2)
                                                <img style="filter: grayscale(100)" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen2.jpg') }}" height="450" alt="Help center articles" />
                                                <h5>Total Parameter : {{ $dimensi->param->count() }}</h5>
                                                <p>Whether you're new or you're a power user</p>
                                            @elseif (request('dimensi') == 3)
                                                <img style="filter: grayscale(100)" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen3.jpg') }}" height="450" alt="Help center articles" />
                                                <h5>Total Parameter : {{ $dimensi->param->count() }}</h5>
                                                <p>Whether you're new or you're a power user</p>
                                            @elseif (request('dimensi') == 4)
                                                <img style="filter: grayscale(100)" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen4.jpeg') }}" height="450" alt="Help center articles" />
                                                <h5>Total Parameter : {{ $dimensi->param->count() }}</h5>
                                                <p>Whether you're new or you're a power user</p>
                                            @elseif (request('dimensi') == 5)
                                                <img style="filter: grayscale(100)" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen5.jpg') }}" height="450" alt="Help center articles" />
                                                <h5>Total Parameter : {{ $dimensi->param->count() }}</h5>
                                                <p>Whether you're new or you're a power user</p>
                                            @endif
                                            @if (auth()->user()->myprofile->role == 'mitra')
                                                <a class="btn btn-label-primary" href="{{ route('parameter.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
                                            @elseif (auth()->user()->myprofile->role == 'warga')
                                                <a class="btn btn-label-primary" href="{{ route('qa.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Popular Articles -->
        </div>
    </div>
@endsection
