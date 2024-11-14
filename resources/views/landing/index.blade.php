<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hala Auto</title>

    <link href="{{ asset('front/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/landing/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/landing/css/style.css') }}">

</head>

<body style="height: 400rem">
    @include('landing.includes.header')
    <div class="swiper-container" id="top">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slide)
                <div class="swiper-slide">
                    <div class="slide-inner" style="background-image:url({{ $slide->image }})">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="header-text">
                                        <h2>{{ $slide->title }}</h2>
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
            @endforeach
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>

        <div class="images-container">
            <div class="images">
                @foreach ($sliders as $i)
                    <div class="img-container" style="width: {{ 100 / count($sliders) }}">
                        <div class="progress-bar" id="progress-{{ $loop->iteration }}"></div>
                        <img src="{{ $i->image }}" style="width: 100%"
                            class="slide-img" data-slide="{{ $loop->iteration }}" alt="">
                    </div>
                @endforeach
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

    {{-- Branches --}}
    <section class="top-section" id="branches">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="section-heading">
                    <h6>Our Branches</h6>
                    <h4>See Where We Are</h4>
                </div>
                <div class="row cards mt-2 g-3">
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6 ">
                        <div class="col-12 text-center fs-1">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">ALL-NEW PATROL</h5>
                            <div class="col-12 text-center">
                                <p class="location">133 st california</p>
                            </div>

                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6 ">
                        <div class="col-12 text-center fs-1">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">ALL-NEW PATROL</h5>
                            <div class="col-12 text-center">
                                <p class="location">133 st california</p>
                            </div>

                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6 ">
                        <div class="col-12 text-center fs-1">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">ALL-NEW PATROL</h5>
                            <div class="col-12 text-center">
                                <p class="location">133 st california</p>
                            </div>

                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6 ">
                        <div class="col-12 text-center fs-1">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">ALL-NEW PATROL</h5>
                            <div class="col-12 text-center">
                                <p class="location">133 st california</p>
                            </div>

                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6 ">
                        <div class="col-12 text-center fs-1">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">ALL-NEW PATROL</h5>
                            <div class="col-12 text-center">
                                <p class="location">133 st california</p>
                            </div>

                        </div>
                    </div>
                    <div class="card border-none col-12 col-lg-3 col-md-4 col-sm-6 ">
                        <div class="col-12 text-center fs-1">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">ALL-NEW PATROL</h5>
                            <div class="col-12 text-center">
                                <p class="location">133 st california</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form booking --}}
    <section class="top-section mt-3" id="book">
        <div class="section-heading mb-4">
            <h2>Book Now</h2>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="form px-4 py-4 col-8 col-md-6 ">
                <h4>Fill The Form</h4>
                <div>
                    <div class="title">
                        1.Select your Dream Car
                    </div>
                    <div class="input-wrapper d-flex justify-content-between align-items-center ">
                        <div class="d-flex flex-column col-6 ">
                            <label for="car-select">Preferred Model *</label>
                            <select class="form-select" id="car-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <img src="{{ asset('front/landing/images/ALL-NEW-PATROL.webp.ximg.l_4_m.smart.webp') }}"
                            alt="" class="col-5">
                    </div>
                </div>
                <div>
                    <div class="title">
                        2.Provide Your Details
                    </div>
                    <div class="inputs d-flex flex-column " style="gap: 45px">
                        <div class="input-wrapper d-flex justify-content-between align-items-center ">
                            <div class="d-flex flex-column col-12 ">
                                <label for="car-select">Service Type *</label>
                                <select class="form-select" id="car-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-wrapper d-flex justify-content-between align-items-center ">
                            <div class="d-flex flex-column col-12">
                                <label for="car-select">First Name *</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="input-wrapper d-flex justify-content-between align-items-center ">
                            <div class="d-flex flex-column col-12">
                                <label for="car-select">Last Name *</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="input-wrapper d-flex justify-content-between align-items-center ">
                            <div class="d-flex flex-column col-12">
                                <label for="car-select">Phone Number *</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="checkbox">
                    <div class="form-group">
                        <div class="checkbox-container">
                            <input type="checkbox" name="checkbox" value="true" checked=""
                                data-request-variable="">
                            <label for="checkbox">
                                Are You Agree With Our <a href="#">Terms And Conditions</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="button filled-button mt-3">
                    <a href="#">Send</a>
                </div>

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
