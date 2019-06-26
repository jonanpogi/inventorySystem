@include('layouts.app')

<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>Archive</h3>
                </div>
                
            </div>
           
                <table class="table table-hover archive-table">
                <thead class="thead thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
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
            var table = $('.archive-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('archive.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            //delete user
            $('body').on('click', '.retriveUser', function () {
            
            var user_id = $(this).data("id");
            confirm("Are You sure want to Retrieve !");
        
            $.ajax({
                //URL METHOD
                type: "PATCH",
                url: "{{ route('archive.store') }}"+'/'+user_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        });
    </script>
</footer>
</html>
