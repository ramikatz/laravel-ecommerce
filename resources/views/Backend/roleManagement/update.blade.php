@extends('Backend.layout.main')
@section('title','Update User')
@section('custom-style')

@endsection

@section('content')

<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Update
                @auth
                {{ Auth::user()->userName }}
                @endauth
                Profile</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <form action="{{route('dashboard.user.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">

                <div class="col-md-3">
                    <div class="profile_img p-3">
                        <div id="crop-avatar">

                            <img src="{{url('upload/user/',$user->image)}}" class="img-thumbnail" alt="" width="300px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Device Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="x_content" style="border: 2px solid #d7d7d7; padding: 13px;">

                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">User Name</label>
                                <input type="text" name="userName" value="{{$user->userName}}" class="form-control"
                                    id="inputEmail4">
                                {{-- @error('userName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Gender</label>
                            <div class="row">
                                <div class="form-check">
                                    <input type="radio" name="gender" id="male" {{ $user->gender == 1 ? 'checked' : ''}}
                                        value="1">
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
                            <label for="inputPassword4">Current Password</label>
                            <input type="password" name="password" class="form-control"
                                id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">New Password</label>
                            <input type="text" name="npassword" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Comfirm Password</label>
                            <input type="password" name="cpassword" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Address Line 1</label>
                            <input type="text" name="billing_address_line_1"
                                value="{{optional($user->address)->billing_address_line_1}}" class="form-control"
                                id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Address Line 2</label>
                            <input type="text" name="billing_address_line_2"
                                value="{{optional($user->address)->billing_address_line_2}}" class="form-control"
                                id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">City</label>
                            <input type="text" name="billing_city" value="{{optional($user->address)->billing_city}}"
                                class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Status</label>
                            <input type="text" name="billing_state" value="{{optional($user->address)->billing_state}}"
                                class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Company Name</label>
                            <input type="text" name="billing_Cname" value="{{optional($user->address)->billing_Cname}}"
                                class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Postal Code</label>
                            <input type="text" name="billing_postal_code"
                                value="{{optional($user->address)->billing_postal_code}}" class="form-control"
                                id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Country</label>
                            <input type="text" name="country" value="{{optional($user->address)->country}}"
                                class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile Number</label>
                            <input type="text" name="billing_mobile"
                                value="{{optional($user->address)->billing_mobile}}" class="form-control"
                                id="inputPassword4">
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
                            <label for="inputPassword4">Change Role</label>
                            <div class="form-group row">

                                @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                        {{-- @if ($user->hasRole($role)->pluck('id')->contains($role->id)) checked @endif> --}}
                                        @if ($user->hasRole($role->name)) checked @endif>

                                    <label>{{$role->name}}</label>
                                </div>
                                @endforeach
                                {{-- <select class="custom-select" name="roles[]">
                                                        @foreach ($roles as $role)
                                                        <option value="{{$role->id}}" name="roles[]">{{$role->name}}
                                </option>
                                @endforeach

                                </select> --}}

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary align-right">Update User</button>
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