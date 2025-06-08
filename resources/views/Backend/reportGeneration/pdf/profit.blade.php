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
        <h3 class="" style="text-align: center">Profit details report</h3>
    </div>
    <table class="table table-striped ">
        <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Sold Price</th>
                <th>Purchase Price</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;

            @endphp
            @foreach ($data as $items)
            @foreach ($items->order_items as $item)
            <?php $total += ($item->pivot->price-$item->purchase_price) ?>
            <tr role="row" class="odd">
                <td tabindex="0" class="sorting_1">{{$item->product_title}}</td>
                <td>{{$item->pivot->price}}</td>
                <td>{{$item->purchase_price}}</td>
                {{-- <td>{{$item->pivot->quantity}}</td> --}}
                <td tabindex="0" class="sorting_1">
                    {{$item->pivot->price - $item->purchase_price }}
                </td>
            </tr>
            @endforeach

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td><b>Total Profit</b></td>
                <td> = {{$total}}</td>

            </tr>
        </tbody>
    </table>


</body>

</html>