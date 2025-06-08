@extends('Frontend.layout.main')

@section('secondlink','/')
@section('secondname','Forget Password')

@section('content')
<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Reset Your Password</h3>
                        </div>
                        <form action="{{route('dashboard.forget.store')}}" method="POST">
                            @csrf

                            <p>Enter the email address associated with your account.</p>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="email"
                                    placeholder="Your Email">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Send </button>
                            </div>
                        </form>


                        <div class="form-note text-center">Don't Have an Account? <a href="{{url('register')}}">Sign up
                                now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->



@endsection