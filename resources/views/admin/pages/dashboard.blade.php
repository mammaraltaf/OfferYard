@extends('admin.admin.app')
@section('pageTitle') Dashboard @endsection
@section('content')
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Dashboard</span>
        </h3>

    </div>
<br>
<br>
<br>
    <!--end::Header-->
        <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">
            <!--begin::Tap pane-->
            <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Order</span>
                    </h3>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="row">
                            {{--Count of All Categories--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1>Total Orders</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$totalOrders ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/material-outlined/96/000000/dashboard-layout.png"/>                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Count of Sub Categories--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1 class="">Deliver Orders</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$deliverOrders ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/ios/100/null/pizza-delivery.png"/>                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Count of Services--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1 class="">Completed Orders</h1>
                                                <h2 class="mb-0 number-font" style="color:red">{{$completedOrders ?? ''}}</h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/sf-regular/96/000000/mobile-order.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Categories</span>
                    </h3>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="row">
                            {{--Count of All Categories--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1>All Categories</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$categories ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/material-outlined/96/000000/dashboard-layout.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Count of Sub Categories--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1 class="">Sub Categories</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$subCategories ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/windows/96/000000/folder-tree.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Count of Services--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1 class="">Services</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$services ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/ios/100/000000/online-maintenance-portal.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Users Count</span>
                    </h3>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="row">
                            {{--Count of All Users--}}
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1 class="">Total Users</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$totalUsers ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/ios-filled/100/000000/supplier.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Count of Providers--}}
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                <div class="card overflow-hidden mb-5">
                                    <div class="card-body" style="background-color: lavender;">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h1 class="">Total Active Providers</h1>
{{--                                                <h2 class="mb-0 number-font" style="color:red">{{$activeProviders ?? ''}}</h2>--}}
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <img src="https://img.icons8.com/ios-filled/100/000000/supplier.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Tap pane-->

        </div>
    </div>
    <!--end::Body-->
@endsection
@section('script')

@endsection
