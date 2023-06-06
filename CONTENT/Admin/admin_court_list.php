<?php include 'admin_header.php'; ?>
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
	
	if (isset($_POST['update'])){
		$court_id = $_POST['court_id'];
		$price = $_POST['price'];
		$sql = "UPDATE `court` SET `court_price_per_hour`=$price WHERE `court_id`=$court_id";
        $result = $connect-> query($sql);
	}

    if (isset($_GET['delete']))
    {
        $court_id = $_GET['delete'];
        
        $sql = "DELETE FROM `court` WHERE `court_id`=$court_id";
        $result = $connect-> query($sql);
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../CSS/admin.css">
        <title>Admin Court List</title>
	</head>
	<body>
		<center>
		<h1 style = "font-size:250%; text-align:center;"> Fruits and Vegetables List </h1>
		<div class="cusList">
			<?php
				$DBConnect = mysqli_connect("localhost", "root", "", "ecommerce");
		
				if(!$DBConnect){
					die('Connect Error (' .mysqli_connect_errno() . ')'.mysqli_connect_error());
				}
				else{
					$selectSql = "SELECT * FROM court";
					if($result = mysqli_query($DBConnect, $selectSql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table>";
								echo "<tr>";
									echo "<th>Item ID</th>";
									echo "<th>Item Name</th>";
									// echo "<th>Item HPNO.</th>";
									echo "<th>Item Description</th>";
									// echo "<th>Price/hour</th>";
									// echo "<th>Start Time</th>";
									// echo "<th>End Time</th>";
									echo "<th>Action</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['court_id'] . "</td>";
									echo "<td>" . $row['court_name'] . "</td>";
									// echo "<td>" . $row['court_call_number'] . "</td>";
									echo "<td>" . $row['court_address'] . "</td>";
									// echo "<td>" . $row['court_price_per_hour'] . "</td>";
									// echo "<td>" . $row['court_start_working_time'] . "</td>";
									// echo "<td>" . $row['court_end_working_time'] . "</td>";?>
									<td>
										<div style="width:300px;">
											<form action = "admin_court_list.php" method="post" >
												<input style="width: 30%;"type="text" id="price" name = "price" placeholder="Price">
												<input type="hidden" name="court_id" id="court_id" value="<?php echo $row['court_id']; ?>">
												<input class = "button" type="submit" name="update" value="Update Price">
											</form>	
										</div>
										<button class = "button"><a href="admin_court_list.php?delete=<?php echo $row['court_id']; ?>">Delete Item</a></button>
									</td>
								<?php
								echo "</tr>";
							}
							echo "</table>";
							mysqli_free_result($result);
						} else{
							echo "No records matching your query were found.\n";
						}
					}	
				}
				
				mysqli_close($DBConnect);
			?>
		</div>	
		<button class = "button"><a href="addcourt.php">Add New Item</a></button>
		</center>
	</body>
</html>
<?php include '../../INCLUDE/footer.php'; ?>