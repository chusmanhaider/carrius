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
	$sql="Select * from buyer where buyer_Status='Terminated'";
	$result = mysqli_query($connect, $sql);
	
	//echo $result[0]; 
?>
<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="text-capitalize text-center thisOne">Full Name</th>
				<th class="text-capitalize text-center shorten_text thisOne" style="width:15%">Address</th>
				<th class="text-capitalize text-center thisOne">City</th>
				<th class="text-capitalize text-center shorten_text thisOne">Username</th>
				<th class="text-capitalize text-center thisOne" style="width:15%">Email</th>
                <th class="text-capitalize text-center thisOne" style="width:12%">Cell</th>
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
				<td class="text-capitalize text-center"><?php echo $row["buyer_FName"]." ".$row["buyer_LName"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["buyer_Address"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["buyer_City"]?></td>
				<td class="text-capitalize text-center"><?php echo $row["buyer_Username"];?></td>
				<td class="text-center"><?php echo $row["buyer_Email"];?></td>
				<td class="text-center"><?php echo $row["buyer_CellNumber"];?></td>
				<td class="text-capitalize text-center">
				<?php 
				echo "<small style='font-size:11px;color:grey'><i>".$row["buyer_tStamp"]."</i></small>";
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


