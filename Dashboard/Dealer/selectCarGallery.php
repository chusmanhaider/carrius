<div class="well">
  <div class="row">
<?php  
	if(isset($_POST["car_id"]))  
	{
		include("../db_connect.php");
		$curr_Id=$_POST['car_id'];
		$sql = "SELECT * FROM cars INNER JOIN car_gallery ON 
    car_gallery.CarId = cars.car_ID WHERE cars.car_Status!='Terminated' AND cars.car_ID='$curr_Id' AND (car_gallery.carGallery_Status != 'Terminated' AND car_gallery.carGallery_Status != 'Archived' AND car_gallery.carGallery_Status != 'Not Available')";
		$result = mysqli_query($connect, $sql); 
  }
    while($row=mysqli_fetch_assoc($result))
    { 
      $path=$row['carGallery_Image'];
      $substr=substr($path,0,3);
?>
  
    
      <div class="col-md-4">
        <div class="thumbnail">
        <?php
        if($substr=='../')
        {
        ?>
          <a href="<?php echo $row['carGallery_Image'];?>">
            <img src="<?php echo $row['carGallery_Image'];?>" alt="<?php echo $row['carGallery_Caption'];?>" style="width:100%;height:180px;">
            <div class="caption">
              <p><?php echo $row['carGallery_Caption'];?></p>
            </div>
          </a>
        <?php
        }
        else
        {
        ?>
          <a href="<?php echo "../".$row['carGallery_Image'];?>">
            <img src="<?php echo "../".$row['carGallery_Image'];?>" alt="<?php echo $row['carGallery_Caption'];?>" style="width:100%;height:180px;">
            <div class="caption">
              <p><?php echo $row['carGallery_Caption'];?></p>
            </div>
          </a>
        <?php
        }
        ?>
        </div>
      </div>
 
    
	

<?php
    }
  
?>
</div>
</div>