@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Wish List')
@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive wishlist_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    {{--        <th class="product-stock-status">Stock Status</th> --}}
                                    <th class="product-add-to-cart"></th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($wishlists as $wishlist)

                                    <td class="product-thumbnail"><a
                                            href="{{route('frontend.product_view',$wishlist->slug)}}"><img
                                                src="{{url('upload/product/',$wishlist->image)}}"
                                                alt="{{$wishlist->product_title}}"></a>
                                    </td>
                                    <td class="product-name" data-title="Product"><a
                                            href="{{route('frontend.product_view',$wishlist->slug)}}">

                                            {{$wishlist->product_title}}

                                        </a>
                                    </td>
                                    <td class="product-price" data-title="Price">Rs.{{$wishlist->sale_price}}</td>

                                    <td class="product-add-to-cart">


                                        <form action="{{route('frontend.productpage')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$wishlist->id}}" name="product_id">
                                            <input type="hidden" value="1" name="quantity">
                                            <button type="submit" name="cart" value="cart" id="cart"
                                                class="btn-fill-out btn-addtocart">
                                                <i class="icon-basket-loaded"></i>
                                                Add To Cart
                                            </button>
                                        </form>
                                    </td>


                                    <td class="product-remove" data-title="Remove">
                                        <form action="{{route('frontend.wishlist.destroy',$wishlist)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="tetd">
                                                <a href="">
                                                    <i class="ti-close"></i>
                                                </a>
                                            </button>

                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

@endsection