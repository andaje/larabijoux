@extends('layouts.admin')
@section('content')

    <h1>Create Address</h1>


    {!! Form::open(['method'=>'POST', 'action'=>'AdminAddressesController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street', null, ['class'=>'form-control']) !!}
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
        {!! Form::submit('Create Address', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
