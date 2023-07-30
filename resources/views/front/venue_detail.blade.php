@extends('front.layouts.app')

@section('content')
    <style>
        body {
            height: 100%;
            background-image: url('/assets/user/image/detailsx.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        #heading {
            font-family: 'Times New Roman', Times, serif;
        }

        .ui-datepicker-div {
            top: 39.6px;
        }
    </style>
    <div class="row justify-content-center text-center mt-5">

        <div class="container">
            <div class="row mt-5 mr-4">
                <!-- Venue Image -->
                <div class="col-md-6">
                    <img src="{{ asset($venue->image) }}" alt="Venue Image" height="40%" class="img-fluid rounded shadow">
                </div>
                <!-- Venue Information -->
                <div class="col-md-6">
                    <h2 class="text-white" id="heading">{{ $venue->name }}</h2>
                    <p class="text-white"><strong>Owner:</strong> {{ $venue->manager->name }}</p>
                    <p class="text-white">{{ $venue->description }}
                    </p>
                    <div class="container text-white">
                        <h2 id="heading">Available Timeslots for Venue Registration</h2>
                        <form action="{{ route('front.venue.register') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $venue->id }}" name="venue_id">
                            <div class="row">

                                <div class="form-group">
                                    <label for="phone_number">Time Slot</label>
                                    <input type="date" readonly
                                        class="form-control text-white bg-dark
                                    value=""
                                        id="datetimepicker" name="date" min="{{ date('Y-m-d', strtotime('today')) }}">


                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Start Time</label>
                                    <input type="text" readonly
                                        class="form-control text-white bg-dark
                                value=""
                                        id="timepicker" name="start_time">

                                </div>
                                <div class="form-group">
                                    <label for="phone_number">End Time</label>
                                    <input type="text" readonly
                                        class="form-control text-white bg-dark
                                value=""
                                        id="timepicker2" name="end_time">


                                </div>
                            </div>
                            <button class="btn btn-primary">Register</button>
                        </form>
                        <div wire:ignore style="padding-top: 120px">
                            <div id="paypal-button-container"></div>
                        </div>
                        {{-- <table class="table table-bordered text-white">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Slots Available</th>
                                        <th>Register</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2023-07-20</td>
                                        <td>10:00 AM - 11:00 PM</td>
                                        <td>5</td>
                                        <td><button class="btn btn-primary">Register</button></td>
                                    </tr>
                                    <tr>
                                        <td>2023-08-20</td>
                                        <td>2:00 PM - 3:00 PM</td>
                                        <td>3</td>
                                        <td></td>
                                    </tr>
                                    <!-- Add more timeslots here as needed -->
                                </tbody>
                            </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="today" value="{{ date('Y-m-d', strtotime('today')) }}">
    <input type="hidden" id="id" value="{{ $venue->id }}">
    <input type="text" id="result" value="">

    <script
        src="https://www.paypal.com/sdk/js?client-id=AYBpDpRJqtN3ZOqZVs9ZF-aS4bD8EO8LvcN7A-_X1HkNIPXM6ADA7W_a9CfRx5jUOEuiwkkQhMSwKe7_&currency=USD">
    </script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 300
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // console.log(orderData);
                    // alert('Thanks for shopping')
                    //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var img = $('#img').val()

                    $.ajax({
                        url: "/payment",
                        method: 'POST',
                        data: {
                            order: 300
                        },
                        success: function(result) {
                            console.log(result);
                            window.location = result
                            toastr.success(" Payment recieved Successfully", 'Success');
                            // $('#subCategory').html(result);
                        },
                        error: (error) => {
                            alert("Error")
                        }
                    })

                });
            }
        }).render('#paypal-button-container');
    </script>
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{-- <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script> --}}
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script>
        var specific = 6;
        $('#datetimepicker').datepicker({
            minDate: $('#today').val(),
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            dateFormat: 'yy-mm-dd',
            beforeShow: function(textbox, instance) {
                instance.dpDiv.css({
                    marginTop: '-342px',
                    // marginLeft: textbox.offsetWidth + 'px'
                });
            },
            beforeShowDay: disableSpecificWeekdays
            // weekends: ['02.08.2023', '03.01.2014', '04.01.2014', '05.01.2014', '06.01.2014'],
            // timepicker: false,
        });
        var id = $('#id').val();
        // var disabledWeekdays = $('#day').val(); // Monday and Friday
        var disabledWeekdays
        $.ajax({
            type: "GET",
            url: "/api/getDays/" + id,

            success: function(data) {
                disabledWeekdays = data
            },
        });
        // $(".week").html(data);
        // alert();
        function disableSpecificWeekdays(date) {
            var day = date.getDay();
            // var data = [];
            // $.get("/api/getDays/" + id, function(data, day) {
            return [disabledWeekdays.indexOf(day) != -1];
            // }); // Monday and Friday
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
    <script>
        $('#datetimepicker').on('change', function() {
            $('#timepicker').timepicker({
                // Set the start and end time (optional)
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '10:00am',
                maxTime: '04:00pm',
                disableTimeRanges: [
                    ['10:00am', '10:20am'],
                    ['4:20pm', '5:00pm']
                ],
            });
        })
        // $('#timepicker').on('change', function() {
        $('#timepicker2').timepicker({
            // Set the start and end time (optional)
            timeFormat: 'HH:mm',
            interval: 60,
            minTime: '10:00am',
            maxTime: '04:40pm',
            disableTimeRanges: [
                ['10:00am', '10:20am'],
                ['4:20pm', '5:00pm']
            ],
            change: calculate
        });

        function calculate() {
            // console.log('sadsdas');
            differenceHours.diff_hours('timepicker', 'timepicker2', 'result')

            var s = $('#timepicker').val();
            var e = $('#timepicker2').val();
            console.log(s, e, new Date(e) - new Date(s));
        }
        // })
    </script>
@endsection
