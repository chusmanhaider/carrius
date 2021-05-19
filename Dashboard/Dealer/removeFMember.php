<?php 	
    require_once '../db_connect.php';
    if($_POST['finance_id'])
    {
        $finance_id=$_POST["finance_id"];
        $q="DELETE from finance_dept WHERE finDept_ID='$finance_id'";
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