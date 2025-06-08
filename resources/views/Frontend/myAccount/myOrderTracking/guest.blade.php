@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Tracking')
@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">

    <div class="container">
        {{--  <header class="card-header"> My Orders / Tracking </header> --}}
        <br>
        <p class="mt-3"><b>Order Number:</b> {{$item->order_number}}</p>
        <div class="row justify-content-center">

            <div class="card-body tracking">


                <div class="track">
                    @if ($item->status == 'Order Pending')
                    @include('Frontend.myAccount.myOrderTracking.ordersteps.pending')

                    @elseif ($item->status == 'Order Confirmed')
                    @include('Frontend.myAccount.myOrderTracking.ordersteps.confirmed')

                    @elseif ($item->status == 'in transit')
                    @include('Frontend.myAccount.myOrderTracking.ordersteps.picked')

                    @elseif ($item->status == 'On the way')
                    @include('Frontend.myAccount.myOrderTracking.ordersteps.way')

                    @elseif ($item->status == 'Ready for pickup')
                    @include('Frontend.myAccount.myOrderTracking.ordersteps.delivered')

                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection