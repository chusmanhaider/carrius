<?php 	
require_once '../../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if(isset($_POST['createCategoryBtn'])) 
{
    $dealer_id=mysqli_real_escape_string($connect, $_POST['user_id']);
    $title=mysqli_real_escape_string($connect, $_POST['requestTitle']);
    $msg=mysqli_real_escape_string($connect, $_POST['requestMsg']);
    $priority=mysqli_real_escape_string($connect, $_POST['requestPriority']);

    $current_status="Not Replied";
    $flag=0;

    $sql_dealer="Select * from dealer Where dealer_ID='$dealer_id'";
    $res=mysqli_query($connect, $sql_dealer);
    $line=mysqli_fetch_assoc($res);

    $dName=$line['dealer_FName']." ".$line['dealer_LName'];
    $email=$line['dealer_Email'];
    $dealership=$line['dealer_Dealership'];

    $contactFrom="Registered Dealers";

    $today = date("Y-m-d");
    $today_time=date("h:i A");
    $today_time = date("h:i A", strtotime($today_time)); 

    $notifyTitle="Help Request";
	$notifyDesc=$dName. " needs some help from you";
	$notifications_status="Available";
	$notification_status="Unseen";

    $sql_help="INSERT INTO contactus (contact_name, contact_email, contact_dealership, contact_topic, contact_message, 
    contactus_priority, contact_reply_flag, contact_Date, contact_Time, contact_ContactFrom)
    VALUES ('$dName', '$email', '$dealership', '$title', '$msg', '$priority', '$flag', '$today', '$today_time', '$contactFrom')";

    if(mysqli_query($connect, $sql_help))
    {
        $help_last_id=mysqli_insert_id($connect);
        if($help_last_id!='')
        {
            $sql_help_reply="INSERT INTO contactus_reply (contactusId, DealerId) VALUES ('$help_last_id','$dealer_id')";
            if(mysqli_query($connect, $sql_help_reply))
            {
                $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_bydealer (notifyByDealer_dealerId, notificationsId) VALUES ('$dealer_id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						//$notifybydealer_last_id = mysqli_insert_id($connect);
                        header('location: Help.php?msg=Success');
                    }
                    else
                    {
                        header('location: Help.php?msgErr1=ErrorNotifyAd');
                    }
                }
                else
                {
                    header('location: Help.php?msgErr2=ErrorNotification');
                }
            }
            else
            {
                header('location: Help.php?msgErr3=ErrorNotification');
            }
        }
        else
        {
            header('location: Help.php?msgError=ErrorWhileAdding');
        }
    }
    else
    {
        header('location: Help.php?msgError=Error');
    }

}

?>