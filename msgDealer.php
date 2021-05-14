<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <style>
        .markBorder{
            border:3px solid #f7f7f7;
        }
        .setMe{
            margin-top: 14px;
        }
        #msgDealerBtn{
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
        .msgModalContainer{
            width: 90%;
            padding: 5% 5% 5% 10%;
        }
        #setArea{
            height: 10px;
            margin-top: 30px;
        }
        .upLiftRow{
            background-color: #f7f7f7;
            margin-left: -10px;
            padding-top: 10px;
        }
        .paraText{
            background-color:#f7f7f7;
            height:29px;
            line-height: 30px;
            width: 117%;
            margin-left: -29px;
            padding-left:10px;
            font-size:14px;
            display: inline-block;
        }
        .firstERow{
            margin-bottom: 200px;
        }
        .secondRow{
            margin-bottom: 20px;
        }
        .dealership{
            margin-top: 10px;
        }
        .location{
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<div class="modal fade" id="msgDealerModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" class="setDialogStyle" style="border-radius:25px;width:55%;margin-top:2%;">
		<div class="modal-content" style="white;">
            <div class="modal-body" id="car_detail" style="margin-left:20px;height:auto; overflow:auto;">
				<button type="button" style="margin-bottom: 30px;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeModal"><i class="fa fa-times fa-1x closeModalIcon" style="color:#044cc4;"></i></span>
                </button>
                <span class="msgModalContainer">
                    <span class="row firstERow">
                        <span class="col col-lg-1 col-xs-1">
                            <span class=""><img src="resources/icon-modal.png" width="29px" height="29px"></span>
                        </span>
                        <span class="col col-lg-10 col-xs-12">
                            <p class="paraText">You will be contacted by either Email or Phone when the Dealership gets the message!</p>
                        </span>
                    </span>
                    <span class="row">
                        <span class="secondRow">
                            <span class="col col-lg-6 col-xs-12">
                                <span>
                                    <span>
                                        <img src="resources/a.jpg" width="101.5%" height="auto">
                                    </span>
                                </span>
                            </span>
                            <span class="col col-lg-6 col-xs-12 upLiftRow">
                                <span class="row">
                                    <h3>Name</h3>
                                </span>
                                <span class="row">
                                    <p style="margin-top:5px;margin-bottom:-4px;color:grey" class="infoSetUpper">Price:</p>
                                    <span class="priceAlign">
                                        <strong> <?php echo "<span style='font-size:25px;font-weight:bold;margin-top:-15px'>$ 750000</span>";?></strong>
                                    </span>
                                </span>
                                <span class="row">
                                    <span class="dealership">
                                        <img src="resources/updated icons/user.png" width="14px" height="15px">
                                        <span class="setFontSize">Location</span>
                                    </span>
                                </span>
                                <span class="row">
                                    <span class="location">
                                        <img src="resources/updated icons/location.png" width="12px" height="18px">
                                        <span class="setFontSize">Location</span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                    <form action="" method="POST">
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
                                            <div class="row" style="margin-top: 22px;">
                                                <div class="col col-lg-12 col-xs-12">
                                                    <label for="label" style="font-size: 14px;">Message</label>
                                                    <textarea class="form-control" placeholder="Type your message here..." style=" background-color:#f7f7f7;border-radius:3px" id="message" name="message" rows="5"></textarea>
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
                                        <label style="color:black;font-size:16px;margin-top:8px">1. What is your monthly budget for your car?</label>
                                        <input type="text" style="width:80%;margin-left:10%;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="E.g. $ 500, $ 625" class="form-control" name="monthlyBudget">
                                    </span>
                                    <span>
                                        <label style="color:black;font-size:16px;margin-top:18px">2. How many Passenger/Family Members you have?</label>
                                        <input type="text" style="width:80%;margin-left:10%;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="E.g. 7, 5" class="form-control" name="numFamilyMem">
                                    </span>
                                    <span>
                                        <label style="color:black;font-size:16px;margin-top:18px">3. What is weather condition in your area?</label>
                                        <input type="text" style="width:80%;margin-left:10%;margin-bottom:17px;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="E.g. Heavy/Light Snow, Dry, Rainy..." class="form-control" name="weatherCond">
                                    </span>
                            </span>
                        </span>
                        <span class="row">
                            <input type="submit" value="Message Dealership" id="Btn" name="msgDealerBtn">
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
<script src="Bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap/js/metisMenu.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="Bootstrap/js/startmin.js"></script>
<script>
    $(document).ready(function(){
        
        
    });
</script>