@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>Users</h3>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" style="float: right;">Add Products</button>
                </div>
            </div>
           
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $users)
                <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->status}}</td>
                <td>
                    <button class="btn btn-success">Edit</button>
                    <button class="btn btn-danger">Delete</button> 
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {!! $user->render() !!}
        </div>
    </div>
</div>

@endsection