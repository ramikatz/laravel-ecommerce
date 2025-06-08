@extends('Frontend.layout.main')
@section('secondlink','/')
@section('secondname','Page')
@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">
    <div class="container">
        <br>
        <h1 style="text-align: center">Support Locations and Charges</h1>
        <br>
        <table id="datatable-responsive"
            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
            cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 80px;" aria-label="User Name: activate to sort column ascending">Location Name

                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 81px;" aria-sort="ascending"
                        aria-label="First name: activate to sort column descending">
                        Charge
                    </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($shippingcharge as $item)
                <tr role="row" class="odd">
                    <td>{{$item->location}}</td>
                    <td> @if ($item->charge == '0')
                        Free Delivery
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
@endsection