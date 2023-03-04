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
                            <h5 class="text-primary">6.4K</h5>
                            <h6 class="text-secondary">Scan</h6>
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
                        <h4 class="ml-4 mt-3">Business Activities</h4>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <a href="/wallet">
                                <h6 class="float-left">My Wallet</h6>
                                <h6 class="float-right text-danger">1,500 SAR</h6>
                            </a>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Offers</h6>
                            <h6 class="float-right text-danger">12</h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Purchase Request</h6>
                            <h6 class="float-right text-danger"><small>13 Request</small></h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">My Orders</h6>
                            <h6 class="float-right text-dark"><small>1,325</small></h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left text-dark">Favourite</h6>
                            <h6 class="float-right text-danger"><small>13</small></h6>
                        </div>

                        <h4 class="ml-4 mt-3">My Account</h4>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Public Profile</h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Settings</h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Blocked Users</h6>
                        </div>

                        <h4 class="ml-4 mt-3">OfferYard Square</h4>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Announcements</h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Share your thoughts</h6>
                        </div>
                        <div class="col-md-12 py-2 px-3 border mt-2 rounded">
                            <h6 class="float-left">Support Us</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>