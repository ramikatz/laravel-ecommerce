<div class="section small_pb small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="heading_s4 text-center">
                    <h2>Top Categories</h2>
                </div>
                <p class="text-center leads">In the developed world, we are surrounded by electronics - from the
                    computers on our desks to the smart phones in our
                    pockets to the thermostats in our homes to our data in the virtual cloud.
                </p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12">
                <div class="row cat_slider cat_style1 mt-4 mt-md-0  " data-responsive=''>
                    @foreach ($productcategories->take(6) as $item)
                    <div class="item col-md-2 col-lg-2">
                        <div class="categories_box">
                            <a href="{{route('frontend.category.show',$item->slug)}}">
                                <img src="{{url('upload/productcategory/',$item->image)}}" height="100px"
                                    alt=" cat_img1" class="" />
                                <span>{{$item->name}}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>