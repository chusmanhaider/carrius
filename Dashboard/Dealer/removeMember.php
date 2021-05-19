<?php 	
    require_once '../db_connect.php';
    if($_POST['ad_id'])
    {
        $ad_id=$_POST["ad_id"];
        $q="DELETE from administration_dept WHERE adDept_ID='$ad_id'";
        if($connect->query($q) === TRUE) {
            $valid['success'] = true;
        //header('Location:Category.php');
        $valid['messages'] = "Successfully Removed";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while remove the member";
        }
    }
    

    $connect->close();

    echo json_encode($valid);
?>