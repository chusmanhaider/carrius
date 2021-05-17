<?php
if(isset($_POST["cid"])){
	require_once '../db_connect.php';
	$mysql="Select * from buyer where buyer_ID='".$_POST['cid']."';
	$verifyCat=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyCat);
}
?>