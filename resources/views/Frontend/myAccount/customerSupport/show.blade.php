@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="card">
    <h5 class="card-header">Support Ticket - {{$ticket->title}}</h5>
    <div class="card-body">
        <div class="row">

            <div class="col-md-12" style="width: 110px;
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


            <div class="col-md-12">
                <div class="replybox">
                    <form action="{{route('frontend.ticketreply.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Type Your Reply Here</label>
                            <textarea name="reply" class="form-control-text" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" name="ticketid" value="{{$ticket->id}}">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection