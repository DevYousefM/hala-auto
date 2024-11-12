<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hala Auto</title>

    <link href="{{ asset('front/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/landing/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/swiper/swiper-bundle.min.css') }}">

</head>

<body style="height: 100rem">
    @include('landing.includes.header')
    <div class="swiper-container" id="top">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-inner" style="background-image:url({{ asset('front/landing/images/slide-01.jpg') }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    <h2>0 Get ready for your business<br>&amp; upgrade all aspects</h2>
                                    <div class="buttons">
                                        <div class="filled-button">
                                            <a href="#">Discover More</a>
                                        </div>
                                        <div class="outline-button">
                                            <a href="#">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background-image:url({{ asset('front/landing/images/slide-02.jpg') }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    <h2>1 Digital Currency for you <br>&amp; Best Crypto Tips</h2>
                                    <div class="buttons">
                                        <div class="filled-button">
                                            <a href="#">Discover More</a>
                                        </div>
                                        <div class="outline-button">
                                            <a href="#">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background-image:url({{ asset('front/landing/images/slide-03.jpg') }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    <h2>2 Best One in Town<br>&amp; Crypto Services</h2>
                                    <div class="buttons">
                                        <div class="filled-button">
                                            <a href="#">Discover More</a>
                                        </div>
                                        <div class="outline-button">
                                            <a href="#">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>

        <div class="images-container">
            <div class="images">
                {{-- <div class="img-container" style="width: 25%"> --}}
                    <img src="{{ asset('front/landing/images/slide-01.jpg') }}" style="width: 30%" class="slide-img" data-slide="0"
                        alt="">
                {{-- </div> --}}
                {{-- <div class="img-container" style="width: 25%"> --}}
                    <img src="{{ asset('front/landing/images/slide-02.jpg') }}" style="width: 30%" class="slide-img" data-slide="1"
                        alt="">
                {{-- </div> --}}
                {{-- <div class="img-container" style="width: 25%"> --}}
                    <img src="{{ asset('front/landing/images/slide-03.jpg') }}" style="width: 30%" class="slide-img" data-slide="2"
                        alt="">
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('front/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/plugins/jquery/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('front/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('front/landing/js/isotope.js') }}"></script>
    <script src="{{ asset('front/plugins/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('front/landing/js/swiper.js') }}"></script>
    <script src="{{ asset('front/landing/js/custom.js') }}"></script>
</body>

</html>
