@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-header">
                        {{-- ambil data pivot parameter --}}
                        @php
                            $role = auth()->user()->myprofile->role;
                            
                            if ($role == 'mitra') {
                                $tes = $pengguna->buMitra->param->where('id', request('param'))->isNotEmpty();
                                if ($tes) {
                                    $pivot = $pengguna->buMitra->param->where('id', request('param'))->first()->pivot;
                                    $buparams = $buparam;
                                }
                            } elseif ($role == 'warga') {
                                $tes = $pengguna->buWarga->param->where('id', request('param'))->isNotEmpty();
                                if ($tes) {
                                    $pivot = $pengguna->buWarga->param->where('id', request('param'))->first()->pivot;
                                    $buparams = $buparam;
                                }
                            }
                            $deskripsiskor = $param
                                ->where('id', request('param'))
                                ->first()
                                ->deskripsiskor->first();
                            // dd($tes);
                        @endphp
                        @if (session()->has('success'))
                            <div class="alert alert-primary alert-dismissible " role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h4 class="card-title">
                            Dimensi : {{ $param->first()->dimensi->deskripsi }}
                        </h4>
                        <div class="demo-vertical-spacing ">
                            @foreach ($param as $p)
                                @can('mitra')
                                    @php   $url = route('parameter.index') . '?dimensi=' . $p->dimensi_id . '&param=' . $p->id; @endphp
                                @endcan
                                @can('warga')
                                    @php
                                        $url = route('qa.index') . '?dimensi=' . $p->dimensi_id . '&param=' . $p->id;
                                    @endphp
                                @endcan

                                <a href="{{ $url }}" type="button" class=" text-dark btn border-2 px-3 py-1 me-1
                                @php if(Request::fullUrlIs($url) ){
                                    echo 'text-white btn-primary';
                                }
                                else {
                                    echo 'text-secondary btn-outline-secondary';
                                } @endphp">
                                    {{ $p->id }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <section class="mitra">
                            @can('warga')
                                <h5 class="card-title text-center text-primary "><i class='bx bx-user-pin bx-sm me-2'></i></i>Data Self Assessment </h5>
                                <hr class="mx-auto p-0 m-0" width="10%">
                            @endcan
                            <form action="{{ route('parameter.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="bu_param_id" value="@if (isset($buparams->id)) {{ $buparams->id }} @endif">
                                @if ($role == 'mitra')
                                    <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->buMitra->id }}">
                                @endif
                                <input type="hidden" name="param_id" value="{{ request('param') }}">
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <figure class="text-center mt-2">
                                                    <blockquote class="blockquote">
                                                        <h3 class="card-title text-primary mt-1">
                                                            {{ $param->where('id', request('param'))->first()->deskripsi }}
                                                        </h3>
                                                    </blockquote>
                                                    <figcaption class="blockquote-footer">
                                                        <h6 class="card-title mb-1 ">{{ $param->where('id', request('param'))->first()->tujuan }}</h6>
                                                    </figcaption><span class="mt-3 badge rounded-pill bg-info">Skor:
                                                        @if (isset($pivot))
                                                            {{ $pivot->skor_mitra }}
                                                        @endif
                                                    </span>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div class="demo-inline-spacing d-flex justify-content-between align-items-center mb-3">
                                                    <h6 class="card-title ">Url File Pendukung :</h6>
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <a href="@if (isset($pivot)) {{ $pivot->filepdf }} @endif" target="blank">
                                                        <span class="input-group-text" id="basic-addon14"><i class='bx bx-md bxs-file-pdf size-lg'></i></span>
                                                    </a>
                                                    <input name="filepdf" type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon14" value="@if (isset($pivot)) {{ $pivot->filepdf }} @endif" @can('warga')disabled @endcan />
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <a href="@if (isset($pivot)) {{ $pivot->filedocx }} @endif" target="blank">
                                                        <span class="input-group-text" id="basic-addon14"><i class='bx bx-md bxs-file-doc'></i></span>
                                                    </a>
                                                    <input name="filedocx" type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon14" value="@if (isset($pivot)) {{ $pivot->filedocx }} @endif" @can('warga')disabled @endcan />
                                                </div>
                                                <div class="mb-3 input-group">
                                                    <a href="@if (isset($pivot)) {{ $pivot->filexlsx }} @endif" target="blank">
                                                        <span class="input-group-text" id="basic-addon14"><i class='bx bx-md bxs-file'></i></span>
                                                    </a>
                                                    <input name="filexlsx" type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon14" value="@if (isset($pivot)) {{ $pivot->filexlsx }} @endif" @can('warga')disabled @endcan />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-check custom-option custom-option-basic mt-2">
                                                    <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'a' }}">
                                                        <input name="skor" class="form-check-input" type="radio" value="0" id="{{ $deskripsiskor->id . 'a' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 0) checked @endif @endif @can('warga') disabled @endcan/>
                                                        <span class="custom-option-body">
                                                            <span class="custom-option-header">{{ $deskripsiskor->skor0 }} </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check custom-option custom-option-basic mt-2">
                                                    <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'b' }}">
                                                        <input name="skor" class="form-check-input" type="radio" value="1" id="{{ $deskripsiskor->id . 'b' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 1) checked @endif @endif @can('warga') disabled @endcan/>
                                                        <span class="custom-option-body">
                                                            <span class="custom-option-header">{{ $deskripsiskor->skor1 }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check custom-option custom-option-basic mt-2">
                                                    <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'c' }}">
                                                        <input name="skor" class="form-check-input" type="radio" value="2" id="{{ $deskripsiskor->id . 'c' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 2) checked @endif @endif @can('warga') disabled @endcan/>
                                                        <span class="custom-option-body">
                                                            <span class="custom-option-header">{{ $deskripsiskor->skor2 }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check custom-option custom-option-basic mt-2">
                                                    <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'd' }}">
                                                        <input name="skor" class="form-check-input" type="radio" value="3" id="{{ $deskripsiskor->id . 'd' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 3) checked @endif @endif @can('warga') disabled @endcan/>
                                                        <span class="custom-option-body">
                                                            <span class="custom-option-header">{{ $deskripsiskor->skor3 }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check custom-option custom-option-basic mt-2">
                                                    <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'e' }}">
                                                        <input name="skor" class="form-check-input" type="radio" value="4" id="{{ $deskripsiskor->id . 'e' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 4) checked @endif @endif @can('warga') disabled @endcan/>
                                                        <span class="custom-option-body">
                                                            <span class="custom-option-header">{{ $deskripsiskor->skor4 }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check custom-option custom-option-basic mt-2">
                                                    <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'f' }}">
                                                        <input name="skor" class="form-check-input" type="radio" value="5" id="{{ $deskripsiskor->id . 'f' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 5) checked @endif @endif @can('warga') disabled @endcan/>
                                                        <span class="custom-option-body">
                                                            <span class="custom-option-header">{{ $deskripsiskor->skor5 }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @can('mitra')
                                    <div class="row mt-5">
                                        <div class="col d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                @endcan
                            </form>
                        </section>
                    </div>
                    @can('warga')
                        <hr class="m-0">
                        <div class="card-body">
                            <section class="warga">
                                <h5 class="card-title text-center text-primary "><i class='bx bx-check-shield bx-sm me-2'></i>Quality Assurance</h5>
                                <hr class="mx-auto p-0 m-0" width="10%">
                                <form action="{{ route('qa.update', isset($buparams->id) ? $buparams->id : '') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="bu_param_id" value="@if (isset($buparams->id)) {{ $buparams->id }} @endif">
                                    @can('mitra')
                                        <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->buMitra->id }}">
                                    @endcan
                                    @can('warga')
                                        <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->buWarga->id }}">
                                    @endcan
                                    <input type="hidden" name="param_id" value="{{ request('param') }}">
                                    <div class="row mt-5">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row ">
                                                        <label class="col-sm-3 col-form-label" for="hasilReviu">Hasil Reviu</label>
                                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                                            <textarea id="hasilReviu" class="form-control" name="hasilreviu" rows="3">{{ isset($pivot->hasilreviu) ? $pivot->hasilreviu : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check custom-option custom-option-basic border-0">
                                                <div class="card ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check custom-option custom-option-icon">
                                                                    <label class="form-check-label custom-option-content" for="skorwarga">
                                                                        <span class="custom-option-body">
                                                                            <span class="custom-option-title">0</span>
                                                                        </span>
                                                                        <input name="skor_warga" class="form-check-input" type="radio" value="0" id="skorwarga" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 0) checked @endif @endif />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check custom-option custom-option-icon">
                                                                    <label class="form-check-label custom-option-content" for="skorwarga1">
                                                                        <span class="custom-option-body">
                                                                            <span class="custom-option-title">1</span>
                                                                        </span>
                                                                        <input name="skor_warga" class="form-check-input" type="radio" value="1" id="skorwarga1" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 1) checked @endif @endif />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check custom-option custom-option-icon">
                                                                    <label class="form-check-label custom-option-content" for="skorwarga2">
                                                                        <span class="custom-option-body">
                                                                            <span class="custom-option-title">2</span>
                                                                        </span>
                                                                        <input name="skor_warga" class="form-check-input" type="radio" value="2" id="skorwarga2" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 2) checked @endif @endif />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check custom-option custom-option-icon">
                                                                    <label class="form-check-label custom-option-content" for="skorwarga3">
                                                                        <span class="custom-option-body">
                                                                            <span class="custom-option-title">3</span>
                                                                        </span>
                                                                        <input name="skor_warga" class="form-check-input" type="radio" value="3" id="skorwarga3" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 3) checked @endif @endif />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check custom-option custom-option-icon">
                                                                    <label class="form-check-label custom-option-content" for="skorwarga4">
                                                                        <span class="custom-option-body">
                                                                            <span class="custom-option-title">4</span>
                                                                        </span>
                                                                        <input name="skor_warga" class="form-check-input" type="radio" value="4" id="skorwarga4" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 4) checked @endif @endif />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check custom-option custom-option-icon">
                                                                    <label class="form-check-label custom-option-content" for="skorwarga5">
                                                                        <span class="custom-option-body">
                                                                            <span class="custom-option-title">5</span>
                                                                        </span>
                                                                        <input name="skor_warga" class="form-check-input" type="radio" value="5" id="skorwarga5" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 5) checked @endif @endif />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @push('vendorcss')
    @endpush

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/autosize/autosize.js') }}"></script>
    @endpush

    @push('pagejs')
        {{-- <script src="{{ asset('assets/js/app-user-list.js') }}"></script> --}}
    @endpush
    @push('inlinejs')
        <script>
            const textarea = document.querySelectorAll('textarea');
            if (textarea) {
                autosize(textarea);
            }
        </script>
    @endpush
@endsection
