<?php
    error_reporting();
    include_once 'db_connect.php';
    $car_id=$_GET['url'];
    $sql="Select * from cars Inner Join dealer ON cars.DealerId=dealer.dealer_ID
    Inner join car_gallery on car_gallery.CarId=cars.car_ID
    where cars.car_ID='$car_id' AND cars.car_Status='Available' AND cars.car_AutoStatus='Active' 
    AND dealer.dealer_Status='Active' AND car_gallery.carGallery_Status='Available'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);

?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <style>
        .markBorder{
            border:1px solid black;
            height: 65%;
        }
        .setMe{
            margin-top: 14px;
        }
        #msgDealer{
            color:white;
            background-color: #044cc4;
            width:255px;
            height:35px;
            margin-left: 25%;
            border-radius: 5px;
            border:1px solid #044cc4;
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<div class="modal fade" id="contactDealership" tabindex="-1" role="dialog">
	<div class="modal-dialog" class="setDialogStyle" style="border-radius:25px;width:55%;margin-top:2%;">
		<div class="modal-content" style="white;">
            <div class="modal-body" id="car_detail" style="margin-left:20px;height:auto; overflow:auto;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeModal"><i class="fa fa-times fa-1x closeModalIcon" style="color:#044cc4;"></i></span>
                </button>
                <span class="modalContainer">
                    <span class="row firstRow">
                            <span class="col col-lg-1 col-xs-1">
                                <span class=""><img src="resources/icon-modal.png" width="29px" height="29px"></span>
                            </span>
                            <span class="col col-lg-10 col-xs-12">
                                <p class="paraText">You will be contacted by either Email or Phone when the Dealership gets the message!</p>
                            </span>
                    </span>
                    <form action="contactDAction.php" method="POST">
                        <span class="row">
                            <span class="col col-lg-6 col-xs-12">
                                <div class="form-group">
                                    <div class="row setMe">
                                        <div class="col col-lg-12 col-xs-12">
                                            <label for="label" style="font-size: 14px;">Your Name*</label>
                                            <input type="text" placeholder="John Doe" maxlength="50" style="height: 30px; background-color:#f7f7f7;border-radius:3px" class="form-control" required id="yourName" name="yourName">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 24px;">
                                        <div class="col col-lg-12 col-xs-12">
                                            <label for="label" style="font-size: 14px;">Email*</label>
                                            <input type="text" placeholder="johndoe@gmail.com" maxlength="60" style="height: 30px; background-color:#f7f7f7;border-radius:3px" class="form-control" required id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 24px;">
                                        <div class="col col-lg-12 col-xs-12">
                                            <label for="label" style="font-size: 14px;">Phone Number*</label>
                                            <input type="text" placeholder="+129087657" maxlength="20" style="height: 30px; background-color:#f7f7f7;border-radius:3px" class="form-control cInput" required id="phoneNum" name="phoneNum">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 19px;">
                                        <div class="col col-lg-12 col-xs-12">
                                            <label for="label" style="font-size: 14px;">Message</label>
                                            <textarea class="form-control" placeholder="Type your message here..." style=" background-color:#f7f7f7;border-radius:3px" id="message" name="message" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </span>
                            <span class="col col-lg-6 col-xs-12 markBorder">
                                    <h5 style="color: grey;">Help us, Help you! (Optional)</h5>
                                    <p style="color:grey">
                                        Answer these questions and we should get back 
                                        to you with appropriate cars that will suit you!
                                    </p>
                                    <span>
                                        <label style="color:black;font-size:16px;margin-top:10px">1. What is your monthly budget for your car?</label>
                                        <input type="text" style="width:80%;margin-left:10%;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="E.g. $ 500, $ 625" class="form-control" name="monthlyBudget">
                                    </span>
                                    <span>
                                        <label style="color:black;font-size:16px;margin-top:20px">2. How many Passenger/Family Members you have?</label>
                                        <input type="number" style="width:80%;margin-left:10%;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="E.g. 7, 5" class="form-control" name="numFamilyMem">
                                    </span>
                                    <span>
                                        <label style="color:black;font-size:16px;margin-top:20px">3. What is weather condition in your area?</label>
                                        <input type="text" maxlength="60" style="width:80%;margin-left:10%;margin-bottom:17px;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="E.g. Heavy/Light Snow, Dry, Rainy..." class="form-control" name="weatherCond">
                                    </span>
                            </span>
                        </span>
                        <span class="row">
                            <input type="submit" value="Message Dealership" id="msgDealer" name="msgDealer">
                            <input type="hidden" id="dealer_id" name="dealer_id" value="<?php echo $row['dealer_ID'];?>">
                            <input type="hidden" id="car_id" name="car_id" value="<?php echo $row['car_ID'];?>">
                        </span>
                    </form>
                </span>	
            </div>
		</div>
	</div>
</div>
<!--Message Modal-->
<div class="modal fade" id="viewMessage" tabindex="-1" role="dialog">
	<div class="modal-dialog" style="border-radius:15px;margin-top:3%;">
			<div class="modal-content" style="background-color: #fcfcfc;">
				
				<div class="modal-body" id="car_detail" style="height:310px; overflow:auto;">
					<span style="background-color: #044cc4;width:70px;height:70px;position:absolute;border-radius:50%;top:50px;left:45%"><img src="resources/logo png.png" style="margin-top:6px;margin-left:9px" width="50px" height="50px"></span>
                    <img src="resources/carrius.png" style="fill:#044cc4;margin-top:120px;margin-left:180px" >
                    <span style="display: block;margin-top:10px;margin-left:130px">
                        <img src="resources/Bluetick.png"> <span style="font-size:14px;font-weight:bold;color:black">Your request has been successfully sent!</span><br>
                        <span style="font-size:14px;font-weight:bold;color:black;text-align:center">Hang tight while we get back to you soon!</span>
                    </span>
                    <button type="button" style="color:white;font-weight:bold;height:30px;background-color: #044cc4;width:85px;margin-top:25px;border:1px solid #044cc4;border-radius:20px;margin-left:240px" data-dismiss="modal">Got it!</button>
                </div>
			</div>
	</div>
</div>

<?php
    
    if(isset($_GET['msgR']) && $_GET['msgR'] == 'SuccessR')
    { ?>
        <script>
            function redirect(){
                location= "view-car.php?id=<?php echo $_GET['id'];?>";
            }
                 $(function(){
                     $('#viewMessage').modal('show');
                     setTimeout(function() { redirect(); }, 10000);
                 });
        </script>
<?php         
    }
    else if(isset ($_GET['msgErrR']) && $_GET['msgErrR'] == 'ErrorR')
    {
?>
        <script>
            function redirect(){
                location= "view-car.php?id=<?php echo $_GET['id'];?>";
            }
                 $(function(){
                     $('#viewMessageError').modal('show');
                     setTimeout(function() { redirect(); }, 10000);
                 });
        </script>

<?php
    }
    else
    {
        
    }

?>
<script src="Bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap/js/metisMenu.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="Bootstrap/js/startmin.js"></script>
