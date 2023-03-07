@extends('admin.admin.app')
@section('pageTitle') Services @endsection
@section('content')
    <!--begin::Header-->
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Request Pool</span>
        </h3>
    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">

            {{--All Datatable--}}
            <table id="example" name="allTable" class="allTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Request Query</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Hours</th>
                    <th>User</th>
                    <th>Provider</th>
                    <th>Quote Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requestPools as $requestPool)
                        @php
                            $provider = \App\Models\Provider::where('id',$requestPool->providers_id)->first();
                            $request = \App\Models\RequestService::where('id',$requestPool->request_services_id)->first();
                        @endphp
                    <tr>
                        <td>{{$request->request_query ?? ''}}</td>
                        <td>{{$request->request_service_date ?? ''}}</td>
                        <td>{{$request->request_service_time ?? ''}}</td>
                        <td>{{$request->no_of_hours ?? ''}}</td>
                        <td>{{$request->user->first_name ?? ''}}</td>
                        <td>{{$provider->provider_business_name ?? ''}}</td>
                        <td>{{$requestPool->quote_amount ?? ''}}</td>
                        <td><span class="{{$requestPool->status == 1 ? 'badge badge-success' : 'badge badge-warning'}}">{{$requestPool->status == 1 ? 'Accepted' : 'No Response'}}</span></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Request Query</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Hours</th>
                    <th>User</th>
                    <th>Provider</th>
                    <th>Quote Amount</th>
                    <th>Status</th>
                </tr>
                </tfoot>
            </table>
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
            $('#subCategoryDropdown').prop("disabled", true);
            $('#subCategoryDropdownEdit').prop("disabled", true);
            // Hide div by setting display to none
            // $("#categoryDropdown").on('change',function() {
            //     var id = $(this).children(":selected").data('id');
            // });


            $(document).on("change","#categoryDropdown",function(){
                var category_id = $(this).val();

                $.ajax({
                    type:"GET",
                    url:"{{url('admin/getSubCategory')}}/"+category_id,
                    success:function(res){
                        $("#subCategoryDropdown").attr('disabled',false);
                        $("#subCategoryDropdown").attr('disabled',false);
                        if(res){
                            console.log(res);
                            $("#subCategoryDropdown").empty();
                            $("#subCategoryDropdown").append('<option>--Select Sub Category--</option>');
                            $.each(res,function(key,value){
                                $("#subCategoryDropdown").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                            });
                        }else{
                            $("#sub_category_id").empty();
                        }
                    }
                });
            });
            $(document).on("change","#categoryDropdownEdit",function(){
                var category_id = $(this).val();

                $.ajax({
                    type:"GET",
                    url:"{{url('admin/getSubCategory')}}/"+category_id,
                    success:function(res){
                        $("#subCategoryDropdownEdit").attr('disabled',false);
                        $("#subCategoryDropdownEdit").attr('disabled',false);
                        if(res){
                            console.log(res);
                            $("#subCategoryDropdownEdit").empty();
                            $("#subCategoryDropdownEdit").append('<option>--Select Sub Category--</option>');
                            $.each(res,function(key,value){
                                $("#subCategoryDropdownEdit").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                            });
                        }else{
                            $("#sub_category_id").empty();
                        }
                    }
                });
            });


            $('body').on('click', '#serviceEdit', function () {
                var service_id = $(this).data('id');
                console.log(service_id);
                $.ajax({
                    type: "GET",
                    url: "{{url('/admin/edit-service/')}}"+'/'+service_id,
                    success:function (response){
                        // console.log(response);
                        $('#service_id').val(response.id);
                        $('#service_name').val(response.service_name);
                        $('#categoryDropdownEdit').prop('selectedIndex', response.category_id);
                        $('#subCategoryDropdownEdit').prop('selectedIndex', response.sub_category_id);
                        $('#service_status').prop('selectedIndex', response.service_status);
                        $('#serviceFormEdit').attr('action',"{{url('/admin/edit-service/')}}"+'/'+service_id);
                    }
                });
            });
        });
    </script>
@endsection
