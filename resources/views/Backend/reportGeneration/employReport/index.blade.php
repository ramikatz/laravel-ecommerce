@extends('Backend.layout.main')
@section('title','All Products')
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
            <h2>Employee Detail Report</h2>
            {{-- <h2>All Products <a class="btn btn-primary" href="{{route('dashboard.product.create')}}">Add
            Product</a> --}}
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
                <div class="col-md-12 daterange">

                    <form action="{{route('dashboard.report.employee.generate')}}" method="POST">
                        @csrf

                        <br />
                        {{--    <div class="row input-daterange">
                            <div class="col-md-4">
                                <fieldset>
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                                <input type="text" name="start_date"
                                                    class="form-control has-feedback-left" id="single_cal2"
                                                    placeholder="" aria-describedby="inputSuccess2Status2">
                                                <span class="fa fa-calendar-o form-control-feedback left"
                                                    aria-hidden="true"></span>
                                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset>
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                                <input type="text" name="end_date"
                                                    class="form-control has-feedback-left" id="single_cal3"
                                                    placeholder="" aria-describedby="inputSuccess2Status3">
                                                <span class="fa fa-calendar-o form-control-feedback left"
                                                    aria-hidden="true"></span>
                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="filter" value="filter" class="btn btn-primary">Date
                                    Filter</button>
                            </div>
                        </div> --}}
                        <br />
                </div>
                <div class="col-md-12 reportbtn d-flex justify-content-end">
                    <button type="submit" name="report" value="report" class="btn btn-primary">Generate Report</button>
                    </form>


                </div>

                <div class="card-box table-responsive">
                    <table class="table table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>User Name</th>
                                <th>Last name</th>
                                <th>Role</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1">
                                    {{$item->userName}}
                                </td>
                                <td>{{$item->Lname}}</td>
                                <td>
                                    @foreach ($item->roles as $role)
                                    <span class="badge badge badge-success">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td tabindex="0" class="sorting_1">
                                    {{$item->email}}
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