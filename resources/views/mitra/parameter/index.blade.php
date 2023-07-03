@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-header">
                        {{-- ambil data pivot parameter --}}
                        @php
                            $tes = $pengguna->bu->param->where('id', request('param'))->isNotEmpty();
                            if ($tes) {
                                $pivot = $pengguna->bu->param->where('id', request('param'))->first()->pivot;
                                $buparams = $buparam;
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
                                @php
                                    $url = route('parameter.index') . '?dimensi=' . $p->dimensi_id . '&param=' . $p->id;
                                @endphp
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
                    <div class="card-body">

                        <form action="{{ route('parameter.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="bu_param_id" value="@if (isset($buparams->id)) {{ $buparams->id }} @endif">
                            <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->bu->id }}">
                            <input type="hidden" name="param_id" value="{{ request('param') }}">
                            <div class="row">
                                <div class="col-md-6 mt-3">
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
                                                </figcaption>


                                                @if (isset($pivot))
                                                    <span class="mt-3 badge rounded-pill bg-info">Skor: {{ $pivot->skorparam }}</span>
                                                @endif
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            {{-- {{ dd($pivot) }} --}}
                                            <div class="demo-inline-spacing d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="card-title ">Referensi File Pendukung :</h6>
                                                <button type="button" class="btn p-1 btn-outline-primary" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<i class='bx bx-bell bx-xs' ></i> <span>Input URL Referensi File Pendukung terhadap Isian Parameter. File dapat berupa PDF, Doc, Docx, Xls, Xlsx</span>">
                                                    <i class='bx bx-bell bx-xs'></i>
                                                </button>
                                            </div>
                                            <div class="mb-3 input-group">
                                                <span class="input-group-text" id="basic-addon14"><i class='bx bx-md bxs-file-pdf size-lg'></i></span>
                                                <input name="filepdf" type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon14" value="@if (isset($pivot)) {{ $pivot->filepdf }} @endif" />
                                            </div>
                                            <div class="mb-3 input-group">
                                                <span class="input-group-text" id="basic-addon14"><i class='bx bx-md bxs-file-doc'></i></span>
                                                <input name="filedocx" type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon14" value="@if (isset($pivot)) {{ $pivot->filedocx }} @endif" />
                                            </div>
                                            <div class="mb-3 input-group">
                                                <span class="input-group-text" id="basic-addon14"><i class='bx bx-md bxs-file'></i></span>
                                                <input name="filexlsx" type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon14" value="@if (isset($pivot)) {{ $pivot->filexlsx }} @endif" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check custom-option custom-option-basic mt-2">
                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'a' }}">
                                                    <input name="skor" class="form-check-input" type="radio" value="0" id="{{ $deskripsiskor->id . 'a' }}" @if (isset($pivot->skorparam)) @if ($pivot->skorparam == 0) checked @endif @endif />
                                                    <span class="custom-option-body">
                                                        <span class="custom-option-header">{{ $deskripsiskor->skor0 }} </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check custom-option custom-option-basic mt-2">
                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'b' }}">
                                                    <input name="skor" class="form-check-input" type="radio" value="1" id="{{ $deskripsiskor->id . 'b' }}" @if (isset($pivot->skorparam)) @if ($pivot->skorparam == 1) checked @endif @endif />
                                                    <span class="custom-option-body">
                                                        <span class="custom-option-header">{{ $deskripsiskor->skor1 }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check custom-option custom-option-basic mt-2">
                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'c' }}">
                                                    <input name="skor" class="form-check-input" type="radio" value="2" id="{{ $deskripsiskor->id . 'c' }}" @if (isset($pivot->skorparam)) @if ($pivot->skorparam == 2) checked @endif @endif />
                                                    <span class="custom-option-body">
                                                        <span class="custom-option-header">{{ $deskripsiskor->skor2 }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check custom-option custom-option-basic mt-2">
                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'd' }}">
                                                    <input name="skor" class="form-check-input" type="radio" value="3" id="{{ $deskripsiskor->id . 'd' }}" @if (isset($pivot->skorparam)) @if ($pivot->skorparam == 3) checked @endif @endif />
                                                    <span class="custom-option-body">
                                                        <span class="custom-option-header">{{ $deskripsiskor->skor3 }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check custom-option custom-option-basic mt-2">
                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'e' }}">
                                                    <input name="skor" class="form-check-input" type="radio" value="4" id="{{ $deskripsiskor->id . 'e' }}" @if (isset($pivot->skorparam)) @if ($pivot->skorparam == 4) checked @endif @endif />
                                                    <span class="custom-option-body">
                                                        <span class="custom-option-header">{{ $deskripsiskor->skor4 }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check custom-option custom-option-basic mt-2">
                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id . 'f' }}">
                                                    <input name="skor" class="form-check-input" type="radio" value="5" id="{{ $deskripsiskor->id . 'f' }}" @if (isset($pivot->skorparam)) @if ($pivot->skorparam == 5) checked @endif @endif />
                                                    <span class="custom-option-body">
                                                        <span class="custom-option-header">{{ $deskripsiskor->skor5 }}</span>
                                                    </span>
                                                </label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
