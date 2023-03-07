@extends('admin.admin.app')
@section('pageTitle')
    Provider
@endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">
        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Providers </span>
            <ul class="nav pl-5" style="float: right; !important">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-info fw-bolder px-4 me-1 active" id="approvedProviderTab" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_day">Approved Providers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-success fw-bolder px-4 me-1" id="newProviderTab" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_week">New Providers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-danger fw-bolder px-4 me-1" id="declineProviderTab" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_week">Declined Providers</a>
                </li>
            </ul>
        </h3>

    </div>

    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">

            {{--Approve providers--}}
            <table id="approvedProviderTable" name="approvedProviderTable" class="approvedProviderTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Provider Business Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($approvedProviders as $provider)
                    <tr>
                        <td>{{$provider->provider_business_name}}</td>
                        <td>{{$provider->email}}</td>
                        <td><span class="{{$provider->is_approved == 1 ? 'badge badge-success' : 'badge badge-warning'}}">{{$provider->is_approved == 1 ? 'Approved' : 'Pending'}}</span></td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" id="providerEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$provider->id}}">Edit</a>

                            <a id="deleteBtn" data-toggle="modal" data-target=".modal2" data-id="{{$provider->id}}"
                               class="btn btn-danger decline_btn btn-sm">Decline</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Provider Business Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>

            {{--New providers--}}
            <table id="newProviderTable" name="newProviderTable" class="newProviderTable table table-striped table-bordered dt-responsive nowrap d-none" style="width:100%">
                <thead>
                <tr>
                    <th>Provider Business Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pendingProviders as $provider)
                    <tr>
                        <td>{{$provider->provider_business_name}}</td>
                        <td>{{$provider->email}}</td>
                        <td><span class="{{$provider->is_approved == 1 ? 'badge badge-success' : 'badge badge-warning'}}">{{$provider->is_approved == 1 ? 'Approved' : 'Pending'}}</span></td>

                        <td>
                            <a href="" class="btn btn-primary btn-sm" id="providerEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$provider->id}}">Edit</a>

                            <a id="approve_btn" data-toggle="modal" data-target=".modal1" data-id="{{$provider->id}}"
                               class="btn btn-success approve_btn btn-sm">Approve</a>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal2" data-id="{{$provider->id}}"
                               class="btn btn-danger decline_btn btn-sm">Decline</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Provider Business Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>

            {{--Declined providers--}}
            <table id="declineProviderTable" name="declineProviderTable" class="declineProviderTable table table-striped table-bordered dt-responsive nowrap d-none" style="width:100%">
                <thead>
                <tr>
                    <th>Provider Business Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($declineProviders as $provider)
                    <tr>
                        <td>{{$provider->provider_business_name}}</td>
                        <td>{{$provider->email}}</td>
                        <td><span class="{{$provider->is_approved == 2 ? 'badge badge-danger' : 'badge badge-warning'}}">{{$provider->is_approved == 2 ? 'Declined' : 'Pending'}}</span></td>

                        <td>
                            <a href="" class="btn btn-primary btn-sm" id="providerEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$provider->id}}">Edit</a>

                            <a id="approve_btn" data-toggle="modal" data-target=".modal1" data-id="{{$provider->id}}"
                               class="btn btn-success approve_btn btn-sm">Approve</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Provider Business Name</th>
                    <th>Email</th>
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
                <form method="post" action="{{route('admin.declineProvider')}}">
                    @csrf
                    <div class="modal-header" style="text-align: center;">
                        <h2 class="modal-title" id="myModalLabel">Decline</h2>
                    </div>
                    <div class="modal-body" style="text-align: center;">

                        Are you sure you want to decline provider request ?
                        <input type="hidden" name="id" class="decline-provider" value=""/>
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="ModalEdit" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit Provider</h1>
                </div>
                <div class="modal-body">
                    <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="provider_id" id="provider_id">
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
                            <label class="control-label">Provider Business Name</label>
                            <div>
                                <input type="text" name="provider_business_name" id="provider_business_name" placeholder="Enter Provider Business Name"
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
                                <button type="submit" class="btn btn-success">Update Provider</button>
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

            $("#approvedProviderTab").click(function(){
                $(".newProviderTable").addClass('d-none');
                $(".approvedProviderTable").removeClass('d-none');
                $(".declineProviderTable").addClass('d-none');
                $('#approvedProviderTable').DataTable();
                $('#newProviderTable').DataTable().destroy();
                $('#declineProviderTable').DataTable().destroy();

            });

            // Toggle div display
            $("#newProviderTab").click(function(){
                $(".newProviderTable").removeClass('d-none');
                $(".approvedProviderTable").addClass('d-none');
                $(".declineProviderTable").addClass('d-none');
                $('#approvedProviderTable').DataTable().destroy();
                $('#newProviderTable').DataTable();
                $('#declineProviderTable').DataTable().destroy();
            });

            $("#declineProviderTab").click(function(){
                $(".newProviderTable").addClass('d-none');
                $(".approvedProviderTable").addClass('d-none');
                $(".declineProviderTable").removeClass('d-none');
                $('#approvedProviderTable').DataTable().destroy();
                $('#newProviderTable').DataTable().destroy();
                $('#declineProviderTable').DataTable();
            });
        });
        $('body').on('click', '#providerEdit', function () {
            var provider_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('/admin/edit-provider/')}}"+'/'+provider_id,
                success:function (response){
                    console.log(response);
                    $('#provider_id').val(response.id);
                    $('#first_name').val(response.first_name);
                    $('#last_name').val(response.last_name);
                    $('#provider_business_name').val(response.provider_business_name);
                    $('#mobile').val(response.mobile);
                    $('#categoryFormEdit').attr('action',"{{url('/admin/edit-provider/')}}"+'/'+provider_id);
                }
            });
        });

    </script>
@endsection
