<?php  
require_once '../db_connect.php';
$message="";
//error_reporting(0);
if(!empty($_POST))  
{
	//$car_id=mysqli_real_escape_string($connect, $_POST['car_id']);//88
    $dealer_id=mysqli_real_escape_string($connect, $_POST['dealerId']);
    $buyer_id=mysqli_real_escape_string($connect, $_POST['buyer_id']);
    $car_id = -1;
    $status_one="Not Replied";
    $flag="Not Replied";

    $notifyTitle="Buyer contacted";

    $q_buyer="Select * from buyer where buyer_ID='$buyer_id'";
	$t_buyer = mysqli_query($connect, $q_buyer);
	$re_buyer=mysqli_fetch_assoc($t_buyer);
	$fullName=$re_buyer['buyer_FName']." ".$re_buyer['buyer_LName'];

	$notifyDesc=$fullName." has contacted you. Go into Contact Buyer section and reply him";

	$notifications_status="Available";
	$notification_status="Unseen";

	$msg=mysqli_real_escape_string($connect, $_POST['replyTo']); //7
	
    $sql_contact_dealer="INSERT INTO contact_dealer (conDealer_Msg, conDealer_Status, BuyerId, CarId, DealerId) VALUES ('$msg','$status_one','$buyer_id', '$car_id', '$dealer_id')";
    
    if(mysqli_query($connect, $sql_contact_dealer))
    {
        $contact_dealer_id=mysqli_insert_id($connect);
        if($contact_dealer_id!='')
        {
            $sql_contact_dealer_reply="INSERT INTO contact_dealer_reply (conDealerReply_Flag, conDealerId) 
            VALUES ('$flag', '$contact_dealer_id')";
            if(mysqli_query($connect, $sql_contact_dealer_reply))
            {
                $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
                if(mysqli_query($connect, $sql_notify))
                {
                    $notify_last_id=mysqli_insert_id($connect);
                    $sql_notify_by_buyer="INSERT INTO notify_bybuyer (nB_BuyerId, nB_DealerId, notificationsId) VALUES ('$buyer_id','$dealer_id', '$notify_last_id')";
                    if(mysqli_query($connect,$sql_notify_by_buyer))
                    {
                        header('location: Contact-Dealer.php?msg=Success');
                    }
                    else
                        header('location: Contact-Dealer.php?msgErr1=ErrorWhileAddingNotificationBy');
                }
                else
                    header('location: Contact-Dealer.php?msgErr2=ErrorWhileAddingNotification');
                
                //header('location: All-Cars.php?msgConfirm=Success');
            }
        }
        else
        {
            header('location: All-Cars.php?msgOther=ErrorWhileContactDealer1');
        }
    }
    else
    {
        header('location: All-Cars.php?msgOther=ErrorWhileContactDealer2');
    }

}
?>