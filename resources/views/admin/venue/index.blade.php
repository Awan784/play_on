@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <section class="dashboard">
        <div class="container-fluid">
            @include('admin.common.breadcrumbs')
            <div class="row border shadow p-2"
                style="background-color: white; height: auto; width: 100%; margin: 0px 0px 15px;">
                <a href="{{ route('admin.venue.edit', 0) }}"><button class="btn btn-success">Add New venue</button></a>
                <div class="col-12 col-sm-12 col-md-12 mt-2" id="data">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($venues as $key => $value)
                                <tr>
                                    <td class="width-10">{{ $key + 1 }}</td>
                                    <td class="width-20"><img src="{{ asset($value->image) }}" width="100px" height="100px"
                                            alt=""></td>
                                    <td class="width-20">{{ $value->name }}</td>
                                    <td class="width-20">{{ $value->description }}</td>
                                    <td class="width-15">{{ $value->price }}</td>
                                    <td class="width-15">{{ $value->location->name }}</td>
                                    <td class="width-15">{{ $value->category->name }}</td>
                                    <td class="width-20">
                                        <a href="{{ route('admin.venue.edit', $value->id) }}" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="javascript:{};" data-url="{{ route('admin.venue.destroy', $value->id) }}"
                                            title="Delete" class="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Record Found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
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
