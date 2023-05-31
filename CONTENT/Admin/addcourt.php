<?php include 'admin_header.php'; ?>
<?php

if (isset($_POST['add']))	
{	
	$connection = mysqli_connect("localhost", "root", "", "ecommerce");
	
	$court_id = $_POST['court_id'];
	$court_name = $_POST['court_name'];
	$court_call_number = $_POST['court_call_number'];
	$court_address = $_POST['court_address'];
	$court_price_per_hour = $_POST['court_price_per_hour'];
	$court_start_working_time = $_POST['starting_time'];
	$court_end_working_time = $_POST['end_time'];

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
<title> Admin Add Court </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../../CSS/admin.css">

</head>

<body>

<form name="addcourt" action = "addcourt.php" method="post" >
<div class = "container">

	<h1 style = "font-size:250%; text-align:center;"> Add New Court </h1>

	<label for="court_id">Court ID</label>
	
	<input type="text" id="court_id" name = "court_id" placeholder="Please Enter Court ID" >
	<br>
	<label for="court_name">Court Name</label>

	<input type="text" id="court_name" name = "court_name" placeholder="Please Enter Court Name">
	<br>
	<label for="court_call_number">	Court Call Number</label>
	
	<input type="text" id="court_call_number" name = "court_call_number" placeholder="Please Enter Court Call Number">
	<br>
	<label for="court_address">Court Address</label>
	
	<input type="text" id="court_address" name = "court_address" placeholder="Please Enter Court Address">
	<br>
	<label for="court_price_per_hour">Price Per Hour</label>
	
	<input type="text" id="court_price_per_hour" name = "court_price_per_hour" placeholder="Please Enter Price Per Hour">
	<br>
	<label for="starting_time">Starting Working Time</label>

	<input type="time" id="starting_time" name = "starting_time" >
	
	<br/><br/>
	
	<label for="end_time">End Working Time</label>

	<input type="time" id="end_time" name = "end_time" >
	
	<br/><br/>

	<button class = "button "type="reset">Clear</button>
	
	<button class = "button "type="submit" name = "add" id = "add">Add</button>

</div>
</form>

</body>
<?php include '../../INCLUDE/footer.php'; ?>
</html>