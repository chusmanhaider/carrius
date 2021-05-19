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
    
    if($designation=="Billing Manager")
    {
        $priority = 1;
    }
    else if($designation=="Financial Consultant")
    {
        $priority = 2;
    }

    $query = "UPDATE finance_dept 
    SET finDept_Designation='$designation',
    finDept_MemberName='$memberName',
    finDept_MemberSince='$date',
    finDept_Status='$Status',
    finDept_DesignPriority='$priority'
    WHERE DealerId='$dealer_id' AND finDept_ID='$member_Id'";
    if(mysqli_query($connect,$query))
    {
        header('location: finance_dept.php?url='.$dealer_id.'&Success');
    }
    else
        header('location: finance_dept.php?url='.$dealer_id.'&Error');
    
}
?>