@extends('layouts.layout')

@section('content')
    <main>
            <section id="cart_items">
                <div class="container">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="table-responsive cart_info">
                        @if(count($cart))
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description">Description</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        {{--<td class="cart_product">
                                            <a href=""><img src="images/cart/one.png" alt=""></a>
                                        </td>--}}
                                        <td class="cart_description">
                                            <h4><a href="">{{ $item->name }}</a></h4>
                                            <p>Web ID: {{ $item->id }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>${{ $item->price }}</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href="{{url("cart?product_id=$item->id&increment=1")}}"> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href="{{url("cart?product_id=$item->id&decrease=1")}}"> - </a>
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">${{ $item->subtotal }}</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href="{{url("cart?product_id=$item->id&delete=1")}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <p class="alert-info">No items in shopping cart</p>
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </section> <!--/#cart_items-->

            <section id="do_action">
                <div class="container">
                    <div class="heading">
                        <h3>What would you like to do next?</h3>
                        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                    </div>
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="total_area">

                                <a class="btn btn-default update" href="{{url('clear-cart')}}">Clear-cart</a>
                                <form method="post" id="payment-form" action="{{url('checkout')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <section>
                                        <label for="amount">
                                            <span class="input-label">Amount</span>
                                            <div class="input-wrapper amount-wrapper">
                                                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount"
                                                       value="{{Cart::subTotal()}}">

                                            </div>
                                        </label>
                                        <div class="bt-drop-in-wrapper">
                                            <div id="bt-dropin"></div>
                                        </div>
                                    </section>
                                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                                    <button class="btn btn-primary" type="submit"><span>Test Transaction</span></button>
                                </form>

                            </div>
                        </div>
                        {{--<div class="col-sm-8">
                            @if(!Auth::check())

                                <div class="row">
                                    <div class="col-12">
                                        {!! Form::open(['method'=>'POST', 'action'=> 'AdminUsersController@store','files'=>true]) !!}
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name:') !!}
                                            {!! Form::text('name', null, ['class'=>'form-control'])!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name:') !!}
                                            {!! Form::text('name', null, ['class'=>'form-control'])!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email:') !!}
                                            {!! Form::email('email', null, ['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('password', 'Password:') !!}
                                            {!! Form::password('password', ['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                                        </div>

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12">

                                        {!! Form::model(Auth::user(), ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', Auth::user()->id],'files'=>true]) !!}
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name:') !!}
                                            {!! Form::text('name', null, ['class'=>'form-control'])!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email:') !!}
                                            {!! Form::email('email', null, ['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('password', 'Password:') !!}
                                            {!! Form::password('password', ['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Update User', ['class'=>'btn btn-success']) !!}
                                        </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section><!--/#do_action-->--}}
                    </div>
                </div>
                </div>
            </section><!--/#do_action-->
    </main>


@endsection
