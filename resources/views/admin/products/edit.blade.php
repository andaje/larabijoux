@extends('layouts.admin')
@section('content')
    <h1>Products</h1>
    {!! Form::model($product,['method'=>'PATCH', 'action'=>['AdminProductsController@update', $product->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::text('quantity' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', [''=>'Choose options'] + $categories, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Product', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductsController@destroy', $product->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete Product', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@stop

