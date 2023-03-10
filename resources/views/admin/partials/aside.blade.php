<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--begin::User-->
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
            <!--begin::Symbol-->
            <div class="symbol symbol-50px">
{{--                <img src="{{asset('public/admin/media/avatars/blank.png')}}" alt="" />--}}
            </div>
            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                <!--begin::Section-->
                <div class="d-flex">
                    <!--begin::Info-->
                    <div class="flex-grow-1 me-2">
                        <!--begin::Username-->
                        <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Admin</a>
                        <!--end::Username-->
                    </div>
                    <!--end::Info-->
                    <!--begin::User menu-->

                    <!--end::User menu-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::User-->
        <!--end::Aside user-->
    </div>
    <!--end::Aside Toolbarl-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}" >
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Route::currentRouteNamed('admin.category') ? 'active' : '' }}" href="{{route('admin.category')}}" >
                            <span class="menu-title">Manage Category</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Route::currentRouteNamed('admin.brands') ? 'active' : '' }}" href="{{route('admin.brands')}}" >
                            <span class="menu-title">Manage Brand</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Route::currentRouteNamed('admin.users') ? 'active' : '' }}" href="{{route('admin.users')}}" >
                        <span class="menu-title">Manage Users</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Route::currentRouteNamed('admin.models') ? 'active' : '' }}" href="{{route('admin.models')}}" >
                        <span class="menu-title">Manage Models</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Route::currentRouteNamed('admin.offers') ? 'active' : '' }}" href="{{route('admin.offers')}}" >
                        <span class="menu-title">Manage Offers</span>
                        </a>
                    </div>


{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.services') ? 'active' : '' }}" href="{{route('admin.services')}}" >--}}
{{--                            <span class="menu-title">Manage Services</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.serviceQuestions') ? 'active' : '' }}" href="{{route('admin.serviceQuestions')}}" >--}}
{{--                            <span class="menu-title">Manage Service Question</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.requests') ? 'active' : '' }}" href="{{route('admin.requests')}}" >--}}
{{--                            <span class="menu-title">Manage Requests</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.requestPool') ? 'active' : '' }}" href="{{route('admin.requestPool')}}" >--}}
{{--                            <span class="menu-title">Request Pool</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}



{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.providers') ? 'active' : '' }}" href="{{route('admin.providers')}}" >--}}
{{--                            <span class="menu-title">Manage Providers</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.orders') ? 'active' : '' }}" href="{{route('admin.orders')}}" >--}}
{{--                            <span class="menu-title">Manage Orders</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.contactUs') ? 'active' : '' }}" href="{{route('admin.contactUs')}}" >--}}
{{--                            <span class="menu-title">Manage Contact Us</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown">--}}


{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.termsAndConditions') ? 'active' : '' }}" href="{{route('admin.termsAndConditions')}}" >--}}
{{--                            <span class="menu-title">Manage Terms and Conditions</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.privacyPolicy') ? 'active' : '' }}" href="{{route('admin.privacyPolicy')}}" >--}}
{{--                            <span class="menu-title">Manage Privacy Policy</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="menu-item">--}}
{{--                        <a class="menu-link {{ Route::currentRouteNamed('admin.refundPolicy') ? 'active' : '' }}" href="{{route('admin.refundPolicy')}}" >--}}
{{--                            <span class="menu-title">Manage Refund Policy</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>

</div>
