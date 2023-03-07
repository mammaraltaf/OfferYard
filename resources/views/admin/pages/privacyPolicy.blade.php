@extends('admin.admin.app')
@section('pageTitle') Services @endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Privacy Policy</span>
        </h3>
    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add Privacy Policy
            </button>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add Privacy Policy</h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.privacyPolicyPost') }}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter Title</label>
                                <div>
                                    <input type="text" name="title"  placeholder="Enter title" class="form-control input-lg" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label">Enter Description</label>
                                <div>
                                    <textarea name="description" placeholder="Enter Description" class="form-control input-lg" required></textarea>
                                </div>
                            </div>
                            <br>
                            <label class="control-label">Select Privacy Policy Status</label>
                            <div>
                                <select class="form-control" name="status" style="width: 100%; height:100%;" tabindex="-1" aria-hidden="true" required>
                                    <option selected="selected" name="" id="0" >--Select Status--</option>
                                    <option value="1" data-id="1">Enable</option>
                                    <option value="0" data-id="0">Disable</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add Privacy Policy</button>
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
                        <h1 class="modal-title">Edit Privacy Policy</h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="serviceFormEdit" action="">
                            @csrf
                            <input type="hidden" name="privacyPolicyId" id="privacyPolicyId">
                            <div class="form-group">
                                <label class="control-label">Enter Title</label>
                                <div>
                                    <input type="text" name="title" id="title"  placeholder="Enter Title" class="form-control input-lg" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label">Enter Description</label>
                                <div>
                                    <textarea name="description" id="description" placeholder="Enter Description" class="form-control input-lg" required></textarea>
                                </div>
                            </div>
                            <br>
                            <label class="control-label">Select Service Status</label>
                            <div>
                                <select id="status" class="form-control" name="status" style="width: 100%; height:100%;" tabindex="-1" aria-hidden="true" required>
                                    <option selected="selected" name="" id="0" >--Select Status--</option>
                                    <option value="1" data-id="1">Enable</option>
                                    <option value="0" data-id="0">Disable</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Update Privacy Policy</button>
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
                    <th>Title</th>
{{--                    <th>Description</th>--}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($privacyPolicy as $privacyPol)
                    <tr>
                        <td>{{$privacyPol->title}}</td>
{{--                        <td width="100px">{{$privacyPol->description}}</td>--}}
                        <td><span class="{{$privacyPol->status == 1 ? 'badge badge-success' : 'badge badge-danger'}}">{{$privacyPol->status == 1 ? 'Enable' : 'Disable'}}</span></td>
                        <td>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal1" data-id="{{$privacyPol->id}}"
                               class="{{$privacyPol->status == 1 ? '' : 'btn btn-sm btn-success'}} delete_btn">{{$privacyPol->status == 1 ?  '' : 'Enable'}}</a>
                            <a href="{{url('admin/edit-privacy-policy',$privacyPol->id)}}" id="serviceEdit" class="btn btn-primary btn-sm"
                               data-id="{{$privacyPol->id}}" id="{{$privacyPol->id}}" data-toggle="modal" data-target="#EditModalForm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Title</th>
{{--                    <th>Description</th>--}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
            <div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        {{--                {!! Form::open( array(--}}
                        {{--                  'url' => route('admin.destroyCategory', array(), false),--}}
                        {{--                  'method' => 'post',--}}
                        {{--                  'role' => 'form' )) !!}--}}

                        <form method="post" action="{{route('admin.changePrivacyPolicyStatus')}}">
                            @csrf
                            <div class="modal-header" style="text-align: center;">
                                {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
                                {{--                            aria-hidden="true">&times;</span></button>--}}
                                <h2 class="modal-title" id="myModalLabel">Change Status</h2>
                            </div>
                            <div class="modal-body" style="text-align: center;">

                                Are you sure you want to Enable this and Disable the Enabled One?
                                <input type="hidden" name="id" class="user-delete" value=""/>
                            </div>
                            <div class="modal-footer" style="text-align: center;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Change Status</button>
                            </div>
                        </form>
                        {{--                {!! Form::close() !!}--}}

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
                var termsAndConditions_id = $(this).data('id');
                console.log(termsAndConditions_id);
                $.ajax({
                    type: "GET",
                    url: "{{url('/admin/edit-privacy-policy/')}}"+'/'+termsAndConditions_id,
                    success:function (response){
                        console.log(response);
                        $('#privacyPolicyId').val(response.id);
                        $('#title').val(response.title);
                        $('#description').val(response.description);
                        $('#status').prop('selectedIndex', response.status);
                        $('#serviceFormEdit').attr('action',"{{url('/admin/edit-privacy-policy/')}}"+'/'+termsAndConditions_id);
                    }
                });
            });
        });
    </script>
@endsection
