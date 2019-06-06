@extends('layouts.admin')
@section('content')
    <h1>Subcategories</h1>

    {!! Form::model($subcategory,['method'=>'PATCH', 'action'=>['AdminSubcategoriesController@update', $subcategory->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_name', 'Category:') !!}
        {!! Form::text('category_name',$subcategory->category->name, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Subcategory', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminSubcategoriesController@destroy', $subcategory->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete City', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@stop
