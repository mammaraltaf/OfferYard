@extends('admin.admin.app')
@section('pageTitle') Services @endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Service Question</span>
        </h3>
    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add Service Question
            </button>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add Service Question</h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.serviceQuestionsPost') }}">
                            @csrf
                            <label class="control-label">Select Service</label>
                            <div>
                                <select class="form-select" name="service_id" aria-label="Default select example">
                                    <option selected>Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label">Enter Question</label>
                                <div>
                                    <textarea name="question" placeholder="Enter Question" class="form-control input-lg" required></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add Service Question</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{--Edit Modal--}}
        <div id="EditModalForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Edit Service Question</h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="serviceFormEdit" action="">
                            @csrf
                            <input type="hidden" name="question_id" id="question_id">
                            <label class="control-label">Select Service</label>
                            <div>
                                <select class="form-select" id="service_id" name="service_id" aria-label="Default select example">
                                    <option selected>Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label">Enter Question</label>
                                <div>
                                    <textarea name="question" id="question" placeholder="Enter Question" class="form-control input-lg" required></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Update Service Question</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="tab-content">

            {{--All Datatable--}}
            <table id="example" name="allTable" class="allTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>{{$question->service->service_name}}</td>
                        <td>
                            <a href="{{url('admin/edit-service-question',$question->id)}}" id="serviceEdit" class="btn btn-primary btn-sm"
                               data-id="{{$question->id}}" id="{{$question->id}}" data-toggle="modal" data-target="#EditModalForm">Edit</a>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal1" data-id="{{$question->id}}"
                               class="btn btn-danger delete_btn btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Question</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
            <div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{route('admin.destroyServiceQuestion')}}">
                            @csrf
                            <div class="modal-header" style="text-align: center;">
                                {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
                                {{--                            aria-hidden="true">&times;</span></button>--}}
                                <h2 class="modal-title" id="myModalLabel">Delete Question</h2>
                            </div>
                            <div class="modal-body" style="text-align: center;">

                                Are you sure you want to delete?
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
            $('#example').DataTable();

            $('body').on('click', '#serviceEdit', function () {
                var question_id = $(this).data('id');
                console.log(question_id);
                $.ajax({
                    type: "GET",
                    url: "{{url('/admin/edit-service-question/')}}"+'/'+question_id,
                    success:function (response){
                        console.log(response);
                        $('#question_id').val(response.id);
                        $('#question').val(response.question);
                        $('#service_id').prop('selectedIndex', response.service_id);
                        $('#serviceFormEdit').attr('action',"{{url('/admin/edit-service-question/')}}"+'/'+question_id);
                    }
                });
            });
        });
    </script>
@endsection
