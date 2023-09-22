@extends('layouts.dashboardApp')
@section('full-body')
    <!-- Form Start -->
    <div class="center-block">
        <div class="container-fluid pt-4 px-4 center-block" >
            <div class="row g-4">
                <div class="col-sm-12 col-xl-8" style="float: none; margin: 15px auto;">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Edit Menu</h6>
                        <form action="{{ route('menus.update',$result->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name='name' value="{{$result->name}}" id="name" required>
                                    @error('name')
                                    <p class="alert alert-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

@endsection

@section('js-custom')
@endsection
