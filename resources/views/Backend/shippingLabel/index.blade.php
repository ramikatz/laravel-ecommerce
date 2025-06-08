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
    <style>
        @page {
            size: 11cm 18cm landscape;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr>
            <td>
                <h5>Sunray</h5>
                No,458,Main Street,
                <br />Panadura.
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <b>For:</b><br />
                {{optional($data)->Fname}} {{optional($data)->Lname}}
                <br />{{optional($data->address)->billing_address_line_1}}
                <br />{{optional($data->address)->billing_address_line_2}}
                <br />{{optional($data->address)->billing_city}}
                {{optional($data->address)->billing_postal_code}}
            </td>
        </tr>
    </table>





</body>

</html>