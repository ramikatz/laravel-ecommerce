<div class="contain" style="background-color: white">
    <div class="mailboxCover">
        <div class="mailboxouter">
            <div class="tableBackgrowncolor">


                <table align="center" border="0" style="background-color: #f2f2f2; width: 50%">
                    <tr>
                        <td>
                            <div class=" p-3">
                                <div class="logo" style="float: left; margin-left:  10px;">
                                    <img src="aliexpress.png" height="60px" alt="">
                                </div>
                                <div class="menutext" style="font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 25px;
            text-align: left;
            color: #4f4f4f;
            float: right;
            margin-right: 10px">
                                    <p class="pt-2">Buyer Protection</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="mailboxBody" style="background-color: white;
            border-radius: 25px;
            padding: 13px;
            margin: 1px 25px;
            /* padding-bottom: 6px; */
            margin-bottom: 26px;">
                                <div class="topichere pt-2 center" style="text-align: center;">

                                    <h2 style="font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 26px;
            font-weight: bold;
            line-height: 30px;
            /*text-align: left;*/
            color: #4f4f4f;">Your Order is {{$email_data['status']}}!!</h2>

                                    <div class="dearcus p-2">
                                        <p style="font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 25px;
            text-align: left;
            color: #4f4f4f;">Hi {{$email_data['name']}},</p>
                                    </div>

                                    <!-- <h3 style="font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 23px;
            font-weight: bold;
            line-height: 30px;
            /*text-align: left;*/
            color: #4f4f4f;">You have successfully registered at SunRay</h3> -->
                                </div>

                                <div class="detailsboy p-2">
                                    <p style="font-family: Open Sans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 25px;
            text-align: left;
            color: #4f4f4f;">

                                        @if ($email_data['status'] == "Order Confirmed")
                                        <p>The payment for order {{$email_data['order_number']}} has been
                                            confirmed!<br>
                                            We'll let you know when your order ships. You can also sign<br> in to
                                            AliExpress to see more detail
                                        </p>
                                        @elseif ($email_data['status'] == "Order Pending")
                                        <p>Your Order will accept our Order Managemet. after that we will notify you.
                                            Stay with us</p>
                                        @elseif ($email_data['status'] == "On the way")
                                        <p>Your Item is On the way right now. Our Member will Contact You Zoon</p>
                                        @elseif ($email_data['status'] == "Ready for pickup")
                                        <p>Your Item has been delivered successfully by SunRay Delivery Team.</p>
                                        @endif


                                </div>
                                <div class="checkbotton pt-2 center" style="text-align: center;">
                                    <button type="submit" class="buttonstatuscheck" style="display: inline-block;
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
            border: 1px solid;">Check Order Status</button>
                                </div>
                                <p class="p-3 center" style="text-align: center;">If you have any questions, please
                                    let us know!</p>
                            </div>
                            <div class="mailbox-below">

                            </div>
                        </td>
                    </tr>
                    <tr>

                    </tr>


                </table>
            </div>
            <div class="below-content " style="background-color: white; margin: 5px;">
                <p class="p-3" style="text-align: center; font-size: 14px;">Sent with ♥ from AliExpress</p>

                <p class="footeritemstext" style="text-align: center; font-family: OpenSans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            color: #4f4f4f;">
                    You are receiving this email because you are a registered member of SunRay.
                    If you don't want to receive marketing emails in the future, please
                    unsubscribe
                </p>
                <p class="footeritemstext" style="text-align: center; font-family: OpenSans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            color: #4f4f4f;">SunRay Ecommerce Private Limited,
                    33 SunRay, Panadura, Sri Lanka </p>
            </div>
        </div>

    </div>

</div>