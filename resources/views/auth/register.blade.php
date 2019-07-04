@extends('layouts.layout')

@section('content')
    <main class="mx-3">
        {{--<nav aria-label="breadcrumb" id="myBreadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registreer Account</li>
            </ol>
        </nav>--}}

        <div class="register">
            <div class="row">
                <div class="col-md-3  register-left ">
                    <i class="fas fa-shopping-basket fa-2x text-white faimg"></i>
                    <h3 class="pb-2">Welcome</h3>

                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="">
                                <h3 class="register-heading text-center ">Register</h3>
                                <p class="pb-2 register-heading2">If you already have an account, please login</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row register-form pb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control  {{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" placeholder="First Name *" value="{{ old('first_name') }}" required>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control  {{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Last Name *" value="{{ old('last_name') }}" required>
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email"class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="E-mail *" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control mb-2 mt-3{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password *" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password"class="form-control mb-3" name="password_confirmation" placeholder="Confirm password *" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text"  class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" id="street" name="street" placeholder="Address Street *" value="{{ old('street') }}" required>
                                            @if ($errors->has('street'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('street') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control {{ $errors->has('house_nr') ? ' is-invalid' : '' }}" id="house_nr" name="house_nr" placeholder="Number *" value="{{ old('house_nr') }}" required>
                                            @if ($errors->has('house_nr'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('house_nr') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text"class="form-control" id="bus" name="bus" placeholder="Bus">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" id="postal_code" placeholder="Postal code *" name="postal_code" value="{{ old('postal_code') }}" required>
                                            @if ($errors->has('postal_code'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" id="city" placeholder="City *" name="city" value="{{ old('city') }}" required>
                                        </div>

                                        <div class="form-group d-flex">
                                            <label for="country" class="pr-3 pt-1">Country:</label>
                                            <select class="form-control" id="country" name="country">
                                                @php($countries = \App\Country::all())
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <ul class=" d-flex nav nav-tabs nav-justified mb-4  mr-1" style="width: 200px" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active " id="home-tab" href=" " > {{ __('Register') }}</button>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn text-white bacg" id="profile-tab"href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                </ul>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>


@endsection
