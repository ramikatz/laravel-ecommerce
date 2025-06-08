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
@endsection

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h1>Report Generation</h1>
            {{-- <h2>All Roles <a class="btn btn-primary" href="{{route('dashboard.role.create')}}">Add Role</a> </h2>
            --}}
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


                    <div class="conatainer">
                        <h2>Advanced Reports</h2>
                        <div class="row">
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Order Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View Order Report</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.order.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Delivery Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All Delivery</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.delivery.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Profit Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All Profit</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.profit.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="conatainer">
                        <h2>Users Reports</h2>
                        <div class="row">
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            supplier Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All supplier</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.employee.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Customer Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All Customer</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.customer.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Suplier Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All supplier</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.supplier.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="conatainer">
                        <h2>Basic Reports</h2>
                        <div class="row">
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Stock Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All Product</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.product.index')}}">Click
                                                    Here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="conatainer">
                        <h2>Stock Reports</h2>
                        <div class="row">
                            <div class="box-outer mt-3 col-3">
                                <div class="box-inner">
                                    <div class="card">
                                        <div class="card-header">
                                            Low in Stock Report
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">View All Stock Count</h5>
                                            <p class="card-text"><a
                                                    href="{{route('dashboard.report.instock.index')}}">Click
                                                    Here</a></p>
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
<script src="{{asset('Dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}">
</script>

<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/jszip/dist/jszip.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/pdfmake/build/pdfmake.min.js')}}">
</script>
<script src="{{asset('Dashboard/vendors/pdfmake/build/vfs_fonts.js')}}">
</script>
@endsection
{{-- <script>
    $(document).ready( function () {
    $('#datatable-responsive').DataTable([
        processing:true,
        serverside:true,
        ajax:'{!! route('users.data') !!}',
        colums:[
            {data:'id',name:'id'},
            {data:'UserName',name:'UserName'},
            {data:'email', name: 'email'},

        ]
    ]);
    } );
</script> --}}