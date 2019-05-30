@extends('layouts.admin')
@section('content')
    <h1>Cities</h1>

    {!! Form::model($city,['method'=>'PATCH', 'action'=>['AdminCitiesController@update', $city->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postal_code', 'Postal Code:') !!}
        {!! Form::text('postal_code', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country_name', 'Country:') !!}
        {!! Form::text('country_name',$city->country->name, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update City', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCitiesController@destroy', $city->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete City', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@stop
