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
            <h2>All Roles <a class="btn btn-primary" href="{{route('dashboard.role.create')}}">Add Role</a> </h2>
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
                                                    aria-label="User Name: activate to sort column ascending">Role Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1" colspan="1" style="width: 176px;"
                                                    aria-label="Options: activate to sort column ascending">Options
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">{{$role->name}}</td>

                                                <td>
                                                    <div class="row">
                                                        {{-- btn-app --}}
                                                        <a class="btn"
                                                            href="{{route('dashboard.role.edit',$role->id)}}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>

                                                        <form method="POST"
                                                            action="{{route('dashboard.role.destroy',$role->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn">
                                                                <i class="fa fa-warning"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                {{--  <div class="col-sm-5">
                                    <div class="dataTables_info" id="datatable-responsive_info" role="status"
                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="datatable-responsive_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled"
                                                id="datatable-responsive_previous"><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="0"
                                                    tabindex="0">Previous</a></li>
                                            <li class="paginate_button active"><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="1"
                                                    tabindex="0">1</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="2"
                                                    tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="3"
                                                    tabindex="0">3</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="4"
                                                    tabindex="0">4</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="5"
                                                    tabindex="0">5</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="6"
                                                    tabindex="0">6</a></li>
                                            <li class="paginate_button next" id="datatable-responsive_next"><a href="#"
                                                    aria-controls="datatable-responsive" data-dt-idx="7"
                                                    tabindex="0">Next</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
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