@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Checkout')
@section('content')

<!-- START SECTION BREADCRUMB -->
{{-- <div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END CONTAINER-->
</div> --}}
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            @guest
            <div class="row">

                <div class="col-lg-6">

                    <div class="toggle_info">
                        <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-toggle="collapse"
                                class="collapsed" aria-expanded="false">Click here to login</a></span>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            @endguest
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1">
                        <h4>Billing Details</h4>
                    </div>
                    <form action="{{route('frontend.order.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            @php
                            $shippingcharges = \App\Models\ShippingCharge::get()
                            @endphp
                            <form action="{{route('frontend.shipping.calculte')}}" method="POST">
                                @csrf
                                <select class="form-control num_apples" id="pricechek" required name="district">
                                    <option value="">Choose Your District...</option>
                                    @foreach ($shippingcharges as $item)
                                    <option value="{{$item->id}}">{{$item->location}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" name="billing_Fname"
                                value="{{$user->Fname}}" placeholder="First name *">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" name="billing_Lname"
                                value="{{$user->Lname}}" placeholder="Last name *">
                        </div>

                        <div class="form-group">
                            <input class="form-control" {{-- required --}} type="text" name="billing_Cname"
                                value="{{optional($user->address)->billing_Cname}}" placeholder="Company Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="billing_address_line_1"
                                value="{{optional($user->address)->billing_address_line_1}}" required
                                placeholder="Address *">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="billing_address_line_2"
                                value="{{optional($user->address)->billing_address_line_2}}" required
                                placeholder="Address line2">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="billing_city"
                                value="{{optional($user->address)->billing_city}}" placeholder="City / Town *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" {{-- required --}} type="text" name="billing_state"
                                value="{{optional($user->address)->billing_state}}" placeholder="State *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="billing_postal_code"
                                value="{{optional($user->address)->billing_postal_code}}"
                                placeholder="Postcode / ZIP *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" {{-- required --}} type="text" name="billing_mobile"
                                value="{{optional($user->address)->billing_mobile}}" placeholder="Phone *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="billing_email"
                                value="{{$user->email}}" placeholder="Email address *">
                        </div>


                        @guest
                        <div class="form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="createaccount"
                                        id="createaccount">
                                    <label class="form-check-label label_info" for="createaccount"><span>Create an
                                            account?</span></label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group create-account">
                            <input class="form-control" {{-- required --}} type="password" placeholder="Password"
                                name="password">
                        </div>
                        @endguest
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="differentaddress">
                                        <label class="form-check-label label_info" for="differentaddress"><span>Ship to
                                                a different address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="different_address">
                                <div class="form-group">
                                    <input type="text" {{-- required --}} class="form-control" name="shipping_fullname"
                                        value="{{optional($user->shippingaddress)->shipping_fullname}}"
                                        placeholder="shipping full name">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" {{-- required --}} type="text" name="shipping_Cname"
                                        value="{{optional($user->shippingaddress)->shipping_Cname}}"
                                        placeholder="Company Name">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="shipping_address1"
                                        value="{{optional($user->shippingaddress)->shipping_address1}}"
                                        placeholder="Address line 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="shipping_address2"
                                        value="{{optional($user->shippingaddress)->shipping_address2}}"
                                        placeholder="Address line2">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" {{-- required --}} type="text" name="shipping_city"
                                        value="{{optional($user->shippingaddress)->shipping_city}}" placeholder=" City / Town
                                        *">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" {{-- required --}} type="text"
                                        value="{{optional($user->shippingaddress)->shipping_postal_code}}"
                                        name=" shipping_postal_code" placeholder="Postcode / ZIP *">
                                </div>
                            </div>
                        </div>
                        <div class="heading_s1">
                            <h4>Additional information</h4>
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" class="form-control" name="note" placeholder="Order notes"></textarea>
                        </div>

                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 76%;">Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- buy ekedi --}}
                                    @if (!empty($product->id))
                                    <input type="hidden" name="product" value="{{$product->id}}">
                                    <input type="hidden" name="actiontype" value="{{$actiontype}}">

                                    <td>{{$product->product_title}}
                                        @isset($quantity)
                                        * {{$quantity}}
                                        @endisset
                                    </td>
                                    <td>Rs. {{$product->sale_price}}</td>
                                    @endif

                                    {{-- sesshion thiynwa nam --}}
                                    @if (empty($product->id) && Session::has('cart'))
                                    <?php $total = 0 ?>
                                    @foreach(session('cart') as $id => $product)
                                    <?php $total += $product['price'] * $product['quantity'] ?>
                                    <tr>
                                        <td>{{$product['name']}} <span class="product-qty">x {{$product['quantity']}}
                                            </span></td>
                                        <td>Rs. {{$product['price']}}</td>
                                    </tr>
                                    </tr>
                                    @endforeach


                                    @endif
                                </tbody>
                                <tfoot>


                                    <tr>
                                        <th>Shipping</th>
                                        <th>
                                            Free

                                        </th>



                                    </tr>
                                    @php
                                    $cuser = \App\User::find(Auth::id());
                                    $match = \App\Models\Coupon::where('coupon_code',$cuser->coupon)->first();
                                    @endphp



                                    @unless ($cuser->coupon == null)
                                    <tr>
                                        <th>Coupon Applied</th>
                                        <th>{{$match->amount}}</th>
                                    </tr>
                                    @endunless
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">
                                            {{-- Buy total eka --}}
                                            @if (!empty($product->id))
                                            <?php $total = ($product->sale_price * $quantity) ?>

                                            @if ($match)
                                            Rs. {{$total - $match->amount}}
                                            <input type="hidden" name="grand_total" value="{{$total - $match->amount}}">
                                            <input type="hidden" name="coupon_code" value="{{$match->coupon_code}}">
                                            @endif

                                            @if (!$match)
                                            Rs. {{$total}}
                                            <input type="hidden" name="grand_total" value="{{$total}}">
                                            @endif

                                            @endif


                                            {{-- session ekedi --}}
                                            @if (empty($product->id) && Session::has('cart'))
                                            <?php $total = 0 ?>
                                            @foreach(session('cart') as $id => $product)
                                            <?php $total += $product['price'] * $product['quantity'] ?>
                                            @endforeach
                                            {{-- <?php $total =+$shippingcharge->charge;?> --}}
                                            {{-- {{$total}} --}}

                                            @if ($match)
                                            Rs. {{$total - $match->amount}}
                                            <input type="hidden" name="grand_total" value="{{$total - $match->amount}}">
                                            <input type="hidden" name="coupon_code" value="{{$match->coupon_code}}">
                                            @endif
                                            @if (!$match)
                                            Rs. {{$total}}
                                            <input type="hidden" name="grand_total" value="{{$total}}">
                                            @endif
                                            @endif

                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="heading_s1">
                                <h4>Payment</h4>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" {{-- required --}}="" type="radio"
                                        name="payment_option" id="exampleRadios3" value="card" checked="">
                                    <label class="form-check-label" for="exampleRadios3">Card</label>
                                    <p data-method="option3" class="payment-text"></p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option"
                                        id="exampleRadios4" value="cod">
                                    <label class="form-check-label" for="exampleRadios4">Cache On Delivery</label>
                                    <p data-method="option4" class="payment-text"></p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option"
                                        id="exampleRadios5" value="paypal">
                                    <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                    <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your
                                        credit card if you don't have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>


                        {{--  <button type="submit" class="btn btn-fill-out btn-block">Place Order</button> --}}
                        {{-- <a href="#" class="btn btn-fill-out btn-block">Place Order</a> --}}
                        </form>
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