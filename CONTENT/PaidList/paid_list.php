<?php 

session_start();

if(!isset($_SESSION["username"])) {

     echo '<script type="text/javascript">

     alert("Sorry, you must login as customer first.");

     window.location.href = "../../CONTENT/Futsalista/futsalista.php";

     </script>';

     die();

}

?>



<?php include '../../INCLUDE/header_user.php'; ?>



<!DOCTYPE html>

<html>

<head>

    <title>Paid List</title>

    <link rel="stylesheet" href="../../CSS/pay_list_style.css">

</head>

<body>

    <?php require_once 'paid_list.php'; ?>    

    <table class="table-fill"> 

        <tr>

            <th class="text-left">Order ID</th>

            <th class="text-left">Customer ID</th>

            <th class="text-left">Court ID</th>

            <!-- <th class="text-left">Date</th>

            <th class="text-left">Time Slot</th> -->

            <th class="text-left">Action</th>

        </tr>

        <?php

            $hostname = "localhost";

            $username = "root";

            $password = "";

            $database_name = "ecommerce";



            // $order_id = $_POST['order_id'];

            // $customer_id = $_POST['customer_id'];

            // $court_id = $_POST['court_id'];

            // $time_slot = $_POST['time_slot'];



            $connect = mysqli_connect($hostname, $username, $password, $database_name);



            if ($connect->connect_error)

            {

                die("Connection failed:". $connect->connect_error);

            }



            //display all record from the TABLE shopping_cart

            $sql = "SELECT * FROM `shopping_cart` WHERE `order_status`='PAID'";

            $result = $connect-> query($sql);



            if ($result-> num_rows > 0)

            {

                while ($row = $result-> fetch_assoc())

                {

                    if ($row['customer_id'] == $_SESSION["username"]): ?>

                        <tr>

                            <td class="text-left"><?php echo $row['order_id']; ?></td>

                            <td class="text-left"><?php echo $row['order_status']; ?></td>

                            <td class="text-left"><?php echo $row['court_id']; ?></td>

                            <!-- <td class="text-left"><?php echo $row['booking_date']; ?></td>

                            <td class="text-left"><?php echo $row['time_slot']; ?></td> -->

                            <td class="text-left">

                                <a href="print_receipt.php?order_id=<?php echo $row['order_id']; ?>" class="btn-print blue">Print Receipt</a>

                            </td>

                        </tr>

                        <?php

                    endif; 

                }    

            }

            else

            {

                echo "0 result";

            }



            $connect-> close();

        ?>

    </table>

</body>

</html>



<?php include '../../INCLUDE/footer.php'; ?>