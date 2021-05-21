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
                        <form method="POST" action="sent_email.php">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label>Email*</label>
                                        <input type="email" required style="height:28px;border-radius:2px;background-color:#f7f7f7;" autocomplete="off" name="getSubEmail" id="getSubEmail" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row" style="margin-top: 8px;">
                                    <input type="checkbox" style="height: 12px;width:12px;margin-left:14px;display:inline-block" id="notifyMe" class="form-control" name="notifyMe">
                                    <p style="display: inline-block;font-size:12px">Notify Me with the latest car offers, advice and news!</p>
                                </div>
                                <div class="row custom-msg" style="margin-top: -2px;">
                                    <p style="display: inline-block;font-size:14px;color:red;margin-left:14px">Email length is too short</p>
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

<?php include_once 'emailCarMessage.php'; ?>
<?php
    if($_GET['msg'] == 'Success')
    { ?>
        <script>
            function redirect(){
                location= "view-car.php?id=<?php echo $_GET['id'];?>";
            }
                 $(function(){
                     $('#emailCarMsg').modal('show');
                     setTimeout(function() { redirect(); }, 10000);
                 });
        </script>
<?php         
    }
    else if($_GET['msgErr'] == 'Error')
    {
?>
        <script>
            function redirect(){
                location= "view-car.php?id=<?php echo $_GET['id'];?>";
            }
                 $(function(){
                     $('#emailCarMsgError').modal('show');
                     setTimeout(function() { redirect(); }, 10000);
                 });
        </script>

<?php
    }
?>
<script>
    $(document).ready(function(){
        $('#emailMe').attr('disabled',true);
        $('#emailMe').css({"background-color": "#8bb2f3", "border-color": "#8bb2f3"});
        $('.custom-msg').hide();
        
        $(document).on('click','#emailCarMsg',function(){
            location= "view-car.php?id=<?php echo $_GET['id'];?>";
        });
        $(document).on('click','#emailCarMsgErr',function(){
            location= "view-car.php?id=<?php echo $_GET['id'];?>";
        });

        $(document).on('blur','#getSubEmail',function(){
            var email=$('#getSubEmail').val();
            var emailTrimmed=email.replace(/ /g,'');
            var split_Str=emailTrimmed.split('@', 1)[0];
            var split_len=split_Str.length;
            if(split_len>=5)
            {
                $('#emailMe').attr('disabled',false);
                $('.custom-msg').hide();
                $('#emailMe').css({"background-color": "#044cc4", "border-color": "#044cc4"});

                /*
                $(document).on('click','#emailMe',function(){
                    //$('#btnSub').removeAttr("data-target","#viewNoModal");
                    var myInterval = setInterval(function () {
                    $('#emailMe').attr("data-target","#emailCarMsg");
                    $('#emailCarMsg').modal('show');
                },3000);

                    myInterval();
                    
                }); 
                */
            } 
            else
            {
                $('#emailMe').attr('disabled',true);
                $('.custom-msg').show();
                $('#emailMe').css({"background-color": "#8bb2f3", "border-color": "#8bb2f3"});
            }
        });
        
    });
</script>