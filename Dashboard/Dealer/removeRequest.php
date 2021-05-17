<?php 	
require_once '../db_connect.php';
//$query="Update cars SET stock_Qty='-2' WHERE ProductId='".$_POST["id"]."'";
$id=$_POST["id"];
//$q="DELETE FROM car_gallery WHERE carGallery_ID='$id'";
$status="Deleted";
$q="UPDATE contactus SET contact_Status='$status' WHERE contact_ID='$id'";
if($connect->query($q) === TRUE) {
	$valid['success'] = true;
   //header('Location:Category.php');
   $valid['messages'] = "Successfully Removed";
} else {
	$valid['success'] = false;
	$valid['messages'] = "Error while remove the image";
}

$connect->close();

echo json_encode($valid);
?>