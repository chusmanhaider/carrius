<?php 	

require_once '../db_connect.php';


$dealer_id = $_POST['id'];

if($dealer_id) { 

 $sql = "Update dealer SET dealer_Status='Terminated' WHERE dealer_ID='$dealer_id'";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the salesman";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST