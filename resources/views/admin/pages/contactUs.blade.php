@extends('admin.admin.app')
@section('pageTitle')
    Contact Us
@endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Contact Us Details</span>
        </h3>

    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
{{--        <div class="row">--}}
{{--            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">--}}
{{--                Add Category--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <!-- Modal HTML Markup -->--}}
{{--        <div id="ModalLoginForm" class="modal fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h1 class="modal-title">Add Category Name</h1>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form id="categoryForm" method="POST" action="{{route('admin.categoryPost')}}"--}}
{{--                              enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">Enter Category Name</label>--}}
{{--                                <div>--}}
{{--                                    <input type="text" name="category_name" placeholder="Enter Category Name"--}}
{{--                                           class="form-control input-lg" required>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <label class="control-label">Enter Category Priority</label>--}}
{{--                                <div>--}}
{{--                                    <input type="number" name="category_priority" placeholder="Enter Category Priority"--}}
{{--                                           class="form-control input-lg" required>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <label class="control-label">Select Category Status</label>--}}
{{--                                <div>--}}
{{--                                    <select class="form-select" name="category_status" id="category_status" aria-label="Default select example">--}}
{{--                                        <option value="1" selected>Enable</option>--}}
{{--                                        <option value="2">Disable</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div>--}}
{{--                                    <button type="submit" class="btn btn-success">Add Category</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
{{--        --}}{{--Edit Modal--}}
{{--        <div id="ModalEdit" class="modal fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h1 class="modal-title">Edit Category Name</h1>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="category_id" id="category_id">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">Enter Category Name</label>--}}
{{--                                <div>--}}
{{--                                    <input type="text" name="category" id="category" placeholder="Enter Category Name"--}}
{{--                                           class="form-control input-lg" required>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <label class="control-label">Enter Category Priority</label>--}}
{{--                                <div>--}}
{{--                                    <input type="number" name="category_priority" id="cat_priority" placeholder="Enter Category Priority"--}}
{{--                                           class="form-control input-lg" required>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <label class="control-label">Select Category Status</label>--}}
{{--                                <div>--}}
{{--                                        <select id="cat_status" class="form-control" name="cat_status" style="width: 100%; height:100%;" tabindex="-1" aria-hidden="true" required>--}}
{{--                                            <option selected="selected" name="" id="0" >--Select Status--</option>--}}
{{--                                        <option value="1" data-id="1">Enable</option>--}}
{{--                                        <option value="2" data-id="2">Disable</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div>--}}
{{--                                    <button type="submit" class="btn btn-success">Update Category</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
        <div class="tab-content">

            {{--All Datatable--}}
            <table id="categoryTable" name="categoryTable" class="allTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Report Type</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactUsDetails as $contactUsDetail)
                    <tr>
                        <td>{{$contactUsDetail->name ?? ''}}</td>
                        <td>{{$contactUsDetail->mobile ?? ''}}</td>
                        <td>{{$contactUsDetail->report_type ?? ''}}</td>
                        <td>{{$contactUsDetail->message ?? ''}}</td>
                        <td>{{$contactUsDetail->created_at ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Report Type</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
{{--                {!! Form::open( array(--}}
{{--                  'url' => route('admin.destroyCategory', array(), false),--}}
{{--                  'method' => 'post',--}}
{{--                  'role' => 'form' )) !!}--}}

                <form method="post" action="{{route('admin.destroyCategory')}}">
                    @csrf
                <div class="modal-header" style="text-align: center;">
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
{{--                            aria-hidden="true">&times;</span></button>--}}
                    <h2 class="modal-title" id="myModalLabel">Delete</h2>
                </div>
                <div class="modal-body" style="text-align: center;">

                    Are you sure you want to delete ?
                    <input type="hidden" name="id" class="user-delete" value=""/>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </form>
{{--                {!! Form::close() !!}--}}

            </div>
        </div>
    </div>

    <!--end::Body-->
@endsection
@section('script')
    <script type="text/javascript">
        $('.delete_btn').click(function () {
            var a = $(this).data('id');
            $('.user-delete').val(a);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#categoryTable').DataTable();
        });
        $('body').on('click', '#categoryEdit', function () {
            var category_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('/admin/edit-category/')}}"+'/'+category_id,
                success:function (response){
                    console.log(response);
                    $('#category_id').val(response.id);
                    $('#category').val(response.category_name);
                    $('#cat_priority').val(response.category_priority);
                    $('#cat_status').prop('selectedIndex', response.category_status);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-category/')}}"+'/'+category_id);
                }
            });
        });

    </script>
@endsection
