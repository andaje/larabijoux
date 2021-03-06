@extends('layouts.admin')
@section('content')
    <h1>Create City</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminCitiesController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'City:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postal_code', 'Postal Code:') !!}
        {!! Form::text('postal_code', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country_id', 'Country:') !!}
        {!! Form::select('country_id', [''=>'Choose options'] + $countries, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create City', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')
@stop

