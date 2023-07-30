@extends('front.layouts.app')

@section('content')
    <section id="header">
        <!-- Block with a dark transparent overlay -->
        <div class="overlay-dark bg-cover bg-center img-fluid" id="imgheader">
            <div class="overlay-content text-white text-center p-5">
                <h2 class="maintext">
                    PLAY <span class="ontext">ON</span>
                </h2>
                <p class="lead demo-text mb-1 mt-1 p-1">
                <p class="lowermaintext">GET IN THE <span class="ontext">GAME</span></p>
                </p>
                <p class="lead demo-text mb-1 mt-5 p-1">Hello and welcome to our <code>sports venue</code> registration and
                    booking system website!

                    We are thrilled to provide you with a user-friendly platform that connects you with sports venues in
                    your area.
                <p class="lead demo-text mb-1 ">Whether you are a passionate sports player or a sports venue owner, our
                    website is designed to make your life easier.</p>
                </p>
                <a class="btn btn-outline-light rounded-0 px-5" href="{{ route('register.type') }}">Get started</a>
            </div>
        </div>
        </div>
        <section>





            <section>
                <div class="container mb-5 p-3 " id=carousel1>
                    <div class="row">
                        <div class="col-sm-12 ms-auto">
                            <div id="carouselExampleIndicators" class="carousel slide mt-5 carousel-fade"
                                data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('front/homeimage1.jpg') }}"
                                            class="d-block rounded img-fluid w-100 img-responsive" alt="image-1">
                                        <div class="carousel-caption">
                                            <h3 id="carouselcaptiontext">Play with heart, win with pride</h3>
                                        </div>

                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('front/homeimage2.jpg') }}"
                                            class="d-block rounded img-fluid w-100 img-responsive" alt="image-2">
                                        <div class="carousel-caption">
                                            <h3 id="carouselcaptiontext">Success isn't given, it's earned on the field of
                                                play</h3>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('front/homeimage3.jpg') }}"
                                            class="d-block rounded img-fluid w-100 img-responsive" alt="image-3">
                                        <div class="carousel-caption">
                                            <h3 id="carouselcaptiontext">Champions never give up</h3>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </section>





            <section id="aboutus">
                <div class="bg-light">
                    <div class="container py-3">
                        <div class="row h-100 align-items-center py-5">
                            <div class="col-lg-6">
                                <h1 class="display-4">How it works</h1>
                                <p class="lead text-muted mb-0"><a href="{{ route('register.type') }}"
                                        class="text-muted">Sign up</a>
                                    as a player or manager and you are done</p>
                                <p class="lead text-muted mb-0">Book venue and start playing in minutes</p>
                                </p>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('front/illus1.png') }}"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <section id="services" class="services mt-5 mb-5 p-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><a href="">Quick Access</a></h4>
                                    <p id="servicestext">Quick access to the majority of sporting events and venues in your
                                        city.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                                data-aos-delay="150">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bx-file"></i></div>
                                    <h4><a href="">Easy Bookings</a></h4>
                                    <p id="servicestext">View the calendar and reserve without paying any additional costs!
                                        Get savings for online purchases.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up"
                                data-aos-delay="300">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                                    <h4><a href="">Secure Payments</a></h4>
                                    <p id="servicestext">Ensuring that sensitive financial information is protected
                                        throughout the process.</p>
                                </div>
                            </div>



                        </div>
                    </div>
                </section>
                <div class="bg-white py-5">
                    <div class="container py-5">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 order-2 order-lg-1"><i
                                    class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                                <h2 class="font-weight-light">List Your Sports Facility</h2>
                                <p class="font-italic text-muted mb-4">
                                <div class="list-style">
                                    <div class="list-style-eight">
                                        <ul>
                                            <li>
                                                <i class="lni lni-angle-double-right font-italic"></i> Sign up as Facility
                                                Manager
                                            </li>
                                            <li>
                                                <i class="lni lni-angle-double-right font-italic"></i> Fill up your sports
                                                facility details
                                            </li>
                                            <li>
                                                <i class="lni lni-angle-double-right font-italic"></i> Upload some images
                                            </li>
                                            <li>
                                                <i class="lni lni-angle-double-right font-italic"></i> You are live!!
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                </p><a href="{{ route('register.type') }}"
                                    class="btn btn-light px-5 rounded-pill shadow-sm">Learn
                                    More</a>
                            </div>
                            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2 mb-5"><img
                                    src="{{ asset('front/illus2.png') }}" alt="" class="img-fluid mb-4 mb-lg-0">
                            </div>
                        </div>
                        <div>

                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-lg-5 px-5 mx-auto"><img src="{{ asset('front/illus3.png') }}" alt=""
                                    class="img-fluid mb-4 mb-lg-0"></div>
                            <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                                <h2 class="font-weight-light">You believe we care</h2>
                                <p class="font-italic text-muted mb-4">We believe that sports play a vital role in
                                    promoting physical and mental wellness, and we are committed to supporting the sports
                                    community by providing a platform that connects athletes, coaches, and venue owners. Our
                                    mission is to make it easier for sports enthusiasts to pursue their passion, and we are
                                    proud to be a part of this thriving community.</p><a href="#"
                                    class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>



                <section id="testimonials" class="mt-2 mb-2">
                    <section class="gradient-custom">
                        <section>
                            <div class="container py-5">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-10 col-xl-8 text-center">
                                        <h3 class="fw-bold mb-4 font-weight-light text-white">Testimonials</h3>
                                        <p class="mb-4 pb-2 mb-md-5 pb-md-0 font-weight-light text-white">
                                            These are some reviews given by players as well as by the club owners.
                                        </p>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-md-4 mb-4 mb-md-0 p-2">
                                        <div class="card">
                                            <div class="card-body py-4 mt-2">
                                                <div class="d-flex justify-content-center mb-4">
                                                    <img src="{{ asset('front/testimonialpic3.jpg') }}"
                                                        class="rounded-circle shadow-1-strong" width="100"
                                                        height="100" />
                                                </div>
                                                <h5 class="font-weight-bold">Shakeel Khalid</h5>
                                                <h6 class="font-weight-bold my-3">Owner of National Sports</h6>
                                                <ul class="list-unstyled d-flex justify-content-center">
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star-half-alt fa-sm text-info"></i>
                                                    </li>
                                                </ul>
                                                <p class="mb-2">
                                                    <i class="fas fa-quote-left pe-2"></i>My sports facility got listed in
                                                    a very short time. Its like having my own individual website. Great
                                                    Work!!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4 mb-md-0 p-2">
                                        <div class="card">
                                            <div class="card-body py-4 mt-2">
                                                <div class="d-flex justify-content-center mb-4">
                                                    <img src="{{ asset('front/testimonialpic2.jpg') }}"
                                                        class="rounded-circle shadow-1-strong" width="100"
                                                        height="100" />
                                                </div>
                                                <h5 class="font-weight-bold">Ali Haider</h5>
                                                <h6 class="font-weight-bold my-3">Badminton Player</h6>
                                                <ul class="list-unstyled d-flex justify-content-center">
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                </ul>
                                                <p class="mb-2">
                                                    <i class="fas fa-quote-left pe-2"></i>The registration process was
                                                    quick and easy, and the website was user-friendly and intuitive
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-0 p-2">
                                        <div class="card">
                                            <div class="card-body py-4 mt-2">
                                                <div class="d-flex justify-content-center mb-4">
                                                    <img src="{{ asset('front/testimonialpic1.jpg') }}"
                                                        class="rounded-circle shadow-1-strong" width="100"
                                                        height="100" />
                                                </div>
                                                <h5 class="font-weight-bold">Basit Aziz</h5>
                                                <h6 class="font-weight-bold my-3">Owner of Tiger Sports</h6>
                                                <ul class="list-unstyled d-flex justify-content-center">
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star fa-sm text-info"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star fa-sm text-info"></i>
                                                    </li>
                                                </ul>
                                                <p class="mb-2">
                                                    <i class="fas fa-quote-left pe-2"></i>The sports venue registration
                                                    website has helped us streamline our operations and reach new customers
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </section>




                <div class="bg-light py-5">
                    <div class="container py-5">
                        <div class="row mb-4">
                            <div class="col-lg-5">
                                <h2 class="display-4 font-weight-light">Our team</h2>

                            </div>
                        </div>

                        <div class="row text-center">
                            <!-- Team item-->
                            <div class="col-xl-3 col-sm-6 mb-5">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('front/teamavatar1.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">Ayesha Irshad</h5><span class="small text-uppercase text-muted">CEO
                                        - Founder</span>

                                </div>
                            </div>
                            <!-- End-->

                            <!-- Team item-->
                            <div class="col-xl-3 col-sm-6 mb-5">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('front/teamavatar2.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">Muhammad Usman</h5><span
                                        class="small text-uppercase text-muted">CEO - Founder</span>

                                </div>
                            </div>
                            <!-- End-->

                            <!-- Team item-->
                            <div class="col-xl-3 col-sm-6 mb-5">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('front/teamavatar3.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">Minahil Shahid</h5><span
                                        class="small text-uppercase text-muted">CEO - Founder</span>

                                </div>
                            </div>
                            <!-- End-->

                            <!-- Team item-->
                            <div class="col-xl-3 col-sm-6 mb-2">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('front/teamavatar4.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">Azqa Noor</h5><span class="small text-uppercase text-muted">CEO -
                                        Founder</span>

                                </div>
                            </div>
                            <!-- End-->

                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p>Our team is made up of passionate individuals who are
                                    dedicated to providing excellent customer service and support. We work hard to ensure
                                    that our website is always up-to-date with the latest information about sports venues in
                                    your area. Whether you're looking for a soccer field,
                                    basketball court, or tennis court, we have a wide selection of options to choose from.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section id="contactus">

                <section class="bg-light py-5 py-xl-8">
                    <div class="container">
                        <div class="row gy-5 gy-lg-0 gx-lg-6 gx-xxl-8 align-items-lg-center">
                            <div class="col-12 col-lg-6">
                                <img class="img-fluid rounded" loading="lazy" src="{{ asset('front/contact-img.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-12 col-lg-6">
                                <h2 class="h1 mb-3">Get in touch</h2>
                                <p class="lead fs-4 text-secondary mb-5">We're always on the lookout to work with new
                                    members. We would be happy to answer any questions or concerns you may have.</p>
                                <div class="d-flex mb-4">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">Address</h4>
                                        <address class="mb-0 text-secondary">Gift University, Gujranwala, Pakistan
                                        </address>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">Phone</h4>
                                        <p class="mb-0">
                                            <a class="link-secondary text-decoration-none" href="tel:+15057922430">(+92)
                                                348-4317257</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path
                                                d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">E-Mail</h4>
                                        <p>
                                            <a class="link-secondary text-decoration-none"
                                                href="">playonsupport@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        @endsection
