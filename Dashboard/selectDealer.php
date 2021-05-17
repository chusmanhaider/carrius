<body>
<?php  
include("../db_connect.php");
$userProfile=session_id();

$query="Select * from admin where admin_username='$userProfile'";
$data=mysqli_query($connect,$query);
$result=mysqli_fetch_assoc($data);
$Id=$result['admin_ID'];

	if(isset($_POST["dealer_id"]))  
	{
		
		$curr_Id=$_POST['dealer_id'];
		//$sql = "SELECT * FROM cars_brand INNER JOIN cars ON cars_brand.carBrand_ID = cars.CarBrandId WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$sql = "SELECT * FROM dealer WHERE dealer_Status!='Terminated' AND dealer_ID='$curr_Id'";
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
				<th class="text-center" width="14%">Email</th>
				<th class="text-center" width="16%">Phone Number</th>
				<th class="text-center" width="12%">Dealer Status</th>
			</tr>
			<tr>
				<td class="text-capitalize text-center">
					<?php echo $row["dealer_FName"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php echo $row["dealer_LName"];?>
				</td>
				<td class="text-center">
					<?php echo $row["dealer_Email"];?>
				</td>
                <td class="text-capitalize text-center">
					<?php echo $row["dealer_CellNumber"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php 
					if($row["dealer_Status"]=="Pending")
						echo "<label class='label label-warning'>Pending</label>".
                        "<br><i style='color:red;font-size:10px'>Please Mark it</i>";
					else if($row["dealer_Status"]=="Active")
						echo "<label class='label label-success'>Active</label>";
                    else if($row["dealer_Status"]=="Suspended")
						echo "<label class='label label-danger'>Suspended</label>";
					else if($row["dealer_Status"]=="Rejected")
						echo "<label class='label label-danger'>Rejected</label>";
					
					?>
				</td>
				
			</tr>
			<?php
                if($row["dealer_Status"]=="Rejected")
                {
            ?>
                <tr>
                    <th colspan="1" class="text-capitalize text-center">Reason</th>
                    <td colspan="4" class="text-capitalize"><?php echo $row["dealer_Reject_Reason"];?></td>
                </tr>
            <?php
                }
            ?>
			<tr>  
                <th class="text-capitalize text-center" colspan="1"><i>Added/Created On</i></th>  
                <td colspan="4"><?php echo "<span style='font-size:12px;font-style:italic;'>".$row["dealer_tStamp"]."</span>";?></td>  
            </tr>
			<?php
				}
			?>
		</table>
		
</div>
<!-- Business Info -->
<?php  
	if(isset($_POST["dealer_id"]))  
	{
		$curr_Id=$_POST['dealer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM dealer WHERE dealer_Status!='Terminated' AND dealer_ID='$curr_Id'";
        $res = mysqli_query($connect, $query);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Dealership Detail</h4>
		<?php
				while($rw=mysqli_fetch_assoc($res))
				{
			?>
        <tr>
            <th class="text-center" colspan="2">Dealership/Group Name *</th>
            <td colspan="3" class="text-capitalize"><?php echo $rw['dealer_Dealership'];?></td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Dealership Main Location *</th>
            <td colspan="3" class="text-capitalize"><?php echo $rw['dealer_Location'];?></td>
        </tr>
		<tr>
			<th class="text-center" width="6%">Dealerships</th>
			<th class="text-center" width="5%">Type</th>
			<th class="text-center" width="5%">Agents</th>
			<th class="text-center" width="5%">Stock</th>
			
		</tr>
		<tr>
			<td class="text-center">
				<?php echo $rw['dealer_DealerNum'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['dealer_Type'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['dealer_NumAgent'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['dealer_NumCarStock'];?> 	
			</td>
			
		</tr>
       
	<?php
	}
	?>	
	</table>
</div>

<!-- Schedule -->
<?php  
	if(isset($_POST["dealer_id"]))  
	{
		$curr_Id=$_POST['dealer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM dealer WHERE dealer_Status!='Terminated' AND dealer_ID='$curr_Id'";
        $res = mysqli_query($connect, $query);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Business Schedule</h4>
		<?php
				while($rw=mysqli_fetch_assoc($res))
				{
			?>
        
		<tr>
			<th class="text-center" width="25%">From (Day)</th>
			<th class="text-center" width="25%">To (Day)</th>
			<th class="text-center" width="25%">From (Time)</th>
			<th class="text-center" width="25%">To (Time)</th>
			
		</tr>
		<tr>
			<td class="text-center">
				<?php echo $rw['dealer_WorkFromDay'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['dealer_WorkToDay'];?> 	
			</td>
			<td class="text-center">
				<?php 
					$time=$rw['dealer_WorkFromTime'];
					echo $fromTime  = date("g:i A", strtotime($time));
				?> 	
			</td>
			<td class="text-center">
				<?php 
					$time=$rw['dealer_WorkToTime'];
					echo $toTime  = date("g:i A", strtotime($time));
				?> 	
			</td>
			
		</tr>
        
	<?php
	}
	?>	
	</table>
</div>
<!-- Login -->
<?php  
	if(isset($_POST["dealer_id"]))  
	{
		$curr_Id=$_POST['dealer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM dealer WHERE dealer_Status!='Terminated' AND dealer_ID='$curr_Id'";
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
			<td class="text-center"><?php echo $rw['dealer_Email'];?></td>
			<td class="text-center"><?php echo $rw['dealer_Username'];?></td>
			<td class="text-center">
			<?php $dealerId=$rw['dealer_ID'];?>
				<a href="Reset Dealer Password.php?id=<?php echo $dealerId;?>">Reset Password</a>
			</td>
		</tr>
	<?php
	}
	?>	
	</table>
</div>
<!-- Comment -->
<?php  
	if(isset($_POST["dealer_id"]))  
	{
		$curr_Id=$_POST['dealer_id'];
		//$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$query = "SELECT * FROM dealer WHERE dealer_Status!='Terminated' AND dealer_ID='$curr_Id'";
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
				<?php echo $rw['dealer_Comments'];?> 	
			</td>
			
		</tr>
        
		
	</table>
</div>

<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Added By</h4>
			<tr>
				<th class="text-center" width="25%">Added/Created By</th>
				<td><?php echo $rw['dealer_AddedBy'];?></td>
			</tr>
			<tr>  
                <th class="text-capitalize text-center" width="25%"><i>Added/Created On</i></th>  
                <td>
				<?php 
				$time=$rw['dealer_tStamp'];
				echo $date = date("d-M-Y g:i A", strtotime($time));
				//echo $timeStamp  = date("g:i A", strtotime($time));
				?>
				</td>  
            </tr>
	</table>
</div>

<?php
	}
	?>

<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:65%;margin-top:1%">
			<div class="modal-content">
				<form class="form-horizontal" id="update_dealer_form" method="POST"><div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Reset Password</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="col-sm-2">
							<h4>Instructions</h4>
							</div>
							<div class="col-sm-8">
								<span id="passwordCheck" style="color:red;text-align:center;margin-left:30px;">Password length should be at least 8 characters long</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">New Password</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" maxlength="36" required id="newPassword" placeholder="New Password" name="newPassword" autocomplete="off">
							</div>
							<div class="col-sm-2">
								<span toggle="#password-field tooltip" title="Show/Hide Password" class="fa fa-fw fa-eye field_icon newPasswordToggle fa-2x"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">New Password (Confirm)</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" maxlength="36" required id="confirmNewPassword" placeholder="New Password (Confirm)" name="confirmNewPassword" autocomplete="off">
							</div>
							<div class="col-sm-2">
								<span toggle="#password-field tooltip" title="Show/Hide Password" class="fa fa-fw fa-eye field_icon confirmNewPasswordToggle fa-2x"></span>
								<div id="passwordConfirmCheck" style="color:red;"></div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">Your Password </label>
							<div class="col-sm-6">
								<input type="password" placeholder="Your Password" class="form-control" id="yourPassword" name="yourPassword">

							</div>
							<div class="col-sm-2">
								<span toggle="#password-field tooltip" title="Show/Hide Password" class="fa fa-fw fa-eye field_icon yourPasswordToggle fa-2x"></span>
								<div id="yourPasswordCheck" style="color:red;"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="selectedCarId" id="selectedCarId" />
						<input type="hidden" name="selectedCarDealerId" id="selectedCarDealerId">
						<input type="hidden" name="selectedCarDealerNewId" id="selectedCarDealerNewId">
						<input type="submit" name="resetPasswordBtn" id="resetPasswordBtn" value="Reset Password" class="btn btn-danger" />
						<input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div>

	
</body>