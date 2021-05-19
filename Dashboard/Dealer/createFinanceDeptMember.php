<?php
include_once '../db_connect.php';
if(!empty($_POST))
{
    $memberName = mysqli_real_escape_string($connect, $_POST['memberName']);
    $designation = mysqli_real_escape_string($connect, $_POST['designation']);
    $date = mysqli_real_escape_string($connect, $_POST['memberSinceD']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $dealer_id = mysqli_real_escape_string($connect, $_POST['dealer_id']);

    if($designation=="Billing Manager")
    {
        $priority = 1;
    }
    else if($designation=="Financial Consultant")
    {
        $priority = 2;
    }
    
    $sql="INSERT INTO finance_dept (finDept_MemberName, finDept_Designation, finDept_MemberSince, finDept_Status, finDept_DesignPriority, DealerId) 
    VALUES ('$memberName', '$designation', '$date', '$status', '$priority', '$dealer_id')";

    if(mysqli_query($connect, $sql))
    {
        header("location:finance_dept.php?url=".$dealer_id."&msg=Success");
    }
    else
    {
        header("location:finance_dept.php?url='$dealer_id'.&msgErr=NotSuccessfull");
    }
}
?>