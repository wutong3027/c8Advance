<?php include 'admin_header.php'; ?>
<?php
 
	$connect = mysqli_connect("localhost", "root", "", "ecommerce");
	$query = "SELECT paid_date, totalprice FROM payment_record";
	$result = mysqli_query($connect, $query);
	$sunday =0; $monday =0; $tuesday =0; $wednesday =0; $thursday =0; $friday =0; $saturday =0;
	while($row = mysqli_fetch_array($result))
	{
		$date = $row["paid_date"];
		$unixTimestamp = strtotime($date);
		$dayOfWeek = date("l", $unixTimestamp);
	/* 	echo substr($date, 0, 4); */
		//echo date("y", $unixTimestamp);
		if($dayOfWeek=="Sunday"){
			$sunday += $row["totalprice"];
		}
		else if($dayOfWeek=="Monday"){
			$monday += $row["totalprice"];
		}
		else if($dayOfWeek=="Tuesday"){
			$tuesday += $row["totalprice"];
		}
		else if($dayOfWeek=="Wednesday"){
			$wednesday += $row["totalprice"];
		}
		else if($dayOfWeek=="Thursday"){
			$thursday += $row["totalprice"];
		}
		else if($dayOfWeek=="Friday"){
			$friday += $row["totalprice"];
		}
		else if($dayOfWeek=="Saturday"){
			$saturday += $row["totalprice"];
		}
		else{
			echo "Invalide date";
		}
	}
	$daydatas = array(
		array("y" => $sunday, "label" => "Sunday"),
		array("y" => $monday, "label" => "Monday"),
		array("y" => $tuesday, "label" => "Tuesday"),
		array("y" => $wednesday, "label" => "Wednesday"),
		array("y" => $thursday, "label" => "Thursday"),
		array("y" => $friday, "label" => "Friday"),
		array("y" => $saturday, "label" => "Saturday")
	);

	$jan = 0; $feb = 0; $mac = 0; $april = 0; $may = 0; $jun = 0;
	$july = 0; $aug = 0; $sep = 0; $oct = 0; $nov = 0; $dec = 0;
	$mresult = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($mresult))
	{
		$mdate = $row["paid_date"];
		$munixTimestamp = strtotime($mdate);
		$month = date("m", $munixTimestamp);
		if($month=="01"){
			$jan += $row["totalprice"];
		}
		else if($month=="02"){
			$feb += $row["totalprice"];
		}
		else if($month=="03"){
			$mac += $row["totalprice"];
		}
		else if($month=="04"){
			$april += $row["total_price"];
		}
		else if($month=="05"){
			$may += $row["totalprice"];
		}
		else if($month=="06"){
			$jun += $row["totalprice"];
		}
		else if($month=="07"){
			$july += $row["totalprice"];
		}
		else if($month=="08"){
			$aug += $row["totalprice"];
		}
		else if($month=="09"){
			$sep += $row["totalprice"];
		}
		else if($month=="10"){
			$oct += $row["totalprice"];
		}
		else if($month=="11"){
			$nov += $row["totalprice"];
		}
		else if($month=="12"){
			$dec += $row["totalprice"];
		}
		else{
			echo "Invalide date";
		}
	}
	
	$monthdatas = array(
		array("y" => $jan, "label" => "January"),
		array("y" => $feb, "label" => "February"),
		array("y" => $mac, "label" => "March"),
		array("y" => $april, "label" => "April"),
		array("y" => $may, "label" => "May"),
		array("y" => $jun, "label" => "June"),
		array("y" => $july, "label" => "July"),
		array("y" => $aug, "label" => "August"),
		array("y" => $sep, "label" => "September"),
		array("y" => $oct, "label" => "October"),
		array("y" => $nov, "label" => "November"),
		array("y" => $dec, "label" => "December")
	);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin 📈Dashboard</title>
<script>
window.onload = function () {
 
var daychart = new CanvasJS.Chart("weekchart", {
	title: {
		text: "Weekly Sales"
	},
	axisY: {
		title: "Total Sales"
	},
	data: [{
		type: "spline",
		dataPoints: <?php echo json_encode($daydatas, JSON_NUMERIC_CHECK); ?>
	}]
});
daychart.render();

var monthchart = new CanvasJS.Chart("monthchart", {
	title: {
		text: "Monthly Sales"
	},
	axisY: {
		title: "Total Sales"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($monthdatas, JSON_NUMERIC_CHECK); ?>
	}]
});
monthchart.render();
 
}
</script>
</head>
<body>
<h1 style="	margin-left:450px;">Dashboard </h1>
<center>
<button class = "button" onclick="myFunction()">Weekly</button>
<button class = "button" onclick="myFunction2()">Monthly</button>
<div id="weekchart" style="width: 900px; height: 400px; display:block;"></div>
<div id="monthchart" style="width: 900px; height: 400px; display:none;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</center>

</body>
</html>

<script>
function myFunction() {
  var x = document.getElementById("weekchart");
  var y = document.getElementById("monthchart");
  if (x.style.display == "none") {
    x.style.display = "block";
	y.style.display = "none";
  } 
}

function myFunction2() {
  var x = document.getElementById("weekchart");
  var y = document.getElementById("monthchart");
  if (y.style.display == "none") {
    x.style.display = "none";
	y.style.display = "block";
  } 
}
</script>
<?php include '../../INCLUDE/footer.php'; ?>
