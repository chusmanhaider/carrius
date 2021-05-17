<?php  
	if(isset($_POST["car_id"]))  
	{
		include("../db_connect.php");
		$curr_Id=$_POST['car_id'];
		$sql="SELECT * 
		FROM cars
		INNER JOIN dealer
			ON dealer.dealer_ID=cars.DealerId
		INNER JOIN cars_brand
			ON cars_brand.carBrand_ID=cars.CarBrandId
		WHERE (cars.car_Status!='Terminated' AND cars.car_Status!='Deleted') AND cars.car_ID='$curr_Id'";
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
				<th class="text-center" width="20%">Car Name</th>
				<th class="text-center" width="10%">Brand</th>
				<th class="text-center" width="5%">Year</th>
				<th class="text-center" width="5%">Condition</th>
				<th class="text-center" width="8%">Mileage</th>
				<th class="text-center" width="4%">Electric</th>
				<th class="text-center" width="9%">Price</th>
				<th class="text-center" width="9%">Status</th>
			</tr>
			<tr>
				<td class="text-capitalize text-center">
					<?php echo $row["car_Name"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php echo $row["carBrand_Name"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php echo $row["car_Year"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php 
					if($row["car_NewUsed"]=="Used")
						echo "<label class='label label-primary'>Used</label>";
					else if($row["car_NewUsed"]=="New")
						echo "<label class='label label-success'>New</label>";
					?>
				</td>
				<td class="text-capitalize text-center">
					<?php echo $row["car_Mileage"]." <span style='font-size:11px'>Miles</span>";?>
				</td>
				<td class="text-capitalize text-center">
					<?php 
						if($row["car_isElectric"]=="Yes")
						{
							echo "<b style='color:green'>Yes</b>";
						}
						else if($row["car_isElectric"]=="No")
						{
							echo "<b style='color:red'>No</b>";	
						}
						else
						{
							echo "<label class='label label-warning'>Not Mentioned Yet</label>";
						}
					?>
				</td> 
				<td class="text-capitalize text-center">
					<?php echo "$ ".$row["car_Price"];?>
				</td>
				<td class="text-capitalize text-center">
					<?php 
						if($row['car_Status']=="Available")
							echo "<label class='label label-success'>Available</label>";
						else if($row['car_Status']=="Not Available")
							echo "<label class='label label-warning'>Not Available</label>";
						else if($row['car_Status']=="Rejected")
							echo "<label class='label label-danger'>Rejected</label>";
						else if($row['car_Status']=="Pending")
							echo "<label class='label label-info'>Pending</label><br>
							<span style='color:red;font-size:10px;font-weight:italic;'>Please Mark it</span>
							";
					?>
				</td>
			</tr>
			
			<tr>  
                <th class="text-capitalize text-center" colspan="1">Car Dealer</th>  
                <td class="text-capitalize" colspan="7"><?php echo $row["dealer_Dealership"];?></td>  
            </tr>
			<tr>  
                <th class="text-capitalize text-center" colspan="1">Car Location</th>  
                <td class="text-capitalize"  colspan="7"><?php echo $row["dealer_Location"];?></td>  
            </tr>
			<tr> 
				<th class="text-capitalize text-center" colspan="1"><i>Added / Last Updated By</i></th>  
                <td colspan="2" class="text-center">
					<?php 
					if($row["car_UpdatedBy"]=='')
						echo "<span style='font-size:13px;font-style:italic;'>".$row["car_UploadedBy"]."</span>";
					else if($row["car_UpdatedBy"]!='')
						echo "<span style='font-size:13px;font-style:italic;'>".$row["car_UploadedBy"]." / ".$row["car_UpdatedBy"]."</span>";
					?>
				</td> 
                <th class="text-capitalize text-center" colspan="2"><i>Added/Last Updated On</i></th>  
                <td colspan="3"><?php echo "<span style='font-size:12px;font-style:italic;'>".$row["car_tStamp"]."</span>";?></td>  
            </tr>
			<?php
				}
			?>
		</table>
		
</div>
<!-- Vehicle Overview -->
<?php  
	if(isset($_POST["car_id"]))  
	{
		include("../db_connect.php");
		$curr_Id=$_POST['car_id'];
		$query = "SELECT * FROM vehicle_overview INNER JOIN cars ON vehicle_overview.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$res = mysqli_query($connect, $query);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Vehicle Overview</h4>
		<?php
				while($rw=mysqli_fetch_assoc($res))
				{
			?>
		<tr>
			<th class="text-center" width="15%">Body Type</th>
			<th class="text-center" width="10%">Color</th>
			<th class="text-center" width="5%">Doors</th>
			<th class="text-center" width="5%">Seats</th>
			<th class="text-center" width="5%">Owner</th>
			<th class="text-center" width="9%">Drivetrain</th>
			<th class="text-center" width="12%">Engine Type</th>
			<th class="text-center" width="10%">Fuel Type</th>
			<th class="text-center" width="9%">CO2</th>
			<th class="text-center" width="12%">Tank capacity</th>
			<th class="text-center" width="9%">Horsepower</th>
		</tr>
		<tr>
			<td class="text-center">
				<?php echo $rw['vehOver_BType'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_Color'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_NumDoor'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_NumSeats'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_NumOwner'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_DTrain'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_EType'];?> 	
			</td>
			<td class="text-center">
				<?php 
					if($rw['car_isElectric']=="Electric")
						echo "<label class='label label-success'>Electric</label>";
					else
						echo "<label class='label label-primary'>Non-Electric</label>";
				?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_Emission']." <span style='font-size:11px'>g/kg</span>";?> 	
			</td>
			<td class="text-center">
				<?php 
				if($rw['vehOver_TCapacity']==-1 OR $rw['vehOver_TCapacity']==0)
					echo "n/a"; 
				else
					echo $rw['vehOver_TCapacity'];
				?>

			</td>
			<td class="text-center">
				<?php echo $rw['vehOver_HPower']." <span style='font-size:11px'>hp</span>";?> 	
			</td>
		</tr>
	<?php
	}
	?>	
	</table>
</div>
<?php  
	if(isset($_POST["car_id"]))  
	{
		include("../db_connect.php");
		$curr_Id=$_POST['car_id'];
		$que = "SELECT * FROM key_feature INNER JOIN cars ON key_feature.carId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id'";
		$re = mysqli_query($connect, $que);  
	}
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<h4>Key Features</h4>
		<?php
				while($rw=mysqli_fetch_assoc($re))
				{
			?>
		<tr>
			<th class="text-center" width="8%">Bluetooth</th>
			<th class="text-center" width="10%">Back Camera</th>
			<th class="text-center" width="5%">Alloy Rims</th>
			<th class="text-center" width="5%">Sunroof/Moonroof</th>
			<th class="text-center" width="9%">Leatherette Seats</th>
			<th class="text-center" width="12%">Heated Front Seat</th>
			
		</tr>
		<tr>
			<td class="text-center">
				<?php echo $rw['kF_BTooth'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['kF_BCamera'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['kF_ARims'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['kF_SMroof'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['kF_LSeats'];?> 	
			</td>
			<td class="text-center">
				<?php echo $rw['kF_HFSeats'];?> 	
			</td>
			
		</tr>
		<tr>
			<th class="text-center" colspan="2">Lane Departure Warning</th>
			<td class="text-capitalize" colspan="4"><?php echo $rw['kF_LDWarning'];?> </td>
		</tr>
		<tr>
			<th class="text-center" colspan="2">Keyless Entry</th>
			<td class="text-capitalize" colspan="4"><?php echo $rw['kF_KEntry'];?> </td>
		</tr>	
		<?php
				}
		?>
	</table>
</div>

