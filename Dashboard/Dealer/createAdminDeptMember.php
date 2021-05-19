<?php
include_once '../db_connect.php';
if(isset($_POST['createAdminMemberBtn']))
{
    $memberName = mysqli_real_escape_string($connect, $_POST['memberName']);
    $designation = mysqli_real_escape_string($connect, $_POST['designation']);
    $date = mysqli_real_escape_string($connect, $_POST['memberSinceD']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $dealer_id = mysqli_real_escape_string($connect, $_POST['dealer_id']);

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
    
    $sql="INSERT INTO administration_dept (adDept_MemberName, adDept_Designation, adDept_MemberSince, adDept_Status, adDept_DesignPriority, DealerId) 
    VALUES ('$memberName', '$designation', '$date', '$status', '$priority', '$dealer_id')";

    if(mysqli_query($connect, $sql))
    {
        header("location:admin_dept.php?url=".$dealer_id."&msg=Success");
    }
    else
    {
        header("location:admin_dept.php?url='$dealer_id'.&msgErr=NotSuccessfull");
    }
}
?>