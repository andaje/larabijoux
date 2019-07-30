@extends('layouts.admin')
@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">All orders</h2>

        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Delivery address</th>
                <th scope="col">Nr</th>
                <th scope="col">Price</th>
                <th scope="col">Created_at</th>

            </tr>
            </thead>
            <tbody>
            @if ($orders)
                @foreach($orders as $order)
                    <tr>
                        <td><a href="{{route('orders.edit', $order->id)}}">{{$order->id}}</a></td>
                        <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                        <td>{{$order->delivery->street}} {{$order->delivery->house_nr}} {{$order->delivery->bus}}<br>
                            {{$order->delivery->city->postal_code}} {{$order->delivery->city->name}} <br>
                            {{$order->delivery->city->country->name}}</td>
                        <td>{{$order->items}}</td>
                        <td>{{$order->totalprice}}</td>
                        <td>{{$order->created_at}}</td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </main>
@stop
