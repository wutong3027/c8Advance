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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Us</title>
  <link rel="stylesheet" href="../../CSS/about_us_style.css">
</head>
<body>
	
	<div class="main">
	<h1>WELCOME TO Book2Sport</h1>
	<h1>An Easy,Simple,and High Quality Booking Court Platform</h1>
	<ul class="cards">
		<li class="cards_item">
		<div class="card">
			<div class="card_image"><img src="https://lh3.googleusercontent.com/F2N1ts2qVuKEXPBxNIGNt2wFVqlEbbK0PDNuomXI5oU4nrgsF60vWh5Vm4GsoseDEKJ_9Q_E-6thaBl3LQZqAf7IuUWu2-fg28jN0vn4DJ62ukTLCCNmXw3sZ8juGi-SfQzmZTlWvQ=w2400"></div>
			<div class="card_content">
			<h2 class="card_title">Contact Me</h2>
			<p class="card_text">011-123456</p>
			</div>
		</div>
		</li>
		<li class="cards_item">
		<div class="card">
			<div class="card_image"><img src="https://lh3.googleusercontent.com/lTD5HFh489ylBZJY5InXuLJm2gWiKnewDX_ZLvVGf5ua7ABwDjwvM_42lYwNHivkRYtsFi72TK_HTcycKe-wxErefUxe9-KAXspzCN0sVE4XMsG_vggs4v1JPVN3eAtWEXeCvHCstw=w2400"></div>
			<div class="card_content">
			<h2 class="card_title">Email</h2>
			<p class="card_text">court@gmail.com</p>
			</div>
		</div>
		</li>
		<li class="cards_item">
		<div class="card">
			<div class="card_image"><img src="https://lh3.googleusercontent.com/Brjl3IV_75WnXEceuxkrlMRSPPPxuRIPLCCMTh3AQbr1odUOfpvPovEOzWeNH_dEANJuFu1bVJD8GyVc1LWK-wzn1ef3G3DQGJGIW14ewhbW22nRwixsCMYFcn25R-ofiyXAGVM0vQ=w2400"></div>
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