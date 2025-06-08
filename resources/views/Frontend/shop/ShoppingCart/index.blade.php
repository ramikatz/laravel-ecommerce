@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Cart Page')
@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name" style="width: 27%;">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (Session::has('cart'))
                                <?php $total = 0 ?>
                                @foreach(session('cart') as $id => $product)
                                <?php $total += $product['price'] * $product['quantity'] ?>

                                <tr>
                                    <td class="product-thumbnail"><a
                                            href="{{route('frontend.product_view',$product['slug'])}}"><img
                                                src="{{url('upload/product/',$product['photo'])}}" alt="product2"></a>
                                    </td>
                                    <td class="product-name" data-title="Product"><a
                                            href="{{route('frontend.product_view',$product['slug'])}}">{{$product['name']}}</a>
                                    </td>
                                    <td class="product-price" data-title="Price">${{$product['price']}}</td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity">


                                            <form action="{{route('frontend.updatecart',$product['id'])}}"
                                                method="POST">
                                                @csrf
                                                @method("PUT")

                                                <input value="{{$product['quantity']}}" min="1" max="10" type="number"
                                                    name="quantity" class="cart_quantity_input" id="input1">

                                                <button class="btn btn-line-fill btn-sm" type="submit">Update
                                                </button>
                                            </form>

                                            {{--  <input type="button" value="-" class="minus">
                                                <input type="text" name="quantity[]" value="{{$product['quantity']}}"
                                            title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus"> --}}
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">
                                        ${{$product['price']*$product['quantity']}}</td>

                                    <td class="product-remove" data-title="Remove">
                                        <form action="{{route('frontend.deletecart',$product['id'])}}" method="POST">
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

                            <tfoot>
                                <tr>
                                    <td colspan="6" class="px-0">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                {{--   <div class="col-md-6">
                    <div class="heading_s1 mb-3">
                        <h6>Calculate Shipping</h6>
                    </div>
                    <form action="{{route('frontend.shipping.calculte')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <div class="custom_select">
                            <select class="form-control" name="location">
                                <option value="">Choose a option...</option>
                                @foreach ($shippingcharges as $item)
                                <option value="{{$item->id}}">{{$item->location}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <button class="btn btn-fill-line" type="submit">Update Totals</button>
                    </div>
                </div>
                </form>
            </div> --}}
            <div class="col-6">

            </div>
            <div class="col-md-6">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">Rs.{{$total}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">
                                        Free
                                        {{--  @foreach(session('shipingchrge') as $id => $item)
                                        {{$item['shiipingcharge']}}
                                        @endforeach --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>Rs.{{$total}}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('frontend.checkout')}}" class="btn btn-fill-out">Proceed To CheckOut</a>
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