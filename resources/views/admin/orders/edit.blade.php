@extends('layouts.admin')
@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Oredrs details{$order->id}}</h2>

        <div class="d-flex flex-row">
            <p>Delivery address: <p>
            <p>{{$order->delivery->street}} {{$order->delivery->house_nr}} {{$order->delivery->bus}}<br>
                {{$order->delivery->city->postal_code}} {{$order->delivery->city->name}} <br>
                {{$order->delivery->city->country->name}}</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Price</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if ($orderItems)
                        @foreach($orderItems as $item)
                            <tr>
                                <td>{{$item->product_id}}</td>
                                @php($product = \App\Product::where('id', $item->product_id )->first())
                                <td>{{$product->name}}</td>
                                {{--@if ($product = \App\Product::where('id', $item->product_id )->exists())--}}
                                {{--<td>{{$item->product->name}}</td>--}}
                                {{--@else--}}
                                {{--<td>Verwijderd product</td>--}}
                                {{--@endif--}}
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <form action="{{route('orders.update', $order->id)}}" method="POST">
                    @method('PATCH')
                    @csrf

                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>

    </main>

@stop
