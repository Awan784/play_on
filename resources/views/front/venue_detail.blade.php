@extends('front.layouts.app')

@push('style-page-level')
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
    </style>
@endpush
@section('content')
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
                        <form action="{{ route('front.venue.register') }}" method="POST" id="venue_submit">
                            @csrf
                            <input type="hidden" value="{{ $venue->id }}" name="venue_id">
                            <div class="row">

                                <div class="form-group">
                                    <label for="phone_number">Time Slot</label>
                                    <input type="date" class="form-control text-white bg-dark" value=""
                                        id="datetimepicker" name="date" min="{{ date('Y-m-d', strtotime('today')) }}"
                                        readonly>


                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Start Time</label>
                                    <input type="text" readonly class="form-control text-white bg-dark" value=""
                                        id="timepicker" name="start_time">

                                </div>
                                <div class="form-group">
                                    <label for="phone_number">End Time</label>
                                    <input type="text" readonly class="form-control text-white bg-dark" value=""
                                        id="timepicker2" name="end_time">


                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Couch</label>



                                    <select class="form-control text-white bg-dark" name="couch_id">
                                        <option value="">----Select venue----</option>
                                        @foreach ($venue->coach as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('couch_id', $value->id) ? 'selected' : '' }}>
                                                {{ ucfirst($value->name) }}</option>
                                        @endforeach
                                    </select>

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
@endsection
@push('script-page-level')
    <script>
        var specific = 6;
        $('#datetimepicker').datepicker({
            minDate: $('#today').val(),
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            dateFormat: 'yy-mm-dd',
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css" rel="stylesheet" />
    <script>
        $('#datetimepicker').on('change', function() {
            console.log("Asasasa")
            var id = $('#id').val();
            var date = $(this).val()
            var date1 = new Date(date).getDay()
            var time;
            console.log(date, date1)
            $.ajax({
                type: 'GET',
                url: "/api/getTime/" + date1 + "/" + id,
                success: function(data) {
                    console.log(data.start_time)
                    start = moment(data.start_time, 'HH:mm:ss').format('HH:mm')
                    end = moment(data.end_time, 'HH:mm:ss').format('HH:mm')
                    console.log(start, end)

                    $('#timepicker').timepicker({
                        // Set the start and end time (optional)
                        // 'timeFormat': 'h:i A',
                        'interval': 60,
                        "minTime": start,
                        "maxTime": end,
                        "disableTimeRanges": [
                            [convertTimeToTimepickerFormat('17:00'),
                                convertTimeToTimepickerFormat('20:00')
                            ],
                        ],
                        change: function(time) {
                            var element = $(this),
                                text;
                            // get access to this Timepicker instance
                            var timepicker = element.timepicker();
                            text = timepicker.format(time);
                            $('#timepicker2').timepicker({
                                // Set the start and end time (optional)
                                // timeFormat: 'HH:mm',
                                interval: 60,
                                minTime: text,
                                maxTime: '20:00',
                                disableTimeRanges: [
                                    ['10:00am', '10:20am'],
                                    ['4:20pm', '5:00pm']
                                ],
                                // change: calculate
                            });
                            console.log(text)
                        }
                    });
                },
                // error: function()
            })
        })

        function convertTimeToTimepickerFormat(time) {
            const [hours, minutes] = time.split(':');
            return `${hours}:${minutes}`;
        }

        $('#timepicker').on('input change', function() {
            console.log($(this).val())
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
        })

        function calculate() {
            // console.log('sadsdas');
            differenceHours.diff_hours('timepicker', 'timepicker2', 'result')

            var s = $('#timepicker').val();
            var e = $('#timepicker2').val();
            console.log(s, e, new Date(e) - new Date(s));
        }
        // })
    </script>
@endpush
