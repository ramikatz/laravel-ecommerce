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
<div class="col-sm-12 col-md-12">
    <div class="card">
        <h5 class="card-header">Support Tickets</h5>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ticket Subject</th>
                                <th>Type</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ticketNumbers as $ticket)
                            <tr>
                                <td scope="row"><a href="{{route('dashboard.ticket.show',$ticket->id)}}">
                                        {{$ticket->title}}</a></td>
                                <td>{{$ticket->type}}</td>
                                <td>{{$ticket->status}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $ticketNumbers->links() }}
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
    /* $(document).ready(function () {

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });     


        $('.servicedeletebtn').click(function (e){
            e.preventDefault();
             var delete_id = $(this).closest("tr").find('.servicedeleteval_id').val();
                //alert(delete_id);

            swal({
                title: "Are you sure?",
                //text: "Once deleted, you will not be able to recover this imaginary file!",
                text: "Are you Sure You want to Logout ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var data={
                       "_token": $('input[name=_token]').val(),
                       "id": delete_id,
                    };

                    $.ajax({
                        type: "DELETE",
                        url: '/dashboard/product/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                            icon: "success",
                            })
                            .then((result)=>{
                                location.reload();
                            });
                        }
                    });
                    
                } 
            });


        });

    });
 */
</script>


@endsection