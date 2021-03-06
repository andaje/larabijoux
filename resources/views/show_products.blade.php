@extends('layouts.layout')

@section('content')
    <main class="mx-md-3 py-md-3">
    <div class="d-flex">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center"><b>Categories</b></div>
                <div class="list-group list-group-flush">
                    @foreach($cat as $categ)
                        <a href="{{route('cat_products',$categ->id)}} " class="list-group-item list-group-item-action bg-light">{{$categ->name}}</a>
                    @endforeach
                </div>

            </div>
        </div>

        <div class=" d-flex flex-column flex-lg-row justify-content-around">
                @foreach($products as $product)
                        <div class=" mx-3">
                            <a class="p-3" href="{{route('product_details', $product->id)}}">
                                <img height="150" src="{{$product->photo ? asset($product->photo->file) :' https://via.placeholder.com/400x400'}}" alt="">
                            </a>
                            <div class="">
                                <p class="m-0 text-center"><a href="{{route('product_details', $product->id)}}">{{ $product->name}}</a></p>
                            </div>
                            <div>
                                <p class="text-center">€ {{ $product->price}}</p></div>

                            <div class="text-center" >
                                @if(!Auth::check())
                                    <a href ="{{route('login')}}"  class="btn btn-danger">
                                        <i class="fas fa-shopping-basket"></i>First login</a>
                                @else
                                <form action="{{url('cart')}}" method="post">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn btnAdd pl-4 text-center cart" style="width: 160px";>
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                                  @endif
                            </div>
                        </div>


        @endforeach
        </div>

    </div>
    </main>
    {{ $products->links() }}

@endsection

