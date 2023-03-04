<html>
    <head>
        <title>Profile | OfferYard</title>
        @include('cdn')
    </head>
    <body class="bg-light">
        <div class="row m-0">
            <x-header />
        </div>
        <div class="container">
            <div class="row m-0 d-flex justify-content-center align-items-center">
                <div class="col-md-6 bg-white shadow rounded p-1 mt-2">
                    <div class="row m-0">
                        <div class="col-md-12 p-0">
                            <img src="{{ asset('images/profile/Subtraction9@3x.png') }}" class="img img-fluid rounded" alt="profile cover">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/profile/Ellipse 332@3x.png') }}" class="img img-fluid profile-pic" alt="">
                        </div>
                        <div class="col-md-8">
                            <h5 class="mt-2">Mohd. Arbab</h5>
                            <h6>
                                <span class="material-icons text-warning">grade</span>
                                <span class="material-icons text-warning">grade</span>
                                <span class="material-icons text-warning">grade</span>
                                <span class="material-icons text-warning">grade</span>    
                                <span><b>(3.6K)</b></span>
                            </h6>
                            <h6>
                                <small><b>Sept 25, 2020 | Riyadh, SA</b></small>
                            </h6>
                        </div>

                        <div class="col-md-3 text-center ml-5 my-3 py-2 bg-light rounded">
                            <h5 class="text-primary">6.4K</h5>
                            <h6 class="text-secondary">Followers</h6>
                        </div>
                        <div class="col-md-3 text-center ml-4 my-3 py-2 bg-light rounded">
                            <h5 class="text-primary">864</h5>
                            <h6 class="text-secondary">Following</h6>
                        </div>
                        <div class="col-md-3 text-center ml-4 my-3 py-2 bg-light rounded">
                            <h5 class="text-primary"><span class="border px-2 bg-info rounded text-dark">+</span></h5>
                            <h6 class="text-secondary">Follow</h6>
                        </div>

                        <div class="col-md-12 text-danger text-center py-2">Verify your account to build reputation</div>

                        <div class="col-md-3 text-center ml-5 my-3 py-2 bg-light rounded">
                            <h5 class="text-primary">PHONE</h5>
                            <h6 class="text-dark">Phone Number Verified</h6>
                        </div>
                        <div class="col-md-3 text-center ml-4 my-3 py-2 bg-light rounded">
                            <h5 class="text-primary">EMAIL</h5>
                            <h6 class="text-secondary">Email address not verified</h6>
                        </div>
                        <div class="col-md-3 text-center ml-4 my-3 py-2 bg-light rounded">
                            <h5 class="text-primary">Absher</h5>
                            <h6 class="text-secondary">Absher not verified</h6>
                        </div>

                        <!-- products -->
                        <div class="col-md-12 mt-4"><h3>Products</h3></div>
                        <div class="col-md-12">
                            <div class="row m-0 bg-light border rounded mb-2 d-flex align-items-center">
                                <div class="col-md-2 px-0">
                                    <img src="{{ asset('images/offers/Img2@3x.png') }}" class="img img-fluid rounded" alt="">
                                </div>
                                <div class="col-md-7">
                                    <b class="text-primary">Nike shoes gxv</b><br/>
                                    <h6 class="text-secondary">08:24 AM | 08:24 AM</h6>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-success">130 SAR</span>
                                </div>
                            </div>
                            <div class="row m-0 bg-light border rounded mb-2 d-flex align-items-center">
                                <div class="col-md-2 px-0">
                                    <img src="{{ asset('images/offers/Img2@3x.png') }}" class="img img-fluid rounded" alt="">
                                </div>
                                <div class="col-md-7">
                                    <b class="text-primary">Nike shoes gxv</b><br/>
                                    <h6 class="text-secondary">08:24 AM | 08:24 AM</h6>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-success">130 SAR</span>
                                </div>
                            </div>
                            <div class="row m-0 bg-light border rounded mb-2 d-flex align-items-center">
                                <div class="col-md-2 px-0">
                                    <img src="{{ asset('images/offers/Img2@3x.png') }}" class="img img-fluid rounded" alt="">
                                </div>
                                <div class="col-md-7">
                                    <b class="text-primary">Nike shoes gxv</b><br/>
                                    <h6 class="text-secondary">08:24 AM | 08:24 AM</h6>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-success">130 SAR</span>
                                </div>
                            </div>
                        </div>
                        <!-- end products -->              
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>