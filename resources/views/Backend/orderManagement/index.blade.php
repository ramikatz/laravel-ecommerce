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
            <h2>All Orders <a class="btn btn-primary" href="{{route('dashboard.order.create')}}">Add Order</a>
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
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <div id="datatable-responsive_wrapper"
                            class="dataTables_wrapper container-fluid dt-bootstrap no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                        cellspacing="0" width="100%" role="grid"
                                        aria-describedby="datatable-responsive_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1" colspan="1" style="width: 80px;"
                                                    aria-label="User Name: activate to sort column ascending">Order
                                                    Number
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                    style="width: 81px;" aria-sort="ascending"
                                                    aria-label="First name: activate to sort column descending">Date
                                                </th>

                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                    style="width: 81px;" aria-sort="ascending"
                                                    aria-label="First name: activate to sort column descending">Status
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                    style="width: 81px;" aria-sort="ascending"
                                                    aria-label="First name: activate to sort column descending">Total
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1" colspan="1" style="width: 176px;"
                                                    aria-label="Options: activate to sort column ascending">Options
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">
                                                    {{$order->order_number}}
                                                </td>
                                                <td>{{$order->created_at}}</td>

                                                <td>
                                                    <h4 class="badge badge badge-success">{{$order->status}}</h4>
                                                </td>
                                                <td>{{$order->grand_total}}</td>
                                                <td>
                                                    <div class="row">
                                                        {{-- btn-app --}}
                                                        <a class="btn bg-secondary" style="color: white"
                                                            href="{{route('dashboard.order.edit',$order->id)}}">
                                                            <i class="fa fa-edit"></i> View Order
                                                        </a>
                                                        <a href="/dashboard/order/{{$order->id}}"
                                                            class="btn servicedeletebtn delete-confirm"><i
                                                                class="fa fa-warning"></i>Delete</a>
                                                        {{-- <form method="POST"
                                                            action="{{route('dashboard.order.destroy',$order->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn">
                                                            <i class="fa fa-warning"></i> Delete
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
                            <div class="row">

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