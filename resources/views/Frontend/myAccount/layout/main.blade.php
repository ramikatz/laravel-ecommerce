@extends('Frontend.layout.main')
@section('secondlink','/MyAccount/user/index')
@section('secondname','My Account')

@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{url('upload/user/',Auth::user()->image)}}" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{Auth::user()->userName}}</h4>
                                    {{--  <a href="{{route('frontend.user.edit',Auth::user())}}" class="btn
                                    btn-outline-primary">Edit
                                    Profile</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div>
                            <a href="{{route('frontend.order.index')}}" class="nav-link active myAccountbtn">Ordered
                                List</a>
                            <a href="{{route('frontend.user.index')}}" class="nav-link myAccountbtn">My Account</a>
                            <a href="{{route('frontend.ticket.index')}}" class="nav-link myAccountbtn">Custemer
                                Portal</a>
                            <a href="{{route('frontend.get.coupon')}}" class="nav-link">Coupon Codes</a>
                            <a href="{{route('logout')}}" class="nav-link myAccountbtn">Log Out</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8">
                    @yield('myAccount')
                </div>
            </div>


        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    @include('Frontend.myAccount.layout.subcribe')
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

@endsection