@extends('index')
@section('content')
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Smart Phone
                                    </h1>
                                    <p>
                                        Welcome to Timups
                                        
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="images/slider-phone.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Smart Phone
                                    </h1>
                                    <p>
                                        
                                        If you want to take good pictures, buy a phone from us
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="images/slider-phone.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Smart Phone
                                    </h1>
                                    <p>
                                        Welcome to Timups
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="images/slider-phone.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
        </div>

    </section>
    <!-- end slider section -->
    </div>

    <!-- shop section -->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Watches
                </h2>
            </div>
            <div class="row">
                @foreach ($product as $item)
                    <div class="col-md-6 ">
                        <div class="box">
                            <a href="">
                                <div class="img-box">
                                    <img src="{{ $item->image }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        {{ $item->name }}
                                    </h6>
                                    <h6>
                                        Price:
                                        <span>
                                            {{ $item->price }}
                                        </span>
                                        <a class="btn btn-private" href="{{ route('index.detail', $item->id) }}">Button</a>
                                    </h6>
                                </div>
                                <div class="new">
                                    <span>
                                        Featured
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-box">
                <a href="">
                    View All
                </a>
            </div>
        </div>
    </section>

    <!-- end shop section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6 col-lg-5 ">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration
                            in some form, by injected humour, or randomised words which don't look even slightly believable.
                            If you
                            are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                            hidden in
                            the middle of text. All
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- feature section -->

    <section class="feature_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Features Of Our Watches
                </h2>
                <p>
                    Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Fitness Tracking
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Alerts & Notifications
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Messages
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f4.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Bluetooth
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div>
        </div>
    </section>

    <!-- end feature section -->

    <!-- contact section -->

    <section class="contact_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Contact Us
                            </h2>
                        </div>
                        <form action="">
                            <div>
                                <input type="text" placeholder="Full Name " />
                            </div>
                            <div>
                                <input type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="text" placeholder="Phone number" />
                            </div>
                            <div>
                                <input type="text" class="message-box" placeholder="Message" />
                            </div>
                            <div class="d-flex ">
                                <button>
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/contact-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->

    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Testimonial
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/c1.jpg" alt="">
                            </div>
                            <div class="detail-box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Mark Thomas
                                        </h5>
                                        <h6>
                                            Customer
                                        </h6>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore
                                    et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse
                                    cillum
                                    dolore eu fugia
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/c2.jpg" alt="">
                            </div>
                            <div class="detail-box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Alina Hans
                                        </h5>
                                        <h6>
                                            Customer
                                        </h6>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore
                                    et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse
                                    cillum
                                    dolore eu fugia
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
