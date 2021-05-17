<?php 	
require_once '../db_connect.php'; 


if($_POST) 
{	
	// Basic Information
	$d_firstName = mysqli_real_escape_string($connect, $_POST['fname']);
	$firstName = trim(preg_replace('/\s+/', ' ', $d_firstName));
	
    $d_lastName = mysqli_real_escape_string($connect, $_POST['lname']);
	$lastName = trim(preg_replace('/\s+/', ' ', $d_lastName));
	
	$phoneNumber = $_POST['phoneno'];

    $filename = explode('.', $_FILES['file']['name']);
	$filename = $filename[count($filename)-1];
	$location = 'Uploads/'.uniqid(rand()).'.'.$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			$url = $location;
		}
	}
    $status = 'Pending';

    // Business Info
    $dGroup = mysqli_real_escape_string($connect, $_POST['dealership']);
	$dTotal = mysqli_real_escape_string($connect, $_POST['dealershipTotal']);
	$dLoc = mysqli_real_escape_string($connect, $_POST['dealershipLocation']);
    $sAgents = mysqli_real_escape_string($connect, $_POST['salesPeople']);
    $cStock = mysqli_real_escape_string($connect, $_POST['carStock']);
	$dType = mysqli_real_escape_string($connect, $_POST['dType']);

	//Login Info
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	

	//Added By
	$added_by="SignUp";

	$sql_dealer = "INSERT INTO dealer 
	(dealer_FName, dealer_LName, dealer_Dealership, dealer_Location, 
	dealer_CellNumber, dealer_DealerNum, dealer_Email, dealer_Status, dealer_Type, dealer_NumCarStock, 
	dealer_NumAgent, dealer_Comments, dealer_AddedBy) 
    VALUES 
	('$firstName', '$lastName', '$dGroup', '$dLoc', 
	'$phoneNumber', '$dTotal', '$email', '$status', '$dType', '$cStock', '$sAgents', '$d_comment', '$added_by')";
	

	if(mysqli_query($connect, $sql_dealer))
	{
		
		header('location: ../Join.php?msg=Success');
    }
	else 
	{
		header('location: ../Join.php?msgError=Error');			
	}
}
?>

