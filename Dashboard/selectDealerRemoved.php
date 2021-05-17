<head>
<style>
.thisOne{
	color:red;
}
.shorten_text{
    overflow: hidden;
	white-space: nowrap;
	max-width: 80px;
	text-overflow: ellipsis;
}
</style>
</head>
<?php  
	include("../db_connect.php");
	$sql="Select * from dealer where dealer_Status='Terminated'";
	$result = mysqli_query($connect, $sql);
	
	//echo $result[0]; 
?>
<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="text-capitalize text-center thisOne">Full Name</th>
				<th class="text-capitalize text-center shorten_text thisOne">Dealership</th>
				<th class="text-capitalize text-center thisOne">Type</th>
				<th class="text-capitalize text-center shorten_text thisOne">Location</th>
				<th class="text-capitalize text-center thisOne">Agents</th>
				<th class="text-capitalize text-center thisOne">Email</th>
                <th class="text-capitalize text-center thisOne">Cell</th>
				<th class="text-capitalize text-center thisOne" style="width:12%">Terminated On</th>
			</tr>
			<?php
			if(mysqli_num_rows($result) > 0)
			{
				$counter=1;
				while($row=mysqli_fetch_assoc($result))
				{
			?>
			
			<tr>
				<td class="text-capitalize text-center"><?php echo $row["dealer_FName"]." ".$row["dealer_LName"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["dealer_Dealership"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["dealer_Type"]?></td>
				<td class="text-capitalize text-center"><?php echo $row["dealer_Location"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["dealer_NumAgent"];?></td>
				<td class="text-center"><?php echo $row["dealer_Email"];?></td>
				<td class="text-center"><?php echo $row["dealer_CellNumber"];?></td>
				<td class="text-capitalize text-center">
				<?php 
				echo "<small style='font-size:11px;color:grey'><i>".$row["dealer_tStamp"]."</i></small>";
				?>
				</td>
			</tr>
			<?php
				$counter++;
				}
			}
			?>
		</table>
	</div>


