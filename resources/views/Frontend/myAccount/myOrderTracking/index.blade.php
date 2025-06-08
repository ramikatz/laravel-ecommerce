@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Tracking')
@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">



                    <form action="{{route('frontend.tracking.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="staticEmail2" class="sr-only">Enter Your Tracking Code</label>
                            <input type="text" name="tracking code" class="form-control ml-3"
                                placeholder="Enter Your Tracking Code">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 ml-3">Check</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->



@endsection