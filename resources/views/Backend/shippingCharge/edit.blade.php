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
<link href="{{asset('Dashboard/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
{{-- Tinypicmcr --}}
<script src="{{ asset('Dashboard/node_modules/tinymce/tinymce.js') }}"></script>



@endsection

@section('content')

<div class="col-md-9">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit District</h2>
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
                <form action="{{route('dashboard.shipping.update',$shippingcharge)}}" method="POST"
                    enctype="multipart/form-data" id="demo-form2" data-parsley-validate=""
                    class="form-horizontal form-label-left" novalidate="">
                    @method('PUT')
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="first-name">Distric Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="location" value="{{$shippingcharge->location}}" id="product_sub"
                                required="required" class="form-control ">
                        </div>
                    </div>
                    {{--   <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Amout <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="charge" value="{{$shippingcharge->charge}}" id=" product_sub"
                    required="required" class="form-control">
            </div>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
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