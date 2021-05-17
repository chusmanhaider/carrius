<?php
require_once '../db_connect.php';
if(isset($_POST["category_name"]))
{
	$mysql="Select * from cars_brand where carBrand_Name='".$_POST['category_name']."'";
	$verifyCategory=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyCategory);
}


if(isset($_POST["up_category_name"])){
	$mysql="Select * from cars_brand where carBrand_Name='".$_POST['up_category_name']."'";
	$verifyUpCategory=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyUpCategory);
}

if(isset($_POST["id"])){
	$mysql="Select * from cars where CarBrandId='".$_POST['id']."'";
	$verifyCat=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyCat);
}

?>
