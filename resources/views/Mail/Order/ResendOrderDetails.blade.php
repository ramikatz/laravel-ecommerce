<div class="contain" style="background-color: white">
    <div class="mailboxCover">
        <div class="mailboxouter">
            <div class="tableBackgrowncolor">


                <table align="center" border="0" style="background-color: #f2f2f2">
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
            color: #4f4f4f;">Your payment was successful!!</h2>

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
                                        <p>The payment for order {{$email_data['order_number']}} has been
                                            confirmed!<br>
                                            We'll let you know when your order ships.
                                        </p>
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
                        <td>
                            <div class="mailboxBody mt-3 mb-3" style="            background-color: white;
            border-radius: 25px;
            padding: 13px;
            margin: 1px 25px;">
                                <div class="borderBottom order-details-cover" style="            border-bottom: 2px solid black;
            padding-top: 10px;">
                                    <div class="titlehere" style="float: left;">
                                        <p>Order Details</p>
                                    </div>
                                    <div class="order-price" style="float: right;">
                                        <p>Total: {{$email_data['total']}}</p>
                                    </div>
                                </div>

                                <div class="order-details-cover  mt-3">
                                    <div class="d-flex col-md-4">
                                        <img src="aliexpress.png" width="60px" alt="" mr-3>
                                    </div>
                                    <div class="product-details ">
                                        <h5 class="align-self-start ml-3 priceText">VR Smart Device</h5>
                                        <p class="align-self-start ml-3 priceText">The payment for order
                                            8015782488968463 has been confirmed!<br> We'll let you know when your
                                            order
                                            ships.</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="order-details-cover d-flex justify-content-between">
                                    <span class="align-self-start ml-3 priceText ordertimedetail">Order Time:</span>
                                    <span class="align-self-start ml-3 priceText ordertimedetail">2020-06-19
                                        10:44</span>
                                </div>
                                <div class="order-details-cover d-flex justify-content-between">
                                    <span class="align-self-start ml-3 priceText ordertimedetail">Payment
                                        Time::</span>
                                    <span class="align-self-start ml-3 priceText ordertimedetail">2020-06-19
                                        10:54</span>
                                </div>

                                <div class="m-3">
                                    <button class="btn btn-botton btn-block "
                                        style="color: white; font-size: 20px; background-color: #ff4747;    border: 2px; font-family: Open Sans,Helvetica,Tahoma,Arial,sans-serif; text-align: center;">Check
                                        My Order</button>
                                </div>
                            </div>
                        </td>
                    </tr>


                </table>
            </div>
            <div class="below-content " style="background-color: white; margin: 5px;">
                <p class="p-3" style="text-align: center; font-size: 14px;">Sent with ♥ from SunRay</p>

                <p class="footeritemstext" style="text-align: center; font-family: OpenSans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            color: #4f4f4f;">
                    You are receiving this email because you are a registered member of SunRay.

                </p>
                <p class="footeritemstext" style="text-align: center; font-family: OpenSans, Helvetica, Tahoma, Arial, sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            color: #4f4f4f;"></p>
            </div>
        </div>

    </div>

</div>