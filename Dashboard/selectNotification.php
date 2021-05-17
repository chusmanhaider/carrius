<?php  
include("../db_connect.php");
$userProfile=session_id();

$quer="Select * from admin where admin_username='$userProfile'";
$data=mysqli_query($connect,$quer);
$result=mysqli_fetch_assoc($data);
$Id=$result['admin_ID'];

	if(isset($_POST["notify_id"]))  
	{
		
		$curr_Id=$_POST['notify_id'];
		$query = "SELECT * FROM notifications WHERE notify_ID='$curr_Id'";
        /*$query="Select * from notify_bydealer 
        INNER JOIN notifications ON notifications.notify_ID=notify_bydealer.notificationsId
		notifications.notify_ID='$curr_Id'";*/
        $result = mysqli_query($connect, $query);
        while($rw=mysqli_fetch_assoc($result))
        {  
	
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		    <tr>
				<th class="text-center" width="25%">Notification Title</th>
				<td><?php echo $rw['notify_Title'];?></td>
			</tr>
            <tr>
				<th class="text-center" width="25%">Description</th>
				<td><?php echo ucfirst($rw['notify_Descp']);?><a href="Cars.php">&nbsp;View</a></td>
			</tr>
			<tr>  
                <th class="text-capitalize text-center" width="25%"><i>Time</i></th>  
                <td>
				<?php 
				$time=$rw['notify_tStamp'];
				echo $date = date("d-M-Y g:i A", strtotime($time));
				//echo $timeStamp  = date("g:i A", strtotime($time));
				?>
				</td>  
            </tr>
	</table>
</div>
<?php
    }
}
?>