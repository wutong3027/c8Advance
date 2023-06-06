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

    <link rel="stylesheet" href="../../CSS/catalog_style.css">

</head>

<body>

    <div class="catalog_flex">

        <h3>Recommended Fruits & Vegetables</h3>

    </div>

    <div class="catalog_flex">

    <?php

        $hostname = "localhost";

        $username = "root";

        $password = "";

        $database_name = "ecommerce";



        $connect = mysqli_connect($hostname, $username, $password, $database_name);



        if ($connect->connect_error)

        {

            die("Connection failed:". $connect->connect_error);

        }



        //display all record from the TABLE shopping_cart

        $sql = "SELECT * FROM `court`";

        $result = $connect-> query($sql);



        if ($result-> num_rows > 0)

        {

            

            while ($row = $result-> fetch_assoc()): ?>

            

            <figure class="catalog_items">

                <img src="../../IMAGES/Court/<?php echo $row['court_image']; ?>.jpg" style = "height:320px; width:340px"/>

                <div class="price">RM <?php echo $row['court_price_per_hour']; ?>/kg</div>

                <figcaption>

                    <h4><?php echo $row['court_name']; ?></h4>

                    <p>Product ID: <?php echo $row['court_id']; ?></p>

                    <!-- <p>Call Number: <?php echo $row['court_call_number']; ?></p> -->

                    <p>Description: <?php echo $row['court_address']; ?></p>

                    <a href="../../CONTENT/Court/court.php?court_id=<?php echo $row['court_id']; ?>">Buy</a>

                </figcaption>

            </figure>

            <?php endwhile; ?>

        <?php

        }

        else

        {

            echo "0 result";

        }



        $connect-> close();



    ?>



    </div>

</body>

</html>



<?php include '../../INCLUDE/footer.php'; ?>