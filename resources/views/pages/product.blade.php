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
                    <button class="btn btn-primary" style="float: right;">Add Products</button>
                </div>
            </div>
            
            <table class="table table-hover product-table">
            <thead class="thead thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>
</main>
</div>
</body>
<footer>
    <script>
        $(function () {
     
        $.ajaxSetup({
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        //displaying datas
        var table = $('.product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'category_id', name: 'category_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        });
    </script>
</footer>
</html>
