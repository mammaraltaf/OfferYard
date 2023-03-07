@extends('admin.admin.app')
@section('pageTitle')
    Category
@endsection
@section('content')
    <!--begin::Header-->
    <br>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">
            <table id="approvedProviderTable" name="approvedProviderTable" class="approvedProviderTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" id="providerEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$user->id}}">Edit</a>

                            <a id="deleteBtn" data-toggle="modal" data-target=".modal2" data-id="{{$user->id}}"
                               class="btn btn-danger decline_btn btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('admin.approvedProvider')}}">
                    @csrf
                    <div class="modal-header" style="text-align: center;">
                        <h2 class="modal-title" id="myModalLabel">Approve</h2>
                    </div>
                    <div class="modal-body" style="text-align: center;">

                        Are you sure you want to approve provider request ?
                        <input type="hidden" name="id" class="approve-provider" value=""/>
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('admin.destroyUser')}}">
                    @csrf
                    <div class="modal-header" style="text-align: center;">
                        <h2 class="modal-title" id="myModalLabel">Delete</h2>
                    </div>
                    <div class="modal-body" style="text-align: center;">

                        Are you sure you want to delete user ?
                        <input type="hidden" name="id" class="decline-provider" value=""/>
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="ModalEdit" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit User</h1>
                </div>
                <div class="modal-body">
                    <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <div>
                                <input type="text" name="first_name" id="first_name" placeholder="Enter First Name"
                                       class="form-control input-lg" required>
                            </div>
                            <br>
                            <label class="control-label">Last Name</label>
                            <div>
                                <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name"
                                       class="form-control input-lg" required>
                            </div>
                            <br>
                            <label class="control-label">Email</label>
                            <div>
                                <input disabled type="text" name="email" id="email" placeholder="Enter Email"
                                       class="form-control input-lg" required>
                            </div>
                            <br>
                            <label class="control-label">Mobile</label>
                            <div>
                                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number"
                                       class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--end::Body-->
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script type="text/javascript">
        $('.approve_btn').click(function () {
            var a = $(this).data('id');
            $('.approve-provider').val(a);
        });

        $('.decline_btn').click(function () {
            var a = $(this).data('id');
            $('.decline-provider').val(a);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#approvedProviderTable').DataTable();
        });
        $('body').on('click', '#providerEdit', function () {
            var user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('/admin/edit-user/')}}"+'/'+user_id,
                success:function (response){
                    console.log(response);
                    $('#user_id').val(response.id);
                    $('#first_name').val(response.first_name);
                    $('#last_name').val(response.last_name);
                    $('#email').val(response.email);
                    $('#mobile').val(response.mobile);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-user/')}}"+'/'+user_id);
                }
            });
        });

    </script>
@endsection
