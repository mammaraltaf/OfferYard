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
                        <form id="categoryForm" method="POST" action="{{route('admin.offerPost')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter Offer Name</label>
                                <div>
                                    <input type="text" name="title" placeholder="Enter Offer Name"
                                           class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Category</label>
                                <div>
                                    <select class="form-control" name="category" id="categoryid" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Brand</label>
                                <div>
                                    <select class="form-control" name="brand" id="brandid" required>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Model</label>
                                <div>
                                    <select class="form-control" name="moddel" id="modelid" required>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Purchasing Year</label>
                                <div>
                                    <select class="form-control" name="purchase_year" id="purchase_year" required>
                                        @foreach($purchaseYears as $purchaseYear)
                                            <option value="{{$purchaseYear->id}}">{{$purchaseYear->year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <label class="control-label">Price</label>
                                <div>
                                    <input type="number" name="price" placeholder="Enter Price here" class="form-control input-lg" required>
                                </div>
                                <br>
                                <label class="control-label">Auction End Date</label>
                                <div>
                                    <input type="date" name="auction_date" class="form-control input-lg" min="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <br>
                                <label class="control-label">The Price is Fixed</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="isPriceFixed" id="isPriceFixed1" value="{{\App\Classes\Enums\StatusEnum::Active}}" checked>
                                        <label class="form-check-label" for="isPriceFixed1">Active</label>
                                    </div>
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="isPriceFixed" id="isPriceFixed2" value="{{\App\Classes\Enums\StatusEnum::Inactive}}">
                                        <label class="form-check-label" for="isPriceFixed2">Inactive</label>
                                    </div>
                                </div>
                                <br>

                                <label class="control-label">Active Comment Section</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="activeCommentSection" id="activeCommentSection1" value="{{\App\Classes\Enums\StatusEnum::Active}}" checked>
                                        <label class="form-check-label" for="activeCommentSection1">Active</label>
                                    </div>
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="activeCommentSection" id="activeCommentSection2" value="{{\App\Classes\Enums\StatusEnum::Inactive}}">
                                        <label class="form-check-label" for="activeCommentSection2">Inactive</label>
                                    </div>
                                </div>
                                <br>

                                <label class="control-label">Show Location of Product</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="is_show_location_product" id="is_show_location_product1" value="{{\App\Classes\Enums\StatusEnum::Active}}" checked>
                                        <label class="form-check-label" for="is_show_location_product1">Active</label>
                                    </div>
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="is_show_location_product" id="is_show_location_product2" value="{{\App\Classes\Enums\StatusEnum::Inactive}}">
                                        <label class="form-check-label" for="is_show_location_product2">Inactive</label>
                                    </div>
                                </div>
                                <br>

                                <label class="control-label">Hand to Hand</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="is_hand_to_hand" id="is_hand_to_hand1" value="{{\App\Classes\Enums\StatusEnum::Active}}" checked>
                                        <label class="form-check-label" for="is_hand_to_hand1">Active</label>
                                    </div>
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="is_hand_to_hand" id="is_hand_to_hand2" value="{{\App\Classes\Enums\StatusEnum::Inactive}}">
                                        <label class="form-check-label" for="is_hand_to_hand2">Inactive</label>
                                    </div>
                                </div>
                                <br>

                                <label class="control-label">Shipping to Buyers</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="is_shipping_to_buyer" id="is_shipping_to_buyer1" value="{{\App\Classes\Enums\StatusEnum::Active}}" checked>
                                        <label class="form-check-label" for="is_shipping_to_buyer1">Active</label>
                                    </div>
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="is_shipping_to_buyer" id="is_shipping_to_buyer2" value="{{\App\Classes\Enums\StatusEnum::Inactive}}">
                                        <label class="form-check-label" for="is_shipping_to_buyer2">Inactive</label>
                                    </div>
                                </div>
                                <br>

                                <label class="control-label">Address</label>
                                <div>
                                    <input type="text" name="address" class="form-control input-lg" placeholder="Enter Address" required>
                                </div>
                                <br>
                                <label class="control-label">Offer Image</label>
                                <div>
                                    <input type="file" name="offer_image[]" class="form-control input-lg" multiple="multiple" required>
                                </div>
                                <br>

                                <label class="control-label">Offer Item</label>
                                <div class="row m-0">
                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="offerItem" id="offerItem1" value="{{\App\Classes\Enums\OfferTypesEnum::OfferPrice}}" checked>
                                        <label class="form-check-label" for="offerItem1">{{\App\Classes\Enums\OfferTypesEnum::OfferPrice}}</label>
                                    </div>

                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="offerItem" id="offerItem2" value="{{\App\Classes\Enums\OfferTypesEnum::OfferAuction}}" checked>
                                        <label class="form-check-label" for="offerItem2">{{\App\Classes\Enums\OfferTypesEnum::OfferAuction}}</label>
                                    </div>

                                    <div class="form-check" style="width:auto;">
                                        <input class="form-check-input" type="radio" name="offerItem" id="offerItem3" value="{{\App\Classes\Enums\OfferTypesEnum::OfferFree}}">
                                        <label class="form-check-label" for="offerItem3">{{\App\Classes\Enums\OfferTypesEnum::OfferFree}}</label>
                                    </div>
                                </div>
                                <br>


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
{{--        <div id="ModalEdit" class="modal fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h1 class="modal-title">Edit Offer Name</h1>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form id="categoryFormEdit" method="POST" action="" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="category_id" id="category_id">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">Enter Offer Name</label>--}}
{{--                                <div>--}}
{{--                                    <input type="text" name="category" id="category" placeholder="Enter Category Name"--}}
{{--                                           class="form-control input-lg" required>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <label class="control-label">Offer Image</label>--}}
{{--                                <div>--}}
{{--                                    <input type="file" name="category_image" id="category_image" class="form-control input-lg" required>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <label class="control-label">Select Offer Status</label>--}}
{{--                                <div>--}}
{{--                                        <select id="cat_status" class="form-control" name="cat_status" style="width: 100%; height:100%;" tabindex="-1" aria-hidden="true" required>--}}
{{--                                            <option selected="selected" name="" id="0" >--Select Status--</option>--}}
{{--                                        <option value="{{\App\Classes\Enums\StatusEnum::Active}}" data-id="{{\App\Classes\Enums\StatusEnum::Active}}">Enable</option>--}}
{{--                                        <option value="{{\App\Classes\Enums\StatusEnum::Inactive}}" data-id="{{\App\Classes\Enums\StatusEnum::Inactive}}">Disable</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div>--}}
{{--                                    <button type="submit" class="btn btn-success">Update Offer</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
        <div class="tab-content">

            {{--All Datatable--}}
            <table id="categoryTable" name="categoryTable"  class="table table-striped table-bordered dt-responsive nowrap allTable" style=" width:100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Purchase Year</th>
                    <th>Price</th>
                    <th>Auction Date</th>
                    <th>Price Fixed</th>
                    <th>Comment</th>
                    <th>Location</th>
                    <th>Hand to Hand</th>
                    <th>Shipping to Buyer</th>
                    <th>Address</th>
                    <th>Offer Item</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td>{{$offer->title}}</td>
                        <td>{{$offer->category->title}}</td>
                        <td>{{$offer->brand->title}}</td>
                        <td>{{$offer->moddel->title}}</td>
                        <td>{{$offer->purchaseYear->year}}</td>
                        <td>{{$offer->price}}</td>
                        <td>{{$offer->auction_end_number_of_days}}</td>
                        <td>{{$offer->is_price_fixed}}</td>
                        <td>{{$offer->is_activate_comment_section}}</td>
                        <td>{{$offer->is_show_location_product}}</td>
                        <td>{{$offer->is_hand_to_hand}}</td>
                        <td>{{$offer->is_shipping_to_buyer}}</td>
                        <td>{{$offer->address}}</td>
                        <td>{{$offer->offer_item}}</td>
{{--                        <td><span class="{{$offer->status == \App\Classes\Enums\StatusEnum::Active ? 'badge badge-success' : 'badge badge-danger'}}">{{$offer->status == \App\Classes\Enums\StatusEnum::Active ? 'Enable' : 'Disable'}}</span></td>--}}
                        <td>
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
                    <th>Purchase Year</th>
                    <th>Price</th>
                    <th>Auction Date</th>
                    <th>Price Fixed</th>
                    <th>Comment</th>
                    <th>Location</th>
                    <th>Hand to Hand</th>
                    <th>Shipping to Buyer</th>
                    <th>Address</th>
                    <th>Offer Item</th>
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

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            document.getElementById("lat").value = latitude;
            document.getElementById("long").value = longitude;
        }

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            getLocation();
            this.submit();
        });


    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#categoryTable').DataTable({ responsive: true });
        });

        $('#categoryid').on('change', function() {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: '/admin/get-brands/'+category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#brandid').empty();
                        $.each(data, function(key, value) {
                            $('#brandid').append('<option value="'+value.id+'">'+value.title+'</option>');
                        });
                    }
                });
            } else {
                $('#brandid').empty();
            }
        });

        $('#brandid').on('change', function() {
            var brand_id = $(this).val();
            if(brand_id) {
                $.ajax({
                    url: '/admin/get-models/'+brand_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#modelid').empty();
                        $.each(data, function(key, value) {
                            $('#modelid').append('<option value="'+value.id+'">'+value.title+'</option>');
                        });
                    }
                });
            } else {
                $('#modelid').empty();
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
