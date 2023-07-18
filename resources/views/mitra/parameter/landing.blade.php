@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y ">
        <div class="card overflow-hidden  py-3">
            <!-- Popular Articles -->
            <div class="help-center-popular-articles py-4">
                <div class="container-xl">
                    <h4 class="text-center">Dimensi : {{ $dimensi->deskripsi }}</h4>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="row mb-2 d-flex justify-content-center">
                                <div class="col-md-8 mb-md-0 mb-2 ">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center ">
                                            @if (request('dimensi') == 1)
                                                <img style="filter: grayscale(100); max-height:300px;" class="mb-3  rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen1.JPG') }}" />
                                                <figure class="text-center mt-2">
                                                    <blockquote class="blockquote">
                                                        <p class="mb-0">Mengukur seberapa komprehensif program peningkatan skill manajemen risiko, kekuatan budaya manajemen risiko, serta relavansi RMA dengan praktik manajemen risiko secara keseluruhan</p>
                                                    </blockquote>
                                                    <figcaption class="blockquote-footer">
                                                        <h6> Total Parameter : <cite>{{ $total = $dimensi->param->count() }}</cite></h6>
                                                    </figcaption>
                                                </figure>
                                            @elseif (request('dimensi') == 2)
                                                <img style="filter: grayscale(100); max-height:300px;" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen2.jpg') }}" />
                                                <figure class="text-center mt-2">
                                                    <blockquote class="blockquote">
                                                        <p class="mb-0">
                                                            Mengukur kelengkapan organ, fungsi serta tugas dan tanggung jawab beserta kapasitas dari pengelola risiko sesuai dengan karakter perusahaan, serta tata kelola penerapan manajemen risiko
                                                        </p>
                                                    </blockquote>
                                                    <figcaption class="blockquote-footer">
                                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                                    </figcaption>
                                                </figure>
                                            @elseif (request('dimensi') == 3)
                                                <img style="filter: grayscale(100); max-height:300px;" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen3.JPG') }}" />
                                                <figure class="text-center mt-2">
                                                    <blockquote class="blockquote">
                                                        <p class="mb-0">
                                                            Mengukur efektifitas praktik manajemen risiko, kerangka kerja ERM dan kepatuhan serta relevansi ERM dengan perencanaan strategis
                                                        </p>
                                                    </blockquote>
                                                    <figcaption class="blockquote-footer">
                                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                                    </figcaption>
                                                </figure>
                                            @elseif (request('dimensi') == 4)
                                                <img style="filter: grayscale(100); max-height:300px;" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen4.jpeg') }}" />
                                                <figure class="text-center mt-2">
                                                    <blockquote class="blockquote">
                                                        <p class="mb-0">
                                                            Mengukur tingkat efektifitas dan formalisasi prosedur penerapan dan kontrol manajemen risiko
                                                        </p>
                                                    </blockquote>
                                                    <figcaption class="blockquote-footer">
                                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                                    </figcaption>
                                                </figure>
                                            @elseif (request('dimensi') == 5)
                                                <img style="filter: grayscale(100); max-height:300px;" class="mb-3 rounded-1 img-fluid" src="{{ asset('assets/img/landing_dimensi/dimen5.jpg') }}" />
                                                <figure class="text-center mt-2">
                                                    <blockquote class="blockquote">
                                                        <p class="mb-0">
                                                            Mengukur kesiapan dan ketersediaan data, teknologi, dan model dalam penerapan manajemen risiko
                                                        </p>
                                                    </blockquote>
                                                    <figcaption class="blockquote-footer">
                                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                                    </figcaption>
                                                </figure>
                                            @endif
                                            @if (auth()->user()->myprofile->role == 'mitra')
                                                <a class="mt-2 btn btn-label-primary" href="{{ route('parameter.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
                                            @elseif (auth()->user()->myprofile->role == 'warga')
                                                <a class="mt-2 btn btn-label-primary" href="{{ route('qa.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
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
