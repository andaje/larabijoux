@extends('layouts.admin')
@section('content')

    <h1>Create Product</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminProductsController@store','files'=>true]) !!}
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
        @foreach ($categories as $category)
        {{ Form::label('categories', $category->name) }}
        {{ Form::checkbox('categories[]', $category->id) }}
        @endforeach
    </div>
    <div class="form-group">
        {!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop

