<div class="widget">
    <h5 class="widget_title">Trending</h5>
    <div class="row">
        @foreach ($categorysidebar->take(5) as $item)

        <div class="col-md-12 col-12">
            <div class="product p-2">

                <div class="product_img col-md-12 col-lg-12">
                    <a href="{{route('frontend.product_view',$item->slug)}}">
                        <img class="mx-auto d-block" height="200px" src="{{url('upload/product/',$item->image)}}"
                            alt="product_img1">
                    </a>
                </div>
                <div class="product_info col-md-12 col-lg-12 mx-auto d-block">
                    <h6 class="product_title"><a
                            href="{{route('frontend.product_view',$item->slug)}}">{{$item->product_title}}</a>
                    </h6>
                    <div class="product_price">
                        <span class="price">${{$item->sale_price}}</span>
                        <del>Rs.{{$item->regular_price}}</del>
                        <div class="on_sale">
                            {{--  <span>35% Off</span> --}}
                        </div>
                    </div>
                    <div class="rating_wrap">
                        <span class="rating_num"> Reviews (
                            @php
                            {{$review = App\Models\ Review::where('product_id',$item->id)->get(); }}
                            //dd($review);
                            @endphp
                            {{($review->count())}})
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>