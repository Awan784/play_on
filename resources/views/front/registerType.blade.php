@extends('front.layouts.app')
@section('content')
    <section class="underconstruction">
        <div class="container py-5">

            <!-- For demo purpose -->
            <div class="row text-center text-white mb-3">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-4">Who are you?</h1>
                    <p class="lead mb-0 ">Choose one option to register </p>
                </div>
            </div><!-- End -->


            <div class="row">
                <div class="col-lg-7 mx-auto">

                    <!-- Timeline -->
                    <ul class="timeline">
                        <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                            <div class="timeline-arrow"></div>
                            <h2 class="h5 mb-0"> <a href="{{ route('register') }}"><button type="button" id="buttons"
                                        class="btn btn-sm  btn-primary btn-rounded"
                                        data-mdb-ripple-color="dark">Player</button></a></h2>
                            <p class=" mt-2 font-weight-light">If you're a sports enthusiast, our sports venue registration
                                website is the perfect platform
                                for you to explore and participate in various sports events and activities. By registering
                                on our
                                website, you can gain access to a wide range of sports activities and events with just a few
                                clicks.
                                Our platform offers a user-friendly and convenient registration process that enables you to
                                quickly
                                and easily sign up for sports events that best suit your interests and schedule.
                                Additionally, our website provides all the necessary information you need about the sports
                                venue,
                                including the rules, regulations, and policies. So, what are you waiting for? Register now
                                on our
                                sports venue registration website and get ready to experience the joy of sports and physical
                                activity!</p>
                        </li>
                        <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                            <div class="timeline-arrow"></div>
                            <h2 class="h5 mb-0"> <a href="{{ route('admin.register') }}"><button type="button"
                                        id="buttons" class="btn btn-sm btn-primary btn-rounded"
                                        data-mdb-ripple-color="dark">Manager</button></a></h2>
                            <p class=" mt-2 font-weight-light">As a sports facility owner, registering your facility on our
                                sports venue
                                registration website is a great opportunity to expand your reach and attract more customers.
                                Our website provides a platform for you to promote your sports facility to a wider audience,
                                increasing your chances of getting more bookings and increasing your revenue. By listing
                                your
                                facility on our website, you will gain access to a large pool of sports enthusiasts and
                                players
                                who are actively looking for sports facilities in your area. Our website also offers a
                                user-friendly
                                registration process that allows you to manage your bookings, schedules, and other relevant
                                information
                                in one place.Register now on our sports venue registration website and take your business to
                                the next level!</p>
                        </li>
                    </ul><!-- End -->

                </div>
            </div>
        </div>
    </section>
@endsection
