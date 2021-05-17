<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	// Basic Information
	$msg = mysqli_real_escape_string($connect, $_POST['requestMsg']);
	$requestMsg = trim(preg_replace('/\s+/', ' ', $msg));
    $dealer_id=mysqli_real_escape_string($connect, $_POST['dealer_id']);	
    $status="Not Replied";
    $flag="Not Replied";
	$q="Select * from dealer where dealer_ID='$dealer_id'";
	$t=mysqli_query($connect,$q);
	$re=mysqli_fetch_assoc($t);
	$car_Dealer=$re['dealer_Dealership'];
	$dealer_Loc=$re['dealer_Location'];
    
    $user_id=mysqli_real_escape_string($connect, $_POST['user_id']);

    $q_buyer="Select * from buyer where buyer_ID='$user_id'";
	$t_buyer = mysqli_query($connect, $q_buyer);
	$re_buyer=mysqli_fetch_assoc($t_buyer);
	$fullName=$re_buyer['buyer_FName']." ".$re_buyer['buyer_LName'];
	//$dealer_Loc=$re['dealer_Location'];
	

	
	$today = date("F j, Y, g:i A"); 
	$notifyTitle="Buyer contacted";

	$notifyDesc=$fullName." has contacted you. Go into Contact Buyer section and reply him";

	$notifications_status="Available";
	$notification_status="Unseen";

    
	$sql_conDealer="INSERT INTO contact_dealer (conDealer_Msg, conDealer_Status, BuyerId, CarId, DealerId) 
    VALUES ('$requestMsg','$status','$user_id','-1','$dealer_id')";

	if(mysqli_query($connect,$sql_conDealer)) 
	{
		$last_id = mysqli_insert_id($connect);
		if($last_id!="")
		{
            $sqli_conReply = "INSERT INTO contact_dealer_reply (conDealerReply_Flag, conDealerId) VALUES ('$flag','$last_id')";
			if(mysqli_query($connect, $sqli_conReply))
			{
				$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_buyer="INSERT INTO notify_bybuyer (nB_BuyerId, nB_DealerId, notificationsId) VALUES ('$user_id','$dealer_id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_buyer))
					{
						header('location: Contact-Dealer.php?msg=Success');
					}
					else
						header('location: Contact-Dealer.php?msgErr1=ErrorWhileAddingNotificationBy');
				}
				else
					header('location: Contact-Dealer.php?msgErr2=ErrorWhileAddingNotification');
			}
			else
				header('location: Contact-Dealer.php?msgErr3=ErrorWhileAdding');
		}
        else
			header('location: Contact-Dealer.php?msgErr4=ErrorWhileAddingX');
	} 
	else 
	{
		header('location: Contact-Dealer.php?msgErr5=Error');			
	}
}
?>

