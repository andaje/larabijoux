@extends('layouts.layout')
@section('content')
    <main>
        {{--<div class="container">
            @if (session()->has('success_message'))
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

        <div class="products-section my-orders container" style="min-height: 50vh">

            <div class="my-profile">
                <div class="products-header">
                    <h4 class="stylish-heading">My Orders</h4>
                </div>
                <div>
                    @foreach ($orders as $order)
                        <div class="order-container">
                            <div class="order-header">
                                <div class="order-header-items d-md-flex">
                                    <div>
                                        <div class="uppercase font-bold mx-4">Order NR : {{ $order->id }}</div>
                                    </div>
                                    <div>

                                        <div class="uppercase font-bold">Order Placed: {{ ($order->created_at) }}</div>
                                    </div>
                                    <div>
                                        <div class="uppercase font-bold mx-2">Total : </div>
                                        <div> </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="order-header-items">
                                        <div><a href="{{ route('orders.show', $order->id) }}">Order Details</a></div>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- end order-container -->
                    @endforeach
                </div>

                <div class="spacer"></div>
            </div>
        </div>

    </main>
@endsection

