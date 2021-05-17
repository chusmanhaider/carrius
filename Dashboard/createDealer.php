<?php 	
require_once '../db_connect.php'; 


if($_POST) 
{	
	// Basic Information
	$d_firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
	$firstName = trim(preg_replace('/\s+/', ' ', $d_firstName));
	
    $d_lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
	$lastName = trim(preg_replace('/\s+/', ' ', $d_lastName));
	
	$phoneNumber = $_POST['phoneNumber'];

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

    
    $status = mysqli_real_escape_string($connect, $_POST['carStatus']);

    // Business Info
    $dGroup = mysqli_real_escape_string($connect, $_POST['dealershipGroup']);
	$dLoc = mysqli_real_escape_string($connect, $_POST['dealershipLoc']);
    $dShips = mysqli_real_escape_string($connect, $_POST['dealerships']);
	$sAgents = mysqli_real_escape_string($connect, $_POST['salespeopleAgent']);
    $cStock = mysqli_real_escape_string($connect, $_POST['carStock']);
	$dType = mysqli_real_escape_string($connect, $_POST['dealershipType']);

	//Login Info
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$username = mysqli_real_escape_string($connect, $_POST['username']);
    $pass = mysqli_real_escape_string($connect, $_POST['password']);
	$pass = sha1(md5($pass));

	//Schedule
	$today=mysqli_real_escape_string($connect, $_POST['toDay']);
	$fromDay=mysqli_real_escape_string($connect, $_POST['fromDay']);
	$today_time=mysqli_real_escape_string($connect, $_POST['toTime']);
	$fromDay_time=mysqli_real_escape_string($connect, $_POST['fromTime']);
    //Comments
    $d_comment = mysqli_real_escape_string($connect, $_POST['comment']);
	$comment = trim(preg_replace('/\s+/', ' ', $d_comment));
	
	//Added By
	$added_by="Admin";

	$sql_dealer = "INSERT INTO dealer 
	(dealer_FName, dealer_LName, dealer_Username, dealer_Password, dealer_Dealership, dealer_Location, 
	dealer_CellNumber, dealer_DealerNum, dealer_Email, dealer_Status, dealer_Type, dealer_NumCarStock, 
	dealer_NumAgent, dealer_WorkFromDay, dealer_WorkToDay, dealer_WorkFromTime, dealer_WorkToTime, dealer_Comments, dealer_Image, dealer_AddedBy) 
    VALUES 
	('$firstName', '$lastName', '$username', '$pass','$dGroup', '$dLoc', 
	'$phoneNumber', '$dShips', '$email', '$status', '$dType', '$cStock', '$sAgents', '$fromDay', '$today',
	'$fromDay_time', '$today_time','$d_comment', '$url', '$added_by')";
	

	if(mysqli_query($connect, $sql_dealer))
	{
		
		header('location: Manage Dealers.php?msg=Success');
    }
	else 
	{
		header('location: Manage Dealers.php?msgError=Error');			
	}
}
?>

