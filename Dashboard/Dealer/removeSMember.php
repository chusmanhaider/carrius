<?php 	
    require_once '../db_connect.php';
    if($_POST['sales_id'])
    {
        $sales_id=$_POST["sales_id"];
        $q="DELETE from sales_dept WHERE sales_ID='$sales_id'";
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