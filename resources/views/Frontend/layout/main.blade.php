<!DOCTYPE html>
<html lang="en">

@include('Frontend.layout.head')
@include('Frontend.layout.header')

<body>
    @include('sweetalert::alert')
    @include('Frontend.layout.nav')
    @yield('nav')

    @if(!Request::is('/'))
    <div class="container">
        <br />
        <ul class="breadcrumb">
            <li><a style="pointer-events: none" href="{{url('/')}}">Home</a></li>
            <li><a style="pointer-events: none" href="@yield('secondlink')">@yield('secondname')</a></li>
            <li><a style="pointer-events: none" href="#">@yield('thirdname')</a></li>
        </ul>
    </div>
    @endif

    @yield('content')
</body>
<!-- START FOOTER -->
@include('Frontend.layout.foot')
@include('Frontend.layout.footer')

<!-- END FOOTER -->

</html>