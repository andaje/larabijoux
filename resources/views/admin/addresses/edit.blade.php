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
        {!! Form::label('city_name', 'City:') !!}
        {!! Form::text('city_name',$address->city->name, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city_postal_code', 'Postal Code:') !!}
        {!! Form::text('city_postal_code',$address->city->postal_code, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country_name', 'Country:') !!}
        {!! Form::text('country_name', $address->city->country->name, null, ['class'=>'form-control']) !!}
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
