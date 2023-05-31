<?php 
session_start();
if(isset($_SESSION["username"])) {
     echo '<script type="text/javascript">
     window.location.href = "../../CONTENT/Customer/home_user.php";
     </script>';
     die();
}
?>

<?php include '../../INCLUDE/header.php'; ?>

<html>
<head>
     <title>
          Book2Sport Court Booking System
     </title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../CSS/home_style.css"> 
</head>
<body>

     <!-- Home | Parallex background -->

     
     <div class="bgimg-1">    
          <h1>Book2Sport Court Booking System</h1>
               <div class="container">
                    <div class="center">     
                         <a href="../../CONTENT/Catalog/catalog.php" class="btn blue">Booking Now!</a>
                    </div>
               </div>
     </div>

     <!-- End of Home | Parallex background -->

</body>
</html>

<?php include '../../INCLUDE/footer.php'; ?>