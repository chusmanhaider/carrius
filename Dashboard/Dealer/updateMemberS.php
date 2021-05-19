<?php  
require_once '../db_connect.php';
$message="";
//error_reporting(0);
if(!empty($_POST)) 
{
    //echo "T";
	$designation=mysqli_real_escape_string($connect, $_POST['updesignation']);//
	$member_Id=mysqli_real_escape_string($connect, $_POST['member_id']); //7
	$Status=mysqli_real_escape_string($connect, $_POST['upstatus']);
    $memberName=mysqli_real_escape_string($connect, $_POST['upmemberName']);
    $date=mysqli_real_escape_string($connect, $_POST['upmemberSinceD']);
    $dealer_id=mysqli_real_escape_string($connect, $_POST['dealer_id']);
    
    if($designation=="Sales Manager")
    {
        $priority = 1;
    }
    else if($designation=="Salesperson")
    {
        $priority = 2;
    }

    $query = "UPDATE sales_dept 
    SET sales_Designation='$designation',
    sales_MemberName='$memberName',
    sales_MemberSince='$date',
    sales_Status='$Status',
    sales_DesignPriority='$priority'
    WHERE DealerId='$dealer_id' AND sales_ID='$member_Id'";
    if(mysqli_query($connect,$query))
    {
        header('location: sales_dept.php?url='.$dealer_id.'&Success');
    }
    else
        header('location: sales_dept.php?url='.$dealer_id.'&Error');
    
}
?>