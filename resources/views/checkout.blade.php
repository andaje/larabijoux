@extends('layouts.layout')

@section('content')

<main class="mx-3" xmlns="http://www.w3.org/1999/html">
    <div class="row justify-content-md-around">

            @if(!Auth::check())
                <a href ="{{route('login')}}"  class="btn btn-danger">
                    <i class="fas fa-shopping-basket"></i>First login</a>
            @else
                <div class="col-md-5">
                        <div class="d-md-flex">
                            <div class="mr-3" >
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control mb-2 mr-md-3 " name="first_name" placeholder="Firstname" @auth value="{{Auth::user()->first_name}}" @endauth>
                            </div>
                            <div >
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-control mb-2 mr-md-5" name="last_name" placeholder="Lastname" @auth value="{{Auth::user()->last_name}}" @endauth>
                            </div>
                        </div>
                    <h5>Delivery Address</h5>
                    <form action="{{route('checkout')}}" method="POST">
                        @csrf
                        @method('POST')

                        <input type="text" class="form-control mb-2" name="street" placeholder="Addresss" required>
                        <div class="d-flex">
                            <input type="text" class="form-control mb-2 mr-3" name="house_nr" placeholder="Number" required>
                            <input type="text" class="form-control mb-2 ml-3" name="bus" placeholder="Bus">
                        </div>
                        <input type="text" class="form-control mb-2" name="postal_code" placeholder="Postal code" required>
                        <input type="text" class="form-control mb-2" name="name" placeholder="City" required>
                        <div class="form-group d-flex">
                            <label for="country2" class="pr-3 pt-1">Country</label>
                            <select class="form-control" id="country2" name="country">
                                @php($countries = \App\Country::all())
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" @auth @if(Auth::user()->address->city->country->id == $country->id) selected @endif @endauth>{{$country->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <button class="btn btn-success text-uppercase" type="submit" href ="{{url('check')}}" ><i class="fas fa-shopping-basket mr-1"></i>check your order</button>

                    </form>


                </div>
                <div col-md-7>
                    @if(count($cart))
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                            </h4>
                        @foreach($cart as $item)
                                <ul class="list-group  mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{ $item->name }}</h6>
                                        </div>
                                        <div >
                                            <span class="text-muted mx-5">{{ $item->qty }}</span>
                                            <span class="text-muted">€{{number_format($item->price,2) }}</span>
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                        <div class="text-success">
                                            <h6 class="my-0">Promo code</h6>
                                            <small>EXAMPLECODE</small>
                                        </div>
                                        <span class="text-success">-$0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total(EUR)(excl. shipping)</span>
                                        <strong><b>€ {{number_format(Cart::subTotal(),2)}}</b></strong>
                                    </li>
                                </ul>
                                <form class="card p-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Promo code">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">Redeem</button>
                                        </div>
                                    </div>
                                </form>
                </div>
                @else
                    <p class="alert-info">No items in shopping cart</p>
        </div>

           @endif
    @endif
    {{--<h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="*" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="*" required="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="*" required="">
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="*" required="">
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr class="mb-4">
                        <a class=" btn btnAdd"  role="button" href="">Continue to checkout</a>
                    </div>
--}}



</main>
@endsection
