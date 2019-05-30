@extends('layouts.admin')
@section('content')
    <h1>All Addresses</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>
            <th scope="col">Postal Code</th>
            <th scope="col">Country</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>

        </tr>
        </thead>
        <tbody>
        @if ($addresses)
            @foreach($addresses as $address)
                <tr>
                    <td>{{$address->id}}</td>
                    <td><a href="{{route('addresses.edit', $address->id)}}">{{$address->street}}</a></td>
                    <td>{{$address->city ? $address->city->name : 'Uncategorized'}}</td>
                    <td>{{$address->city ? $address->city->postal_code : 'Uncategorized'}}</td>
                    <td>{{$address->city ? $address->city->country->name : 'Uncategorized'}}</td>
                    <td>{{$address->created_at}}</td>
                    <td>{{$address->updated_at}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    <div class="row">

    </div>
@stop
