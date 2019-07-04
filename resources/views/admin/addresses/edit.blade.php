@extends('layouts.admin')
@section('content')
    <h1>Addresses</h1>
    {!! Form::model($address,['method'=>'PATCH', 'action'=>['AdminAddressesController@update', $address->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('house_nr', 'Nr:') !!}
        {!! Form::text('house_nr', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bus', 'Bus:') !!}
        {!! Form::text('bus', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city_id', 'City:') !!}
        {!! Form::select('city_id', [''=>'Choose options'] + $cities, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Address', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminAddressesController@destroy', $address->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete Address', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@stop
