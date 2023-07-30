@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <section class="dashboard">
        <div class="container-fluid">
            @include('admin.common.breadcrumbs')
            <div class="row border shadow p-2"
                style="background-color: white; height: auto; width: 100%; margin: 0px 0px 15px;">
                <div class="col-12 col-sm-12 col-md-12 mt-2" id="data">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Customer </th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (auth()->user()->role_id == 1)
                                @forelse ($order as $key=> $value)
                                    <tr>
                                        <td class="width-10">{{ $key + 1 }}</td>
                                        <td class="width-20">{{ $value->user->name }}</td>
                                        <td class="width-20">{{ $value->venue->name }}</td>
                                        <td class="width-15">{{ $value->date }}</td>
                                        <td class="width-15">{{ $value->start_time }}</td>
                                        <td class="width-15">{{ $value->end_time }}</td>
                                        <td class="width-15">{{ $value->status }}
                                        </td>
                                        <td class="width-20">
                                            {{-- <a href="{{ route('admin.user.show', $value->id) }}" title="Edit">
                                                <i class="fa fa-thumbs-{{ $value->status == 1 ? 'down' : 'up' }}"></i></a> --}}
                                            {{-- <a href="javascript:{};" data-url="{{ route('admin.venues.destroy', $value->id) }}"
                                                    title="Delete" class="delete"><i class="fa fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Record Found.</td>
                                    </tr>
                                @endforelse
                            @else
                                @forelse(auth()->user()->venue as $key => $value)
                                    @foreach ($value->order as $value2)
                                        <tr>
                                            <td class="width-10">{{ $key + 1 }}</td>
                                            <td class="width-20">{{ $value->name }}</td>
                                            <td class="width-20">{{ $value->cnic }}</td>
                                            <td class="width-15">{{ $value->phone_number }}</td>
                                            <td class="width-15">{{ $value->location->name }}</td>
                                            <td class="width-15">{{ $value->category }}</td>
                                            <td class="width-15">{{ $value->status == 1 ? 'Activated' : 'Deactivated' }}
                                            </td>
                                            <td class="width-20">
                                                <a href="{{ route('admin.user.show', $value->id) }}" title="Edit">
                                                    <i
                                                        class="fa fa-thumbs-{{ $value->status == 1 ? 'down' : 'up' }}"></i></a>
                                                {{-- <a href="javascript:{};" data-url="{{ route('admin.venues.destroy', $value->id) }}"
                                                    title="Delete" class="delete"><i class="fa fa-trash"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="8">No Record Found.</td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-page-level')
@endpush
