<a href="{{route('frontend.product_view',$item->slug)}}">
    <div class=" item col-md-3 col-lg-3">
        <div class="product_wrap">
            <div class="product_img">
                <a href="shop-product-detail.html">
                    <img class="mx-auto d-block" src="{{url('upload/product/',$item->image)}}" height="150px"
                        alt="el_img1">
                    <img class="product_hover_img mx-auto d-block" src="{{url('upload/product/',$item->image)}}"
                        alt="el_hover_img1">
                </a>
                <div class="product_action_box">
                    <ul class="list_none pr_action_btn">
                        <li class="add-to-cart">



                        </li>
                        {{-- <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a>
                        </li> --}}
                        <li><a href="{{route('frontend.product_view',$item->slug)}}"><i
                                    class="icon-magnifier-add"></i></a></li>
                        <li><a href="{{route('frontend.add_to_wishlist',$item->slug)}}"><i class="icon-heart"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product_info">
                <h6 class="product_title"><a
                        href="{{route('frontend.product_view',$item->slug)}}">{{$item->product_title}}</a>
                </h6>
                <div class="product_price">
                    <span class="price">Rs.{{$item->regular_price}}</span>
                    <del>Rs.{{$item->sale_price}}</del>
                    <div class="on_sale">
                        {{--  <span>35% Off</span> --}}
                    </div>
                </div>
                <div class="rating_wrap">

                    <span class="rating_num">Reviews (
                        @php
                        {{$review = App\Models\ Review::where('product_id',$item->id)->get(); }}
                        //dd($review);
                        @endphp
                        {{($review->count())}})</span>
                </div>
                <div class="pr_desc">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                </div>
            </div>
        </div>
    </div>
</a>