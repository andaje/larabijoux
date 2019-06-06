@extends('layouts.admin')
@section('content')
    <h1>Create Subcategory</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminSubcategoriesController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_name', 'Category:') !!}
        {!! Form::text('category_name',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Subcategory', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')
@stop

