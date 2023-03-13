@extends('admin.admin.app')
@section('pageTitle')
    Offer
@endsection
@section('content')
    <!--begin::Header-->

    <style>
        .form-control{ padding: 0rem 1rem !important; }
    </style>
    <br>
    <div class="card-header pt-5">

        <h3 class="card-title">
            <span class="card-label fw-bolder fs-3 mb-1">Manage Offers</span>
        </h3>

    </div>
    <div class="card-toolbar">
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                Add Offer
            </button>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add Offer Name</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" method="POST" action="{{route('admin.categoryPost')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter Offer Name</label>
                                <div>
                                    <input type="text" name="title" placeholder="Enter Name Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Category</label>
                                <div>
                                    <select class="form-control" name="category" id="categoryid">
                                        <option value="Category1">Category 1</option>
                                        <option value="Category2">Category 2</option>
                                        <option value="Category3">Category 3</option>
                                        <option value="Category4">Category 4</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Brand</label>
                                <div>
                                    <select class="form-control" name="brand" id="brandid">
                                        <option value="Brand1">Brand 1</option>
                                        <option value="Brand2">Brand 2</option>
                                        <option value="Brand3">Brand 3</option>
                                        <option value="Brand4">Brand 4</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Price</label>
                                <div>
                                    <input type="text" name="price" placeholder="Enter Price here" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Auction End Date</label>
                                <div>
                                    <input type="date" name="auctiondate" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Active Comment</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">Active</label>
                                    </div>
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">Inactive</label>
                                    </div>
                                </div>
                                <br>
                                <label class="control-label">Address</label>
                                <div>
                                    <input type="text" name="auctiondate" class="form-control input-lg" placeholder="Enter Address" required>
                                </div>
                                <br>
                                <label class="control-label">Latitude & Longitude</label>
                                <div>
                                    <input type="text" name="auctiondate" class="form-control input-lg" placeholder="Enter Latitude and Longitude" required>
                                </div>
                                <br>
                                <label class="control-label">Offer Image</label>
                                <div>
                                    <input type="file" name="model_image" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Select Offer Status</label>
                                <div>
                                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                                        <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}" selected>Enable</option>
                                        <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Description</label>
                                <div>
                                    <textarea class="form-select" name="status" required placeholder="Enter Description here" rows="5"></textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Add Offer</button>
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
                        <h1 class="modal-title">Edit Offer Name</h1>
                    </div>
                    <div class="modal-body">
                        <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="category_id" id="category_id">
                            <div class="form-group">
                                <label class="control-label">Enter Offer Name</label>
                                <div>
                                    <input type="text" name="category" id="category" placeholder="Enter Category Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Offer Image</label>
                                <div>
                                    <input type="file" name="category_image" id="category_image" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Select Offer Status</label>
                                <div>
                                        <select id="cat_status" class="form-control" name="cat_status" style="width: 100%; height:100%;" tabindex="-1" aria-hidden="true" required>
                                            <option selected="selected" name="" id="0" >--Select Status--</option>
                                        <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}">Enable</option>
                                        <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Update Offer</button>
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
                    <th>Model</th>
                    <th>Price</th>
                    <th>Auction Date</th>
                    <th>Comment</th>
                    <th>Lat & Lon</th>
                    <th>Pic</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->title}}</td>
                        <td><span class="{{$offer->status == \App\Classes\Enums\StatusEnum::Active ? 'badge badge-success' : 'badge badge-danger'}}">{{$offer->status == \App\Classes\Enums\StatusEnum::Active ? 'Enable' : 'Disable'}}</span></td>
                        <td><a href="" class="btn btn-primary btn-sm" id="modelEdit"  data-toggle="modal" data-target="#ModalEdit" data-id="{{$offer->id}}">Edit</a>
                            <a id="deleteBtn" data-toggle="modal" data-target=".modal1" data-id="{{$offer->id}}"
                               class="btn btn-danger delete_btn btn-sm">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Auction Date</th>
                    <th>Comment</th>
                    <th>Lat & Lon</th>
                    <th>Pic</th>
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
