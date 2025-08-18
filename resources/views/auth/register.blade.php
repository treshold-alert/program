@extends('layouts.authLayout')

@section('content')
    <div class="position-relative">
        <div
            class="authentication-wrapper authentication-wrapper-regis authentication-basic authentication-basic-regis container-p-y">
            <div class="authentication-inner authentication-inner-regis py-4">
                <!-- Register Card -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="{{ route('home') }}" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-heading fw-semibold">PABRIK DIMSUM BANDUNG</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="card-body mt-2">
                        <h4 class="mb-2">Petualangan Dimulai Disini 🚀</h4>
                        <p class="mb-4">Buat Aplikasi Managementmu Menyenangkan</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                {{-- Username --}}
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Enter your username" value="{{ old('username') }}" autofocus />
                                        <label for="username">Username</label>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your email" value="{{ old('email') }}" />
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                {{-- Phone Number --}}
                                <div class="col-md-12">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            placeholder="Enter your phone number format (62xxxxxxxx)"
                                            value="{{ old('phone_number') }}" oninput="validateNumberInput(this)" />
                                        <label for="phone_number">Phone Number</label>
                                    </div>
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6">
                                    <div class="mb-3 form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="password" id="password" class="form-control" name="password"
                                                    placeholder="••••••••••••" />
                                                <label for="password">Password</label>
                                            </div>
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="mdi mdi-eye-off-outline"></i></span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Confirm Password --}}
                                <div class="col-md-6">
                                    <div class="mb-3 form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="password" id="password_confirmation" class="form-control"
                                                    name="password_confirmation" placeholder="••••••••••••" />
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="mdi mdi-eye-off-outline"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol submit --}}
                            <button class="btn btn-danger d-grid w-100">Sign up</button>
                        </form>


                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="{{ route('login') }}" class="text-danger">
                                <span>Login</span>
                            </a>
                        </p>
                    </div>
                </div>
                {{-- <!-- Register Card -->
                <img src="{{ asset('assets/img/illustrations/tree-3.png') }}" alt="auth-tree"
                    class="authentication-image-object-left d-none d-lg-block" />
                <img src="{{ asset('assets/img/illustrations/auth-basic-mask-light.png') }}"
                    class="authentication-image d-none d-lg-block" alt="triangle-bg"
                    data-app-light-img="illustrations/auth-basic-mask-light.png"
                    data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
                <img src="{{ asset('assets/img/illustrations/tree.png') }}" alt="auth-tree"
                    class="authentication-image-object-right d-none d-lg-block" /> --}}
            </div>
        </div>
    </div>
@endsection
