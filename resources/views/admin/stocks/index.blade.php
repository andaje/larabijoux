@extends('layouts.admin')
@section('content')
    <h1>All Stock</h1>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product_Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($stocks)
                @foreach($stocks as $stock)
                    <tr>
                        <td>{{$stock->id}}</td>
                        <td><a href="{{route('stocks.edit', $stock->id)}}">{{$stock->product->name}}</a></td>
                        <td>{{$stock->quantity}}</td>
                        <td>{{$stock->created_at ? $city->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$stock->updated_at ? $city->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">

    </div>
@stop
