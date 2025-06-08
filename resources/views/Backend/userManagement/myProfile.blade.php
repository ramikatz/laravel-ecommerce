@extends('Backend.layout.main')
@section('title','Update User')
@section('custom-style')
@endsection

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>User Report <small>Activity report</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <img src="{{url('upload/user/',$user->image)}}" width="200px" class="img-responsive avatar-view"
                            alt="" title="Change the avatar">

                    </div>
                </div>
                <h3>{{$user->userNmae}}</h3>
                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i>
                        {{optional($user->address)->billing_address_line_1}},{{optional($user->address)->billing_address_line_2}},<br>
                        {{optional($user->address)->billing_city}}
                    </li>
                    <li>
                        {{--  <i class="fa fa-briefcase user-profile-icon"> --}}</i> {{optional($user->role)->name}}
                    </li>
                    {{--  <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                    </li> --}}
                </ul>
                <a href="{{route('dashboard.user.edit',$user)}}" class="btn btn-success"><i
                        class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                <br>



            </div>
            <div class="col-md-9 col-sm-9 ">


                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation"><a href="#tab_content1" id="home-tab" role="tab" class="active"
                                data-toggle="tab" aria-expanded="true">Profile</a>
                        </li>
                        {{--  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                data-toggle="tab" aria-expanded="false">Recent Activity</a>
                        </li> --}}
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active p-3" id="tab_content1" aria-labelledby="home-tab">
                            <br />
                            <b>User Name</b> : {{$user->userName}}
                            <hr>
                            <b>First Name</b> : {{$user->Fname}}
                            <hr>
                            <b>Last Name</b> : {{$user->Lname}}
                            <hr>
                            <b>Email Address</b> : {{$user->email}}
                            <hr>


                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <table class="data table table-striped no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Client Company</th>
                                        <th class="hidden-phone">Hours Spent</th>
                                        <th>Contribution</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>New Company Takeover Review</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">18</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" data-transitiongoal="35"
                                                    aria-valuenow="35" style="width: 35%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>New Partner Contracts Consultanci</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">13</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15"
                                                    aria-valuenow="15" style="width: 15%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Partners and Inverstors report</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">30</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" data-transitiongoal="45"
                                                    aria-valuenow="45" style="width: 45%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>New Company Takeover Review</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">28</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" data-transitiongoal="75"
                                                    aria-valuenow="75" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div role="tabpanel" class="p-3 tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <ul class="messages">
                                <li>
                                    <img src="{{url('upload/user/',$user->image)}}" class="avatar">

                                    <div class="message_date">
                                        <h3 class="date text-info">24</h3>
                                        <p class="month">May</p>
                                    </div>
                                    <div class="message_wrapper">
                                        <h4 class="heading">{{$user->userName}}</h4>
                                        <blockquote class="message">Raw denim you probably haven't heard of them jean
                                            shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh
                                            dreamcatcher synth.</blockquote>
                                        <br>
                                        <p class="url">
                                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                        </p>
                                    </div>
                                </li>

                            </ul>s
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')

@endsection