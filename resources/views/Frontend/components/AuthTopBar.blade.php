@can('super-user')
@auth
<div class="topauth p-2" style="background-color: black; width:100%; height:40px; ">
  <a style="color:white" href="{{route('dashboard.index')}}">Go Back to Dashboard</a>
</div>
@endauth
@endcan

@can('all-users')
@auth
@php
$cuser = \App\User::find(Auth::id());
@endphp

@unless ($cuser->coupon == null)

<?php
$match = \App\Models\Coupon::where('coupon_code',$cuser->coupon)->first();
?>


<div class="fixed-bottom" style="
  bottom: 10px;
  background-color:#f73100;
  color:white;
  height: 45px;
  font-size: 20px; 
  border: 3px solid #f73100;
  text-align: center;">
  <div class="text">Coupon Code Applied
    " {{$cuser->coupon}} " |<b> you will save Rs.{{$match->amount}} </b> - <a
      href="{{route('frontend.delete.coupon',$cuser->coupon)}}"><i class="fas fa-trash-alt"
        style="color: white"></i></a>


  </div>
</div>
@endunless
@endauth
@endcan