<html>
    <head>
        <title>New Offer | OfferYard</title>
        @include('cdn')
    </head>
    <body class="bg-light">
        <div class="row m-0">
            <x-header />
        </div>
        <div class="container">
            <div class="row m-0 d-flex justify-content-center align-items-center">
                <div class="col-md-6 bg-white shadow rounded pb-5 pt-3">
                    <h4 class="text-center">New Offer</h4>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="email">Select Photo:</label>
                            <input type="file" class="form-control" id="email" style="padding: 3px;">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Category:</label>
                            <select class="form-control" id="pwd">
                                <option>Select Category</option>
                                <option>Category A</option>
                                <option>Category B</option>
                                <option>Category C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Brands:</label>
                            <select class="form-control" id="pwd">
                                <option>Select Brand</option>
                                <option>Brand A</option>
                                <option>Brand B</option>
                                <option>Brand C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Model:</label>
                            <select class="form-control" id="pwd">
                                <option>Select Model</option>
                                <option>Model A</option>
                                <option>Model B</option>
                                <option>Model C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Lcation of Product:</label>
                            <input type="text" class="form-control" placeholder="Enter Latitude, longitude" id="email">
                        </div>
                        <div class="form-group">
                            <label for="email">Price:</label>
                            <input type="text" class="form-control" placeholder="$ 29.50" id="email">
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">Activate Comment Section
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email">Description:</label>
                            <textarea class="form-control" id="email" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning btn-block mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>