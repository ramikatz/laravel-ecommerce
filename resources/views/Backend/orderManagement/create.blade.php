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
                <h2>Add Product</h2>
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
                    <div class="form-group row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Status</label>
                            <select class="form-control" name="status">
                                <option selected disabled>Select Status</option>
                                <option value="1">Pending Payment</option>
                                <option value="1">Processing</option>
                                <option value="1">On Hold</option>
                                <option value="1">Completed</option>
                                <option value="1">Cancelled</option>
                                <option value="1">Refunded</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Customer:</label>
                            <select class="form-control js-example-basic-single" name="customer_id">
                                <option selected disabled>Select Customer</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">
                                    <b>{{$user->Fname}}</b>
                                </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Created At</label>
                            <div class="form-group row">
                                <input class="date-picker form-control" name="created_at" placeholder="dd-mm-yyyy"
                                    type="text" required="required" onfocus="this.type='date'"
                                    onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                    onmouseout="timeFunctionLong(this)">
                            </div>
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
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Customer:</label>
                                <select class="form-control js-example-basic-single" name="customer_id">
                                    <option selected disabled>Select Products</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">
                                        <b>{{$user->Fname}}</b>
                                    </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Cost</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td scope="row"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                Items Subtotal: $0.00
                                Order Total: $0.00
                            </div>
                        </div>

                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="row">
                            <button class="btn btn-primary" type="reset">Add Items</button>
                            <button class="btn btn-primary" type="reset">Add Coupon</button>
                            <button type="submit" class="btn btn-success">Recalculate</button>
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
                <h2>After Action</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <div class="form-group">

                    <select class="form-control" name="status">
                        <option selected disabled>Choose Action</option>
                        <option value="1">Email Envoice Oder/Details to Customer</option>
                        <option value="1">Resend New Order Notification</option>
                    </select>
                </div>


                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="row label-align">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Order Notes</h2>
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

                    <div class="col-md-12 col-sm-12">
                        <textarea name="meta" placeholder="Order Noties"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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