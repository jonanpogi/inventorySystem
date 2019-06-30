@include('layouts.app')

<main class='py-4'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                Upload Validation Error<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif

                <div class="row justify-content-between">
                    <div class="col-4">
                        <h3>Edit Products</h3>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-primary btn-sm" style="float: right;" href="{{ route('product.index') }}">Back</a>
                    </div>
                </div>
                <!-- if ever uploading file add enctype="multipart/form-data" -->
                <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->price}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category</strong>
                                <input class="form-control" name="category_id" placeholder="Category" value="{{$product->categories->name}}" disabled>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <table class="table">
                                <tr>
                                    <td width="40%" style="align:right;"><label>Select File for Upload</label></td>
                                    <td width="30%"><input type="file" name="image"></td>
                                    <td width="30%"></td>
                                </tr>
                                <tr>
                                    <td width="40%"style="align:right;"></td>
                                    <td width="30$"><span class="text-muted">jpg, png, gif</span></td>
                                    <td width="30%"style="align:right;"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-sm" name="upload">Submit</button>
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
