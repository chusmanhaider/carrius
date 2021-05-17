<?php 	
require_once '../db_connect.php';
//$query="Update cars SET stock_Qty='-2' WHERE ProductId='".$_POST["id"]."'";
$id=$_POST["conDealerid"];
$del_reply="DELETE from contact_dealer_reply WHERE conDealerId='$id'";
if(mysqli_query($connect, $del_reply))
{
    $q="DELETE FROM contact_dealer WHERE conDealer_ID='$id'";
    if($connect->query($q) === TRUE) 
    {

        $valid['success'] = true;
        //header('Location:Category.php');
        $valid['messages'] = "Successfully Removed";
    } 
    else 
    {
        $valid['success'] = false;
        $valid['messages'] = "Error while remove the image";
    }
}


$connect->close();

echo json_encode($valid);
?>