<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="4"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Los Angeles">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Los Angeles" style="width:100%;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Los Angeles" style="width:100%;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Los Angeles" style="width:100%;">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>