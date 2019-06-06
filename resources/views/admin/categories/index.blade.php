@extends('layouts.admin')
@section('content')
    <h1>All Categories</h1>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($category)
                @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td><a href="{{route('categories.edit', $cat->id)}}">{{$cat->name}}</a></td>
                        <td>{{$cat->created_at ? $cat->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$cat->updated_at ? $cat->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
