<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <style>
        .markBorder{
            border:1px solid grey;
            margin-top: 20px;
        }
        .setMe{
            margin-top: 16px;
        }
        #msgDealerBtn{
            color:white;
            background-color: #044cc4;
            width:255px;
            height:35px;
            margin-left: 25%;
            border-radius: 5px;
            border:1px solid #044cc4;
            margin-top: 10px;
        }
        .msgModalContainer{
            width: 90%;
            padding: 5% 5% 1% 10%;
        }
        #setArea{
            height: 10px;
            margin-top: 30px;
        }
        .upLiftRow{
            background-color: #f7f7f7;
            margin-left: -10px;
            padding-top: 0px;
            padding-bottom: 32px;
            height: 180px;
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
        .dealershipMsgD{
            margin-top: 40px;
        }
        .locationMsgD{
            margin-top: 20px;
            margin-left: 10px;
            margin-bottom: 10px;
        }
        .setFontSizeMsgDD{
            font-size:17px;
            margin-left: 7px;
        }
        .setFontSizeMsgDL{
            font-size:17px;
            margin-left: 10px;
        }
        .alignIconLoc{
            margin-left: -10px;
        }
        .addMarBot:after{
            margin-bottom: 3px;
        }
        .imgS{
            height:180px;
        }
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-calendar-picker-indicator {
            width:10px;
            height:10px;
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
                    <span class="row" style="margin-top: 15px;">
                        <span class="secondRow">
                            <span class="col col-lg-6 col-xs-12">
                                <span>
                                    <span class="imgSpan">
                                        <img src="resources/a.jpg" class="imgS" width="101.5%" height="auto">
                                    </span>
                                </span>
                            </span>
                            <span class="col col-lg-6 col-xs-12 upLiftRow">
                                <span class="row">
                                    <h3><b>Name</b></h3>
                                </span>
                                <span class="row addMarBot">
                                    <p style="margin-top:2px;margin-bottom:-4px;color:grey" class="infoSetUpper">Price:</p>
                                    <span class="priceAlign">
                                        <strong> <?php echo "<span style='font-size:25px;font-weight:bold;margin-bottom:20px;margin-top:-15px;margin-left:10px'>$ 750000</span>";?></strong>
                                    </span>
                                </span>
                                <span class="row">
                                    <span class="dealershipMsgD">
                                        <img src="resources/updated icons/user.png" width="16px" height="17px">
                                        <span class="setFontSizeMsgDD">Location</span>
                                    </span>
                                </span>
                                <span class="row">
                                    <span class="locationMsgD">
                                        <img src="resources/updated icons/location.png" class="alignIconLoc" width="12px" height="18px">
                                        <span class="setFontSizeMsgDL">Location</span>
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
                                        <div class="col col-lg-12 col-xs-16">
                                            <label for="label" style="font-size: 16px;">First Name*</label>
                                            <input type="text" placeholder="John Doe" maxlength="50" style="height: 30px; background-color:#f7f7f7;border-radius:3px" class="form-control" required id="yourName" name="yourName">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 16px;">
                                        <div class="col col-lg-12 col-xs-12">
                                            <label for="label" style="font-size: 16px;">Email*</label>
                                            <input type="text" placeholder="johndoe@gmail.com" maxlength="60" style="height: 30px; background-color:#f7f7f7;border-radius:3px" class="form-control" required id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 12px;">
                                        <div class="col col-lg-12 col-xs-12">
                                            <label for="label" style="font-size: 16px;">What is your Message about?</label>
                                            <textarea class="form-control" placeholder="Type your message here..." style=" background-color:#f7f7f7;border-radius:3px" id="message" name="message" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 4px;">
                                        <span class="col col-lg-12 col-xs-12">
                                            <input type="checkbox" style="height: 13px;width:13px;margin-left:4px;display:inline-block" id="notifyMe" class="form-control" name="notifyMe">
                                            <p style="display: inline-block;font-size:12px">Notify Me with the latest car offers, advice and news!</>
                                        </span>
                                    </div>
                                </div>
                            </span>
                            <span class="col col-lg-6 col-xs-12 markBorder">
                                    <h5 style="color: grey;">This is Optional:</h5>
                                    <span>
                                        <label>Interested in scheduling Live Video Call?</label><br>
                                        <input type="radio" style="height: 13px;width:13px;margin-left:10%" id="yesLiveVid" name="liveVideoCall"> Yes
                                        <input type="radio" style="height: 13px;width:13px;margin-left:20%" id="noLiveVid" name="liveVideoCall"> No
                                    </span>
                                    <span>
                                        <span class="row">
                                            <span class="col col-lg-6 col-xs-12">
                                                <label style="color:black;margin-top:8px;margin-left:-15px">Date*</label>
                                                <input type="date" style="width:100%;height: 30px; background-color:#f7f7f7;border-radius:3px" class="form-control" name="dateSetFor">
                                            </span>
                                            <span class="col col-lg-6 col-xs-12">
                                                <label style="color:black;margin-top:8px">Any Specific time</label>
                                                <input type="text" style="width:100%;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="Around 7am" class="form-control" name="specifcTime">
                                            </span>
                                        </span>
                                    </span>
                                    <span>
                                        <span style="display:inline-block;margin-top:10px">
                                            <input type="radio" style="width: 13px;height:13px;display:inline-block" class="form-control" id="phoneCallRadio" name="phoneCallRadio"><label style="display: inline-block;">&nbsp;&nbsp;I would prefer a phone call</label><br>
                                        </span>
                                        <input type="text" style="width:80%;margin-left:10%;height: 30px; background-color:#f7f7f7;border-radius:3px" placeholder="+19292000299" maxlength="20" class="form-control" name="phoneNumber">
                                    </span>
                                    <span>
                                        <label style="color:black;margin-top:18px">What is your ZIP code?</label>
                                        <input type="text" style="width:45%;margin-left:10%;margin-bottom:17px;height: 30px; background-color:#f7f7f7;border-radius:3px" maxlength="22" placeholder="M3J1K7" class="form-control" name="zipCode">
                                    </span>
                            </span>
                        </span>
                        <span class="row">
                            <input type="submit" value="Message Dealership" id="msgDealerBtn" name="msgDealerBtn">
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