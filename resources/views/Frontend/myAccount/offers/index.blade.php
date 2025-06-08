@extends('Frontend.myAccount.layout.main')
@section('myAccount')
<div class="card">
    <div class="card-header">
        Claim your coupon.
    </div>
    <div class="card-body">

        <div class=" bootdey">
            <div class="panel panel-default panel-order">

                <div class="panel-body">
                    <div class="row orderlist">
                        <div class="col-md-12 order-list p-3 m-3">
                            <div class="row">
                                <b>Active Coupon code : </b> {{ $user->coupon}} @if ($user->coupon == '')
                                <p> &nbsp; Currently, No Coupon Code is Activated</p>
                                @endif
                            </div>
                            <hr />
                            <div class="row">

                                <form action="{{route('frontend.save.coupon')}}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Type Coupon Code</label>
                                        <input type="text" name="code" class="form-control" id="formGroupExampleInput"
                                            placeholder="Type Coupon Code">
                                    </div>

                                    <button style="background-color: #FF324D; text
    border: 3px solid #f73100;
    padding: 20px 15px;
    color: #fff;
    text-align: center;
    height: 44px;
    width: 100%;" type="submit" class="btn">Apply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection