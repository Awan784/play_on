@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <section class="dashboard">
        <div class="container-fluid">
            @include('admin.common.breadcrumbs')
            <div class="row border shadow p-2"
                style="background-color: white; height: auto; width: 100%; margin: 0px 0px 15px;">
                <a href="{{ route('admin.couch.edit', 0) }}"><button class="btn btn-success">Add New Couch</button></a>
                <div class="col-12 col-sm-12 col-md-12 mt-2" id="data">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Venue Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(auth()->user()->couch as $key => $value)
                                <tr>
                                    <td class="width-10">{{ $key + 1 }}</td>

                                    <td class="width-20">{{ $value->name }}</td>
                                    <td class="width-20">{{ $value->venue->name }}</td>
                                    <td class="width-20">
                                        <a href="{{ route('admin.couch.edit', $value->id) }}" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.couch.show', $value->id) }}" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Record Found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr#</th>
                                <th>Venue Name</th>
                                <th>Name</th>

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
