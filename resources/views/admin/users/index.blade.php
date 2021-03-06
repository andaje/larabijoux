@extends('layouts.admin')
@section('content')

    <h1>All Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col"> Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>
            <th scope="col">Postal Code</th>
            <th scope="col">Country</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if ($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>

                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->first_name}} {{$user->last_name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address->street}}</td>
                    <td>{{$user->address->city->name}}</td>
                    <td>{{$user->address->city->postal_code}}</td>
                    <td>{{$user->address->city->country->name}}</td>
                    <td>{{$user->role ? $user->role->name : 'User without role'}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop

