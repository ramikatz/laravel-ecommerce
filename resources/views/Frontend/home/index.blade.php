@extends('Frontend.layout.main')

@section('content')

<!-- START SECTION BANNER -->
{{-- <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">

        <div class="carousel-inner">
            @foreach ($slidingBanner->take(2) as $item)
            <div class="carousel-item background_bg @if($loop->first) active @endif"
                data-img-src="{{url('upload/product/',$item->image)}}">
@endforeach
<div class="banner_slide_content banner_content_inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-10">
                @foreach ($slidingBanner as $item)
                <div class="banner_content overflow-hidden">
                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                        {{$item->product_title}}</h2>
                    <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft"
                        data-animation-delay="1s">Get up to <span class="text_default">50%</span> off Today Only!</h5>
                    <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html"
                        data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>

<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i
        class="ion-chevron-left"></i></a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i
        class="ion-chevron-right"></i></a>
</div>
</div> --}}



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach ($slider->take(5) as $item)
        <div class="carousel-item @if($loop->first) active @endif">

            <img class="d-block w-100" height="550" src="{{url('upload/productcategory/',$item->image)}}"
                alt="First slide">
            <div class="searchmore">
                <div class="d-block col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">


                        <button type="button" class="categories_btn categories_menu collapsed" aria-expanded="false">
                            <span> <i class="lnr lnr-location"></i> <a style="color: white;"
                                    href="{{route('frontend.category.show',$item->slug)}}">Search More</a> </span><i
                                class=""></i>
                        </button>

                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color: #ffffff;
    font-family: 'Roboto';
    background-color: #2c2c2ca1;
    padding: 13px;">{{$item->discription}}</h5>

            </div>

        </div>

        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>




<!-- END SECTION BANNER -->

<!-- MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION CATEGORIES -->
    @include('Frontend.components.top_category')
    <!-- END SECTION CATEGORIES -->

    <!-- START SECTION SHOP -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Smart Phones | Flag Ship | Mid Range </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    @foreach ($phones->products as $item)
                    @include('Frontend.components.horizontal_shop')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="{{ url('category/show/phones') }}">
                            <img src="{{asset('upload/banner/iphone.jpg')}}" alt="shop_banner_img11">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->

    <!-- START SECTION Trending Item SHOP -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Smart Tvs | 4k | 3D </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    @foreach ($tvs->products as $item)
                    @include('Frontend.components.horizontal_shop')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="{{ url('category/show/phones') }}">
                            <img src="{{asset('upload/banner/iphone.jpg')}}" alt="shop_banner_img11">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Home Theater Systems</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    @foreach ($hometheater->products as $item)
                    @include('Frontend.components.horizontal_shop')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->


@endsection