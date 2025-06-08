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
<script>
    tinymce.init({
    selector: 'textarea', // change this value according to your HTML
    plugins: 'lists',
    toolbar: 'numlist bullist',
    lists_indent_on_tab: false
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
                <h2>Ask Quatation</h2>
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
                <form action="{{route('dashboard.supplier.quotation.store')}}" method="POST"
                    enctype="multipart/form-data" id="demo-form2" data-parsley-validate=""
                    class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="quotation_title-name">Quotation Title
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="quotation_title" id="quotation_title" required="required"
                                class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="number">Phone Number
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="tel" name="number" id="number" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Supplier Name<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">




                            <select class="form-control js-example-basic-single" name="supplier_id">
                                @foreach ($suppliers as $item)
                                <option value="{{$item->id}}">{{$item->userName}}</option>
                                @endforeach
                            </select>




                        </div>
                    </div>

                    <div class="item form-group">
                        <div class="col-md-12 col-sm-12">
                            <textarea id="content" name="content"
                                placeholder="Just type the list of products and quantity using the list option"></textarea>
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
                <h2>Quatation Submit</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="row label-align">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
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