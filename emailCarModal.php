<?php
    include_once 'db_connect.php';
    $car_id=$_GET['id'];
    $sql="Select * from cars Inner Join dealer ON cars.DealerId=dealer.dealer_ID
    Inner join car_gallery on car_gallery.CarId=cars.car_ID
    where cars.car_ID='$car_id' AND cars.car_Status='Available' AND cars.car_AutoStatus='Active' 
    AND dealer.dealer_Status='Active' AND car_gallery.carGallery_Status='Available'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<style>
    #emailMe{
        border:1px solid #044cc4;
        border-radius: 15px;
        width:120px;
        height:28px;
        float:right;
        margin-right: 25px;
        background-color: #044cc4;
        color:white;
        font-weight: bold;
    }
</style>
<div class="modal fade" id="emailCar" tabindex="-1" role="dialog">
	<div class="modal-dialog" class="setDialogStyle" style="border-radius:25px;margin-top:3%;">
		<div class="modal-content" style="white;">
            <div class="modal-body" id="car_detail" style="margin-left:20px;height:auto; overflow:auto;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeModal"><i class="fa fa-times fa-1x closeModalIcon" style="color:#044cc4;"></i></span>
                </button>
                <div class="row">
                    <div class="col col-lg-4 col-xs-12">
                        <?php
                            $substr=substr($row['carGallery_Image'],0,3);
                            $link=$row['carGallery_Image'];
                            $newlink=substr($row['carGallery_Image'],3);
                            if($substr!='../')
                            {
                        ?>
                            <img src="<?php echo "Dashboard/".$link;?>" style="margin-left: -20px;" width="200px" height="120px">
                        <?php
                            }
                            else
                            {
                        ?>
                            <img src="<?php echo "Dashboard/".$newlink;?>" style="margin-left: -20px;" width="200px" height="120px">
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col col-lg-7 col-xs-12">
                        <div style="clear: both;"></div>
                        <div class="row" style="margin-top: -28px;margin-left:0px">
                            <h4><?php echo $row['car_Name'];?></h4>
                        </div>
                        <form method="POST" action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label>Email*</label>
                                        <input type="text" required style="height:28px;border-radius:2px;background-color:#f7f7f7;" autocomplete="off" name="getSubEmail" id="getSubEmail" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 8px;">
                                    <input type="checkbox" style="height: 12px;width:12px;margin-left:14px;display:inline-block" id="notifyMe" class="form-control" name="notifyMe">
                                    <p style="display: inline-block;font-size:12px">Notify Me with the latest car offers, advice and news!</>
                                </div>
                                <div class="row">
                                    <input type="submit" value="Email Me" name="emailMe" id="emailMe">
                                    <input type="hidden" id="car_id" name="car_id" value="<?php echo $row['car_ID'];?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['emailMe']))
    {
        $email=mysqli_real_escape_string($connect,$_POST['getSubEmail']);
        $msg=mysqli_real_escape_string($connect,$_POST['message']);

        $notify=mysqli_real_escape_string($connect,$_POST['notifyMe']);

        $dealer_id=mysqli_real_escape_string($connect,$_POST['dealer_id']);

        $sql_email="INSERT INTO emailCar (emailCar_Email, CarId) VALUES 
        ('$email','$car_id')";

        if(mysqli_query($connect, $sql_email))
        {
            $last_id = mysqli_insert_id($connect);
            if($last_id!='')
            {
                $sql_notify="INSERT INTO notifyforoffers (notifyOffer_Email, notifyOffer_Status) VALUES ('$email','$notify')";
                if(mysqli_query($connect,$sql_notify))
                {
                    header("location:view-car.php?id=".$row['car_ID']);
                }
                else
                {
                    header("location:view-car.php?id=".$row['car_ID']);
                }
            }
            else
            {
                header("location:view-car.php?id=".$row['car_ID']);
            }
        }
        else
        {
            header("location:view-car.php?id=".$row['car_ID']);
        }

    }
?>