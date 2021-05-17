<?php 	
require_once '../db_connect.php';
//$query="Update cars SET stock_Qty='-2' WHERE ProductId='".$_POST["id"]."'";
$query="Update cars SET car_Status='Terminated' WHERE car_ID='".$_POST["rid"]."'";
if(mysqli_query($connect,$query))
{
	return true;
}
echo json_encode($valid);
?>

