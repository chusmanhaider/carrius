<head>
<style>
.thisOne{
	color:red;
}
</style>
</head>
<?php  
	include("../db_connect.php");
	$sql = "SELECT * FROM cars_brand INNER JOIN cars ON cars_brand.carBrand_ID = cars.CarBrandId
	INNER JOIN dealer ON cars.DealerId=dealer.dealer_ID 
	WHERE cars.car_Status='Terminated' ORDER BY cars.car_Name ASC";
	
	//$query='SELECT * FROM cars INNER JOIN cars_brand ON cars_brand.carBrand_ID = cars.CarBrandId';
	//$query='Select * from cars Inner Join cars_brand on cars.CarBrandId=cars_brand.carBrand_ID order by cars.carBrand_Name asc';
	//$query="select * from cars";
	//echo $query;
	$result = mysqli_query($connect, $sql);
	
	//echo $result[0]; 
?>
<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="text-capitalize text-center thisOne" style="width:2%">#</th>
				<th class="text-capitalize text-center thisOne">Name</th>
				<th class="text-capitalize text-center thisOne">Brand</th>
				<th class="text-capitalize text-center thisOne">Year</th>
				<th class="text-capitalize text-center thisOne">Condition</th>
				<th class="text-capitalize text-center thisOne">Dealer</th>
				<th class="text-capitalize text-center thisOne">Location</th>
				<th class="text-capitalize text-center thisOne">Price</th>
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
				<td class="text-capitalize text-center"><?php echo $counter;?></td>
				<td class="text-capitalize text-center"><?php echo $row["car_Name"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["carBrand_Name"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["car_Year"]?></td>
				<td class="text-capitalize text-center"><?php echo $row["car_NewUsed"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["dealer_Dealership"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["dealer_Location"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["car_Price"]. " $";?></td>
				<td class="text-capitalize text-center">
				<?php 
				echo "<small style='font-size:12px;color:grey'><i>".$row["car_tStamp"]."</i></small>";
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


