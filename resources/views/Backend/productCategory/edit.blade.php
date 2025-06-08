@extends('Backend.layout.main')
@section('title','All Users')
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
@endsection

@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Category Management
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Design </h2>
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
                                <form action="{{route('dashboard.category.update',$productcategory->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-5 col-sm-5" for="name">Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-7 col-sm-7">
                                            <input type="text" name="name" value="{{$productcategory->name}}" id="name"
                                                required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-5 col-sm-5" for="last-name">Discription
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-7 col-sm-7 ">
                                            <input type="text" value="{{$productcategory->discription}}" id="last-name"
                                                name="discription" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-5 col-sm-5">Icon</label>
                                        <div class="col-md-7 col-sm-7 ">
                                            <input type="file" name="image" class="form-control-file">
                                        </div>
                                    </div>

                                    <div>
                                        <select class="form-control js-example-basic-single" name="parent_category_id">
                                            <option value="null"> No Parent </option>
                                            @foreach($allMenus as $category)


                                            <option {{ $category->id == $productcategory->parent_id ? 'selected':'' }}
                                                value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="row label-align">
                                            <button class="btn btn-primary" type="button">Cancel</button>

                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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