@extends('layouts.main-blank')
@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center m-0 p-0">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/backgrounds/login.png') }}" class="img-fluid" alt="Login image" width="100%" style="filter: grayscale(100%)" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-5">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                Irama
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">Irama App</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome to self assessment management risk! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                    </form>
                    <div class="card">
                        <div class="card-body">
                            <ul>
                                <h5 class="fw-semibold p-1 card-header"> Admin</h5>
                                <ol>username: adminirama</ol>
                                <ol>password: password</ol>
                            </ul>

                            <ul>
                                <h5 class="fw-semibold p-1 card-header"> Bu 1</h5>
                                <li> Mitra
                                    <ol>username: yohana</ol>
                                    <ol>password: password</ol>
                                </li>
                                <li> Warga
                                    <ol>username: putri123</ol>
                                    <ol>password: password</ol>
                                </li>
                            </ul>
                            <ul>
                                <h5 class="fw-semibold p-1 card-header"> Bu 2</h5>
                                <li> Mitra
                                    <ol>username: gilang</ol>
                                    <ol>password: password</ol>
                                </li>
                                <li> Warga
                                    <ol>username: sani123</ol>
                                    <ol>password: password</ol>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection
