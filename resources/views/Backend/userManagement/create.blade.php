@extends('Backend.layout.main')
@section('title','Update User')
@section('custom-style')

@endsection

@section('content')

<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Add User</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_img p-3">
                    <div id="crop-avatar">

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Device Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="x_content" style="border: 2px solid #d7d7d7;
    padding: 13px; ">
                    <form action="{{route('dashboard.user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">User Name</label>
                                <input type="text" name="userName" class="form-control" id="inputEmail4"
                                    placeholder="Type User Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Gender</label>
                                <div class="row">
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="male" value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="female" value="0">
                                        <label class="form-check-label" for="gridRadios1">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Fist Name</label>
                                <input type="text" name="Fname" class="form-control" id="inputEmail4"
                                    placeholder="Type First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Last Name</label>
                                <input type="text" name="Lname" class="form-control" id="inputPassword4"
                                    placeholder="Type Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    placeholder="Type Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4"
                                    placeholder="Type Password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Address Line 1</label>
                                <input type="text" name="address_line_1" class="form-control" id="inputEmail4"
                                    placeholder="Type Address Line 1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Address Line 2</label>
                                <input type="text" name="address_line_2" class="form-control" id="inputPassword4"
                                    placeholder="Type Address Line 2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">City</label>
                                <input type="text" name="city" class="form-control" id="inputEmail4"
                                    placeholder="Type City">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">District</label>
                                <input type="text" name="district" class="form-control" id="inputPassword4"
                                    placeholder="Type District">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Province</label>
                                <input type="text" name="province" class="form-control" id="inputEmail4"
                                    placeholder="Type Province">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" id="inputPassword4"
                                    placeholder="Type Postal Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Country</label>
                                <input type="text" name="country" class="form-control" id="inputEmail4"
                                    placeholder="Type Country">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" id="inputPassword4"
                                    placeholder="Type Mobile Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Birth Day</label>
                                <div class="form-group row">

                                    <div class="col-sm-10">
                                        <input class="date-picker form-control" name="bday" placeholder="dd-mm-yyyy"
                                            type="text" required="required" onfocus="this.type='date'"
                                            onmouseover="this.type='date'" onclick="this.type='date'"
                                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Change Role</label>
                                <div class="form-group row">

                                    @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}">
                                        <label>{{$role->name}}</label>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>



                        <div class=" form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary align-right">Update
                                    User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('custom-js')

@endsection