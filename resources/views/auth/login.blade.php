@extends('layouts.layout')
@section('content')

    <main>

        <div class="register mx-3">
            {{--<nav aria-label="breadcrumb" id="myBreadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>--}}
            <div class="row">
                <div class="col-md-3  register-left ">
                    <i class="fas fa-shopping-basket fa-2x text-white faimg"></i>
                    <h3 class="pb-3">Welcome</h3>

                </div>
                <div class="col-md-9 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading text-center ">Login</h3>

                            <div class="row register-form">
                                <div class="col-md-8 offset-md-2">
                                    <p class="pb-2">If you don't have an account, please register</p>

                                    <div class="">
                                        <div class="">{{ __('Login') }}</div>

                                        <div class="">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-8 offset-md-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif

                                                <ul class=" d-flex nav nav-tabs nav-justified mb-4  mr-1" style="width: 200px" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <button class="nav-link active " id="home-tab" href=" " >{{ __('Login') }}</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="btn text-white bacg" id="profile-tab"href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection
