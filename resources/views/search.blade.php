@extends('layouts.layout')
@section('content')
    <main class="mx-5">

       <div class="mx-md-5">
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
       </div>
        <div>
            <h4>Search Results</h4>
            <p class="search-results-count">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p>
               @if ($products->total() > 0)
                   <table class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Price</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach ($products as $product)
                           <tr>
                               <th><a href="{{ route('product_details', $product->id) }}">{{ $product->name }}</a></th>
                               <td>{{($product->description) }}</td>
                               <td>{{ $product->price }}</td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>

                   {{ $products->appends(request()->input())->links() }}
               @endif
       </div>

    </main>
@endsection

