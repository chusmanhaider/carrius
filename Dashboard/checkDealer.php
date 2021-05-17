<?php
require_once 'db_connect.php';
if(isset($_POST["upemail"])){
	$mysql="Select * from dealer where dealer_Email='".$_POST['email']."'";
	$verifyEmail=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyEmail);
}
if(isset($_POST["email"])){
	$mysql="Select * from dealer where dealer_Email='".$_POST['email']."'";
	$verifyEmail=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyEmail);
}
if(isset($_POST["username"])){
	$mysql="Select * from dealer where dealer_Username='".$_POST['username']."'";
	$verifyEmail=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyEmail);
}
if(isset($_POST["id"])){
	$mysql="Select * from dealer INNER JOIN cars ON dealer.dealer_ID=cars.DealerId
	 where dealer.dealer_ID='".$_POST['id']."' AND (dealer_NumCarStock > 0)";
	$verifyCat=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyCat);
}
?>