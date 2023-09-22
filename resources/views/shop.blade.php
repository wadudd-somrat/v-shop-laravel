@extends('layouts.frontendApp')

@section('fcontent')
    @include('partials.frontend.header')
    @include('partials.frontend.navbar')
    <!--about section start -->
    <div class="about_section ">
        <!--vegetables  section start -->
        <div class="vegetables_section layout_padding">
            <div class="container">
                <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
                <h1 class="about_taital">Our Vegetables</h1>
                <p class="lorem_text">Reader will be distracted by the readable content of a</p>
                <div class="vegetables_section_2 layout_padding">
                    <div class="row">
                        @forelse($results as $key=>$velue)

                            <div class="col col-3">
                                <div class="box_section">
                                    <div class="image_4"><img src="{{asset('storage/product-images/'.$velue->image)}}"></div>
                                    <h2 class="dolor_text">$<span style="color: #ebc30a;">{{ $velue->price }}</span></h2>
                                    <h2 class="dolor_text">{{ $velue->name }}</h2>
                                    <h2 class="dolor_text_1">{{ $velue->weight }} kg</h2>
                                    <p class="tempor_text"><?php echo substr($velue->details, 0, 40) ?> ....<!--adipiscing elit, sed do eiusmod tempor--> </p>
                                    <div class="buy_bt_1 active"><a href="#">Details</a></div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="read_bt_1"><a href="#">Read More</a></div>
            </div>
        </div>
        <!--vegetables section end -->
    </div>
    @include('partials.frontend.footer')

@endsection

