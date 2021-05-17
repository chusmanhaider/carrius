<?php 

require_once '../../db_connect.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$newPass = mysqli_real_escape_string($connect, $_POST['rePassword']);
	$newPass = sha1(md5($newPass));
	$confirmPass = mysqli_real_escape_string($connect, $_POST['reNewPassword']);
	$confirmPass = sha1(md5($confirmPass));
	$currPass = mysqli_real_escape_string($connect, $_POST['oldPassword']);
	$userId = $_POST['user_id'];

	$sql ="SELECT * FROM dealer WHERE dealer_ID = {$userId}";
	if($query = $connect->query($sql))
	{
		while($result = $query->fetch_assoc())
		{
			if(sha1(md5($currPass)) == $result['dealer_Password']) 
			{

				if($newPass == $confirmPass) {

					$updateSql = "UPDATE dealer SET dealer_Password = '$newPass' WHERE dealer_ID = {$userId}";
					if($connect->query($updateSql) === TRUE) {
						$valid['success'] = true;
						$valid['messages'] = "Successfully password changed";		
					} else {
						$valid['success'] = false;
						$valid['messages'] = "Error while updating the password";	
					}

				} else {
					$valid['success'] = false;
					$valid['messages'] = "New password does not match with Confirm password";
				}

			} 
			else 
			{
				$valid['success'] = false;
				$valid['messages'] = "Current password is incorrect";
			}
		}
	}
	$connect->close();

	echo json_encode($valid);

}

?>