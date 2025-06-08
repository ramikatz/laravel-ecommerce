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
                                <form action="{{route('dashboard.category.store')}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-5 col-sm-5" for="name">Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-7 col-sm-7">
                                            <input type="text" name="name" id="name" required="required"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-5 col-sm-5" for="discription">Discription
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-7 col-sm-7 ">
                                            <input type="text" id="discription" name="discription" class="form-control">
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
                                            <option selected disabled>Select Parent category</option>
                                            @foreach($allMenus as $category)
                                            <option value="{{$category->id}}">
                                                <b>{{$category->name}}</b>
                                            </option>

                                            @endforeach
                                        </select>


                                        {{-- Multi Level Selecting 
                                                            <select class="form-control" name="parent_category_id">
                                                        <option selected disabled>Select menu category</option>
                                                        @foreach($allMenus as $category)
                                                        <option value="{{$category->id}}">
                                        <b>{{$category->name}}</b>
                                        </option>
                                        @foreach($category->subcategory as $sub)
                                        <option value="{{$sub->id}}">--{{$sub->name}}</option>
                                        @foreach($sub->subcategory as $subsub)
                                        <option value="{{$subsub->id}}">==={{$subsub->name}}
                                        </option>
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        </select> --}}

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
                <div class="col-md-8">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>All Categories </h2>
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
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">

                                            <div id="datatable-responsive_wrapper"
                                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="datatable-responsive"
                                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                                            cellspacing="0" width="100%" role="grid"
                                                            aria-describedby="datatable-responsive_info"
                                                            style="width: 100%;">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting_asc" tabindex="0"
                                                                        aria-controls="datatable-responsive" rowspan="1"
                                                                        colspan="1" style="width: 81px;"
                                                                        aria-sort="ascending"
                                                                        aria-label="First name: activate to sort column descending">
                                                                        Name</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable-responsive" rowspan="1"
                                                                        colspan="1" style="width: 80px;"
                                                                        aria-label="User Name: activate to sort column ascending">
                                                                        Icon
                                                                    </th>


                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable-responsive" rowspan="1"
                                                                        colspan="1" style="width: 176px;"
                                                                        aria-label="Position: activate to sort column ascending">
                                                                        Count
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable-responsive" rowspan="1"
                                                                        colspan="1" style="width: 176px;"
                                                                        aria-label="Options: activate to sort column ascending">
                                                                        Parent
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable-responsive" rowspan="1"
                                                                        colspan="1" style="width: 176px;"
                                                                        aria-label="Options: activate to sort column ascending">
                                                                        Options
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($productcategories as
                                                                $productcategory)
                                                                <tr role="row" class="odd">
                                                                    <td>
                                                                        {{$productcategory->name}}
                                                                    </td>
                                                                    <td tabindex="0" class="sorting_1">
                                                                        <img src="{{url('upload/productcategory/',$productcategory->image)}}"
                                                                            width="30px"
                                                                            class="img-responsive avatar-view" alt=""
                                                                            title="Change the avatar">

                                                                    </td>


                                                                    <td>
                                                                        {{count($productcategory->products)
                                                                        }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($productcategory->parent_id == 0)
                                                                        Yes
                                                                        @else
                                                                        NO
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        <div class="row">
                                                                            {{-- btn-app --}}
                                                                            <a class="btn"
                                                                                href="{{route('dashboard.category.edit',$productcategory->id)}}">
                                                                                <i class="fa fa-edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a href="/dashboard/category/{{$productcategory->id}}"
                                                                                class="btn servicedeletebtn delete-confirm"><i
                                                                                    class="fa fa-warning"></i>Delete</a>
                                                                            {{--  <form method="POST"
                                                                                action="{{route('dashboard.category.destroy',$productcategory->id)}}">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button class="btn">
                                                                                <i class="fa fa-warning"></i>
                                                                                Delete
                                                                            </button>
                                                                            </form> --}}
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
event.preventDefault();
const url = $(this).attr('href');
swal({
title: 'Are you sure?',
text: 'This record and it`s details will be permanantly deleted!',
icon: 'warning',
buttons: ["Cancel", "Yes!"],
}).then(function(value) {
if (value) {
window.location.href = url;
}
});
});
</script>

@endsection