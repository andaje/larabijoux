@extends('layouts.layout')

@section('content')

<main class="mx-3">

        <div class="row justify-content-md-around">

            @if(!Auth::check())
                <a href ="{{route('login')}}"  class="btn btn-danger">
                    <i class="fas fa-shopping-basket"></i>First login</a>
            @else
                <div class="col-md-4 ">
                    if($user)

                        {!! Form::model(Auth::user(), ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', Auth::user()->id],'files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name:') !!}
                            {!! Form::text('first_name', null, ['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name:') !!}
                            {!! Form::text('last_name', null, ['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', null, ['class'=>'form-control'])!!}
                         </div>


                        <a href ="{{url('stripe')}}"  class="btn btn-success">
                            <i class="fas fa-shopping-basket"></i> Pay now
                        </a>


                        {!! Form::close() !!}

                    </div>
                <div>
                    @if(count($cart))
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill">{{count($cart)}}</span>
                            </h4>
                        @foreach($cart as $item)
                                <ul class="list-group  mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{ $item->name }}</h6>
                                        </div>
                                        <div >
                                            <span class="text-muted mx-5">{{ $item->qty }}</span>
                                            <span class="text-muted">€{{ $item->price }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                        <div class="text-success">
                                            <h6 class="my-0">Promo code</h6>
                                            <small>EXAMPLECODE</small>
                                        </div>
                                        <span class="text-success">-$5</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (EUR)</span>
                                        <strong>€ {{Cart::subTotal()}}</strong>
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
