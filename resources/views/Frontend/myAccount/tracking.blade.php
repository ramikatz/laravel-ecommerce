{{-- @extends('Frontend.layout.main')
@section('content')
<div class="container">

    <article class="card m-3">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body tracking">

            <div class="track">
                @if ($item->status == 'pending')
                @include('Frontend.myAccount.ordersteps.pending')

                @elseif ($item->status == 'Order confirmed')
                @include('Frontend.myAccount.ordersteps.confirmed')

                @elseif ($item->status == 'in transit')
                @include('Frontend.myAccount.ordersteps.picked')

                @elseif ($item->status == 'on the way')
                @include('Frontend.myAccount.ordersteps.way')

                @elseif ($item->status == 'delivered')
                @include('Frontend.myAccount.ordersteps.delivered')

                @endif

            </div>
            <hr>
            <div class="container">

                <br><strong>Shipping BY:</strong> : BLUEDART, | <i class="fa fa-phone"></i>+1598675986
                <br><strong>Tracking # :</strong> {{$item->order_number}}

<hr>
<a href="{{ url()->previous() }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i>
    Back to orders</a>
</div>
</article>
</div>

@endsection --}}