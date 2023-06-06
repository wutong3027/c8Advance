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
<html lang="en">
<head>
  <title>About Us</title>
  <link rel="stylesheet" href="../../CSS/about_us_style.css">
</head>
<body>
	
	<div class="main">
	<h1>WELCOME TO E-BANSAN</h1>
	<h1>An Easy,Simple,and High Quality Grocery Platform</h1>
	<ul class="cards">
		<li class="cards_item">
		<div class="card">
			<div class="card_image"><img src="https://st2.depositphotos.com/1002240/7794/i/950/depositphotos_77943434-stock-photo-fruit-stall.jpg"></div>
			<div class="card_content">
			<h2 class="card_title">Contact Me</h2>
			<p class="card_text">011-123456</p>
			</div>
		</div>
		</li>
		<li class="cards_item">
		<div class="card">
			<div class="card_image"><img src="https://st2.depositphotos.com/7401550/11258/i/950/depositphotos_112588412-stock-photo-different-summer-fruits.jpg" style = "height:368px; width:450px" ></div>
			<div class="card_content">
			<h2 class="card_title">Email</h2>
			<p class="card_text">bansan@gmail.com</p>
			</div>
		</div>
		</li>
		<li class="cards_item">
		<div class="card">
			<div class="card_image"><img src="https://images.unsplash.com/photo-1609780447631-05b93e5a88ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" style = "height:368px; width:450px"></div>
			<div class="card_content">
			<h2 class="card_title">Find Me</h2>
			<p class="card_text">Jalan Datuk Mohamad Musa, Kota Samarahan</p>
			</div>
		</div>
		</li>
	</ul>
	</div>

</body>
</html>

<?php include '../../INCLUDE/footer.php'; ?>