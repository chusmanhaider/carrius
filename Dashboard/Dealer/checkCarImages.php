<?php
require_once '../../db_connect.php';
if(isset($_POST["car_id"])){
	$mysql="Select * from car_gallery where CarId='".$_POST['car_id']."'";
	$verifyCat=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyCat);
}
?>