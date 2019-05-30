@extends('layouts.admin')
@section('content')

    <h1>Create Address</h1>


    {!! Form::open(['method'=>'POST', 'action'=>'AdminAddressesController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city_name', 'City:') !!}
        {!! Form::text('city_name',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city_postal_code', 'Postal Code:') !!}
        {!! Form::text('city_postal_code' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country_name', 'Country:') !!}
        {!! Form::text('country_name' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Address', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
