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

$id = $_SESSION['username'];

if (isset($_POST['submit']))
{
	$connection = mysqli_connect("localhost", "root", "", "ecommerce");
	
	$fname = $lname = $phone = $psw = $address ="";
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$psw = $_POST['psw'];
	$address = $_POST['address'];

	$query = "UPDATE customer_detail SET fname='$fname', lname='$lname', mobile='$phone', password='$psw', address='$address' WHERE email = '$id'";
	$result = mysqli_query($connection, $query);
	
	
	if ($result === true) {
		
		echo "Update Successfully";
		
		header("location: home.php");
		
	} else {
	    echo"Something Went Wrong! Please Try Again";
		
		header("location: modify.php");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>
G8 Court Booking System
</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="customer.css">
<script src="customer.js"></script>
</head>

<body>

<br/>

<form name="modify" onsubmit = "return validate_modify()" action = "modify.php" method="post">
<div class = "container">

<h1 style = "font-size:250%; text-align:center;"> Edit Personal Detail </h1>

	<label for="FirstName">First Name</label>
	
	<input type="text" id="fname" name="fname" placeholder="First Name" >
	
	<label for="lname">Last Name</label>
	
	<input type="text" id="lname" name="lname" placeholder="Last Name">
	
	<label for="phone">Mobile</label>

	<input type="text" id="phone" name="phone" placeholder="+60-xxx-xxx-xxxx">
	
	<label for="password">Password</label>

	<input type="password" id = "psw" name= "psw" placeholder="Enter 6-digits Password">
	
	<input type="checkbox" onclick="reveal()">Show Password </br></br>
	
	<label for="Cpassword">Confirm Password</label>

	<input type="password" id = "psw_2" name = "psw_2" placeholder="Please re-enter your password">
	
	<input type="checkbox" onclick="reveal_psw2()">Show Password </br></br>
	
	<label for="address">Address</label>
	
	<input type="text" id="address" name="address" placeholder="Address">
	
	<button class = "button "type="reset">Clear</button>
	
	<button class = "button "type="submit" id = "submit" name = "submit">Save</button>

</div>

</form>

</body>
</html>

<?php include '../../INCLUDE/footer.php'; ?>