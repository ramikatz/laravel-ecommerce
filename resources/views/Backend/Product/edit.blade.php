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
    selector:'#content',
    height : "400"
    });
    
    tinymce.init({
    selector:'#description',
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],

    toolbar : ["insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"],
    height : "400"
    });
    
    tinymce.init({
    selector:'#sdescription',
  
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],

    toolbar : ["insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"],

    height : "250"
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
                <form action="{{route('dashboard.product.update',$product)}}" method="POST"
                    enctype="multipart/form-data" id="demo-form2" data-parsley-validate=""
                    class="form-horizontal form-label-left" novalidate="">
                    @method('PUT')
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="first-name">Product Title
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="product_title" value="{{$product->product_title}}" id="product_sub"
                                required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Sub Title <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="product_sub" value="{{$product->product_sub}}" id=" product_sub"
                                required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Purchase price <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" name="purchase_price" value="{{$product->purchase_price}}"
                                id="purchase_price" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Regular Price</label>
                            <input type="text" name="regular_price" value="{{$product->regular_price}}" class="
                                form-control" id="inputEmail4" placeholder="Type Regular Price">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Sale Price</label>
                            <input type="text" name="sale_price" value="{{$product->sale_price}}" class=" form-control"
                                id="inputPassword4" placeholder="Type Sale Price">
                        </div>
                    </div>
                    {{--  <div class="item form-group">
                        <div class="col-md-12 col-sm-12">
                            <textarea id="content" name="content">{!! $product->content !!}</textarea>
                        </div>
                    </div> --}}


            </div>
        </div>
    </div>


    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Small Description</h2>
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
                <textarea id="sdescription" name="sdescription">{{$product->sdescription}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Device Specification</h2>
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
                <textarea id="content" name="content">{{$product->content}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DESCRIPTION</h2>
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
                <textarea id="description"  name="description">{{$product->description}}</textarea>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>SEO (Search Engine Optimize)</h2>
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

                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2" for="first-name">SEO Keywords
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                        <input type="text" name="keywords" value="{{$product->keywords}}" id="first-name"
                            required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2" for="last-name">SEO Slug
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                        <input type="text" id="slug" name="slug" value="{{$product->slug}}" required="required"
                            class="form-control">
                    </div>
                </div>
                <label class="col-form-label col-md-2 col-sm-2" for="last-name">SEO Meta Discription
                </label>
                <div class="item form-group">

                    <div class="col-md-12 col-sm-12">
                        <textarea name="meta">{{$product->meta}}</textarea>
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
                <h2>Publish Product</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Quantity</label>
                        <input type="text" name="quantity" value="{{$product->quantity}}" class=" form-control"
                            id="inputEmail4" placeholder="Type quantity">
                    </div>
                </div>
                <div class="featuredImage ">
                    <label class="col-form-label " for="last-name">
                        <h5>Featured Image</h5>
                    </label>
                    <div class="item form-group">
                        <div class="col-md-10 col-sm-10 ">
                            <img src="{{url('upload/product/',$product->image)}}"
                                class="p-2 img-thumbnail img-responsive avatar-view" alt="" width="100%"
                                title="Change the avatar">
                            <input type="file" name="image" class=" p-2 form-control-file">
                        </div>
                    </div>
                    <div class="featuredImage ">
                        <label class="col-form-label " for="last-name">
                            <h5>Product Images</h5>
                        </label>
                        <div class="item form-group">
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="images[]" max="3" class="form-control-file" multiple>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="row label-align">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Choose Category</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content category_box">
                <div class="category_boxs">
                    <div class="container">
                        @foreach ($productcategories as $category)
                        <div class="col-md-12 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" name="productcategory_id[]" type="checkbox"
                                    {{-- {{ $product->id == $category->id ? 'checked':'' }} --}}
                                    @if($product->productcategories->contains($category)) checked @endif
                                value="{{$category->id}}">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$category->name}}
                                </label>
                            </div>
                        </div>
                        @foreach ($category->subcategory as $sub)
                        <div class="col-md-12 col-sm-12 ">
                            <div class="form-check">
                                {!! "&nbsp;" !!} {!! "&nbsp;" !!} {!! "&nbsp;" !!}
                                <input class="form-check-input" name="productcategory_id[]" type="checkbox"
                                    value="{{$sub->id}}">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$sub->name}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        </form>
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