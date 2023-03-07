@extends('admin.admin.app')
@section('pageTitle')
    Category
@endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Sub Category</span>
        </h3>

    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add Sub Category
            </button>
        </div>

        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add Sub Category</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" method="POST" action="{{route('admin.subCategoryPost')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter Sub Category Name</label>
                                <div>
                                    <input type="text" name="subcategory_name" placeholder="Enter Category Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Select Category</label>
                                <div>
                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Select Sub Category Status</label>
                                <div>
                                    <select class="form-select" name="subcategory_status" aria-label="Default select example">
                                        <option selected>Select Status</option>
                                        <option value="1" selected>Enable</option>
                                        <option value="2">Disable</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Sub Category Image</label>
                                <div class="form-group">
                                    <div>
                                        <input type="hidden" name="imageName" value="">
                                        <img id="img-preview" src="{{asset('public/images/photo1.png')}}" alt="" style="height: 150px; display: block;">
                                        <input style="width: 120px; opacity: 0.01; cursor: pointer;" id="file1" type="file" class="form-control" name="subcategory_image" value="" />
                                        <label style="margin-top: -30px; padding: 7px; background: #1ab394; width: 120px; padding-left: 15px; color: white; display: block;">Upload Image</label>
                                        {{--                                    <input type="file" name="image" id="editImage" class="form-control input-lg" required>--}}
                                    </div>
                                </div>
                                {{--                                    <input type="file" name="subcategory_image" class="form-control input-lg" required>--}}
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add Sub Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{--Edit Modal--}}
        <div id="ModalEdit" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Edit Sub Category</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sub_category_id" id="sub_category_id">
                            <div class="form-group">
                                <label class="control-label">Enter Sub Category Name</label>
                                <div>
                                    <input type="text" name="subcategory_name" id="subcategory_name" placeholder="Enter Category Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Select Category</label>
                                <div>
                                    <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Select Sub Category Status</label>
                                <div>
                                    <select class="form-select" name="subcategory_status" id="subcategory_status" aria-label="Default select example">
                                        <option selected>Select Status</option>
                                        <option value="1" selected>Enable</option>
                                        <option value="2">Disable</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Sub Category Image</label>
                                <div>
                                    <div class="form-group">
                                        <div>
                                            <input type="hidden" name="imageName" value="">
                                            <img id="img-preview-edit" src="" alt="" style="height: 150px; display: block;">
                                            <input style="width: 120px; opacity: 0.01; cursor: pointer;" id="file2" type="file" class="form-control" name="subcategory_image" value="" />
                                            <label style="margin-top: -30px; padding: 7px; background: #1ab394; width: 120px; padding-left: 15px; color: white; display: block;">Change Image</label>
                                            {{--                                    <input type="file" name="image" id="editImage" class="form-control input-lg" required>--}}
                                        </div>
                                    </div>
                                    {{--                                    <input type="file" name="subcategory_image" id="subcategory_image" class="form-control input-lg">--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Update Sub Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="tab-content">

            {{--All Datatable--}}
            <table id="categoryTable" name="categoryTable" class="table table-striped table-bordered dt-responsive nowrap allTable" style="width:100%">
                <thead>
                <tr>
                    <th>Sub Category</th>
                    <th>Category</th>
                    <th>Picture</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subCategories as $subcategory)
                    <tr>
                        <td>{{$subcategory->subcategory_name}}</td>
                        <td>{{$subcategory->category->category_name}}</td>
                        <td><img src="{{$subcategory->subcategory_image}}" alt="" style="height: 50px;"></td>
                        <td><span class="{{$subcategory->subcategory_status == 1 ? 'badge badge-success' : 'badge badge-danger'}}">{{$subcategory->subcategory_status == 1 ? 'Enable' : 'Disable'}}</span></td>

                        <td><a href="" class="btn btn-primary btn-sm" id="categoryEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$subcategory->id}}">Edit</a>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal1" data-id="{{$subcategory->id}}"
                               class="btn btn-danger delete_btn btn-sm">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Sub Category</th>
                    <th>Category</th>
                    <th>Picture</th>
                    <th>Status</th>
                    <th>Action</th>
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

                <form method="post" action="{{route('admin.destroySubCategory')}}">
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
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
            var sub_category_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('/admin/edit-sub-category/')}}"+'/'+sub_category_id,
                success:function (response){
                    console.log(response);
                    $('#sub_category_id').val(response.id);
                    $('#subcategory_name').val(response.subcategory_name);
                    $('#category_id').prop('selectedIndex', response.category_id);
                    $('#subcategory_status').prop('selectedIndex', response.subcategory_status);
                    $('#img-preview-edit').attr('src', response.subcategory_image);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-sub-category/')}}"+'/'+sub_category_id);
                }
            });
        });

    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file1").change(function() {
            readURL(this);
        });

        $("#file2").change(function() {
            readURL2(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-preview-edit').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection