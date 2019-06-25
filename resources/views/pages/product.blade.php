@include('layouts.app')

<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             
            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>Products</h3>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary btn-sm" style="float: right;" href="{{ route('product.create') }}">Add Products</a>
                </div>
            </div>
            
            <table class="table table-hover product-table">
            <thead class="thead thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
            <tbody>
            @foreach($products as $product)
                <tr>
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
                        <button type="submit" class="btn btn-danger btn-sm">Add to Cart</button>
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
