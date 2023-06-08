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

<?php
    
    $hostname = "sql311.infinityfree.com";

	$username = "if0_34380026";

	$password = "NEeR0dBMGcW";

	$database_name = "if0_34380026_ecommerce";

    $connect = mysqli_connect($hostname, $username, $password, $database_name);

    if ($connect->connect_error)
    {
        die("Connection failed:". $connect->connect_error);
    }

    if (isset($_GET['delete']))
    {
        $order_id = $_GET['delete'];
        
        $sql = "DELETE FROM `shopping_cart` WHERE `order_id`=$order_id";
        $result = $connect-> query($sql);
    }

    if(isset($_POST['insert']))
    {    
        $connection = mysqli_connect("sql311.infinityfree.com", "if0_34380026", "NEeR0dBMGcW", "if0_34380026_ecommerce");        //connect to database

        if ($connect->connect_error)
        {
            die("Error: Connection failed:". $connect->connect_error);
        }

            //display all record from the TABLE shopping_cart
            $sql = "SELECT * FROM `customer_detail`";

            $result = $connect-> query($sql);
            
            //$customer_id = 2;
            if ($result-> num_rows > 0)
            {
                $total_price = 0;
                while ($row = $result-> fetch_assoc())
                {
                    if ($row['customer_id'] == $_SESSION["username"])
                    {
                        $mailto = $row['email'];                                             //$_POST['#'] user email from database 
                    }
                } 
            }
            else
            {
                echo "You have no latest booking.";
            }
          
        $subject = "Booking Confirmation";                                                      //email contents
        $messages = "We are teams from Book2Sport. Thanks you for booking the court.";          //email contents
        $headers = "From: webproject@example.com" ;                                             //email contents

        $card_name = $_POST['card_name'];                                                       //assign variables of card
        $card_number = $_POST['card_number'];
        $expiry_date = $_POST['expiry_date'];
        $cvv = $_POST['cvv'];
        $totalprice = $_POST['totalprice'];                                                     //assign variables of total price
        $paid_date = date('Y-m-d');
        $customer_id = $_POST['customer_id'];
        //echo $customer_id;                                                                    //$order_id = $_POST['order_id'];

        $sql_insert = "INSERT INTO payment_record(cardholdername, cardnumber, expirydate, CVV, totalprice, paid_date) VALUES ('$card_name','$card_number','$expiry_date','$cvv','$totalprice','$paid_date')";
        //records data into database (table name:payment_record)

        $result = mysqli_query($connection, $sql_insert);

        if($result)
        {   
            mail($mailto,$subject,$messages,$headers);        //send email if records is in database
            $message = 'The payment transaction is proceed. Kindly check your mailbox. To print the receipt, please check the paid list in the website.';
            echo "<SCRIPT> 
                        alert('$message')
                    </SCRIPT>";
            echo '' ;
        }
        else
        {
            echo 'Transaction failed. Please try again.';        
        }

        mysqli_close($connection);        //disconnect to database
    }

    if(isset($_POST['insert']))
    {    
        $connection = mysqli_connect("sql311.infinityfree.com", "if0_34380026", "NEeR0dBMGcW", "if0_34380026_ecommerce");        //connect to database

        $customer_id = $_POST['customer_id'];
        //$order_id = $_POST['order_id'];
        echo $customer_id;
        echo $_POST['customer_id'];
        $sql_update = "UPDATE `shopping_cart` SET `order_status`='PAID' WHERE `customer_id`= $customer_id";
        $result = mysqli_query($connection, $sql_update);

        if(!$result)
        {
            echo 'Transaction failed.';
        }

        mysqli_close($connection);        //disconnect to database
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <!-- <link rel="stylesheet" href="payment.css"> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../CSS/shopping_cart_style.css">
</head>
<body>
    <?php require_once 'shopping_cart.php'; ?>    
    <table class="table-fill">
        <tr>
            <th class="text-left">Order ID</th>
            <th class="text-left">Order Status</th>
            <th class="text-left">Customer ID</th>
            <th class="text-left">Item ID</th>
            <!-- <th class="text-left">Date</th>
            <th class="text-left">Time Slot</th>  -->
            <th class="text-left">Item Name</th>
            <th class="text-left">Item Price</th>
            <th class="text-left">Action</th>
        </tr>
        <?php
            $hostname = "sql311.infinityfree.com";

            $username = "if0_34380026";
        
            $password = "NEeR0dBMGcW";
        
            $database_name = "if0_34380026_ecommerce";

            $connect = mysqli_connect($hostname, $username, $password, $database_name);

            if ($connect->connect_error)
            {
                die("Connection failed:". $connect->connect_error);
            }

            //display all record from the TABLE shopping_cart
            $sql = "SELECT * FROM `shopping_cart` INNER JOIN `court` ON shopping_cart.court_id = court.court_id WHERE `order_status`='PENDING'";
            $result = $connect-> query($sql);
            //$customer_id = 2;
            if ($result-> num_rows > 0)
            {
                $total_price = 0;
                while ($row = $result-> fetch_assoc())
                {
                    if ($row['customer_id'] == $_SESSION["username"]): ?>
                               <!-- change this ^ to set customer_id -->
                    <tr>
                        <td class="text-left"><?php echo $row['order_id']; ?></td>
                        <td class="text-left"><?php echo $row['order_status']; ?></td>
                        <td class="text-left"><?php echo $row['customer_id']; ?></td>
                        <td class="text-left"><?php echo $row['court_id']; ?></td>
                        <!-- <td class="text-left"><?php echo $row['booking_date']; ?></td>
                        <td class="text-left"><?php echo $row['time_slot']; ?></td> -->
                        <td class="text-left"><?php echo $row['court_name']; ?></td>
                        <td class="text-left"><?php echo $row['court_price_per_hour']; ?></td>
                        <td class="text-left">
                            <a href="shopping_cart.php?delete=<?php echo $row['order_id']; ?>" class="btn-delete red">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $total_price += $row['court_price_per_hour']; 
                    endif; 
                } 
            }
            else
            {
                echo "You have no latest booking.";
            }

            $connect-> close();
        ?>

    </table>

    <div class="container">
        <div id="Checkout" class="inline">
            <h1>Pay Invoice</h1>
            <div class="card-row">
                <span class="visa"></span>
                <span class="mastercard"></span>
                <span class="amex"></span>
                <span class="discover"></span>
            </div>
            <form action="shopping_cart.php" method="POST">
                <div class="form-group">
                    <label for="PaymentAmount">Payment amount</label>
                    <div class="amount-placeholder">
                        <span>RM</span>
                        <span><?php echo $total_price; ?></span>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="card_name">Card Holder Name</label>
                        <input type="text" name="card_name" id="card_name" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="card_number">Card Number:</label>
                        <input type="number" name="card_number" id="card_number" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="expiry_date">Expiry Date:</label>
                        <input type="date" name="expiry_date" id="expiry_date" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="number" name="cvv" id="cvv" required class="form-control">
                    </div>

                    <input type="hidden" name="totalprice" id="totalprice" value="<?php echo $total_price; ?>" required>
                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_SESSION["username"]; ?>">

                    <input type="submit" name="insert" value="Checkout Payment" id="PayButton" class="btn btn-block btn-success submit-button">
                </button>
            </form>
        </div>
    </div>

</body>
</html>

<?php include '../../INCLUDE/footer.php'; ?>