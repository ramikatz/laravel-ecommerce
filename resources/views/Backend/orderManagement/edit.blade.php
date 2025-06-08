@extends('Backend.layout.main')
@section('title','Add Order')
@section('custom-style')
<link href="{{asset('Dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('Dashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('Dashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
    rel="stylesheet">
<link href="{{asset('Dashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
    rel="stylesheet">
<link href="{{asset('Dashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

{{-- Custom css File --}}
<link href="{{asset('css/custom_style.css')}}" rel="stylesheet">
{{-- select2 css file --}}
<link href="{{asset('Dashboard/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
{{-- Tinypicmcr --}}
<script src="{{ asset('Dashboard/node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
                selector:'#content', 
                plugins:'link code',
                height : "400"                      
            });
</script>
<script>
    tinymce.init({
                selector:'#meta', 
                plugins:'link code'                       
            });
</script>


@endsection

@section('content')

<div class="col-md-9">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Print Shpping Label and Address</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="{{route('dashboard.order.update',$order)}}" method="POST" enctype="multipart/form-data"
                    id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="form-group d-flex justify-content-between">
                        <h5><i class="fa fa-truck"></i> Create Shipping Label</h5>
                        <button type="sumbit" name="shipping_label" value="shipping_label" class="btn btn-primary">Print
                            Shipping Label</button>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                    </div>
            </div>
        </div>

    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Order {{$order->order_number}} Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="{{route('dashboard.order.update',$order)}}" method="POST" enctype="multipart/form-data"
                    id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="row ml-3 mr-3">
                        <div class="form-group row col-sm-4 invoice-col">
                            <div class="form-group">

                                </br>
                                <b>Order Status :</b> {{$order->status}}</br>
                                <b>Payment Type :</b> {{$order->payment_method}}</br>

                            </div>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                @if ($billing_address)
                                <strong>{{optional($billing_address)->billing_address_line_1}}</strong>
                                <br>{{optional($billing_address)->billing_address_line_2}}
                                <br>{{optional($billing_address)->billing_city}}
                                <br>{{optional($billing_address)->billing_state}}
                                <br>Phone: {{optional($billing_address)->billing_mobile}}
                                <br>Email:{{optional($user)->email}}
                                @else
                                <strong>{{optional($shippingaddress)->shipping_fullname}}</strong>
                                <br>{{optional($shippingaddress)->shipping_address1}}
                                <br>{{optional($shippingaddress)->shipping_address2}}
                                <br>{{optional($shippingaddress)->shipping_city}}
                                <br>{{optional($shippingaddress)->shipping_state}}
                                <br>{{optional($shippingaddress)->shipping_postal_code}}
                                <br>{{optional($shippingaddress)->shipping_mobile}}
                                <br>Email:{{optional($user)->email}}
                                @endif
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b>
                            <br>
                            <br>
                            <b>Order ID:</b> {{$order->order_number}}
                            <br>
                            <b>Payment Due:</b> {{$order->created_at}}
                            <br>
                            <b>Account Holder:</b> {{$user->userName}}
                        </div>

                    </div>
            </div>
        </div>

    </div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Items Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="{{route('dashboard.order.store')}}" method="POST" enctype="multipart/form-data"
                    id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    <div class="conatainer">
                        <div class="row">


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item Name</th>
                                        <th>Cost</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0 ?>
                                    @foreach($orderItems as $orderItems)
                                    @foreach($orderItems->order_items as $items)
                                    <?php $total += $items->pivot->price * $items->pivot->quantity ?>
                                    <tr>
                                        <td>
                                            <img src="{{url('upload/product/',$items->image)}}" class="" alt=""
                                                width="30px" title="Change the avatar">
                                        </td>
                                        <td>
                                            {{$items->product_title}}
                                        </td>
                                        <td>
                                            {{$items->pivot->price}}
                                        </td>
                                        <td>
                                            {{$items->pivot->quantity}}
                                        </td>
                                        <td>
                                            {{$items->pivot->quantity * $items->pivot->price }}
                                        </td>
                                    </tr>
                                    @endforeach


                                    @endforeach
                                </tbody>
                            </table>

                            <div class="col-md-5 offset-md-7 ">
                                <p class="lead">Amount Due {{$order->created_at}}</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Rs. {{$order->grand_total}}</td>
                                            </tr>

                                            <tr>
                                                <th>Shipping:</th>
                                                <td>Free Shipping</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Rs. {{$order->grand_total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="ln_solid"></div>

            </div>

        </div>
    </div>
</div>

<div class="col-md-3">

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Order</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="item form-group">
                    <form action="{{route('dashboard.order.update',$order->id)}}" method="POST"
                        enctype="multipart/form-data" id="demo-form2" data-parsley-validate=""
                        class="form-horizontal form-label-left" novalidate="">
                        @csrf
                        @method('PUT')


                        <div class="col-md-12 col-sm-12">
                            <select class="form-control js-example-basic-single" name="status">
                                <option value="Order Pending"
                                    <?= $order->status === 'Order Pending' ? 'selected' : '' ?>>
                                    Order Pending
                                </option>
                                <option value="Order Confirmed"
                                    <?= $order->status === 'Order Confirmed' ? 'selected' : '' ?>>Order Confirmed
                                </option>

                            </select>
                        </div>

                </div>
                <button type="submit" name="changestatus" value="changestatus" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>


    </div>
</div>









@endsection

@section('custom-js')
<script src="{{asset('Dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>

<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

{{-- Select2 Js Files and Script --}}
<script src="{{asset('Dashboard/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>




@endsection