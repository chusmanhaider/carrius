<?php  
	if(isset($_POST["help_id"]))  
	{
		include("../../db_connect.php");
		$help_Id=$_POST['help_id'];
		$sql = "SELECT * FROM contactus 
		INNER JOIN contactus_reply ON contactus.contact_ID = contactus_reply.contactusId
		WHERE contactus.contact_ID='$help_Id'";
		$result = mysqli_query($connect, $sql);  
	}
?>
<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<?php
				while($row=mysqli_fetch_assoc($result))
				{
					
			?>
			<tr>  
                <th class="text-capitalize text-center" width="25%">Title</th>  
                <td class="text-capitalize"><?php echo $row["contact_topic"];?></td>  
            </tr>
			<tr>  
                <th class="text-capitalize text-center" width="25%">Message</th>  
                <td class="text-capitalize"><?php echo $row["contact_message"];?></td>  
            </tr>
            <tr>  
                <th class="text-capitalize text-center" width="25%">Priority</th>  
                <td class="text-capitalize">
                <?php 
                    if($row["contactus_priority"]=="Normal")
                        echo "<label class='label label-success'>Normal</label>";
                    else if($row["contactus_priority"]=="High")
                        echo "<label class='label label-danger'>High</label>";
                    else if($row["contactus_priority"]=="Low")
                        echo "<label class='label label-warning'>Low</label>";
                ?>
                </td>  
            </tr>
            <tr>  
                <th class="text-capitalize text-center" width="25%">Status</th>  
                <td class="text-capitalize">
                <?php
                    $reason=$row["contact_reply_flag"];
                    if($reason==0)
                        echo "<label class='label label-danger'>Not Replied</label>";
                    else if($reason==1)
                        echo "<label class='label label-success'>Replied</label>";
                    else if($reason==-1)
                        echo "<label class='label label-warning'>Ignored</label>";
                ?>
                </td>  
            </tr>
			<tr> 
				 
                <th class="text-capitalize text-center" width="25%"><i>Request Date</i></th>  
                <td>
                <?php 
				    $time=$row['contact_tStamp'];
					echo $date = date("d-M-Y g:i A", strtotime($time));
                ?>
                </td>  
            </tr>
            <?php
                $reasn=$row["contact_reply_flag"];
                if($reasn==1)
                {	
            ?>
            <tr>  
                <th class="text-capitalize text-center" width="25%">Reply Message</th>  
                <td class="text-capitalize"><?php echo $row["contactreply_detail"];?></td>  
            </tr>
            <tr> 
				 
                 <th class="text-capitalize text-center" width="25%"><i>Reply Date</i></th>  
                 <td>
                 <?php 
                     $time=$row['contactreply_tStamp'];
                     echo $date = date("d-M-Y g:i A", strtotime($time));
                 ?>
                 </td>  
             </tr>
            <?php
                }
            ?>
			<?php
				}
			?>
		</table>
		
</div>