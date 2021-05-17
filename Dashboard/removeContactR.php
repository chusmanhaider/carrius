<?php 	
require_once '../db_connect.php';
$c_id=$_POST['rid'];
//$query="Update cars SET stock_Qty='-2' WHERE ProductId='".$_POST["id"]."'";
$sql="UPDATE contactus SET contact_reply_flag='-2' WHERE contact_ID='$c_id'"; 
if(mysqli_query($connect,$sql))
{
	return true;
}
echo json_encode($valid);
?>