<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{
    $reason=mysqli_real_escape_string($connect, $_POST['rejectReason']);
    $buyer_id=mysqli_real_escape_string($connect, $_POST['get_buyer_id']);

    $sql="Update buyer SET buyer_Reject_Reason='$reason' WHERE buyer_Status!='Terminated' AND buyer_ID='$buyer_id'";
    if(mysqli_query($connect, $sql))
    {
        header('location: Manage Buyers.php?msgReason=ReasonAdded');
    }
    else
    {
        header('location: Manage Buyers.php?msgReasonError=ReasonError');
    }
}
?>