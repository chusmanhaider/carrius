<?php 

require_once '../db_connect.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$newPass = sha1(md5($_POST['rePassword']));
	$confirmPass = sha1(md5($_POST['reNewPassword']));
	$myPass = sha1(md5($_POST['yourPassword']));
	$adminId = mysqli_real_escape_string($connect, $_POST['admin_id']);
    $buyerId = mysqli_real_escape_string($connect, $_POST['buyer_id']);

	

	$sql ="SELECT * FROM admin WHERE admin_ID = {$adminId}";
	if($query = $connect->query($sql))
	{
		while($result = $query->fetch_assoc())
		{
			if($myPass == $result['admin_password']) 
			{
				if($newPass == $confirmPass) 
				{
					$updateSql = "UPDATE buyer SET buyer_Password = '$newPass' WHERE buyer_ID = {$buyerId}";
					if(mysqli_query($connect,$updateSql))
					{
						$valid['messages'] = "Successfully Updated";
					}
					else
					{
						$valid['messages'] = "Error while updating the password";
					}
				}
				else
				{
					$valid['messages'] = "Error while updating the password";
				}
			}
			else
			{
				$valid['messages'] = "Error while updating the password";
			}
		}
	}
	else
	{
		$valid['messages'] = "Error while updating the password";
	}

	$connect->close();

	echo json_encode($valid);

}

?>