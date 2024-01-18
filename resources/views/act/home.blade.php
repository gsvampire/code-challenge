<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>超值季度购</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/style.default.css').'?'.microtime() }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/bootstrap.min.detail.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/app.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/icons.min.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/lyy.css').'?'.microtime() }}">
    <link rel="stylesheet" href="{{ URL::asset('h5/css/owl.carousel.min.css') }}">
</head>
<script src="{{ URL::asset('h5/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('h5/js/owl.carousel.min.js') }}"></script>
<style>
    body {
        background-image: url("{{ URL::asset('pageImg/78.png') }}");
        background-repeat: round;
        background-size: cover;
    }

    .card-title {
        margin: 7px 0 0 0 !important;
    }

    .card-div {
        border-radius: 10px;
        background: #fff;
    }

    .page-content {
        padding: 10px 0 !important;
    }

    .bannar_div {
        padding-right: 0;
        padding-left: 0;
    }

</style>
<body>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 bannar_div">
                <img class="bannar" src="{{ URL::asset('pageImg/79.png') }}" alt="">
            </div>
        </div>

        <div class="row" style="margin-top: -40%;">
            <div class="col-xl-12 col-md-12 bannar_div">
                <div id="carouselSlides" class="carousel slide ">
                    <div class="carousel-inner owl-carousel owl-theme" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_3.png') }}"
                                 alt="Third slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_1.png') }}"
                                 alt="First slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_2.png') }}"
                                 alt="Second slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_6.png') }}"
                                 alt="Four slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_5.png') }}"
                                 alt="Third slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid mx-auto" src="{{ URL::asset('pageImg/919_4.png') }}"
                                 alt="Four slide">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
<script>
    $(function () {
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            speed: 3000,
            autoplayTimeout: 3000
        });
        $('.bannar_div').click(function () {
            window.location.href = "{{ url('/act/detail/2') }}";
        });
    });
</script>
</html>
