<head>
	<style>
		.popover-content {
    white-space: wrap;
}

	</style>
	
</head>
<?php
session_start();
error_reporting(0);
include("../../db_connect.php");
$buyerUserProfile=$_SESSION['loggedInBuyerUser'];
if($buyerUserProfile==true){	
}
else{
	header('location:../Login.php');
}
$query="Select * from buyer where buyer_Username='$buyerUserProfile'";
$data=mysqli_query($connect,$query);
$result=mysqli_fetch_assoc($data);
$fullName=$result['buyer_FName']." ".$result['buyer_LName'];
$Id=$result['buyer_ID'];  
if(isset($_POST["brand_id"]))  
{
	$sql = "SELECT * FROM cars INNER JOIN cars_brand ON cars.CarBrandId = cars_brand.carBrand_ID WHERE 
    (cars.car_Status='Available' AND cars.car_AutoStatus='Active' AND cars_brand.carBrand_Status='Available') AND 
    cars_brand.carBrand_ID = '".$_POST["brand_id"]."'";
	$result = mysqli_query($connect, $sql);  
}
?>
<?php
$num=mysqli_num_rows($result);

if($num>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
?>
        <div class="col-md-4 col-sm-5">
            <div class="product-grid4" style="margin-top:10px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color:#91f191;">
                        <li class="breadcrumb-item active" aria-current="page"><?php echo "<b  style='color:black;text-align:center' class='text-capitalize'>".$row['carBrand_Name']."</b>";?></li>
                    </ol>
                </nav>
            <div class="product-content bg-info">
                                                <?php
                                                    $sql_gallery="Select * from car_gallery INNER JOIN cars ON car_gallery.CarId=cars.car_ID Where car_gallery.carGallery_Status='Available'";
                                                    $rew=mysqli_query($connect, $sql_gallery);
                                                    $line=mysqli_fetch_assoc($rew);
                                                    $path=$line['carGallery_Image'];
                                                    $substr=substr($path,0,3);
                                                    if($substr=='../')
                                                    {
                                                ?>
                                                <img src="<?php echo $line['carGallery_Image'] ?>" style="width:100%;height:120px;">
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <img src="<?php echo "../".$line['carGallery_Image'] ?>" style="width:100%;height:120px;">

                                                <?php
                                                    }
                                                ?>
                                                <h3 class="text-capitalize"><?php echo $row['car_Name'];?> <a href="Buyer.php"><i style="font-size: 1.7rem;cursor:pointer" class="fa fa-external-link fa-2x"></i></a></h3>
                                                <div class="">
                                                    <span>
                                                        <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>".$row['car_Year']."</span>";?></p>
                                                        <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'>".$row['car_NewUsed']."</span>";?></p>
                                                        <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'>".$row['car_Mileage']." Miles</span>";?></p>
                                                        <p class="infoSet">Dealer : <?php echo "<span style='font-weight:normal'>".$row['dealer_Dealership']."</span>";?></p>
                                                        <button  type="button" name="<?php echo $row['car_ID'];?>" class="btn btn-info contactDealer" id="<?php echo $row["dealer_ID"]; ?>">
															Contact Dealer
														</button>
                                                        <?php
                                                            $carId=$row['car_ID'];
                                                            $q_ry="Select * from fav_cars Where favCar_CarId='$carId' AND favCar_BuyerId='$Id'";
                                                            $re_qry=mysqli_query($connect, $q_ry);
                                                            $line_favCar=mysqli_fetch_assoc($re_qry);
                                                            $markFav=$line_favCar['favCar_MarkFav'];
                                                            $markStatus=$line_favCar['favCar_Status'];
                                                            if($markFav!="Yes" && $markStatus!="Marked")
                                                            {
                                                        ?>
                                                        <span>
                                                            <span role="button" name="<?php echo $row['car_ID'];?>" class="markFav" id="<?php echo $Id; ?>" type="button" style="margin-left: 5px;cursor:pointer"><i class="fa fa-heart fa-2x b_Id" id="<?php echo $Id;?>" data-toggle="tooltip" title="Mark Favourite"></i></span>
                                                        </span>
                                                        <?php
                                                            }
                                                            else
                                                            {
                                                        ?>
                                                        <span>
                                                            <span role="button" name="<?php echo $row['car_ID'];?>" class="unMarkFav" id="<?php echo $Id; ?>" type="button" style="margin-left: 5px;cursor:pointer"><i style="color:red" class="fa fa-heart fa-2x un_b_Id" id="<?php echo $Id;?>" data-toggle="tooltip" title="Unmark Favourite"></i></span>
                                                            
                                                        </span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </span>
                                                    
                                                </div>   
                                            </div>
                                        </div>
                                        
                                    </div>
</div>
<?php
    }
}
else
{
    echo "<br><span style='margin-top:20px;color:red;font-size:24px;text-align:center;margin-left:320px;'>No Car found for this specific brand</span>";
} 
?>
