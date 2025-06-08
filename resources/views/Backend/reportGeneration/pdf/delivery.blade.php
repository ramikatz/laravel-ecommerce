<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .headerBox {
            border: 4px solid black;
        }
    </style>

</head>

<body>
    <div class="row headerBox">
        <h2 class="" style="text-align: center">SunRay Online Shop</h2>
    </div>
    <div class="reportTitle">
        <h3 class="" style="text-align: center">Employee details report</h3>
    </div>
    <table class="table table-striped ">
        <thead class="table-dark">
            <tr>
                <th>Delivery Order Number</th>
                <th>Delivery Status</th>
                <th>Order date</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)

            <tr role="row" class="odd">
                <td tabindex="0" class="sorting_1">
                    {{$item->order_number}}
                </td>
                <td>{{$item->status}}</td>

                <td tabindex="0" class="sorting_1">
                    {{$item->created_at}}
                </td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>