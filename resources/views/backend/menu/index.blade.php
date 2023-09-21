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
                <a class="btn btn-primary" type="button" href="{{route('menus.create')}}">New</a>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sub Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($results as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->name }}</td>
                            <td>
                                @forelse($data->childMenu as $d)
                                    <span class="badge bg-success">{{$d->name}}</span>
                                @empty
                                    <p>No Data</p>
                                @endforelse

                            </td>
                            <td>
                                <a href="{{ route('menus.edit',$data->id) }}">Edit</a>
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
