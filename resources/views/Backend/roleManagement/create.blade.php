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
            <form action="{{route('dashboard.user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary align-right">Create
                        User</button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection
@section('custom-js')

@endsection