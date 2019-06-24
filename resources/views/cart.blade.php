@extends('layouts.layout')

@section('content')
    <main>
            <section id="cart_items">
                <div class="container">
                    <div class="table-responsive cart_info">
                        @if(count($cart))
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
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
                                            <p>Code:{{ $item->id }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>€{{ $item->price }}</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href="{{url("cart?product_id=$item->id&increment=1")}}"> + </a>
                                                <input class="cart_quantity_input text-center" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href="{{url("cart?product_id=$item->id&decrease=1")}}"> - </a>
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">€{{ $item->subtotal }}</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a type="button" class="btn btn-danger btn-sm cart_quantity_delete " href="{{url("cart?product_id=$item->id&delete=1")}}"><i class="fa fa-times"></i>Remove</a>
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
                    <div class="row">
                        <div  class=" col-12 d-flex justify-content-end mt-2">

                                    <section>
                                        <div class="row mt-2 d-flex justify-content-center justify-content-md-end">
                                            <a class="btn btn-danger update mr-md-2" href="{{url('clear-cart')}}">Clear cart</a>
                                            <form method="post" id="payment-form" action="{{route('checkout')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>


                                            <a href ="{{route('show_products')}}"  class="btn btn-primary">
                                                <i class="fas fa-shopping-basket"></i> Continue Shopping
                                            </a>
                                            <a href="{{route('checkout')}}" class="btn btn-success ml-2 mr-md-2">
                                                Checkout <i class="fas fa-arrow-alt-right bg-dark"></i>
                                            </a>

                                        </div>

                                        <div class=" col-12 d-flex justify-content-end  lineb">
                                            <h6 class="text-center mr-2"><b>Total</b></h6>
                                            <p class="text-center"><b>€ {{Cart::subTotal()}}</b></p>
                                        </div>
                                        <div class="bt-drop-in-wrapper">
                                            <div id="bt-dropin"></div>
                                        </div>
                                    </section>
                        </div>
                        </div>

                    </div>

            </section><!--/#do_action-->

    </main>


@endsection
