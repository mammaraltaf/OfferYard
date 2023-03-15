@extends('admin.admin.app')
@section('pageTitle')
    Email Template
@endsection
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Email Template</span>
        </h3>

    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add Email Template
            </button>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add Email Template</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" method="POST" action="{{route('admin.emailTemplatePost')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter Email Template Title</label>
                                <div>
                                    <input type="text" name="title" placeholder="Enter Email Template Title"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Enter Email Template</label>
                                <div>
                                    <textarea class="summernote" id="summernote" name="email_body"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add Email Template</button>
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
                        <h1 class="modal-title">Edit Email Template</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="email_template_id" id="category_id">
                            <div class="form-group">
                                <label class="control-label">Enter Email Template Title</label>
                                <div>
                                    <input type="text" name="title" id="title" placeholder="Enter Email Template Title"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Enter Email Template</label>
                                <div>
                                    <textarea class="summernote" id="email_body" name="email_body"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Update Category</button>
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
                    <th>Id</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($emailTemplates as $emailTemplate)
                    <tr>
                        <td>{{$emailTemplate->id}}</td>
                        <td>{{$emailTemplate->title}}</td>
                        <td>
                            <a href="" class="btn btn-secondary btn-sm" id="view"  data-toggle="modal" data-target="#view" data-id="{{$emailTemplate->id}}">View</a>
{{--                            <a href="" class="btn btn-outline-info btn-sm" id="categoryEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$emailTemplate->id}}">Send To Users</a>--}}
                            <a href="" class="btn btn-primary btn-sm" id="categoryEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$emailTemplate->id}}">Edit</a>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal1" data-id="{{$emailTemplate->id}}"
                               class="btn btn-danger delete_btn btn-sm">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('admin.destroyEmailTemplate')}}">
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $('.delete_btn').click(function () {
            var a = $(this).data('id');
            $('.user-delete').val(a);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#categoryTable').DataTable();
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                ],
            });
        });
        $('body').on('click', '#categoryEdit', function () {
            var category_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('/admin/edit-email-template/')}}"+'/'+category_id,
                success:function (response){
                    console.log(response);
                    $('#category_id').val(response.id);
                    $('#title').val(response.title);
                    var responseData = response.body;
                    $('#email_body').summernote('code', responseData);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-email-template/')}}"+'/'+category_id);
                }
            });
        });

    </script>
@endsection
