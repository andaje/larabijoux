@extends('layouts.admin')
@section('content')

    @if($books)

    <table class="table table-striped">
    <thead>
    <tr>
        <th>Author</th>
        <th>Title</th>
    </tr>
    </thead>
    <tbody>
        @foreach($books as $book )
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->title}}</td>
                <td><a href="{{route('books.index')}}">Rent</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @endif
@stop
