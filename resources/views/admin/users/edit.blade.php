
@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>

    {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src="{{$user->photo ? asset($user->photo->file) : 'http://place-hold.it/400x400'}}"
                 alt="">
        </div>
        <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('first_name', 'First Name:') !!}
                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name:') !!}
                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address_id', 'Address:') !!}
                {!! Form::select('address_id', [''=>'Choose options'] + $addresses, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name_city_id', 'City Name:') !!}
                {!! Form::select('name_city_id', [''=>'Choose options'] + $cities, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('code_city_id', 'Postal Code:') !!}
                {!! Form::select('code_city_id', [''=>'Choose options'] + $cit, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('user_country_id', 'Country:') !!}
                {!! Form::select('user_country_id', [''=>'Choose options'] + $countries, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [''=>'Choose options'] + $roles, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-md-6']) !!}
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-md-6']) !!}
            </div>
            {!!Form::close() !!}
            </div>
    </div>
    @include('includes.form_error')
@stop
