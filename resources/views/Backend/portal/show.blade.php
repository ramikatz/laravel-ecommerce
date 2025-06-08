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
<div class="col-md-7">
    <div class="card">
        <h5 class="card-header">Support Ticket - {{$ticket->title}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 hight" style="width: 110px;
    height: 350px;
    overflow: auto;">


                    <div class="chatbox">
                        <span style="color:black">Name :<b></b>
                        </span><span class="badge badge-success">Customer</span><br>
                        <p>{{$ticket->message}}</p>
                    </div>

                    @foreach ($ticket->ticketreply as $item)
                    @if ($item->user->id == 4)
                    <div class="chatbox">
                        <span style="color:black">Name :<b></b>
                        </span><span class="badge badge-success">Customer</span><br>
                        <p>{{$item->reply}}</p>
                    </div>
                    @endif

                    @if ($item->user->id == 1)
                    <div class="chatboxadmin d-flex flex-row-reverse">
                        <div class="adminboxinner ">
                            <span style="color:black">Name : <b>{{$item->user->f_name}}</b>
                            </span><span class="badge badge-success">Owner</span><br>
                            <p>{{$item->reply}}
                            </p>
                        </div>
                    </div>
                    @endif
                    @if ($item->user->id == 2)
                    <div class="chatboxadmin d-flex flex-row-reverse">
                        <div class="adminboxinner ">
                            <span style="color:black">Name : <b>{{$item->user->f_name}}</b>
                            </span><span class="badge badge-success">Admin</span><br>
                            <p>{{$item->reply}}
                            </p>
                        </div>
                    </div>
                    @endif
                    @if ($item->user->id == 3)
                    <div class="chatboxadmin d-flex flex-row-reverse">
                        <div class="adminboxinner ">
                            <span style="color:black">Name : <b>{{$item->user->f_name}}</b>
                            </span><span class="badge badge-success">Staff</span><br>
                            <p>{{$item->reply}}
                            </p>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>


                <div. class="col-md-12">
                    <br />
                    <br />
                    <div class="replybox">
                        <form action="{{route('dashboard.ticketreply.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Type Your Reply Here</label>
                                <textarea name="reply" class="form-control-text" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
                            <div class="form-group">

                                <input type="hidden" class="form-control" name="ticketid" value="{{$ticket->id}}">

                            </div>
                            <button type="submit" value="replybtn" name="replybtn"
                                class="btn btn-primary">Submit</button>

                    </div>

            </div>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="card">
        <h5 class="card-header">Change the Status</h5>
        <div class="card-body">
            <div class="row">
                <div class="item form-group col-md-8">
                    <label class="col-form-label col-md-5 col-sm-5" for="last-name">Status <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7">
                        <select class="form-control" name="statusvalue">
                            <option value="Pending" <?= $ticket->status === 'Pending' ? 'selected' : '' ?>>
                                Pending
                            </option>

                            <option value="Processing" <?= $ticket->status === 'Processing' ? 'selected' : '' ?>>
                                Processing
                            </option>

                            <option value="Solved" <?= $ticket->status === 'Solved' ? 'selected' : '' ?>>
                                Solved
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" value="statusbtn" name="statusbtn" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>


</form>
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

</script>


@endsection