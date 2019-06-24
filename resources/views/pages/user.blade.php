@include('layouts.app')

<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>Users</h3>
                </div>
                
            </div>
           
                <table class="table table-hover user-table">
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

<!-- modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="userForm" name="userForm" class="form-horizontal">
                   <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <textarea id="email" name="email" required="" placeholder="Enter Email" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- <input type="hidden" name="status" id="status" value="Inactive"> -->
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
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
            var table = $('.user-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            //creating user
            // $('#createNewUser').click(function () {
            //     $('#saveBtn').val("create-User");
            //     $('#user_id').val('');
            //     $('#userForm').trigger("reset");
            //     $('#modelHeading').html("Create New User");
            //     $('#ajaxModel').modal('show');
            // });

            //passing values to modal
            $('body').on('click', '.editUser', function () {
            var user_id = $(this).data('id');
            $.get("{{ route('user.index') }}" +'/' + user_id +'/edit', function (data) {
                $('#modelHeading').html("Edit User");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                // $('#status').val('Inactive');
            })
        });
            //save button for edit
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
            
                $.ajax({
                data: $('#userForm').serialize(),
                url: "{{ route('user.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
            
                    $('#userForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            });
            //delete user
            $('body').on('click', '.deleteUser', function () {
            
            var user_id = $(this).data("id");
            confirm("Are You sure want to delete !");
        
            $.ajax({
                //URL METHOD
                type: "PATCH",
                url: "{{ route('user.store') }}"+'/'+user_id,
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
