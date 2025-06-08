@include('Backend.layout.head')
@include('Backend.layout.header')

<body style="background-color: white !important">
    <br>
    <br>
    <br>
    <br>

    <div class="login">

        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper ">
            <div class="col-md-12">
                @include('Backend.layout.partial.alert')
            </div>

            <div class="animate form login_form">

                <section class="login_content">
                    <form action="{{route('login.process')}}" method="POST">

                        <h1>Login Form</h1>
                        @csrf
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>

                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            {{-- <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p> --}}

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                {{--   <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms</p> --}}
                            </div>
                        </div>
                    </form>
                </section>
            </div>


        </div>
    </div>
</body>

</html>