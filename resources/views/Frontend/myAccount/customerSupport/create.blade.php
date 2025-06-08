@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="card">
    <h5 class="card-header">Support Tickets</h5>
    <div class="card-body">
        <div class="col-md-12">
            <form action="{{route('frontend.ticket.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Order</label>
                    <select class="custom-select mr-sm-2" name="order_number">
                        @foreach ($tiketorders as $order)
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
                    <input type="text" name="title" class="form-control" id="formGroupExampleInput"
                        placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Message</label>
                    <input type="text" name="message" class="form-control conetent align-self-end" style="height:200px;"
                        id="formGroupExampleInput2" placeholder="Type Your Problem">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection