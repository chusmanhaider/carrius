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

    
    $status = mysqli_real_escape_string($connect, $_POST['buyerStatus']);

    //Residence Info
    $address = mysqli_real_escape_string($connect, $_POST['address']);
	$city = mysqli_real_escape_string($connect, $_POST['city']);
    $country = mysqli_real_escape_string($connect, $_POST['country']);

	//Login Info
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$username = mysqli_real_escape_string($connect, $_POST['username']);
    $pass = mysqli_real_escape_string($connect, $_POST['password']);
	$pass = sha1(md5($pass));

    //Comments
    $d_comment = mysqli_real_escape_string($connect, $_POST['comment']);
	$comment = trim(preg_replace('/\s+/', ' ', $d_comment));
	
	//Added By
	$added_by="Admin";

	$sql_dealer = "INSERT INTO buyer 
	(buyer_FName, buyer_LName, buyer_Address, buyer_City, buyer_Country, buyer_Email, buyer_CellNumber, buyer_Username, 
	buyer_Password, buyer_Status, buyer_AddedBy, buyer_Image, buyer_Comments)
    VALUES 
	('$firstName', '$lastName', '$address', '$city', '$country', '$email', '$phoneNumber','$username', 
	'$pass', '$status', '$added_by', '$url', '$comment')";
	

	if(mysqli_query($connect, $sql_dealer))
	{
		
		header('location: Manage Buyers.php?msg=Success');
    }
	else 
	{
		header('location: Manage Buyers.php?msgError=Error');			
	}
}
?>

