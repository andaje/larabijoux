@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true]) !!}
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
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [''=>'Choose options'] + $roles,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address_id', 'Address Street:') !!}
        {!! Form::select('address_id', [''=>'Choose options'] + $addresses, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city_id', 'City:') !!}
        {!! Form::select('city_id', [''=>'Choose options'] + $cities, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city_id', 'Postal Code:') !!}
        {!! Form::select('city_id', [''=>'Choose options'] + $cit, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('coubtry_id', 'Country:') !!}
        {!! Form::select('country_id', [''=>'Choose options'] + $countries, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),0, ['class'=>'form-control']) !!}
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
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
