<html>
    <head>
        <title>Register | OfferYard</title>
        @include('cdn')
    </head>
    <body class="bg-light">
        <div class="container" style="height:100vh;">
            <div class="row m-0 d-flex justify-content-center align-items-center" style="height:100vh;">
                <div class="col-md-6 bg-white shadow rounded p-5">
                    <h4 class="text-center">REGISTRATION</h4>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control" placeholder="Enter full name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number:</label>
                            <input type="phone" class="form-control" id="mobile" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> I agree with the <a href="">terms and conditions.</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mb-3">Submit</button>
                        <p>Have account? <a href="/">Login Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>