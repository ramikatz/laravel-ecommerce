<!-- End Screen Load Popup Section -->

<!-- START AuthTopBar -->
@include('Frontend.components.AuthTopBar')

@can('normal-dashboard-users')
@auth
<div class="topauth p-2" style="background-color: black; width:100%; height:40px; ">
    <div class="container">
        <a style="color:white" href="{{route('dashboard.index')}}">Go Back to Dashboard</a>
    </div>
</div>
@endauth
@endcan
<!-- END AuthTopBar -->

<!-- START HEADER -->
@include('Frontend.components.header')
<!-- END HEADER -->