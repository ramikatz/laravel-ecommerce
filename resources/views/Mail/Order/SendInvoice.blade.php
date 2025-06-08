<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>


    <style>
        .menutext {
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 25px;
            text-align: left;
            color: #4f4f4f;
            */
        }

        p {
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 25px;
            text-align: left;
            color: #4f4f4f;
        }

        .topichere h2 {
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 26px;
            font-weight: bold;
            line-height: 30px;
            /*text-align: left;*/
            color: #4f4f4f;
        }

        .center {
            text-align: center;
        }

        .mailboxBody {
            background-color: white;
            border-radius: 25px;
            padding: 13px;
            margin: 1px 25px;
            /* padding-bottom: 6px; */
            margin-bottom: 26px;
        }

        .priceText {
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            display: block;
            color: #333;
            line-height: 20px;
            text-decoration: none;
        }

        .ordertimedetail {
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            color: #999999;
            font-size: 13px;
        }

        .buttonstatuscheck {
            display: inline-block;
            background: #ff4747;
            color: #ffffff;
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 18px;
            font-weight: bold;
            line-height: 120%;
            margin: 0;
            text-decoration: none;
            text-transform: none;
            padding: 10px 25px;
            border-radius: 3px;
            border: 1px solid;
        }

        .btn-check {
            font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            border: none;
            border-radius: 3px;
            background: #ff4747;
        }

        .borderBottom {
            border-bottom: 2px solid black;
            padding-top: 10px;
        }

        .footeritemstext {
            font-family: OpenSans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            color: #4f4f4f;
        }
    </style>
</head>

<body>
    <div class="contain" style="background-color: white">
        <div class="mailboxCover d-flex justify-content-center">
            <div class="mailboxouter" style="width: 40%; ">
                <div class="tableBackgrowncolor" style="background-color: #f2f2f2;">


                    <table align="center" border="0">
                        <tr>
                            <td>
                                <div class="d-flex justify-content-between p-3">
                                    <div class="logo">
                                        <img src="aliexpress.png" height="60px" alt="">
                                    </div>
                                    <div class="menutext">
                                        <p class="pt-2">Buyer Protection</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mailboxBody">
                                    <div class="topichere pt-2 center">


                                        <h2>SunRay Send Invoice to You for Your recent purchase </h2>
                                    </div>
                                    <div class="dearcus p-2">
                                        <p>Hi {{$email_data['Fname']}},</p>
                                    </div>
                                    <div class="detailsboy p-2">
                                        <p>Here is the ticket summary:
                                            <br>
                                            {{$email_data['title']}}<br>
                                            "{{$email_data['message']}}" <br><br>

                                            All Are right?<br><br>

                                            To manage or update your ticket, please visit:<br>
                                            https://my.vultr.com/support/view_ticket/?TICKETID=NHL-14PZU
                                        </p>
                                    </div>

                                    <div class="checkbotton pt-2 center">
                                        <button type="submit" class="buttonstatuscheck">Login</button>
                                    </div>
                                    <p class="p-3 center">If you have any questions, please let us know!</p>
                                </div>
                                <div class="mailbox-below">

                                </div>
                            </td>
                        </tr>


                    </table>
                </div>
                <div class="below-content " style="background-color: white">
                    <p class="p-3" style="text-align: center; font-size: 14px;">Sent with ♥ from SunRay</p>

                    <p class="footeritemstext" style="text-align: center;">
                        You are receiving this email because you are a registered member of SunRay
                    </p>
                    <p class="footeritemstext" style="text-align: center;">A</p>
                </div>
            </div>

        </div>

    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>