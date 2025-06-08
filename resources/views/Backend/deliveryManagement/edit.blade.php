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
{{-- <script>
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
</script> --}}


@endsection

@section('content')

<div class="col-md-9">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Delivery Mangement</h2>
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
                <form action="{{route('dashboard.delivery.update',$deliveryItem->id)}}" method="POST"
                    enctype="multipart/form-data" id="demo-form2" data-parsley-validate=""
                    class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Change Status</label>
                        <div class="col-sm-10">
                            {{--  <input type="hidden" name="order_id" value="{{$deliveryItem->id}}"> --}}
                            <select class="form-control js-example-basic-single" name="status">
                                {{-- <option value="Order Pending"
                                    <?= $deliveryItem->status === 'Order Pending' ? 'selected' : '' ?>>Order Pending
                                </option> --}}
                                {{--  <option value="Order Confirmed"
                                    <?= $deliveryItem->status === 'Order Confirmed' ? 'selected' : '' ?>>Order Confirmed
                                </option> --}}
                                <option value="On the way"
                                    <?= $deliveryItem->status === 'On the way' ? 'selected' : '' ?>>On the way
                                </option>
                                <option value="Ready for pickup"
                                    <?= $deliveryItem->status === 'Ready for pickup' ? 'selected' : '' ?>>Ready for
                                    pickup
                                </option>
                            </select>
                        </div>
                    </div>

            </div>
        </div>

    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Order {{$deliveryItem->order_number}} Details</h2>
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

                <div class="row ml-3 mr-3">
                    <div class="form-group row col-sm-4 invoice-col">
                        <address>
                            <p><b>To</b></p>
                            <div class="address ">
                                @if ($billing_address)
                                <strong>{{optional($billing_address)->billing_address_line_1}}</strong>
                                <br>{{optional($billing_address)->billing_address_line_2}}
                                <br>{{optional($billing_address)->billing_city}}
                                <br>{{optional($billing_address)->billing_state}}
                                <br>Phone: {{optional($billing_address)->billing_mobile}}

                                @else
                                <strong>{{optional($shippingaddress)->shipping_fullname}}</strong>
                                <br>{{optional($shippingaddress)->shipping_address1}}
                                <br>{{optional($shippingaddress)->shipping_address2}}
                                <br>{{optional($shippingaddress)->shipping_city}}
                                <br>{{optional($shippingaddress)->shipping_state}}
                                <br>{{optional($shippingaddress)->shipping_postal_code}}
                                <br>{{optional($shippingaddress)->shipping_mobile}}

                                @endif

                            </div>

                        </address>

                    </div>
                    <div class="form-group row col-sm-4 invoice-col">
                        <address>
                            <p><b>Contact Details</b></p>
                            <div class="address ">
                                <span>Name : {{$UserDetail->Fname}}</span>
                                <br>Phone: {{optional($billing_address)->billing_mobile}}
                            </div>
                        </address>
                    </div>

                    <div class="form-group row col-sm-4 invoice-col">
                        <address>
                            <p><b>Delivery Note</b></p>
                            <div class="address ">
                                <p>{{$deliveryItem->notes}}</p>
                            </div>
                        </address>
                    </div>

                    <div class="form-group row col-sm-4 invoice-col">
                        @isset($Deliveryperson)
                        <address>
                            <p><b>Delivery person Name</b></p>
                            <div class="address ">
                                <p>{{optional($Deliveryperson)->Fname}}</p>
                            </div>
                        </address>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="col-md-3">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Delivery</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="item form-group">
                    <div class="row label-align">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
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