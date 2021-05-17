<?php  
require_once '../db_connect.php';
$message="";
//error_reporting(0);
if(!empty($_POST))  
{
	$car_id=mysqli_real_escape_string($connect, $_POST['car_id']);//88
    $dealer_id=mysqli_real_escape_string($connect, $_POST['dealer_id']);
    $buyer_id=mysqli_real_escape_string($connect, $_POST['buyer_id']);

    $status_one="Not Replied";
    $flag="Not Replied";

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
                header('location: All-Cars.php?msgConfirm=Success');
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