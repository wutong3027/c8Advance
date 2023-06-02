<?php 
session_start();
if(isset($_SESSION["username"])) {
     echo '<script type="text/javascript">
     window.location.href = "../../CONTENT/Customer/home_user.php";
     </script>';
     die();
}
?>

<?php
if (isset($_POST['submit']))	
{	
	$connection = new mysqli("localhost", "root", "", "ecommerce");
	
	$email = $password ="";
	
	$email = $_POST['email'];
	$password = $_POST['psw'];
	
	$sql = $connection->prepare("SELECT * FROM customer_detail WHERE email= ? and password= ?;");

	$sql->bind_param("ss", $email, $password);

	$sql->execute();

	$result = $sql->get_result();
	
	$row = mysqli_num_rows($result);
	
	$fetchid = mysqli_fetch_assoc($result);
	
	$customerid = $fetchid['customer_id']; 
	
	if($row == 1)
	{
		$_SESSION['email'] = $email; 	
		$_SESSION['username'] = $customerid;
		
		header("location: ../../CONTENT/Customer/home_user.php"); 
	}else
	{
		$error = "Incorrect email or password.";
		
		header("location: Login.php");
	}

}
?>

<?php include '../../INCLUDE/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title> Customer Log In And Sign Up </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="customer.css">

<script src="customer.js"></script>

</head>

<body>


<form name="Login" onsubmit = "return validate_login()" method="post" action= "Login.php">

<h1 style = "font-size:250%; text-align:center;"> Welcome To C8 Sport Centre Booking System </h1>

<p style = "font-size:250%; text-align:center;"> Member Login </p>

<div class = "container">
	<label for="email"><b>E-Mail</b></label>
    <input type="text" placeholder="Enter Your E-Mail" id="email" name = "email" required>
	
	<label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Your Password" id="psw" name = "psw" required>
	
	<input type="checkbox" onclick="reveal()">Show Password
	
	<br/>
	
	<button class = "button "type="reset">Clear</button>
	<button class = "button "type="submit" id="submit" name = "submit">Login</button>

</div>


<div style="background-color: #f1f1f1;">
<p> Don't Have Any Account?</p> 
<a href="Sign Up.php"> Register Here! </a>
</div>

</form>
</body>
</html>

<?php include '../../INCLUDE/footer.php'; ?>