@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="card">
    <div class="card-header">
        Order Items - {{$order->order_number}}
    </div>
    <div class="card-body">

        <div class=" bootdey">
            <div class="panel panel-default panel-order">

                <div class="panel-body">
                    <div class="row orderlist">
                        <div class="col-md-12 order-list">
                            <div class="row">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quntity</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{--  @foreach($orderItems as $orderItem) --}}
                                        @foreach($order->order_items as $item)

                                        <tr>
                                            <td>
                                                <img src="{{url('upload/product/',$item->image)}}" class="" alt=""
                                                    width="30px" title="Change the avatar">
                                            </td>
                                            <td>
                                                {{$item->product_title}}
                                            </td>
                                            <td>
                                                {{$item->pivot->price}}
                                            </td>
                                            <td>
                                                {{$item->pivot->quantity}}
                                            </td>
                                            {{--    <td>
                                                {{$item->pivot->quantity * $item->pivot->price }}
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                        {{--  @endforeach --}}
                                    </tbody>
                                </table>
                                @foreach($order->order_items as $item)
                                <div class="row d-block ml-3">
                                    <b>Total Cost</b> = {{$item->pivot->quantity * $item->pivot->price }}
                                </div>
                                @endforeach
                                {{--  {{ $orders->links() }} --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection