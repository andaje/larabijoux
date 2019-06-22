@extends('layouts.layout')
@section('content')
    <main>
        <div class="container">
            {{--@if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>--}}

        <div class="products-section my-orders container">
            <div class="sidebar">

                <ul>
                    {{--<li><a href="{{ route('users.edit') }}">My Profile</a></li>--}}
                    <li class="active"><a href="{{ route('orders.index') }}">My Orders</a></li>
                </ul>
            </div> <!-- end sidebar -->
            <div class="my-profile">
                <div class="products-header">
                    <h5 class="stylish-heading">Order ID: {{ $order->id }}</h5>
                </div>

                <div>
                    <div class="order-container">
                        <div class="order-header">
                            <div class="order-header-items">
                                <div>
                                    <div class="uppercase font-bold">Order Placed : {{ ($order->created_at) }}</div>

                                </div>
                                <div>
                                    <div class="uppercase font-bold">Order ID :{{ $order->id }}</div>

                                </div>
                                <div>
                                    {{--<div class="uppercase font-bold">Total</div>
                                    <div>{{ ($order->billing_total) }}</div>--}}
                                </div>
                            </div>

                        </div>
                        <div class="order-products">
                            <table class="table" style="width:50%">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $order->user->address->street }}</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div> <!-- end order-container -->

                    <div class="order-container">
                        <div class="order-header">
                            <div class="order-header-items">
                                <div>
                                    Order Items
                                </div>

                            </div>
                        </div>
                        <div class="order-products">
                            @foreach ($products as $product)
                                <div class="order-product-item">
                                    {{--<div><img src="{{ asset($product->image) }}" alt="Product Image"></div>--}}
                                    <div class="d-flex">
                                        <div class="mx-3">
                                            <a href="{{ route('product_details', $product->id) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="mx-2"> € {{($product->price) }}</div>
                                        <div class="mx-2">Quantity: {{ $product->pivot->quantity }}</div>
                                        <div class="mx-2">Total: </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div> <!-- end order-container -->
                </div>

                <div class="spacer"></div>
            </div>
        </div>
        </div>

    </main>

@endsection
