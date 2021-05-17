<?php 	
require_once '../../db_connect.php';
$query="Update cars SET car_Status='Terminated' WHERE car_ID='".$_POST["cid"]."'";
if(mysqli_query($connect,$query))
{
	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
}
echo json_encode($valid);
?>