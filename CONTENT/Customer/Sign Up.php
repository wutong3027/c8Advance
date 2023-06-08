<?php

if (isset($_POST['submit']))	
{	
	$connection = mysqli_connect("sql311.infinityfree.com", "if0_34380026", "NEeR0dBMGcW", "if0_34380026_ecommerce");
	
	$fname=$lname=$email=$phone=$password=$gender=$state='';
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['psw'];
	$gender = $_POST['gender'];
	$state = $_POST['state'];

$query = "INSERT INTO customer_detail(fname,lname,email,mobile,password,Gender,state)VALUES('$fname','$lname','$email','$phone','$password','$gender','$state')";

$result = mysqli_query($connection, $query);

if($result)
{	
	echo("Data added successfully");
	
}
else
{
	echo ("Query error: " . mysqli_error($connection));
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Customer Log In And Sign Up </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="customer.css">

<script src="customer.js"></script>

</head>

<body>

<form name="signup" onsubmit = "return validate_signup()" action = "Sign Up.php" method="post" >
<div class = "container">

	<h1 style = "font-size:250%; text-align:center;"> Welcome To C8 Sport Centre Booking System </h1>

	<p style = "font-size:250%; text-align:center;"> Sign Up For Membership </p>

	<label for="FirstName">First Name</label>
	
	<input type="text" id="fname" name = "fname" placeholder="First Name" >
	
	<label for="lname">Last Name</label>
	
	<input type="text" id="lname" name = "lname" placeholder="Last Name">
	
	<label for="email">E-mail</label>
	
	<input type="text" id="email" name = "email" placeholder="xxx@gmail.com">
	
	<label for="phone">Mobile</label>

	<input type="text" id="phone" name = "phone" placeholder="+60-xxx-xxx-xxxx">
	
	<label for="password">Password</label>

	<input type="password" id="psw" name = "psw" placeholder="Enter 6-digits Password">
	
	<input type="checkbox" onclick="reveal()">Show Password </br></br>
	
	<label for="Cpassword">Confirm Password</label>

	<input type="password" id="psw_2" name = "psw_2" placeholder="Please re-enter your password">
	
	<input type="checkbox" onclick="reveal_psw2()">Show Password </br></br>
	
	<label for="gender">Gender</label>
	
	<select id="gender" name = "gender">
	<option value="" disabled selected>Choose Your Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
	</select>
	
	<br/>
	<br/>
	
	<label for="state">State</label>
	<select id="state" name = "state">
	<option value="" disabled selected>Choose Your State</option>
	<option value="Johor">Johor</option>
	<option value="Kedah">Kedah</option>
	<option value="Kelantan">Kelantan</option>
	<option value="Malacca">Malacca</option>
	<option value="Negeri Sembilan">Negeri Sembilan</option>
	<option value="Pahang">Pahang</option>
	<option value="Penang">Penang</option>
	<option value="Perlis">Perlis</option>
	<option value="Sabah">Sabah</option>
	<option value="Sarawak">Sarawak</option>
	<option value="Selangor">Selangor</option>
	<option value="Terengganu">Terengganu</option>	
	</select>
	<br/>
	
	<h3>TERMS AND CONDITIONS </h3>
	<input type="checkbox" name="TC" value="Terms and Condition">
	<label for="Terms and Condition"> I accept the above Terms and Conditions</label><br><br>
	
	<button class = "button "type="reset">Clear</button>
	<button class = "button "type="submit" name = "submit" id = "submit">Sign Up</button>

</div>

<div style="background-color: #f1f1f1;">
<p> Already Have An Account?</p> 
<a href="Login.php"> Login Here! </a>
</div>
</form>
</body>
</html>