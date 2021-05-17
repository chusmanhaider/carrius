<?php  
	if(isset($_POST["contact_id"]))  
	{
		include("../db_connect.php");
		$con_Id=$_POST['contact_id'];

		$sql = "SELECT * FROM dealer
        INNER JOIN contact_dealer ON contact_dealer.DealerId = dealer.dealer_ID
		INNER JOIN contact_dealer_reply ON contact_dealer.conDealer_ID = contact_dealer_reply.conDealerId
        WHERE dealer.dealer_Status='Active' AND contact_dealer.conDealer_ID='$con_Id'"; 

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
                <th class="text-capitalize text-center" width="25%">Message</th>  
                <td class="text-capitalize"><?php echo $row["conDealer_Msg"];?></td>  
            </tr>
			<tr>  
                <th class="text-capitalize text-center" width="25%">Sent From</th>  
                <td class="text-capitalize">
                <?php 
                    $sql_car = "SELECT * FROM dealer
                    INNER JOIN contact_dealer ON contact_dealer.DealerId = dealer.dealer_ID
                    INNER JOIN cars ON cars.car_ID=contact_dealer.CarId
                    INNER JOIN contact_dealer_reply ON contact_dealer.conDealer_ID = contact_dealer_reply.conDealerId
                    WHERE dealer.dealer_Status='Active' AND contact_dealer.conDealer_ID='$con_Id'"; 

                    $res = mysqli_query($connect, $sql_car);
                    $rw = mysqli_fetch_assoc($res);

                $topic=$row["CarId"];
                if($topic==-1)
                {
                    echo "<label class='label label-warning'>General Query</label>";
                }
                else
                {
                    echo "<label class='label label-success'>Car Related</label><span data-toggle='tooltip' title='Contacted from Car Page'><i style='margin-left:2px;color:red;' class='fa fa-question-circle'></i></span>";
                    echo "<br>This is related to <b>".$rw['car_Name']."</b> Car";
                }
                ?>
                </td>  
            </tr>
            <tr>  
                <th class="text-capitalize text-center" width="25%">Status</th>  
                <td class="text-capitalize">
                <?php
                    $reason=$row["conDealer_Status"];
                    if($reason=="Not Replied")
                        echo "<label class='label label-danger'>Not Replied</label>";
                    else if($reason=="Replied")
                        echo "<label class='label label-success'>Replied</label>";
                    else
                        echo "<label class='label label-warning'>".$reason."</label>";
                ?>
                </td>  
            </tr>
			<tr> 
				 
                <th class="text-capitalize text-center" width="25%"><i>Sent Date</i></th>  
                <td>
                <?php 
				    $time=$row['conDealer_tStamp'];
					echo $date = date("d-M-Y g:i A", strtotime($time));
                    //$date=$row['conDealer_TimeStamp'];
                    //$date=date_format("d-M-Y g:i A", strtotime($date));
                    //$time=$row['conDealer_TimeStamp'];
                    //echo $date;
                ?>
                </td>  
            </tr>
            <?php
                $flag=$row["conDealerReply_Flag"];
                $status=$row["conDealer_Status"];
                if($flag=="Replied" && $status=="Replied")
                {	
            ?>
            <tr>  
                <th class="text-capitalize text-center" width="25%">Reply Message</th>  
                <td class="text-capitalize"><?php echo $row["conDealerReply_Msg"];?></td>  
            </tr>
            <tr> 
				 
                 <th class="text-capitalize text-center" width="25%"><i>Reply Date</i></th>  
                 <td>
                 <?php 
                    $time=$row['conDealerReply_tStamp'];
                    echo $date = date("d-M-Y g:i A", strtotime($time));
                    /*
                    $time_reply=$row['conDealerReply_Date'];
                    $date_reply=$row['conDealerReply_TimeStamp'];
                    echo $date_reply." ".$time_reply;
                    */
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