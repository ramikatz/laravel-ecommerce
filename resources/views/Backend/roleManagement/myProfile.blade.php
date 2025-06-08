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
                        <i class="fa fa-briefcase user-profile-icon"></i> {{optional($user->role)->name}}
                    </li>
                    <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                    </li>
                </ul>
                <a href="{{route('dashboard.user.edit',$user)}}" class="btn btn-success"><i
                        class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                <br>

                <h4>Skills</h4>
                <ul class="list-unstyled user_data">
                    <li>
                        <p>Web Applications</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"
                                aria-valuenow="49" style="width: 50%;"></div>
                        </div>
                    </li>
                    <li>
                        <p>Website Design</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"
                                aria-valuenow="69" style="width: 70%;"></div>
                        </div>
                    </li>
                    <li>
                        <p>Automation &amp; Testing</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"
                                aria-valuenow="29" style="width: 30%;"></div>
                        </div>
                    </li>
                    <li>
                        <p>UI / UX</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"
                                aria-valuenow="49" style="width: 50%;"></div>
                        </div>
                    </li>
                </ul>

            </div>
            <div class="col-md-9 col-sm-9 ">
                {{-- <div class="profile_title">
                    <div class="col-md-6">
                        <h2>User Activity Report</h2>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right"
                            style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>November 11, 2020 - December 10, 2020</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div id="graph_bar"
                    style="width: 100%; height: 280px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <svg height="280" version="1.1" width="885" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        style="overflow: hidden; position: relative; left: -0.8px; top: -0.2px;">
                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël @@VERSION
                        </desc>
                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="42.53125"
                            y="213.600820665125" text-anchor="end" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0
                            </tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M55.03125,213.600820665125H860" stroke-width="0.5"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.53125"
                            y="166.45061549884377" text-anchor="end" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.395927998843774" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">750
                            </tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M55.03125,166.45061549884377H860" stroke-width="0.5"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.53125"
                            y="119.3004103325625" text-anchor="end" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.401972832562507" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1,500
                            </tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M55.03125,119.3004103325625H860" stroke-width="0.5"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.53125"
                            y="72.15020516628124" text-anchor="end" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.400205166281239" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,250
                            </tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M55.03125,72.15020516628124H860" stroke-width="0.5"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.53125" y="25"
                            text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">3,000</tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M55.03125,25H860" stroke-width="0.5"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="819.7515625"
                            y="226.100820665125" text-anchor="middle" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,6.0092,525.723)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Other
                            </tspan>
                        </text><text x="739.2546875" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-29.7352,494.248)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                6S Plus</tspan>
                        </text><text x="658.7578125" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-33.2382,440.1974)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                6S</tspan>
                        </text><text x="578.2609375" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-55.5673,399.6079)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                6 Plus</tspan>
                        </text><text x="497.7640625" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-59.0781,345.5573)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                6</tspan>
                        </text><text x="417.2671875" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-76.9102,301.6877)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                5S</tspan>
                        </text><text x="336.7703125" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-88.1918,253.2205)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                5</tspan>
                        </text><text x="256.2734375" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-109.8536,212.0215)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                3GS</tspan>
                        </text><text x="175.7765625" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-120.5849,163.169)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                4S</tspan>
                        </text><text x="95.2796875" y="226.100820665125" text-anchor="middle" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-131.8666,114.7018)">
                            <tspan dy="4.397695665125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">iPhone
                                4</tspan>
                        </text>
                        <rect x="65.093359375" y="189.71138338087584" width="60.372656250000006"
                            height="23.88943728424917" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="145.590234375" y="172.42297481990605" width="60.372656250000006"
                            height="41.17784584521897" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="226.087109375" y="196.31241210415521" width="60.372656250000006"
                            height="17.2884085609698" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="306.583984375" y="114.8368575768212" width="60.372656250000006"
                            height="98.76396308830381" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="387.080859375" y="172.42297481990605" width="60.372656250000006"
                            height="41.17784584521897" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="467.577734375" y="78.18543142756525" width="60.372656250000006"
                            height="135.41538923755976" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="548.074609375" y="141.68104105149067" width="60.372656250000006"
                            height="71.91977961363435" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="628.571484375" y="64.54330539945454" width="60.372656250000006"
                            height="149.05751526567047" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="709.068359375" y="121.12355159899204" width="60.372656250000006"
                            height="92.47726906613298" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        <rect x="789.565234375" y="127.41024562116287" width="60.372656250000006"
                            height="86.19057504396214" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                    </svg>
                    <div class="morris-hover morris-default-style" style="left: 43.2797px; top: 111px; display: none;">
                        <div class="morris-hover-row-label">iPhone 4</div>
                        <div class="morris-hover-point" style="color: #26B99A">
                            Geekbench:
                            380
                        </div>
                    </div>
                </div> --}}

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                data-toggle="tab" aria-expanded="true">Recent Activity</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

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

                            </ul>

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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            User Name : {{$user->userName}}
                            <hr>
                            First Name : {{$user->Fname}}
                            <hr>
                            First Name : {{$user->Lname}}
                            <hr>
                            First Name : {{$user->email}}
                            <hr>
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