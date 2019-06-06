@extends('layouts.admin')
@section('content')
    <h1>All Subcategories</h1>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($subcategories)
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{$subcategory->id}}</td>
                        <td><a href="{{route('subcategories.edit', $subcategory->id)}}">{{$subcategory->name}}</a></td>
                        <td>{{$subcategory->category ? $subcategory->category->name : 'Uncategorized'}}</td>
                        <td>{{$subcategory->created_at ? $subcategory->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$subcategory->updated_at ? $subcategory->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">

    </div>
@stop
