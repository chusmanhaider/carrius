<?php  
require_once '../../db_connect.php';
error_reporting(0);
if(!empty($_POST))  
{
    $notify_id=$_POST['notify_mark_id'];
    if($notify_id!='')
    {
        $update="Update "
    }
}
?>