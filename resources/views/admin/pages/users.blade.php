@extends('admin.admin.app')
@section('pageTitle')
    User Management
@endsection
@section('content')
    <!--begin::Header-->
    <br>


    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add User
            </button>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add User</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" action="{{route('admin.userPost')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter Name</label>
                                <div>
                                    <input type="text" name="name" placeholder="Enter Name"
                                           class="form-control input-lg" required>
                                </div>

                                <br>
                                <label class="control-label">Enter Email</label>

                                <div>
                                    <input type="email" name="email" placeholder="Enter Email"
                                           class="form-control input-lg" required>
                                </div>

                                <br>
                                <label class="control-label">Enter Phone</label>
                                <div>
                                    <input type="text" name="phone" placeholder="Enter phone"
                                           class="form-control input-lg" required>
                                </div>

                                <br>
                                <label class="control-label">Enter Password</label>
                                <div>
                                    <input type="password" name="password" placeholder="Enter password"
                                           class="form-control input-lg" required>
                                </div>

                                <br>
                                <label class="control-label">Select User Status</label>
                                <div>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}" selected>Enable</option>
                                        <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="tab-content">
            <table id="approvedProviderTable" name="approvedProviderTable" class="approvedProviderTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" id="providerEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$user->id}}">Edit</a>

                            <a id="deleteBtn" data-toggle="modal" data-target=".modal2" data-id="{{$user->id}}"
                               class="btn btn-danger delete_btn btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('admin.destroyUser')}}">
{{--                <form method="post" action="#">--}}
                    @csrf
                    <div class="modal-header" style="text-align: center;">
                        <h2 class="modal-title" id="myModalLabel">Delete</h2>
                    </div>
                    <div class="modal-body" style="text-align: center;">

                        Are you sure you want to delete user ?
                        <input type="hidden" name="id" class="delete-user" value=""/>
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
                            <label class="control-label">Enter Name</label>
                            <div>
                                <input type="text" name="name" id="name" placeholder="Enter Name"
                                       class="form-control input-lg" required>
                            </div>

                            <br>
                            <label class="control-label">Enter Email</label>

                            <div>
                                <input type="email" name="email" id="email" placeholder="Enter Email"
                                       class="form-control input-lg" disabled>
                            </div>

                            <br>
                            <label class="control-label">Enter Phone</label>
                            <div>
                                <input type="text" name="phone" id="phone" placeholder="Enter phone"
                                       class="form-control input-lg" required>
                            </div>

{{--                            <br>--}}
{{--                            <label class="control-label">Enter Password</label>--}}
{{--                            <div>--}}
{{--                                <input type="password" name="password" id="password" placeholder="Enter password"--}}
{{--                                       class="form-control input-lg" required>--}}
{{--                            </div>--}}

                            <br>
                            <label class="control-label">Select User Status</label>
                            <div>
                                <select class="form-select" name="status" id="status" aria-label="Default select example">
                                    <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}" selected>Enable</option>
                                    <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>

                                </select>
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

    <script type="text/javascript">
        $('.delete_btn').click(function () {
            var a = $(this).data('id');
            $('.delete-user').val(a);
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
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#phone').val(response.phone);
                    $('#status').prop('selectedIndex', response.status);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-user/')}}"+'/'+user_id);
                }
            });
        });

    </script>
@endsection
