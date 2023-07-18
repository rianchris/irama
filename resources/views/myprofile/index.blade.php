@extends('layouts.main')
@section('content')
    @php
        $pegawai = session('pegawai');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 ">
                    <div class="card-header">
                        <h5 class="card-title fw-semibold text-primary"> My Profile</h5>
                        <hr class="m-0">
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-primary alert-dismissible mx-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input class="form-control" type="password" id="newPassword" name="newpassword" />
                                </div>
                                @can('admin')
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Nomor Identitas / Nip</label>
                                        <input class="form-control" type="text" id="name" name="nip" value="{{ $pegawai->user->nip_id }}" disabled />
                                    </div>
                                @endcan
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ $pegawai->name }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="role" class="form-label">Role</label>
                                    <input class="form-control" type="text" id="role" name="role" value="{{ $pegawai->role }}" disabled />
                                </div>
                                @can('mitra')
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $pegawai->email }}" placeholder="yourname@organization.com" />
                                    </div>
                                @endcan
                                @can('mitra')
                                    <div class="mb-3 col-md-6">
                                        <label for="organization" class="form-label">Organisasi </label>
                                        <input type="text" class="form-control" id="organization" name="organization" value="@if (isset($pegawai->buMitra->sima_klpbu)) {{ $pegawai->buMitra->sima_klpbu->nama_klpbu }} @endif" disabled />
                                    </div>
                                @endcan
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
