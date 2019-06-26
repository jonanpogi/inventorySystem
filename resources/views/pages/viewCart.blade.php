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

            <div class="row">
                <div class="col-4">
                    <h3>My Cart</h3>
                </div>
                <div class="col-4">
                    <h5>Total Cart Price:</h5>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary btn-sm" style="float: right;" href="{{ route('product.index') }}">Back</a>
                </div>
            </div>

            <table class="table table-hover product-table">
            <thead class="thead thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($prod_user as $p_u)
                <tr>
                    <td>{{$p_u->name}}</td>
                    <td>{{$p_u->price}}</td>
                    <td>
                        <form action="{{ route('deletecart',$p_u->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
        
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                <tr>
            @endforeach
            </tbody>
            </table> 
            {{ $prod_user->links() }}
        </div>
    </div>
</div>
</main>
</div>
</body>
</html>