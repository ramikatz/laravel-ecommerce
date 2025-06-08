<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.layout.head')

    @include('Backend.layout.header')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella
                                Alela!</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">


                            @auth
                            <img src="{{url('upload/user/',Auth::user()->image)}}" class="img-circle profile_img"
                                alt="">
                            @endauth


                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>
                                @auth
                                {{ Auth::user()->userName }}
                                @endauth
                            </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('Backend.layout.sidebar')
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small" style="background-color:#162e47">


                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            @include('Backend.layout.topNav')
            <!-- /top navigation -->

            <!-- page content -->

            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12">
                        @include('Backend.layout.partial.alert')
                    </div>
                    @yield('content')
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            @include('Backend.layout.foot')
            <!-- /footer content -->
        </div>
    </div>

    @include('Backend.layout.footer')

</body>

</html>