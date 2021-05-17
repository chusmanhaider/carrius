<head>
<style>
.thisOne{
	color:red;
}
</style>
</head>
<?php  
	include("../db_connect.php");
    $qw="SELECT * FROM contactus INNER JOIN contactus_reply ON 
    contactus_reply.contactusId=contactus.contact_ID Where contactus.contact_reply_flag = '-2'";
   
	
	//$query='SELECT * FROM cars INNER JOIN cars_brand ON cars_brand.carBrand_ID = cars.CarBrandId';
	//$query='Select * from cars Inner Join cars_brand on cars.CarBrandId=cars_brand.carBrand_ID order by cars.carBrand_Name asc';
	//$query="select * from cars";
	//echo $query;
	$result = mysqli_query($connect, $qw);
	
	//echo $result[0]; 
?>
<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="text-capitalize text-center thisOne" style="width:2%">#</th>
				<th class="text-capitalize text-center thisOne">Name</th>
				<th class="text-capitalize text-center thisOne">Email</th>
				<th class="text-capitalize text-center thisOne">Dealership</th>
				<th class="text-capitalize text-center thisOne">Topic</th>
				<th class="text-capitalize text-center thisOne">Message</th>
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
				<td class="text-capitalize text-center"><?php echo $row["contact_name"];?></td>
				<td class="text-center"><?php echo $row["contact_email"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["contact_dealership"]?></td>
				<td class="text-capitalize text-center"><?php echo $row["contact_topic"];?></td>
				<td class="text-capitalize text-center"><?php echo $row["contact_message"];?></td>
				<td class="text-capitalize text-center">
				<?php 
                $time=$row['contact_tStamp'];
				$date = date("d-M-Y g:i A", strtotime($time));
				echo "<small style='font-size:12px;color:grey'><i>".$date."</i></small>";
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


