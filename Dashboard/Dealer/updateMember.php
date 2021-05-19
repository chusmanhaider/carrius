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
    
    if($designation=="General Manager")
    {
        $priority = 1;
    }
    else if($designation=="Assistance Manager")
    {
        $priority = 2;
    }
    else if($designation=="Customer Service Manager")
    {
        $priority = 3;
    }

    $query = "UPDATE administration_dept 
    SET adDept_Designation='$designation',
    adDept_MemberName='$memberName',
    adDept_MemberSince='$date',
    adDept_Status='$Status',
    adDept_DesignPriority='$priority'
    WHERE DealerId='$dealer_id' AND adDept_ID='$member_Id'";
    if(mysqli_query($connect,$query))
    {
        header('location: admin_dept.php?url='.$dealer_id.'&Success');
    }
    else
        header('location: admin_dept.php?url='.$dealer_id.'&Error');
    
}
?>