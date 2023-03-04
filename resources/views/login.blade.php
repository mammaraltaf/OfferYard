<html>
    <head>
        <title>Login | OfferYard</title>
        @include('cdn')
    </head>
    <body class="bg-light">
        <div class="container" style="height:100vh;">
            <div class="row m-0 d-flex justify-content-center align-items-center" style="height:100vh;">
                <div class="col-md-6 bg-white shadow rounded p-5">
                    <h4 class="text-center">LOGIN SYSTEM</h4>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="email">Phone Number:</label>
                            <input type="text" class="form-control" placeholder="+923 45328878" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mb-3">Submit</button>
                        <p>Have not account? <a href="/register">Create Account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>