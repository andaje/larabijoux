@extends('layouts.admin')
@section('content')
    <h1>All Cities</h1>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Country</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($cities)
                @foreach($cities as $city)
                    <tr>
                        <td>{{$city->id}}</td>
                        <td><a href="{{route('cities.edit', $city->id)}}">{{$city->name}}</a></td>
                        <td>{{$city->postal_code}}</td>
                        <td>{{$city->country ? $city->country->name : 'Uncategorized'}}</td>
                        <td>{{$city->created_at ? $city->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$city->updated_at ? $city->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">

    </div>
@stop
