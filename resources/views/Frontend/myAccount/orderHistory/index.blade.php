@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="card">
    <div class="card-header">
        Order History
    </div>
    <div class="card-body">

        <div class=" bootdey">
            <div class="panel panel-default panel-order">

                <div class="panel-body">
                    <div class="row orderlist">
                        <div class="col-md-12 order-list">
                            <div class="row">
                                @foreach ($orders as $order)
                                <div class="col-md-12">
                                    <div class="pull-right"><label
                                            class="label label-primary">{{$order->status}}</label>
                                    </div>
                                    <span><strong>Order Number :
                                            {{$order->order_number}}</strong></span>
                                    <br />
                                    Quantity : {{$order->item_count}}, cost: $323.13 <br />
                                    <div class="">order made on: {{$order->created_at}}
                                    </div>
                                    {{-- <a data-placement="top" class="btn btn-danger" href="#" title="Danger"><i
                                            class="fas fa-trash-alt"></i></a> --}}


                                    <a data-placement="top" class="btn btn-primary"
                                        href=" {{route('frontend.order.show',$order->id)}} " title="primary"><i
                                            class="fas fa-search-location"></i>
                                    </a>
                                    <a data-placement="top" class="btn btn-primary"
                                        href=" {{route('frontend.tracking.show',$order->id)}} " title="primary"><i
                                            class="fas fa-truck-moving"></i>
                                    </a>
                                    <br>
                                    <hr>
                                </div>


                                @endforeach
                                {{ $orders->links() }}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection