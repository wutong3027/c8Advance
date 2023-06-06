<?php include '../../INCLUDE/header_user.php'; ?>



<?php

        $connection = mysqli_connect("localhost", "root", "", "ecommerce");        //connect to database

?>



<!DOCTYPE html>

    <head>

    <title>Booking Receipt</title>

    <link rel="stylesheet" href="../../CSS/print_receipt_style.css">

    </head>



<body>



<div class="invoice-box">

    <table cellpadding="0" cellspacing="0">

        <tr class="top">

            <td colspan="2">

                <table>

                <tr>

                        <td class="title">

                            <img src="https://img07.shop-pro.jp/PA01326/341/PA01326341.jpg?cmsp_timestamp=20230509114623" style="width:100%; max-width:90px;">

                        </td>



                        <td>

                            <h3>Receipt</h3>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>



    <?php         //show receipt



        if (isset($_GET['order_id']))

        {

            $sql = "SELECT * FROM shopping_cart INNER JOIN court ON shopping_cart.court_id = court.court_id WHERE order_status ='PAID' ";

            $result = mysqli_query($connection,$sql);



            $order_id = $_GET['order_id'];          //get order_id from $_GET['search']



                if($result-> num_rows > 0)

                {

                    while ($Column = $result-> fetch_assoc())

                    {

                        if ($Column['order_id'] == $order_id): ?>

                    

                            <tr class="heading">

                                <td>

                                    Payment Method

                                </td>



                                <td>

                                    

                                </td>

                            </tr>



                            <tr class="details">

                                <td>

                                    Credit/Debit Card

                                </td>



                                <td>

                                    

                                </td>

                            </tr>



                            <tr class="heading">

                                <td>

                                    Order ID (#<?php echo $Column['order_id']?>)

                                </td>



                                <td>

                                    Details

                                </td>

                            </tr>



                            <tr class="item">

                                <td>

                                    Customer ID

                                </td>



                                <td>

                                    <?php echo $Column['customer_id']?>

                                </td>

                            </tr>



                            <tr class="item last">

                                <td>

                                    Item ID

                                </td>



                                <td>

                                    <?php echo $Column['court_id']?>

                                </td>

                            </tr>



                            <!-- <tr class="item last">

                                <td>

                                    Booking Date

                                </td>



                                <td>

                                    <?php echo $Column['booking_date']?>

                                </td>

                            </tr> -->



                            <!-- <tr class="item last">

                                <td>

                                    Time Slot

                                </td>



                                <td>

                                    <?php echo $Column['time_slot']?>

                                </td>

                            </tr> -->



                            <tr class="total">

                                <td></td>



                                <td>

                                Total: RM <?php echo $Column['court_price_per_hour']?>

                                </td>

                            </tr>

                        

                        <?php endif;

                    }

                }

        }

        mysqli_close($connection);        //disconnect from database

    ?>



</table>

</div>



<div class="container">

    <div class="center">

        <a onclick="window.print();" class="btn blue">Print/Download Receipt</a>

    </div>

</div>



</body>



<?php include '../../INCLUDE/footer.php'; ?>