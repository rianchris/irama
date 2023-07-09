@extends('layouts.main-blank')
@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center m-0 p-0">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/backgrounds/login.png') }}" class="img-fluid rounded-3" alt="Login image" width="65%" style="filter: grayscale(100%)" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 ">
                <div class="w-px-350 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-5">
                        <a href="{{ route('login') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/branding/logo-forsa-irama.png') }}" alt="" width="200px">
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome to Integrated Risk Maturity Application! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" aria-describedby="password" placeholder="Enter your password" />
                                <span class="input-group-text cursor-pointer"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                    </form>
                    <div class="table-responsive">
                        <small>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Admin</td>
                                        <td>adminirama</td>
                                        <td>password</td>
                                    </tr>
                                    <tr>
                                        <td>Mitra 1</td>
                                        <td>yohana</td>
                                        <td>password</td>
                                    </tr>
                                    <tr>
                                        <td>Warga 1</td>
                                        <td>putri123</td>
                                        <td>password</td>
                                    </tr>
                                    <tr>
                                        <td>Mitra 2</td>
                                        <td>gilang</td>
                                        <td>password</td>
                                    </tr>
                                    <tr>
                                        <td>Warga 2</td>
                                        <td>sani123</td>
                                        <td>password</td>
                                    </tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection
