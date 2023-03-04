<html>
    <head>
        <title>Code Verification | OfferYard</title>
        @include('cdn')
    </head>
    <body class="bg-light">
        <div class="container" style="height:100vh;">
            <div class="row m-0 d-flex justify-content-center align-items-center" style="height:100vh;">
                <div class="col-md-6 bg-white shadow rounded p-5">
                    <h4 class="text-center">VERIFICATION</h4>
                    <p class="text-center">Please enter OTP received on your Mobile Number</p>
                    <a href="#">Resend</a>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="1234" id="email">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mb-3">VERIFY</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>