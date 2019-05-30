@extends('layouts.admin')
@section('content')
    <h1>Countries</h1>

    {!! Form::model($country,['method'=>'PATCH', 'action'=>['AdminCountriesController@update', $country->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Country', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCountriesController@destroy', $country->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete Country', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@stop
