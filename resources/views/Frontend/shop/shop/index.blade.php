@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Shop')
@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach ($products as $item)

                    <div class="col-md-12 col-12">
                        <div class="product p-2">
                            <div class="row">
                                <div class="product_img col-md-3 col-lg-5">
                                    <a href="{{route('frontend.product_view',$item->slug)}}">
                                        <img class="mx-auto d-block" height="200px"
                                            src="{{url('upload/product/',$item->image)}}" alt="product_img1">
                                    </a>
                                </div>
                                <div class="product_info col-md-9 col-lg-7 mx-auto d-block">
                                    <h6 class="product_title"><a
                                            href="{{route('frontend.product_view',$item->slug)}}">{{$item->product_title}}</a>
                                    </h6>
                                    <div class="product_price">
                                        <span class="price">${{$item->sale_price}}</span>
                                        <del>Rs.{{$item->regular_price}}</del>
                                        <div class="on_sale">
                                            {{--   <span>35% Off</span> --}}
                                        </div>
                                    </div>
                                    <div class="rating_wrap">

                                        <span class="rating_num"> Reviews (
                                            @php
                                            {{$review = App\Models\ Review::where('product_id',$item->id)->get(); }}
                                            //dd($productcategories);
                                            @endphp


                                            {{($review->count())}}



                                            )</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>{{$item->product_sub}}</p>
                                    </div>
                                    {{-- <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"
                                                style="background-color: rgb(135, 85, 75);"></span>
                                            <span data-color="#333333"
                                                style="background-color: rgb(51, 51, 51);"></span>
                                            <span data-color="#DA323F"
                                                style="background-color: rgb(218, 50, 63);"></span>
                                        </div>
                                    </div> --}}
                                    <br>

                                    <div class="row">
                                        <div class="cart_extra col-md-12 col-lg-12">
                                            <form action="{{route('frontend.productpage')}}" method="post">
                                                @csrf

                                                <div class="cart-product-quantity">
                                                    <div class="quantity">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" name="quantity" value="1" title="Qty"
                                                            class="qty" size="4">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                    <div class="cart_btn">
                                                        <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                                        <a class="add_wishlist"
                                                            href="{{route('frontend.add_to_wishlist',$item->slug)}}">
                                                            <i class="icon-heart"></i>
                                                        </a>

                                                    </div>
                                                </div>

                                        </div>
                                        <hr />
                                        <div class="cart_btn">
                                            <div class="col-md-12 col-lg-12">
                                                <input type="hidden" value="{{$item->id}}" name="product_id">
                                                <button type="submit" name="buy" value="buy" id="buy"
                                                    class="p-2 btn-fill-out btn-addtocart">
                                                    <i class="icon-basket-loaded"></i>
                                                    Buy Now
                                                </button>
                                                <button type="submit" name="cart" value="cart" id="cart"
                                                    class="p-2 btn-fill-out btn-addtocart">
                                                    <i class="icon-basket-loaded"></i>
                                                    Add To Cart
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                        {{--     <div class="list_product_action_box mt-2">
                                            <ul class="list_none pr_action_btn">
                                                <li><a href="shop-compare.html" class="popup-ajax"><i
                                                            class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                            class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div> --}}
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                {{$products->links()}}
                            </div>
                            {{-- <ul class="pagination mt-3 justify-content-center pagination_style1">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="linearicons-arrow-right"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>

                            @foreach ($categorymenu->take(8) as $item)
                            <ul class="widget_categories">

                                <li>
                                    <a href="{{route('frontend.category.show',$item->slug)}}"><span
                                            class="categories_name">{{$item->name}}</span>
                                    </a>
                                </li>

                            </ul>
                            @endforeach
                        </div>

                        @include('Frontend.components.sidebarcategorymenu')


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->


</div>
<!-- END MAIN CONTENT -->

@endsection