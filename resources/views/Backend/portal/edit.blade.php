{{-- @extends('Backend.layout.main')
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

<div class="col-md-12">
    <form action="{{route('dashboard.ticket.update',$ticket)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="formGroupExampleInput">Order</label>
            <select class="custom-select mr-sm-2" name="order_number">
                <option value="{{$ticket->id}}">
                    {{$ticket->order_number}}
                    @foreach ($orders as $order)
                <option value="{{$order->id}}">{{$order->order_number}}
                </option>
                @endforeach
            </select>
            <label for="formGroupExampleInput">Order</label>
            <select class="custom-select mr-sm-2" name="type">
                <option value="General">General</option>
                <option value="Deliver">Deliver</option>
                <option value="Complain">Complain</option>
                <option value="payment">payment</option>

            </select>

        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Subject</label>
            <input type="text" value="{{$ticket->title}}" name="title" class="form-control" id="formGroupExampleInput"
                placeholder="Subject">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Message</label>
            <input type="text" value="{{$ticket->message}}" name="message" class="form-control conetent align-self-end"
                style="height:200px;" id="formGroupExampleInput2" placeholder="Type Your Problem">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

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

@endsection --}}