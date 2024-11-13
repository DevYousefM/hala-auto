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

<body style="height: 200rem">
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
                                        <div class="button filled-button">
                                            <a href="#">Discover More</a>
                                        </div>
                                        <div class="button outline-button">
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
                                        <div class="button filled-button">
                                            <a href="#">Discover More</a>
                                        </div>
                                        <div class="button outline-button">
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
                                        <div class="button filled-button">
                                            <a href="#">Discover More</a>
                                        </div>
                                        <div class="button outline-button">
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
                <div class="img-container" style="width: 30%">
                    <div class="progress-bar" id="progress-0"></div>
                    <img src="{{ asset('front/landing/images/slide-01.jpg') }}" style="width: 100%" class="slide-img"
                        data-slide="0" alt="">
                </div>
                <div class="img-container" style="width: 30%">
                    <div class="progress-bar" id="progress-1"></div>
                    <img src="{{ asset('front/landing/images/slide-02.jpg') }}" style="width: 100%" class="slide-img"
                        data-slide="1" alt="">
                </div>
                <div class="img-container" style="width: 30%">
                    <div class="progress-bar" id="progress-2"></div>
                    <img src="{{ asset('front/landing/images/slide-03.jpg') }}" style="width: 100%" class="slide-img"
                        data-slide="2" alt="">
                </div>
            </div>
        </div>
    </div>

    {{-- About Us --}}
    <section class="top-section" id="about">
        <div class="container">
            <div class="row">
                <div class="section-heading">
                    <h6>About Us</h6>
                    <h4>Know Us Better</h4>
                </div>
                <div class="row">
                    <div class="col-lg-6 align-self-center d-flex flex-column" style="gap: 20px">
                        <h1>
                            About us
                        </h1>
                        <h6>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo odio animi, suscipit
                            doloremque nulla voluptates vitae necessitatibus minima deleniti? Fugiat unde aliquid
                            tenetur cumque neque dolores aliquam! Sit, ipsam minus!
                        </h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="left-image">
                            <img src="{{ asset('front/landing/images/about-left-image.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Offers --}}
    <section class="top-section" id="offers">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="section-heading">
                    <h6>Our Offers</h6>
                    <h4>See What Is Exclusive</h4>
                </div>
                <div class="row cards mt-5 g-5">
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">ALL-NEW PATROL</h5>
                            <p class="disclaimer">
                                starts from
                            </p>
                            <p class="price">150,000EGP</p>
                            <div class="card-buttons">
                                <div class="button filled-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">ALL-NEW PATROL</h5>
                            <p class="disclaimer">
                                starts from
                            </p>
                            <p class="price">150,000EGP</p>
                            <div class="card-buttons">
                                <div class="button filled-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">ALL-NEW PATROL</h5>
                            <p class="disclaimer">
                                starts from
                            </p>
                            <p class="price">150,000EGP</p>
                            <div class="card-buttons">
                                <div class="button filled-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">ALL-NEW PATROL</h5>
                            <p class="disclaimer">
                                starts from
                            </p>
                            <p class="price">150,000EGP</p>
                            <div class="card-buttons">
                                <div class="button filled-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">ALL-NEW PATROL</h5>
                            <p class="disclaimer">
                                starts from
                            </p>
                            <p class="price">150,000EGP</p>
                            <div class="card-buttons">
                                <div class="button filled-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">ALL-NEW PATROL</h5>
                            <p class="disclaimer">
                                starts from
                            </p>
                            <p class="price">150,000EGP</p>
                            <div class="card-buttons">
                                <div class="button filled-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button outline-button-dark d-flex mt-5 col-12 justify-content-center">
                <a href="#" style="text-transform: uppercase">View All</a>
            </div>
        </div>
    </section>
    <script src="{{ asset('front/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/plugins/jquery/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('front/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('front/landing/js/isotope.js') }}"></script>
    <script src="{{ asset('front/plugins/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('front/landing/js/swiper.js') }}"></script>
    <script src="{{ asset('front/landing/js/custom.js') }}"></script>
</body>

</html>
