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
                <div class="col-md-12">
                    <table class="table-body"
                        style=" width: 80%;
                    margin-left: 10%;
                    background-color: white;">
                        <thead class="p-3">
                            <tr class="">
                                <th>
                                    ID
                                </th>
                                <th>Venue Name</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End TIme</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->orders as $value)
                                <tr>
                                    <td>
                                        {{ $value->id }}
                                    </td>
                                    <td>
                                        {{ $value->venue->name }}
                                    </td>
                                    <td>
                                        {{ $value->date }}
                                    </td>
                                    <td>
                                        {{ $value->start_time }}
                                    </td>
                                    <td>
                                        {{ $value->end_time }}
                                    </td>
                                    <td>
                                        {{ $value->status == 'Pending' ? ($value->date > \Carbon\Carbon::now()->toDateString() ? 'Processing' : 'Pending') : 'Completed' }}
                                    </td>
                                    <td>
                                        @if ($value->status == 'Feedback')
                                            <a href="{{ route('front.feedback', $value->id) }}" class="btn btn-primary"
                                                title="feedback">FeedBack</a>
                                        @elseif($value->date > \Carbon\Carbon::now()->toDateString())
                                            <a href="{{ route('front.order.delete', $value->id) }}" class="btn btn-primary"
                                                title="delete">Delete</a>
                                        @else
                                            check location
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
