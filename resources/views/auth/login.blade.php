@extends('layouts.app')

@section('home')
<!-- iCheck -->
{{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/iCheck/square/blue.css')}}"> --}}

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Restaurant</b> El Patio</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post" id="app">
                    @csrf
                    <div class="form-group has-feedback">
                        <input id="username" name="username" type="text"
                            class="form-control @error('username') is-invalid @enderror"
                            placeholder="{{ __('Username or E-Mail Address') }}" required autocomplete="username"
                            autofocus>
                        <span class="fa fa-envelope form-control-feedback"></span>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback">
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        <span class="fa fa-lock form-control-feedback"></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">

                            <div class="custom-control custom-switch my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" name="remember"
                                id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                              </div>


                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"> {{ __('Login') }}</button>

                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                </p>
                @endif
                <p class="mb-0">
                    <a href="" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <!-- Bootstrap 4 -->
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <!-- iCheck -->
    {{-- <script src="{{asset('admin-lte/plugins/iCheck/icheck.min.js')}}"></script> --}}
    <script>
        //         $(function () {
    //     $('input').iCheck({
    //       checkboxClass: 'icheckbox_square-blue',
    //       increaseArea : '20%' // optional
    //     })
    //   })
    </script>
    @endsection
