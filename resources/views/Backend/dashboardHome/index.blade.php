@extends('Backend.layout.main')
@section('title','All Orders')
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
            <h1 style="font-size: 28px">Welcome to Sunray</h1>
        </div>
    </div>
</div>


<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h1 style="font-size: 28px">Shop Status</h1>
        </div>
        <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i class=""></i>
                    </div>
                    <?php $total = 0 ?>
                    @foreach ($orderwithing7days as $item)
                    @foreach($item->order_items as $items)
                    <?php $total += $items->pivot->price * $items->pivot->quantity ?>
                    @endforeach
                    @endforeach
                    <div class="count">Rs.{{$total}}</div>
                    <h3>Total Income</h3>
                    <p>Last 7 Days</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i></i>
                    </div>
                    <div class="count">{{$totalprofititems}}</div>
                    <h3>Total Profit</h3>
                    <p>Last 30 Days</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i class=""></i>
                    </div>


                    <div class="count">{{$totalcompletedOrders}}</div>
                    <h3>Completed Orders </h3>
                    <p>Total Completed Orders</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i></i>
                    </div>
                    <div class="count">{{$totalorderWaiting}}</div>
                    <h3> Orders wating</h3>
                    <p>Customers are waiting for your answer.</p>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h1 style="font-size: 28px">Stock Status</h1>
        </div>
        <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i></i>
                    </div>
                    <div class="count">{{$totalStock}}</div>
                    <h3>Low in Stock</h3>
                    <p></p>
                </div>
            </div>


            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i></i>
                    </div>
                    <div class="count">{{$totalproducts}}</div>
                    <h3>Total Products</h3>
                    <p></p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h1 style="font-size: 28px">General Status</h1>
        </div>
        <div class="row">

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count">{{$totalsupportTickets}}</div>
                    <h3>Support Tickets</h3>
                    <p>Customers are waiting for your answer.</p>
                </div>
            </div>

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="count">{{$totalnewUsers}}</div>
                    <h3>New Sign ups</h3>
                    <p>The system detected {{$totalnewUsers}} latest users</p>
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
@endsection