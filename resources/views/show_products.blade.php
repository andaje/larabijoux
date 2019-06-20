@extends('layouts.layout')

@section('content')
    <main>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Categories </div>
                <div class="list-group list-group-flush">
                    @foreach($cat as $categ)
                        <a href="{{route('cat_products',$categ->id)}} " class="list-group-item list-group-item-action bg-light">{{$categ->name}}</a>
                    @endforeach
                </div>

            </div>

        <div class="d-flex justify-content-around">
                @foreach($products as $product)

                        <div class="">
                            <a class="p-3" href="{{route('product_details', $product->id)}}"><img src="{{asset('' . $product->photo->file)}}" width="250"  alt=""></a>
                            <div class="">
                                <p class="m-0 text-center"><a href="{{route('product_details', $product->id)}}">{{ $product->name}}</a></p>
                            </div>
                        </div>


        @endforeach
        </div>
        </div>

    </main>
@endsection

