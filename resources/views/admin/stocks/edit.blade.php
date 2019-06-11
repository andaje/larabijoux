@extends('layouts.admin')
@section('content')
    <h1>Stock</h1>

    {!! Form::model($stock,['method'=>'PATCH', 'action'=>['AdminStocksController@update', $stock->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('product_name', 'Product Name:') !!}
        {!! Form::text('product_name', $stock->product->name ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::text('quantity', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('add_quantity', 'Add Quantity:') !!}
        {!! Form::text('add_quantity', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Stock', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminStocksController@destroy', $stock->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete Stock', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@stop
