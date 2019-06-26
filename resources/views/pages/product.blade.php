@include('layouts.app')

<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- success message -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
             
            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>Products</h3>
                </div>
                @can('isAdmin')
                <div class="col-4">
                    <a class="btn btn-primary btn-sm" style="float: right;" href="{{ route('product.create') }}">Add Products</a>
                </div>
                @endcan
                @can('isCustomer')
                <div class="col-4">
                    <a class="btn btn-primary btn-sm" style="float: right;" href="/viewCart">View My Kart</a>
                </div>
                @endcan
            </div>
            
            <table class="table table-hover product-table">
            <thead class="thead thead-dark">
                <tr>
                    <th>Image<th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><img width="50px" height="50px" src="{{ asset('storage/images/' . $product->image) }}"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->categories->name}}</td>
                    <td>
                    @can('isAdmin')
                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
        
                        <a class="btn btn-primary btn-sm" href="{{ route('product.edit',$product->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endcan
                    @can('isCustomer')
                    <form action="{{ route('addtocart',$product->id) }}" method="POST">
                    @csrf
                    @method('POST')
                        <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                    </form>
                    @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
        </div>
    </div>
</div>
</main>
</div>
</body>
</html>
