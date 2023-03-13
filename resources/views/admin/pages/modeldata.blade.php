@extends('admin.admin.app')
@section('pageTitle')
    Model
@endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Models</span>
        </h3>

    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add Model
            </button>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add Model</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" method="POST" action="{{route('admin.modelPost')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Select Category</label>
                                <div>
                                    <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <label class="control-label">Select Brand</label>
                                <div>
{{--                                    <select class="form-select" name="brand_id" id="brand_id" aria-label="Default select example" disabled>--}}
{{--                                    </select>--}}
                                    <select class="form-control" id="brand_id" name="brand_id"></select>

                                </div>
                                <br>


                                <label class="control-label">Enter Model Name</label>
                                <div>
                                    <input type="text" name="title" placeholder="Enter Model Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Model Image</label>
                                <div>
                                    <input type="file" name="model_image" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Select Model Status</label>
                                <div>
                                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                                        <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}" selected>Enable</option>
                                        <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add Model</button>
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
                        <h1 class="modal-title">Edit Model</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="category_id" id="category_id">
                            <div class="form-group">
                                <label class="control-label">Select Category</label>
                                <div>
                                    <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <label class="control-label">Select Brand</label>
                                <div>
                                    {{--                                    <select class="form-select" name="brand_id" id="brand_id" aria-label="Default select example" disabled>--}}
                                    {{--                                    </select>--}}
                                    <select class="form-control" id="brand_id" name="brand_id"></select>

                                </div>
                                <br>


                                <label class="control-label">Enter Model Name</label>
                                <div>
                                    <input type="text" name="title" placeholder="Enter Model Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Model Image</label>
                                <div>
                                    <input type="file" name="model_image" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Select Model Status</label>
                                <div>
                                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                                        <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}" selected>Enable</option>
                                        <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Update Model</button>
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->title}}</td>
                        <td>{{$model->category->title}}</td>
                        <td>{{$model->brand->title}}</td>
                        <td><span class="{{$model->status == \App\Classes\Enums\StatusEnum::Active ? 'badge badge-success' : 'badge badge-danger'}}">{{$model->status == \App\Classes\Enums\StatusEnum::Active ? 'Enable' : 'Disable'}}</span></td>

                        <td><a href="" class="btn btn-primary btn-sm" id="modelEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$model->id}}">Edit</a>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal1" data-id="{{$model->id}}"
                               class="btn btn-danger delete_btn btn-sm">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
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
                <form method="post" action="{{route('admin.destroyCategory')}}">
                    @csrf
                <div class="modal-header" style="text-align: center;">
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

        $('#category_id').on('change', function() {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: '/admin/get-brands/'+category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#brand_id').empty();
                        $.each(data, function(key, value) {
                            $('#brand_id').append('<option value="'+value.id+'">'+value.title+'</option>');
                        });
                    }
                });
            } else {
                $('#brand_id').empty();
            }
        });



        $('body').on('click', '#categoryEdit', function () {
            var category_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('/admin/edit-category/')}}"+'/'+category_id,
                success:function (response){
                    console.log(response);
                    $('#category_id').val(response.id);
                    $('#category').val(response.title);
                    $('#cat_status').prop('selectedIndex', response.status);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-category/')}}"+'/'+category_id);
                }
            });
        });

    </script>
@endsection
