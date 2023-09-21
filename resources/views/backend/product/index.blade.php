@extends('layouts.dashboardApp')

@section('full-body')

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Menu Table</h6>
                <a class="btn btn-primary" href="{{route('products.create')}}">New</a>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Details</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($results as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->weight }}</td>
                            <td><p>{{ $data->details }}</p></td>
                            <td>{{ $data->image }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('products.edit',$data->id) }}">Edit</a>
                                <a class="btn btn-dark" href="{{ route('products.show',$data->id) }}">Details</a>
                                <a class="btn btn-block" href="{{ route('products.delete',$data->id) }}">Delete</a>

                            </td>
                        </tr>
                        @empty
                        <p>No Data</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
