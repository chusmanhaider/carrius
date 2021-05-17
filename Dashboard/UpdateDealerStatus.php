<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	$d_id = $_POST['dealer_id'];
	$re_status=$_POST['reject_status'];
	$ap_status=$_POST['approve_status'];
	//$sql = "INSERT INTO cars_brand (carBrand_Name, carBrand_Status) VALUES ('$cateName', '$cateStatus')";
    if($re_status!='' && $ap_status=='')
    {
        $sql="UPDATE dealer SET dealer_Status='$re_status' WHERE dealer_ID='$d_id'";
        if(mysqli_query($connect,$sql)) 
        {
            header('location: Manage Dealers.php?msgReject=Success');
        } 
        else 
        {
            header('location: Manage Dealers.php?msgRejectError=Error');			
        }
    }
    if($re_status=='' && $ap_status!='')
    {
        $sql="Update dealer SET dealer_Status='$ap_status' WHERE dealer_ID='$d_id'";
        if(mysqli_query($connect,$sql)) 
        {
            header('location: Manage Dealers.php?msgApprove=Success');
        } 
        else 
        {
            header('location: Manage Dealers.php?msgApproveError=Error');			
        }
    }
}
//echo $ap_status;
?>

