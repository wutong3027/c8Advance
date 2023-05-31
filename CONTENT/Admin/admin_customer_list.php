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

    if (isset($_GET['delete']))
    {
        $customer_id = $_GET['delete'];
        
        $sql = "DELETE FROM `court` WHERE `customer_id`=$customer_id";
        $result = $connect-> query($sql);
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../CSS/admin.css">
        <title>Admin Customer List</title>
	</head>
	<body>
		<center>
		<h1 style = "font-size:250%; text-align:center;"> Customer List</h1>
		<div class="cusList">
			<?php
				$DBConnect = mysqli_connect("sql207.epizy.com","epiz_27687366","6r7DoRh7v4","epiz_27687366_Web_Project");
		
				if(!$DBConnect){
					die('Connect Error (' .mysqli_connect_errno() . ')'.mysqli_connect_error());
				}
				else{
					$selectSql = "SELECT * FROM customer_detail";
					if($result = mysqli_query($DBConnect, $selectSql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table>";
								echo "<tr>";
									echo "<th>Customer_id</th>";
									echo "<th>First_name</th>";
									echo "<th>Last_name</th>";
									echo "<th>Email</th>";
									echo "<th>Hp. No.</th>";
									echo "<th>Gender</th>";
									echo "<th>State</th>";
									echo "<th>Action</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['customer_id'] . "</td>";
									echo "<td>" . $row['fname'] . "</td>";
									echo "<td>" . $row['lname'] . "</td>";
									echo "<td>" . $row['email'] . "</td>";
									echo "<td>" . $row['mobile'] . "</td>";
									echo "<td>" . $row['Gender'] . "</td>";
									echo "<td>" . $row['state'] . "</td>";?>
									<td>
										<button class = "button"><a href="court_list.php?delete=<?php echo $row['customer_id']; ?>">Delete</a></button>
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
		</center>
	</body>
</html>
<?php include '../../INCLUDE/footer.php'; ?>