@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Support Tickets</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 float-right offset-md-9">
                        <a href="{{route('frontend.ticket.create')}}" class="btn btn-primary  m-2">Create Ticket</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ticket Subject</th>
                                    <th>Last reply</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ticketNumbers as $ticket)
                                <tr>
                                    <td scope="row"><a href="{{route('frontend.ticket.show',$ticket->id)}}">
                                            {{$ticket->title}}</a></td>
                                    <td></td>
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
</div>


@endsection