<?php 

require_once '../db_connect.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$newPass = $_POST['rePassword'];
	$confirmPass = $_POST['reNewPassword'];
	$currPass = $_POST['oldPassword'];
	$userId = $_POST['user_id'];

	$sql ="SELECT * FROM admin WHERE admin_ID = {$userId}";
	if($query = $connect->query($sql))
	{
	while($result = $query->fetch_assoc())
	{
	if($currPass == $result['admin_password']) {

		if($newPass == $confirmPass) {

			$updateSql = "UPDATE admin SET admin_password = '$newPass' WHERE admin_ID = {$userId}";
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

	} else {
		$valid['success'] = false;
		$valid['messages'] = "Current password is incorrect";
	}
	}}
	$connect->close();

	echo json_encode($valid);

}

?>