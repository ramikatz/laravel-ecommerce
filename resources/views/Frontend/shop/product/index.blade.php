@extends('Frontend.layout.main')
@section('title',$product->product_title)
@section('description',$product->meta)
@section('keywords',$product->keywords)
@section('secondlink',route('frontend.shop.show'))
@section('secondname','Products')
@section('thirdname',$product->product_title)

@section('content')

<!-- START MAIN CONTENT -->

<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row d-flex justify-content-center">


                <div class="col-lg-5 col-md-5">
                    <div class="single-product">
                        <div class="imageproduct">

                            <img src="{{url('upload/product/',$product->image)}}" height="440" width="100%" alt=""
                                id="ProductImg">
                        </div>

                        <br>
                        <div class="small-img-row">
                            <div class="small-img-col">
                                <img src="{{url('upload/product/',$product->image)}}" height="100" width="100%" alt=""
                                    class="small-img">
                            </div>

                            @foreach ($product->productimages->take(3) as $item)
                            <div class="small-img-col">
                                <img src="{{url('upload/product/',$item->images)}}" height="100" width="100%" alt=""
                                    class="small-img">
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">

                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="#">{{$product->product_title}}</a></h4>
                            <div class="product_price">
                                <span class="price">Rs.{{$product->sale_price}}</span>
                                <del>Rs.{{$product->regular_price}}</del>
                                <div class="col-12">
                                    <br />
                                    @if ($product->quantity == '0')
                                    <span class="badge badge badge-danger">Available Stock : {{$product->quantity}}
                                    </span>
                                    @endif
                                    @if (!$product->quantity == '0')
                                    <span class="badge badge badge-success">Available Stock : {{$product->quantity}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="rating_wrap">
                                <span class="rating_num">Reviews @if ($reviews)
                                    ({{$reviews->count()}})
                                    @endif
                                </span>
                            </div>
                            <div class="pr_desc col-12">
                                <p>{{$product->product_sub}}</p>
                            </div>
                            <div class="product_sort_info col-12">
                                <ul>
                                    {{--  <li><i class="linearicons-shield-check"></i> 2 Year Brand Warranty
                                    </li> --}}
                                    {{--  <li><i class="linearicons-sync"></i> 30 Day Return Policy</li> --}}
                                    <li><i class="linearicons-sync"></i><a
                                            href="{{route('frontend.location.index')}}">Support Locations</a></li>
                                    <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available </li>
                                </ul>
                                <br />
                                <div class="sdescription">
                                    {!! $product->sdescription !!}
                                </div>
                            </div>


                            <form action="{{route('frontend.productpage')}}" method="post">
                                @csrf

                                {{-- <div class="pr_switch_wrap">
                                <span class="switch_lable">Color</span>
                                <div class="product_color_switch">
                                    <span class="active" data-color="#87554B"></span>
                                    <span data-color="#333333"></span>
                                    <span data-color="#DA323F"></span>
                                </div>
                            </div>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Size</span>
                                <div class="product_size_switch">
                                    <span>xs</span>
                                    <span>s</span>
                                    <span>m</span>
                                    <span>l</span>
                                    <span>xl</span>
                                </div>
                            </div> --}}
                        </div>
                        <hr />
                        <div class="cart_extra">


                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                                <div class="cart_btn">
                                    <a class="add_compare" href="{{route('frontend.compare.edit',$product->id)}}"><i
                                            class="icon-shuffle"></i></a>
                                    <a class="add_wishlist" href="{{route('frontend.add_to_wishlist',$product->slug)}}">
                                        <i class="icon-heart"></i>
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr />
                        <div class="cart_btn">
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <button type="submit" name="buy" value="buy" id="buy" class="btn-fill-out btn-addtocart">
                                <i class="icon-basket-loaded"></i>
                                Buy Now
                            </button>
                            <button type="submit" name="cart" value="cart" id="cart" class="btn-fill-out btn-addtocart">
                                <i class="icon-basket-loaded"></i>
                                Add To Cart
                            </button>
                            </form>
                        </div>
                        <ul class="product-meta">
                            {{--  <li>SKU: <a href="#">BE45VGRT</a></li> --}}
                            {{--  <li>Category: <a href="#">Clothing</a></li> --}}
                            {{--  <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li> --}}
                        </ul>

                        <div class="product_share">
                            {{-- <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description"
                                    role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info"
                                    role="tab" aria-controls="Additional-info" aria-selected="false">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                    aria-controls="Reviews" aria-selected="false">Reviews @if ($reviews)
                                    ({{($reviews->count())}})

                                    @endif</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active col-12" id="Description" role="tabpanel"
                                aria-labelledby="Description-tab">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane fade col-12" id="Additional-info" role="tabpanel"
                                aria-labelledby="Additional-info-tab">
                                {!! $product->content !!}
                            </div>
                            <div class="tab-pane fade col-12" id="Reviews" role="tabpanel"
                                aria-labelledby="Reviews-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="comments">
                                            <h5 class="product_tab_title">@if ($reviews) {{($reviews->count())}} @endif
                                                Review For
                                                <span>{{$product->product_title}}</span>
                                            </h5>
                                            <ul class="list_none comment_list mt-4">
                                                @if ($reviews)
                                                @foreach ($reviews as $review)


                                                <li>
                                                    <div>
                                                        <h6>{{$review->user->Fname}}</h6>
                                                    </div>
                                                    <div class="comment_img">
                                                        <img src="{{url('upload/user/',$review->user->image)}}"
                                                            alt="user1" />
                                                    </div>
                                                    <div class="comment_block">
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate"
                                                                    style="width:{{$review->rating}}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="customer_meta">
                                                            <span class="review_author">{{$review->title}}</span>
                                                            <span class="comment-date">{{$review->created_at}}</span>
                                                        </p>
                                                        <div class="description">
                                                            <p>{{$review->review_des}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                {{ $reviews->links() }}
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="review_form field_form">
                                            <h5>Add a review</h5>
                                            <form class="row mt-3" action="{{route('frontend.review.store')}}"
                                                method="post">
                                                @csrf
                                                <div class="container">
                                                    <div class="starrating risingstar d-flex ml-3 col-md-6  ">
                                                        <div class="d-flex flex-row-reverse">
                                                            <input type="radio" id="star5" name="rating" value="100" />
                                                            <label for="star5" title="5 star"></label>
                                                            <input type="radio" id="star4" name="rating" value="80" />
                                                            <label for="star4" title="4 star"></label>
                                                            <input type="radio" id="star3" name="rating" value="60" />
                                                            <label for="star3" title="3 star"></label>
                                                            <input type="radio" id="star2" name="rating" value="40" />
                                                            <label for="star2" title="2 star"></label>
                                                            <input type="radio" id="star1" name="rating" value="20" />
                                                            <label for="star1" title="1 star"></label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <input class="form-control" name="product_id" value="{{$product->id}}"
                                                    type="hidden" placeholder="">
                                                <div class="form-group col-12">
                                                    <input type="text" name="review_title" class="form-control"
                                                        required="required" placeholder="Your review Title">
                                                </div>
                                                <div class="form-group col-12">
                                                    <textarea required="required" placeholder="Your review *"
                                                        class="form-control" name="review_des" rows="4"></textarea>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{$product->id}}">


                                                <div class="form-group col-12">
                                                    <button type="submit" class="btn btn-fill-out" name="submit"
                                                        value="Submit">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Customer Reviews</h5>

                                        <div class="container">
                                            <div class="row">
                                                <div class="namestar col-md-2">
                                                    <span>5 Stars</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress ">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{$percent5}}%;" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{round($percent5, 2)}}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="namestar col-md-2">
                                                    <span>4 Stars</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress ">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{$percent4}}%;" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{round($percent4, 2)}}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="namestar col-md-2">
                                                    <span>3 Stars</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress ">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{$percent3}}%;" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{round($percent3, 2)}}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="namestar col-md-2">
                                                    <span>2 Stars</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress ">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{$percent2}}%;" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{round($percent2, 2)}}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="namestar col-md-2">
                                                    <span>1 Stars</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress ">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{$percent1}}%;" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{round($percent1, 2)}}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Ruler --}}
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            {{-- Releted Products --}}
            <div class="row">
                <div class="col-12">
                    <div class="section small_pb small_pt">

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="heading_s1 text-center">
                                    <h2>Our Trending Items</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="row">


                                @foreach ($Newarrivals->take(10) as $item)
                                @include('Frontend.components.horizontal_shop')
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

<script>
    var ProductImg = document.getElementById("ProductImg");
  var SmallImg = document.getElementsByClassName("small-img");

  SmallImg[0].onclick =function () {
    ProductImg.src = SmallImg[0].src;
  }
    SmallImg[1].onclick =function () {
    ProductImg.src = SmallImg[1].src;
  }
  SmallImg[2].onclick =function () {
    ProductImg.src = SmallImg[2].src;
    }
  SmallImg[3].onclick =function () {
    ProductImg.src = SmallImg[3].src;
  }

</script>
@endsection