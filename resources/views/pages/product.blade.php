@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @can('isAdmin')   
            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>Products</h3>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" style="float: right;">Add Products</button>
                </div>
            </div>
            
            <table class="table table-hover" id="product-table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>test</td>
                <td>test</td>
                <td>123</td>
                <td>
                    <button class="btn btn-success">Edit</button>
                    <button class="btn btn-danger">Delete</button> 
                </td>
                </tr>
            </tbody>
            </table>
         
            @endcan

            @can('isCustomer')
                <h3>HELLO CUSTOMER</h3>
            @endcan
        </div>
    </div>
</div>
@endsection