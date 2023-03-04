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
                        <div class="col-md-12 bg-danger py-5 rounded">
                            <h4 class="text-center text-white">My Wallet</h4>

                            <h5 class="mt-2 text-white mt-5">Mohd. Arbab</h5><br/>
                            <h6 class="text-white">Your total balance</h6>
                            <h3 class="text-white"><b>12,746.89 </b><small>SAR</small></h3>

                            <a href="#" class="btn btn-default bg-white float-left mt-4 px-4">Transfer</a>
                            <a href="#" class="btn btn-default bg-white float-right mt-4 px-4">Deposit</a>
                        </div>
                        <div class="col-md-12 mt-4"><h3>Transactions History</h3></div>
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
                                    <span class="text-success">+130 SAR</span>
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
                                    <span class="text-danger">-130 SAR</span>
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
                                    <span class="text-success">+130 SAR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>