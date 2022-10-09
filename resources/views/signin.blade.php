@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('assets/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ __('site.app_name') }}</h2>
                                            <h5 class="font-weight-semibold mb-4">{{ __('place  sing to continue') }}</h5>
                                            <form action='{{ route('login') }}' method='post'>
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('site.email') }}</label> <input class="form-control"
                                                        placeholder="Enter your email" type="text" name='email'>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('site.password') }}</label> <input class="form-control"
                                                        placeholder="Enter your password" type="password" name='password'>
                                                </div><button
                                                    class="btn btn-main-primary btn-block">{{ __('site.login in') }}</button>
                                                <div class="row row-xs">
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                            {{ __('site.login with facebock') }}</button>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                        <button class="btn btn-info btn-block"><i
                                                                class="fab fa-twitter"></i>{{ __('site.login with googel') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">{{ __('site.forget password') }}?</a></p>
                                                <p>Don't have an account? <a
                                                        href="{{ url('/' . ($page = 'signup')) }}">{{ __('site.create new acount') }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
