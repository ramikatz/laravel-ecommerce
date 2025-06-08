@extends('Frontend.myAccount.layout.main')
@section('myAccount')


<div class="card">
    {{--    <header class="card-header"> My Orders / Tracking </header> --}}
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
        <hr>
        <div class="container">

            <br><strong>Shipping BY:</strong> : BLUEDART, | <i class="fa fa-phone"></i>+1598675986
            <br><strong>Tracking # :</strong> {{$item->order_number}}

            <hr>
            <a href="{{ url()->previous() }}" class="btn btn-warning" data-abc="true"> <i
                    class="fa fa-chevron-left"></i>
                Back to orders</a>
        </div>
        </article>

        @endsection