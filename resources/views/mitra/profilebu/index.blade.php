@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    @if (session()->has('success'))
                        <div class="alert alert-primary alert-dismissible mx-4 mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h5 class="card-header">Logo Badan Usaha</h5>
                    <!-- Account -->
                    <div class="card-body">
                        {{-- {{ dd($bu->sima_klpbu->nama_klpbu) }} --}}
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if (isset($bu->avatar))
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @else
                                <div class="avatar avatar-md me-2">
                                    <span class="avatar-initial rounded-circle bg-danger">
                                        @if (isset($bu->sima_klpbu))
                                            {{ Str::limit(Str::after($bu->sima_klpbu->nama_klpbu, 'PT '), 2, '') }}
                                        @endif
                                    </span>
                                </div>
                            @endif

                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-sm btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        @if (isset($bu->sima_klpbu))
                            <form id="formAccountSettings" method="POST" action="{{ route('profilebu.update', $bu->id) }}">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="nama_badanusaha" class="form-label">Nama Badan Usaha</label>
                                        <input class="form-control" type="text" id="nama_badanusaha" value="{{ $bu->sima_klpbu->nama_klpbu }}" disabled />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Klaster</label>
                                        <select id="language" class="select2 form-select" disabled>
                                            <option>Pilih Klaster</option>
                                            <option selected>
                                                {{ $bu->klaster->nama_klaster }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="website">Website</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">www.</span>
                                            <input type="text" id="website" name="website" class="form-control" placeholder="yourcompany.com" value="{{ $bu->website }}" />
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" id="email" name="email" value="{{ $bu->email }}" placeholder="humas@yourcompany.com" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="telepon">Telepon</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">ID (+62)</span>
                                            <input type="text" id="telepon" name="telepon" class="form-control" placeholder="8123456789" value="{{ $bu->telepon }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="alamat" class="form-label">Alamat Kantor Pusat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $bu->alamat }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="kodepos" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control" id="kodepos" name="kodepos" maxlength="6" value="{{ $bu->kodepos }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="skorsebelumnya" class="form-label">Skor Sebelumnya</label>
                                        <input type="number" class="form-control" id="kodepos" name="skorsebelumnya" maxlength="6" value="{{ $bu->skorsebelumnya }}" />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
@endsection
