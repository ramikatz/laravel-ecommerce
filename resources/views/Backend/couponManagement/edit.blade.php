@extends('Backend.layout.main')
@section('title','Add Product')
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
@endsection

@section('content')

<div class="col-md-9 col-lg-9">

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add coupon</h2>
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
                <form action="{{route('dashboard.coupon.update',$coupon->id)}}" method="POST"
                    enctype="multipart/form-data" id="demo-form2" data-parsley-validate=""
                    class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="first-name">Coupon Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" value="{{$coupon->name}}" name="name" placeholder="Coupon Name"
                                id="product_sub" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Coupon Code <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" value="{{$coupon->coupon_code}}" name="coupon_code"
                                placeholder="Coupon Code" id="product_sub" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Amout <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" value="{{$coupon->amount}}" name="amount" placeholder="Amout"
                                id="purchase_price" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Availability <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" value="{{$coupon->availability}}" name="availability"
                                placeholder="Availability" id="purchase_price" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Status <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">

                            <select class="form-control js-example-basic-single" name="status">
                                <option {{$coupon->status == '1' ? 'selected':''}} value="0"> Deactivate </option>
                                <option {{$coupon->status == '1' ? 'selected':''}} value="1">Activated</option>

                            </select>

                        </div>
                    </div>



                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </div>


</div>



</form>



@endsection

@section('custom-js')




<script src="{{asset('Dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('Dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script>






@endsection