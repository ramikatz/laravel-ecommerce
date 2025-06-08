@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="card">
    <div class="card-header">
        My Account
    </div>
    <div class="card-body">



        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">User Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->userName}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">First Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->Fname}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Last Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->Lname}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$user->email}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{optional($user->address)->billing_mobile}}
            </div>
        </div>
        <hr>
        {{--         <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{optional($user->address)->billing_address_line_1}}
        ,{{optional($user->address)->address_line_2}},{{optional($user->address)->city}}.
    </div>
</div> --}}


<div class="row gutters-sm mt-3">
    <div class="col-sm-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Billing
                        Address</i>
                </h6>

                <div class="mb-3">
                    <div class="">
                        <span>{{optional($user->address)->billing_address_line_1}}</span><br>
                        <span>{{optional($user->address)->billing_address_line_2}}</span><br>
                        <span>{{optional($user->address)->billing_city}}</span><br>
                        <span>{{optional($user->address)->billing_state}}</span><br>
                        <span>{{optional($user->address)->billing_postal_code}}</span><br>
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
                        <span>{{optional($user->shippingaddress)->shipping_fullname}}</span><br>
                        <span>{{optional($user->shippingaddress)->shipping_address1}}</span><br>
                        <span>{{optional($user->shippingaddress)->shipping_address2}}</span><br>
                        <span>{{optional($user->shippingaddress)->shipping_city}}</span><br>
                        <span>{{optional($user->shippingaddress)->shipping_postal_code}}</span><br>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<a href="{{route('frontend.user.edit',$user)}}" class="btn btn-primary btn-block mt-3">Edit Details</a>

</div>
</div>


@endsection