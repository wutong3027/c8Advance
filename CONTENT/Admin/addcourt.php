<?php include 'admin_header.php'; ?>
<?php

if (isset($_POST['add']))	
{	
	$connection = mysqli_connect("localhost", "root", "", "ecommerce");
	
	$court_id = $_POST['court_id'];
	$court_name = $_POST['court_name'];
	$court_call_number = "";
	$court_address = $_POST['court_address'];
	$court_price_per_hour = $_POST['court_price_per_hour'];
	$court_start_working_time = "";
	$court_end_working_time = "";

$query = "INSERT INTO court(court_id,court_name,court_call_number,court_address,court_price_per_hour,court_start_working_time,court_end_working_time)VALUES('$court_id','$court_name','$court_call_number','$court_address','$court_price_per_hour','$court_start_working_time','$court_end_working_time')";

$result = mysqli_query($connection, $query);

if($result)
{	
	echo("Data added successfully");
	header("location: admin_court_list.php"); 
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
<title> Admin Add Item </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../../CSS/admin.css">

</head>

<body>

<form name="addcourt" action = "addcourt.php" method="post" >
<div class = "container">

	<h1 style = "font-size:250%; text-align:center;"> Add New Item </h1>

	<label for="court_id">Item ID</label>
	
	<input type="text" id="court_id" name = "court_id" placeholder="Please Enter Item ID" >
	<br>
	<label for="court_name">Item Name</label>

	<input type="text" id="court_name" name = "court_name" placeholder="Please Enter Item Name">
	<!-- <br> -->
	<!-- <label for="court_call_number">	Court Call Number</label>
	
	<input type="text" id="court_call_number" name = "court_call_number" placeholder="Please Enter Court Call Number"> -->
	<br>
	<label for="court_address">Item Description</label>
	
	<input type="text" id="court_address" name = "court_address" placeholder="Please Enter Item Description">
	<br>
	<label for="court_price_per_hour">Price Per KG</label>
	
	<input type="text" id="court_price_per_hour" name = "court_price_per_hour" placeholder="Please Enter Price Per KG">
	<br>
	<!-- <label for="starting_time">Starting Working Time</label>

	<input type="time" id="starting_time" name = "starting_time" > -->
	
	<br/><br/>
	
	<!-- <label for="end_time">End Working Time</label>

	<input type="time" id="end_time" name = "end_time" > -->
	
	<br/><br/>

	<button class = "button "type="reset">Clear</button>
	
	<button class = "button "type="submit" name = "add" id = "add">Add</button>

</div>
</form>

</body>
<?php include '../../INCLUDE/footer.php'; ?>
</html>