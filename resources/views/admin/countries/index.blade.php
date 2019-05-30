@extends('layouts.admin')
@section('content')
    <h1>All Countries</h1>
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
            @if ($countries)
                @foreach($countries as $country)
                    <tr>
                        <td>{{$country->id}}</td>
                        <td><a href="{{route('countries.edit', $country->id)}}">{{$country->name}}</a></td>
                        <td>{{$country->created_at ? $country->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$country->updated_at ? $country->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCountriesController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Country', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
