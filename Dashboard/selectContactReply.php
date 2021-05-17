<?php  
include("../db_connect.php");
$userProfile=session_id();

$quer="Select * from admin where admin_username='$userProfile'";
$data=mysqli_query($connect,$quer);
$result=mysqli_fetch_assoc($data);
$Id=$result['admin_ID'];

	if(isset($_POST["contact_id"]))  
	{
		
		$curr_Id=$_POST['contact_id'];
		$query = "SELECT * FROM contactus INNER JOIN contactus_reply ON 
        contactus_reply.contactusId=contactus.contact_ID 
        WHERE contactus.contact_ID='$curr_Id'";
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
				<th class="text-center" width="25%">Full Name</th>
				<td><?php echo ucfirst($rw['contact_name']);?></td>
			</tr>
            <tr>
				<th class="text-center" width="25%">Email</th>
				<td><?php echo ucfirst($rw['contact_email']);?></td>
			</tr>
            <tr>
				<th class="text-center" width="25%">Dealership</th>
				<td><?php echo ucfirst($rw['contact_dealership']);?></td>
			</tr>
            <tr>
				<th class="text-center" width="25%">Topic</th>
				<td><?php echo ucfirst($rw['contact_topic']);?></td>
			</tr>
            <tr>
				<th class="text-center" width="25%">Message</th>
				<td><?php echo ucfirst($rw['contact_message']);?></td>
			</tr>
            <tr>
				<th class="text-center" width="25%">Status</th>
				<td>
                    <?php 
                    $a=$rw['contact_reply_flag'];
                    if($a==0)
                        echo "<label class='label label-danger'>Not Replied</label>";
                    else if($a==1)
                        echo "<label class='label label-success'>Replied</label>"; 
                    else if($a==-1)
                        echo "<label class='label label-warning'>Ignored</label>";
                    ?>
                </td>
			</tr>
            <?php
                if($a==1 OR $a==-1)
                {
            ?>
            <tr>
				<th class="text-center" width="25%">Reply</th>
				<td><?php echo ucfirst($rw['contactreply_detail']);?></td>
			</tr>
			<tr>
				<th class="text-center" width="25%">Contact From</th>
				<td>
				<?php 
				$b=$rw['contact_ContactFrom'];
				if($b=='Registered Dealers')
					echo "<label class='label label-success'>Registered Dealers</label>";
				else if($b=='Other Dealers')
					echo "<label class='label label-success'>Other Dealers</label>"; 
				?>
				</td>
			</tr>
            <tr>  
                <th class="text-capitalize text-center" width="25%"><i>Reply Date & Time</i></th>  
                <td>
				<?php 
				$time_a=$rw['contactreply_tStamp'];
				echo $date_a = date("d-M-Y g:i A", strtotime($time_a));
				//echo $timeStamp  = date("g:i A", strtotime($time));
				?>
				</td>  
            </tr>
            <?php
                }
            ?>
			<tr>  
                <th class="text-capitalize text-center" width="25%"><i>Date & Time</i></th>  
                <td>
				<?php 
				$time=$rw['contact_tStamp'];
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