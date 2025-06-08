@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Compare')
@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="compare_box">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-reflow table-hover">
                                    <tbody>

                                        <tr class="pr_image">
                                            <td class="row_title">Product Image</td>
                                            <td class="row_title">PRODUCT NAME</td>
                                            <td class="row_title">PRODUCT PRICE</td>
                                            {{--  <td class="row_title">Product RATING</td> --}}
                                            <td class="row_title">Product CART</td>
                                            {{-- <td class="row_title">Product DESCRIPTION</td> --}}
                                            <td class="row_title">ITEM AVAILABILITY</td>
                                            <td class="row_title">ITEM Remove</td>
                                        </tr>
                                        @if (Session::has('compare'))
                                        @foreach(session('compare') as $id => $product)
                                        <tr>
                                            <td class="row_img"><img src="{{url('upload/product/',$product['photo'])}}"
                                                    alt="compare-img">
                                            </td>
                                            <td class="product_name"><a
                                                    href="{{route('frontend.product_view',$product['slug'])}}">{{$product['name']}}</a>
                                            </td>
                                            <td class="product_price"><span class="price">Rs{{$product['price']}}</span>
                                            </td>
                                            {{--  <td></td> --}}
                                            <td class="row_btn"><a
                                                    href="{{route('frontend.add_to_cart',$product['slug'])}}"
                                                    class="btn btn-fill-out"><i class="icon-basket-loaded"></i> </a>
                                            </td>
                                            {{--   <td class="row_text">
                                                <p>{{$product['name']}}
                                            </p>
                                            </td> --}}
                                            <td class="row_stock">
                                                @if ($product['quantity'] <= 1) <span class="in-stock">In Stock</span>
                                                    @else
                                                    <span class="out-stock">Out Of Stock</span>
                                                    @endif
                                            </td>
                                            <td class="row_remove">
                                                <a href="{{route('frontend.compare.delete',$product['product_id'])}}"><span>Remove</span>
                                                    <i class="fa fa-times"></i></a>
                                                {{-- <form action="{{route('frontend.compare.delete',$product['slug'])}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="tetd">
                                                    <a href="">
                                                        <i class="ti-close"></i>
                                                    </a>
                                                </button>

                                                </form> --}}
                                            </td>

                                        </tr>


                                        @endforeach

                                        @endif
                                        {{-- <tr class="pr_price">
                                            <td class="row_title">Price</td>


                                        </tr> --}}
                                        {{-- <tr class="pr_rating">
                                            <td class="row_title">Rating</td>
                                            <td>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%"></div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%"></div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%"></div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="pr_add_to_cart">
                                            <td class="row_title">Add To Cart</td>
                                            <td class="row_btn"><a href="#" class="btn btn-fill-out"><i
                                                        class="icon-basket-loaded"></i> Add To Cart</a></td>

                                        </tr>
                                        <tr class="description">
                                            <td class="row_title">Description</td>
                                            <td class="row_text">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text
                                                    ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                </p>
                                            </td>


                                        </tr>
                                        <tr class="pr_color">
                                            <td class="row_title">Color</td>
                                            <td class="row_color">
                                                <div class="product_color_switch">
                                                    <span data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </td>

                                        </tr>

                                        <tr class="pr_stock">
                                            <td class="row_title">Item Availability</td>
                                            <td class="row_stock"><span class="in-stock">In Stock</span></td>
                                            <td class="row_stock"><span class="out-stock">Out Of Stock</span></td>
                                            <td class="row_stock"><span class="in-stock">In Stock</span></td>
                                        </tr>


                                        <tr class="pr_remove">
                                            <td class="row_title"></td>
                                            <td class="row_remove">
                                                <a href="#"><span>Remove</span> <i class="fa fa-times"></i></a>
                                            </td>
                                            <td class="row_remove">
                                                <a href="#"><span>Remove</span> <i class="fa fa-times"></i></a>
                                            </td>
                                            <td class="row_remove">
                                                <a href="#"><span>Remove</span> <i class="fa fa-times"></i></a>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
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


</div>
<!-- END MAIN CONTENT -->


@endsection