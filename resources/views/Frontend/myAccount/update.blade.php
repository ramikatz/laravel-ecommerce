{{-- @extends('Frontend.layout.main')
@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->

    <div class="section">
        <div class="container">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{url('upload/user/',$user->image)}}" alt="Admin" class="rounded-circle"
width="150">
<div class="mt-3">
    <h4>{{$user->userName}}</h4>
    <a href="{{route('frontend.user.edit',$user)}}" class="btn btn-outline-primary">Edit
        Profile</a>
</div>
</div>
</div>
</div>
<div class="card mt-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-globe mr-2 icon-inline">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>

                </svg><a href="">Orders Histry</a> </h6>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-github mr-2 icon-inline">

                </svg> <a href="">Support Tickets</a></h6>
            <span class="text-secondary"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter mr-2 icon-inline text-info">

                </svg>Payment options</h6>
            <span class="text-secondary"></span>
        </li>

    </ul>
</div>
</div>
<div class="col-md-8">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <form action="{{route('frontend.user.update',$user)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">




                        <div class="col-md-12 justify-content-center">


                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1">Device Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">User Name</label>
                                    <input type="text" name="userName" value="{{$user->userName}}" class="form-control"
                                        id="inputEmail4">

                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Fist Name</label>
                                    <input type="text" name="Fname" value="{{$user->Fname}}" class="form-control"
                                        id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" name="Lname" value="{{$user->Lname}}" class="form-control"
                                        id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control"
                                        id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" name="password" value="{{$user->password}}"
                                        class="form-control" id="inputPassword4">
                                </div>
                            </div>



                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mobile Number</label>
                                    <input type="text" name="mobile" value="{{optional($user->address)->mobile}}"
                                        class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Birth Day</label>
                                    <div class="form-group row">

                                        <div class="col-sm-10">
                                            <input class="date-picker form-control" name="bday" value="{{$user->bday}}"
                                                type="text" required="required" onfocus="this.type='date'"
                                                onmouseover="this.type='date'" onclick="this.type='date'"
                                                onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Gender</label>
                                    <div class="row">
                                        <div class="form-check">
                                            <input type="radio" name="gender" id="male"
                                                {{ $user->gender == 1 ? 'checked' : ''}} value="1">
                                            <label class="form-check-label" for="gridRadios1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="gender" id="female"
                                                {{ $user->gender == 0 ? 'checked' : '' }} value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary align-right">Update
                                        User</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <hr>

        </div>
    </div>

</div>
</div>
</div>


<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

@endsection --}}