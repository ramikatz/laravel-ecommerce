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
        <h1 class="" style="color:white; text-align: center; background:black; padding:5px;">SunRay Online Shop</h1>
    </div>
    <br />
    <br />
    <div class="reportTitle">
        <h3 class="" style="text-align: center;">{{ $data->title }}</h3>
    </div>
    <br />
    <p>{{ $data->created_at }}</p>
    <p>Hi, {{$data->user->userName}}</p>
    <hr>
    <p>Please Quote us price for following Goods</p>
    <p> {!! $data->content !!}</p>


    <p>Pleasae indicate all prices,SHIPPING TERMS OF SALE, and indicate when your price quote shall expire. Our Contact
        Number : {{$data->number}}</p>
    <hr>
    <p>Very truly yours,<br />
        {{ $data->created_user }}</p>








</body>

</html>