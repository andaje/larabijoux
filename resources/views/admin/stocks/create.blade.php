@extends('layouts.admin')
@section('content')
    <h1>Add Stock</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminStocksController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('product_name', 'Product Name:') !!}
        {!! Form::text('product_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::text('quantiy',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Stock', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')
@stop

