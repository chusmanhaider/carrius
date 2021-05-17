<?php 

require_once '../db_connect.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$newPass = sha1(md5($_POST['rePassword']));
	$confirmPass = sha1(md5($_POST['reNewPassword']));
	$myPass = sha1(md5($_POST['yourPassword']));
	$adminId = mysqli_real_escape_string($connect, $_POST['admin_id']);
    $dealerId = mysqli_real_escape_string($connect, $_POST['dealer_id']);

	$notifyTitle="Password Updated";
	$notifyDesc="Your password has been updated by Admin at ";
	$notifications_status="Available";
	$notification_status="Unseen";

	$sql ="SELECT * FROM admin WHERE admin_ID = '$adminId'";
	if($query = $connect->query($sql))
	{
		while($result = $query->fetch_assoc())
		{
			if($myPass == $result['admin_password']) 
			{
				if($newPass == $confirmPass) 
				{
					$updateSql = "UPDATE dealer SET dealer_Password = '$newPass' WHERE dealer_ID = {$dealerId}";
					if(mysqli_query($connect,$updateSql))
					{
						$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
						if(mysqli_query($connect, $sql_notify))
						{
							$notify_last_id=mysqli_insert_id($connect);
							$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$adminId', '$notify_last_id')";
							if(mysqli_query($connect,$sql_notify_by_admin))
							{
								$notifybyadmin_last_id = mysqli_insert_id($connect);
								$sql_notify_seen="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status', '$dealerId', '$notify_last_id', '$notifybyadmin_last_id')";
								if(mysqli_query($connect,$sql_notify_seen))
								{
									$valid['success'] = true;
									$valid['messages'] = "Successfully password changed for the dealer";
								}
								else
								{
									$valid['messages'] = "Error while adding notificcation seen";
								}
							}
							else
							{
								$valid['messages'] = "Error while adding notification by admin";
							}
						}
						else
						{
							$valid['messages'] = "Error while adding notification";
						}
					}
					else
					{
						$valid['messages'] = "Error while updating the password";
					}
				}
				else
				{
					$valid['messages'] = "Both password are not equal";
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
		$valid['messages'] = "Error while finding admin ID";
	}

	$connect->close();

	echo json_encode($valid);

}

?>