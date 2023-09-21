@extends('layouts.dashboardApp')
@section('full-body')
    <!-- Form Start -->
    <div class="center-block">
        <div class="container-fluid pt-4 px-4 center-block" >
            <div class="row g-4">
                <div class="col-sm-12 col-xl-8" style="float: none; margin: 15px auto;">
                    <div class="bg-secondary rounded h-100 p-4">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h6 class="mb-4">Edit Product</h6>
                        <form action="{{ route('products.update',$result->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="name" class="form-control @error('name') is-invalid @enderror" name='name' id="name" required value="{{$result->name}}">
                                    @error('name')
                                    <p class="alert alert-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="menu" class="col-sm-2 col-form-label">Menu</label>
                                <div class="col-sm-10">
                                    <select class="form-select mb-3" aria-label="Default select example" name="menu_id" id="menu">
                                        <option value="0">Open this select menu</option>
                                        @forelse($menus as $key=>$data)
                                            <option value="{{$key}}" @if($result->menu_id==$key) selected @endif>{{ $data }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Price" class="form-control @error('price') is-invalid @enderror" name='price' id="price" required value="{{$result->price}}">
                                    @error('price')
                                    <p class="alert alert-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="weight"  class="col-sm-2 col-form-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Weight" class="form-control @error('weight') is-invalid @enderror" name='weight' id="weight" required value="{{$result->weight}}">
                                    @error('weight')
                                    <p class="alert alert-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="details" class="col-sm-2 col-form-label">Details</label>
                                <div class="col-sm-10">
                                    <textarea id="details" placeholder="details" rows="2" name="details" class="form-control @error('details') is-invalid @enderror">{{$result->details}}</textarea>
                                    @error('details')
                                    <p class="alert alert-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    @error('image')
                                    <p class="alert alert-danger pt-3">{{ $message }}</p>
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
