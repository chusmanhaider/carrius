<div class="well">
  <div class="row">
<?php  
	if(isset($_POST["image_id"]))  
	{
		include("../db_connect.php");
		$curr_Id=$_POST['image_id'];
		$sql = "SELECT * FROM cars INNER JOIN car_gallery ON 
        car_gallery.CarId = cars.car_ID WHERE cars.car_Status!='Terminated' 
        AND car_gallery.carGallery_ID='$curr_Id'";
		$result = mysqli_query($connect, $sql); 
  }
    while($row=mysqli_fetch_assoc($result))
    { 
      $path=$row['carGallery_Image'];
      $substr=substr($path,0,3);

      $imgLink=substr($path,3);
      
?>
  
    
      <div class="col-md-12">
        <div class="thumbnail">
        <?php
          if($substr=='../')
          {
            
          ?>
          
            <a href="<?php echo $imgLink;?>">
              <img src="<?php echo $imgLink;?>" alt="<?php echo $row['carGallery_Caption'];?>" style="width:100%;height:320px;">
              <div class="caption">
                <p><?php echo $row['carGallery_Caption'];?></p>
              </div>
            </a>
          <?php
          }
          else
          {
            
          ?>
            <a href="<?php echo $row['carGallery_Image'];?>">
              <img src="<?php echo $row['carGallery_Image'];?>" alt="<?php echo $row['carGallery_Caption'];?>" style="width:100%;height:320px;">
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