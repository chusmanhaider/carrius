<?php 	
require_once '../db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());
$brand_id = $_POST['id'];
if($brand_id) { 

 $sql = "DELETE from cars_brand WHERE carBrand_ID='$brand_id'";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	//header('Location:Category.php');
	$valid['messages'] = "Successfully Removed";
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while removing the car brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST