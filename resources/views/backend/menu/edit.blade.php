@extends('layouts.dashboardApp')
@section('full-body')
    <!-- Form Start -->
    <div class="center-block">
        <div class="container-fluid pt-4 px-4 center-block" >
            <div class="row g-4">
                <div class="col-sm-12 col-xl-8" style="float: none; margin: 15px auto;">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">New Menu</h6>
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
                            <div class="row mb-3" >
                                <legend class="col-form-label col-sm-2 pt-0"></legend>
                                <div class="col-sm-10">
                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" id="subMenuCheck" @if(!$result->childMenu) checked @endif>
                                        <label class="form-check-label" for="subMenuCheck">
                                            Is this the Child menu?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" id="subMenuDisplay" style="display: none;">
                                <label for="subMenu" id="countData" data-count="{{count($result->childMenu)}}" class="col-sm-2 col-form-label">Child Menu</label>
                                <div class="col-sm-10">
                                    @forelse($result->childMenu as $k=>$d)
                                        <select class="form-select mb-3 subMenuArr" aria-label="Default select example" name="child_id[]" id="subMenu">
                                            <option value="0">Open this select menu</option>
                                            @forelse($menus as $key=>$data)
                                                <option value="{{$key}}" @if($key==$d->id) selected @endif>{{ $data }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    @empty
                                        <select class="form-select mb-3 subMenuArr" aria-label="Default select example" name="child_id" id="subMenu">
                                            <option value="0">Open this select menu</option>
                                            @forelse($menus as $key=>$data)
                                                <option value="{{$key}}">{{ $data }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    @endforelse
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
    <script>
        $(document).ready(function() {
            if($('#countData').data("count")<=0)
            {

                $("#subMenuCheck").prop('checked', true);
            }
            else{
                $("#subMenuDisplay").show();
            }

            $('#subMenuCheck').click(function() {
                if ($(this).is(':checked')) {
                    $(this).attr('value', 'true');
                    $('.subMenuArr').val('0');
                    $("#subMenuDisplay").hide();

                } else {
                    $(this).attr('value', 'false');
                    $("#subMenuDisplay").show();

                }
            });
        });
    </script>
@endsection
