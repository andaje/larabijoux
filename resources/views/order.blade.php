@extends('layouts.layout')
@section('content')
    <main class="mx-5">
        <h4 class="text-center my-3 ">Check your order</h4>
        <div class="d-md-flex justify-content-md-between mr-md-5">
                <div class="col-md-6 mx-md-3">
                    <h5>Shipping address</h5>
                    <p class="mb-1">Name:@auth {{Auth::user()->first_name}} {{Auth::user()->last_name}} @endauth</p>
                    <p class="mb-1">Address: {{$address->street}}, {{$address->house_nr}}, {{$address->bus}}</p>
                    <p class="mb-1">City: {{$address->city->name}}, {{$address->city->postal_code}}</p>
                    <p>Country: {{$address->city->country->name}}</p>
                </div>
                <div class="col-md-6 mx-md-3 text-right  pr-md-5">
                    <h5>Delivery address</h5>

                    @php($delivery = \App\Delivery::findOrFail(session('delivery_id')))

                    <p class="mb-1">Name:@auth {{Auth::user()->first_name}} {{Auth::user()->last_name}} @endauth</p>
                    <p class="mb-1">Address: {{$delivery->street}}, {{$delivery->house_nr}}, {{$delivery->bus}}</p>
                    <p class="mb-1">City: {{$delivery->city->name}}, {{$delivery->city->postal_code}}</p>
                    <p>Country: {{$delivery->city->country->name}}</p>

                </div>
        </div>
        <div class="col-md-8 mx-auto">

        <div class="card-body">
            <div class="row border border-secondary">
                <div class="col-12 d-md-none">
                    <h4 class="text-center my-3">Products</h4>
                </div>
                <div class="col-12 d-none d-md-block">
                    <div class="row">
                        <div class="col-md-4 pl-3 my-1">
                            <p class="my-1">Title</p>
                        </div>
                        <div class="col-md-2 pl-0 my-1">
                            <p class="my-1 ml-3">Price</p>
                        </div>
                        <div class="col-md-2 pl-0 my-auto">
                            <p class="my-1 ml-3">Nr</p>
                        </div>
                        <div class="col-md-2 pl-3 my-auto">
                            <p class="my-1">Subtotal_item</p>
                        </div>
                    </div>
                </div>
            </div>
            @foreach (Cart::content() as $item)
                <div class="row border border-top-0 border-secondary">
                    <div class="col-md-4">
                        <h4 class="productName my-1">{{$item->name}}</h4>
                    </div>
                    <div class="col-md-2 d-flex flex-md-column my-1">
                        <p class="mb-0 d-md-none">Price &nbsp;</p>
                        <p class="unitPrice mb-1">€ {{number_format($item->price, 2)}}</p>

                    </div>
                    <div class="col-md-2 d-flex flex-md-column my-1">
                        <p class="mb-0 d-md-none">Nr</p>
                        <p class="mb-0">{{$item->qty}}</p>
                    </div>
                    <div class="col-md-2 d-flex flex-md-column my-1">
                        <p class="mb-0 d-md-none">Subtotal</p>
                        <p class="price ml-md-4">€ {{number_format($item->subtotal, 2)}}</p>
                    </div>
                </div>
            @endforeach

            <div class="row border border-top-0 border-secondary mb-3">
                <div class="col-6 px-0 text-center">
                    <p class="border-bottom border-secondary mb-0 py-1">Subtotal : </p>
                    <p class="border-bottom border-secondary mb-0 py-1">Shipping : </p>
                    <p class="border-bottom border-secondary mb-0 py-1">Discount : </p>
                    <p class=" mx-0 mb-0 py-2"><b>Total :</b></p>
                </div>
                <div class="col-6 px-0 border-left border-secondary text-center">
                    <p class="subTotal border-bottom border-secondary mb-0 py-1">€ {{Cart::subTotal()}}</p>
                    <p class="shipCost border-bottom border-secondary mb-0 py-1">€ {{$ship_cost}}</p>
                    <p class="discountVoucher border-bottom border-secondary mb-0 py-1">€ 0.00</p>
                    <p class="Total  mb-0 py-1"><b>€ {{number_format(Cart::subTotal() + $ship_cost,2)}}</b></p>
                </div>
            </div>
            <div class="my-2">
                <a href ="{{url('stripe')}}"  class="btn btn-success">
                    <i class="fas fa-shopping-basket mr-1"></i>Pay now
                </a>
                <a href ="{{url('checkout')}}"  class="btn btn-warning">
                    <i class="fas fa-shopping-basket mr-1"></i>Change delivery address
                </a>
                <a href ="{{url('shopping_cart')}}"  class="btn btn-info">
                    <i class="fas fa-shopping-basket mr-1"></i>Back to shopping
                </a>
            </div>

        </div>
        </div>
        </div>



    </main>
@endsection
