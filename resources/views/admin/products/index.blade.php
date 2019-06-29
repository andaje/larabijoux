@extends('layouts.admin')
@section('content')
    <h1>All Products</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if ($products)
            @foreach($products  as $product)
                <tr>

                    <td>
                        <img height="50" src="{{$product->photo ? asset($product->photo->file) : ' https://via.placeholder.com/100x100'}}" alt="">
                    </td>
                    <td><a href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
    {{$products->links()}}
@stop

