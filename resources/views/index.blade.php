@extends('layouts.frontendApp')

@section('fcontent')
    @include('partials.frontend.header')
    @include('partials.frontend.navbar')
    @include('partials.frontend.banner')
    <!--about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
            <h1 class="about_taital">About Our Shop</h1>
            <div class="image_3"><img src="{{asset('frontend/images/img-3.png')}}"></div>
            <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content
                of a page when looking at its layout. The point of using Lorem</p>
            <div class="read_bt_1"><a href="#">Read More</a></div>
        </div>
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
                                <p class="tempor_text"><?php echo substr($velue->details, 0, 40) ?> .... </p>
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
    <!--about section end -->
    <!--choose section start -->
    <div class="choose_section layout_padding">
        <div class="container">
            <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
            <h1 class="about_taital">Why Choose Us</h1>
            <div class="image_3"><img src="{{asset('frontend/images/img-14.png')}}"></div>
            <p class="lorem_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
            <div class="read_bt_1"><a href="#">Read More</a></div>
        </div>
    </div>
    <!--choose section end -->
    <!--testimonial section start -->
    <div class="testimonial_section layout_padding">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
                        <h1 class="about_taital">Testimonial</h1>
                        <div class="testimonial_main">
                            <div class="client_main">
                                <div class="client_left">
                                    <div><img src="{{asset('frontend/images/client-img.png')}}" class="client_img">
                                    </div>
                                </div>
                                <div class="client_right">
                                    <h4 class="magna_text">Magna</h4>
                                    <p class="consectetur_text">Consectetur adipiscing</p>
                                </div>
                            </div>
                            <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrudLorem ipsum</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
                        <h1 class="about_taital">Testimonial</h1>
                        <div class="testimonial_main">
                            <div class="client_main">
                                <div class="client_left">
                                    <div><img src="{{asset('frontend/images/client-img.png')}}" class="client_img">
                                    </div>
                                </div>
                                <div class="client_right">
                                    <h4 class="magna_text">Magna</h4>
                                    <p class="consectetur_text">Consectetur adipiscing</p>
                                </div>
                            </div>
                            <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrudLorem ipsum</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
                        <h1 class="about_taital">Testimonial</h1>
                        <div class="testimonial_main">
                            <div class="client_main">
                                <div class="client_left">
                                    <div><img src="{{asset('frontend/images/client-img.png')}}" class="client_img">
                                    </div>
                                </div>
                                <div class="client_right">
                                    <h4 class="magna_text">Magna</h4>
                                    <p class="consectetur_text">Consectetur adipiscing</p>
                                </div>
                            </div>
                            <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrudLorem ipsum</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class=""><img src="{{asset('frontend/images/left-icon1.png')}}"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class=""><img src="{{asset('frontend/images/right-icon1.png')}}"></i>
                </a>
            </div>
        </div>
    </div>
    <!--testimonial section end -->
    <!--contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="image_2"><img src="{{asset('frontend/images/img-2.png')}}"></div>
            <h1 class="about_taital">Contact Us</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mail_sectin">
                        <input type="text" class="email-bt" placeholder="Your Name" name="Name">
                        <input type="text" class="email-bt" placeholder="Email" name="Name">
                        <input type="text" class="email-bt" placeholder="Phone Number" name="Name">
                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment"
                                  name="Massage"></textarea>
                        <div class="send_bt"><a href="#">Send</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                width="600" height="480" frameborder="0" style="border:0; width: 100%;"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact section end -->
    @include('partials.frontend.footer')

@endsection

