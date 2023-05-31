<?php

session_start();

$Text1 = $_POST['User_name'];

$Text2 = $_POST['Password'];



$checkText1="admin01";

$checkText2="ABC123abc123";



if ( empty($Text1)||empty($Text2) )

{

    echo '<script type="text/javascript">alert("They are something not fill in");history.go(-1)</script>';

    exit; 

}

else if($Text1!=$checkText1)

{

	echo '<script type="text/javascript">alert("User_name wrong");history.go(-1)</script>';

}

else if($Text2!=$checkText2)

{

	echo '<script type="text/javascript">alert("Password wrong");history.go(-1)</script>';

}	

else

{

	header("location: admin_dashboard.php"); 

	echo "<br>";





}



?>

