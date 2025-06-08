@extends('Frontend.myAccount.layout.main')
@section('myAccount')


<div class="card">
    <div class="card-header">
        My Account
    </div>
    <div class="card-body">


        {{--     @php
        dd($user);
        @endphp --}}

        <form action="{{route('frontend.user.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="userName" value="{{$user->userName}}">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">First Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="Fname" value="{{$user->Fname}}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Last Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="Lname" value="{{$user->Lname}}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Profile Image</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="billing_mobile"
                        value="{{optional($user->address)->billing_mobile}}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Current Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="password" name="cpassword">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">New Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="password" name="npassword">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Comform Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="password" name="comfirm_password">
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Bday</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input class="date-picker form-control" name="bday" value="{{$user->bday}}" type="text"
                        required="required" onfocus="this.type='date'" onmouseover="this.type='date'"
                        onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Gender</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <div class="form-check">
                        <input type="radio" name="gender" id="male" {{ $user->gender == 1 ? 'checked' : ''}} value="1">
                        <label class="form-check-label" for="gridRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" id="female" {{ $user->gender == 0 ? 'checked' : '' }}
                            value="0">
                        <label class="form-check-label" for="gridRadios1">
                            Female
                        </label>
                    </div>
                </div>
            </div>


            <div class="row gutters-sm mt-3">
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Billing
                                    Address</i>
                            </h6>

                            <div class="mb-3">
                                <div class="">
                                    <input class="form-control m-1" type="text" name="billing_address_line_1"
                                        placeholder="Address line 1"
                                        value="{{optional($user->address)->billing_address_line_1}}">

                                    <input class="form-control m-1" type="text" name="billing_address_line_2"
                                        placeholder="Address line 2"
                                        value="{{optional($user->address)->billing_address_line_2}}">

                                    <input class="form-control m-1" type="text" name="billing_city" placeholder="City"
                                        value="{{optional($user->address)->billing_city}}">

                                    <input class="form-control m-1" type="text" name="billing_state"
                                        placeholder="province" value="{{optional($user->address)->billing_state}}">

                                    <input class="form-control m-1" type="text" name="billing_postal_code"
                                        placeholder="postal code"
                                        value="{{optional($user->address)->billing_postal_code}}">

                                    <input class="form-control m-1" type="text" name="billing_mobile"
                                        placeholder="Phone Number" value="{{optional($user->address)->billing_mobile}}">

                                    <input class="form-control m-1" type="text" name="billing_Cname"
                                        placeholder="Company Name" value="{{optional($user->address)->billing_Cname}}">


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Shipping
                                    Address</i>
                            </h6>

                            <div class="mb-3">
                                <div class="">
                                    <input class="form-control m-1" type="text" name="shipping_fullname"
                                        placeholder="Full Name"
                                        value="{{optional($user->shippingaddress)->shipping_fullname}}">

                                    <input class="form-control m-1" type="text" name="shipping_address1"
                                        placeholder="Address line 1"
                                        value="{{optional($user->shippingaddress)->shipping_address1}}">

                                    <input class="form-control m-1" type="text" name="shipping_address2"
                                        placeholder="Address line 2"
                                        value="{{optional($user->shippingaddress)->shipping_address2}}">

                                    <input class="form-control m-1" type="text" name="shipping_city" placeholder="City"
                                        value="{{optional($user->shippingaddress)->shipping_city}}">

                                    <input class="form-control m-1" type="text" name="" placeholder="province"
                                        value="{{optional($user->shippingaddress)->province}}">

                                    <input class="form-control m-1" type="text" name="shipping_postal_code"
                                        placeholder="postal code"
                                        value="{{optional($user->shippingaddress)->shipping_postal_code}}">

                                    <input class="form-control m-1" type="text" name="shipping_mobile"
                                        placeholder="Mobile Number"
                                        value="{{optional($user->shippingaddress)->shipping_mobile}}">

                                    <input class="form-control m-1" type="text" name="shipping_Cname"
                                        placeholder="Company Name"
                                        value="{{optional($user->shippingaddress)->shipping_Cname}}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Update Details</button>
        </form>
    </div>
</div>




@endsection