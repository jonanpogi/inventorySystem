@include('layouts.app')

<main class='py-4'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row justify-content-between">
                    <div class="col-4">
                        <h3>Add Products</h3>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-primary btn-sm" style="float: right;" href="{{ route('product.index') }}">Back</a>
                    </div>
                </div>

                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input type="number" class="form-control" name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category</strong>
                                <select class="form-control" name="category_id" placeholder="Category">
                                        <option></option>
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</main>
</div>
</body>
</html>
