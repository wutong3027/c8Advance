<?php 

session_start();

if(!isset($_SESSION["username"])) 

{

     echo '<script type="text/javascript">

     alert("Sorry, you must login as customer first.");

     window.location.href = "../../CONTENT/Futsalista/futsalista.php";

     </script>';

     

     die();

}

?>



<?php include '../../INCLUDE/header_user.php'; ?>



<?php



//CONNECT TO DATABASE AND TABLE

    if(isset($_GET['court_id']))

    {

        $hostname = "localhost";

        $username = "root";

        $password = "";

        $database_name = "ecommerce";



        $connect = mysqli_connect($hostname, $username, $password, $database_name);

        

        $court_id = mysqli_real_escape_string($connect, $_GET['court_id']);



        $sql = "SELECT * FROM `court` WHERE `court_id` = $court_id";



        $result = mysqli_query($connect, $sql);



        $court = mysqli_fetch_assoc($result);



        mysqli_free_result($result);

        mysqli_close($connect);

    }



    if(isset($_POST['insert']))

    {

        $hostname = "localhost";

        $username = "root";

        $password = "";

        $database_name = "ecommerce";

        $connect = mysqli_connect($hostname, $username, $password, $database_name);



        $order_id = mt_rand(10000000, 99999999);

        $order_status = "PENDING";

        $customer_id = $_SESSION["username"];

        $court_id = $_GET['court_id'];

        $booking_date = $_POST['booking_date'];

        $time_slot = $_POST['time_slot'];



        $query= "INSERT INTO `shopping_cart`(`order_id`, `order_status`, `customer_id`, `court_id`, `booking_date`, `time_slot`) VALUES ('$order_id','$order_status','$customer_id','$court_id','$booking_date','$time_slot')";

        

        $result = mysqli_query($connect, $query);



        if($result)

        {

            $message = 'Your booking have been record and in pending. Please check your shopping cart.';

            echo "<SCRIPT>

                        alert('$message')

                        window.location.replace('../../CONTENT/Catalog/catalog.php');

                    </SCRIPT>";

        }

        else

        {

            echo 'Error: Data Not Inserted';

        }



        //mysqli_free_result($result);

        mysqli_close($connect);

    }



?>



<html>

    <head>

        <title>Book Court</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../CSS/court_style.css">

    </head>

    <body>



    <?php if($court): ?>



        <div class="booking-widget">

            <div class='booking-widget__header'>

                <figure>

                    <img src="../../IMAGES/Court/<?php echo $court['court_image']; ?>.jpg">

                        <figcaption class='header-caption'>

                        </figcaption>         

                </figure>

            </div>

                <ul class='booking-widget__form'>

                    <li>

                        <label>Court name:</label>

                        <div class="form-field">

                            <label><?php echo $court['court_name']; ?></label>

                        </div>

                    </li>

                    <li>

                        <label>Court call number:</label>

                        <div class="form-field">

                            <label><?php echo $court['court_call_number']; ?></label>

                        </div>

                    </li>

                    <li>

                        <label>Court address:</label>

                        <div class="form-field">

                            <label><?php echo $court['court_address']; ?></label>

                        </div>

                    </li>

                    <li>

                        <label>Court id:</label>

                        <div class="form-field">

                            <label><?php echo $court['court_id']; ?></label>

                        </div>

                    </li>

                </ul>

                    <form action="court.php?court_id=<?php echo $court['court_id']; ?>" method="post">

                        <ul class='booking-widget__form'>

                            <li>

                                <label for='check-in'>Select Booking Date:</label>

                                <input type="date" id="booking_date" name="booking_date" required>

                            </li>

                            <li>

                                <label>Select Time Slot:</label> 

                                    <select id="time_slot" name="time_slot" required>

                                            <option value="12pm-1pm">12pm-1pm</option>

                                            <option value="1pm-2pm">1pm-2pm</option>

                                            <option value="2pm-3pm">2pm-3pm</option>

                                            <option value="3pm-4pm">3pm-4pm</option>

                                            <option value="4pm-5pm">4pm-5pm</option>

                                            <option value="5pm-6pm">5pm-6pm</option>

                                            <option value="6pm-7pm">6pm-7pm</option>

                                            <option value="7pm-8pm">7pm-8pm</option>

                                            <option value="8pm-9pm">8pm-9pm</option>

                                            <option value="9pm-10pm">9pm-10pm</option>

                                    </select>

                            </li>

                            <li>

                                <input type="hidden" id="court_id" name="court_id" placeholder="<?php echo $court['court_id']; ?>"></input>

                                <input type="submit" name="insert" class='form__submit' value="Booking Court">

                            </li>

                        </ul>       

                    </form>

        </div>

    <?php endif; ?>



    </body>

</html>



<?php include '../../INCLUDE/footer.php'; ?>