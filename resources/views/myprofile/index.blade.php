@extends('layouts.main')
@section('content')
    @php
        $pegawai = session('pegawai');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> My Profile</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bx bx-bell me-1"></i> Notifications</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bx bx-link-alt me-1"></i> Connections</a>
                    </li> --}}
                </ul>
                <div class="card mb-4">
                    {{-- <h5 class="card-header">Profile Details</h5> --}}
                    @if (session()->has('success'))
                        <div class="alert alert-primary alert-dismissible mx-4 mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('myprofile.update', $pegawai->id) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" value="{{ $pegawai->user->username }}" disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nomor Identitas / Nip</label>
                                    <input class="form-control" type="text" id="name" name="nip" value="{{ $pegawai->user->nip_id }}" disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ $pegawai->name }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="role" class="form-label">Role</label>
                                    <input class="form-control" type="text" id="role" name="role" value="{{ $pegawai->role }}" disabled />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="{{ $pegawai->email }}" placeholder="yourname@organization.com" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">Organisasi </label>
                                    <input type="text" class="form-control" id="organization" name="organization" value="@if (isset($pegawai->bu->sima_klpbu)) {{ $pegawai->bu->sima_klpbu->nama_klpbu }} @endif" disabled />

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Kontak</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">ID (+62)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{ $pegawai->phone }}" placeholder="8123456789" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
@endsection
