<?php  
include("../db_connect.php");

	if(isset($_POST["buyer_id"]))  
	{
		
		$curr_Id=$_POST['buyer_id'];
		//$sql = "SELECT * FROM cars_brand INNER JOIN cars ON cars_brand.carBrand_ID = cars.CarBrandId WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$sql = "SELECT * FROM buyer WHERE buyer_Status!='Terminated' AND buyer_ID='$curr_Id'";
        $result = mysqli_query($connect, $sql);  
	}
?>
<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<?php
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<h4>Basic Information</h4>";
			?>
			<tr>
				<th class="text-center" width="10%">First Name</th>
				<th class="text-center" width="10%">Last Name</th>
				<th class="text-center" width="16%">Phone Number</th>
				<th class="text-center" width="12%">Buyer Status</th>
			</tr>
			<tr>
				<td class="text-capitalize text-center">
					<?php echo $row["buyer_FName"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php echo $row["buyer_LName"];?>
				</td>
				
                <td class="text-capitalize text-center">
					<?php echo $row["buyer_CellNumber"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php 
					if($row["buyer_Status"]=="Pending")
						echo "<label class='label label-warning'>Pending</label>".
                        "<br><i style='color:red;font-size:10px'>Please Mark it</i>";
					else if($row["buyer_Status"]=="Active")
						echo "<label class='label label-success'>Active</label>";
                    else if($row["buyer_Status"]=="Suspended")
						echo "<label class='label label-danger'>Suspended</label>";
					else if($row["buyer_Status"]=="Rejected")
						echo "<label class='label label-danger'>Rejected</label>";
					
					?>
				</td>
				
			</tr>
			<?php
                if($row["buyer_Status"]=="Rejected")
                {
            ?>
                <tr>
                    <th colspan="1" class="text-capitalize text-center">Reason</th>
                    <td colspan="3" class="text-capitalize">
					<?php if($row["buyer_Reject_Reason"]=='')
							echo "No reason added";
						else 
							echo $row["buyer_Reject_Reason"];
					?>
					</td>
                </tr>
            <?php
                }
            ?>
			<tr>  
                <th class="text-capitalize text-center" colspan="1"><i>Added/Created On</i></th>  
                <td colspan="3"><?php echo "<span style='font-size:12px;font-style:italic;'>".$row["buyer_tStamp"]."</span>";?></td>  
            </tr>
			<?php
				}
			?>
		</table>
		
</div>
<?php  
	if(isset($_POST["buyer_id"]))  
	{
		$curr_Id=$_POST['buyer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM buyer WHERE buyer_Status!='Terminated' AND buyer_ID='$curr_Id'";
        $res = mysqli_query($connect, $query);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Login</h4>
		<?php
				while($rw=mysqli_fetch_assoc($res))
				{
			?>
		<tr>
			<th class="text-center">Email</th>
			<th class="text-center">Username</th>
			<th class="text-center">Password</th>
		</tr>
        <tr>
			<td class="text-center"><?php echo $rw['buyer_Email'];?></td>
			<td class="text-center"><?php echo $rw['buyer_Username'];?></td>
			<td class="text-center">
			<?php $buyerId=$rw['buyer_ID'];?>
				<a href="Reset Buyer Password.php?id=<?php echo $buyerId;?>">Reset Password</a>
			</td>
		</tr>
	<?php
	}
	?>	
	</table>
</div>

	
    <?php  
	if(isset($_POST["buyer_id"]))  
	{
		$curr_Id=$_POST['buyer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM buyer WHERE buyer_Status!='Terminated' AND buyer_ID='$curr_Id'";
        $res = mysqli_query($connect, $query);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Residence Info</h4>
		<?php
				while($rw=mysqli_fetch_assoc($res))
				{
			?>
        <tr>
            <th class="text-center" style="width:25%">Address</th>
            <td colspan="3" class="text-capitalize"><?php echo $rw['buyer_Address'];?></td>
        </tr>
        <tr>
            <th class="text-center" style="width:25%">City</th>
            <td colspan="3" class="text-capitalize"><?php echo $rw['buyer_City'];?></td>
        </tr>
        <tr>
            <th class="text-center" style="width:25%">Country</th>
            <td colspan="3" class="text-capitalize"><?php echo $rw['buyer_Country'];?></td>
        </tr>
		
       
	<?php
	}
	?>	
	</table>
</div>

<?php  
	if(isset($_POST["buyer_id"]))  
	{
		$curr_Id=$_POST['buyer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM buyer WHERE buyer_Status!='Terminated' AND buyer_ID='$curr_Id'";
        $res = mysqli_query($connect, $query);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Comments</h4>
		<?php
				while($rw=mysqli_fetch_assoc($res))
				{
			?>
		<tr>
			<th class="text-center" width="25%">Comments</th>
			<td width="75%">
				<?php 
                if($rw['buyer_Comments']=='')
                echo "<i>No Comment found</i>";
                else
                    echo $rw['buyer_Comments'];
                ?> 	
			</td>
			
		</tr>
        <?php
                }
        ?>
		
	</table>
</div>