@extends('layouts.layout')
@section('content')


    <section>
        <div class="container">
            <div class="row">
                {{--<div class="col-sm-3">
                    <div class="left-sidebar">
                        @include('shared.sidebar')

                    </div>
                </div>--}}

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img class="img-responsive" src="{{$product->photo ? asset($product->photo->file) : 'http://placehold.it/400x400'}}" alt="" />

                            </div>


                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2><strong>ID:{{$product->id}}</strong> - {{ $product->title }}</h2>



                                <span class="text-primary">€ {{ $product->price }}</span>



                                <form action="{{url('cart')}}" method="post">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"></input>

                                    <button type="submit" class="btn btn-default cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>



                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->



                </div>
            </div>
        </div>
    </section>

@endsection
