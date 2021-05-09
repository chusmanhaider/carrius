<html>
    <title>Carrius - Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <link href="css/contact-us.css" rel="stylesheet">
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper">
        <div class="container-fluid" style="background-color: white;">
            <div class="innerBlock">
                <h2 class="text-center alignHeading"><b>Connect with us on...</b></h2>
                <hr class="hrUnderStyle" style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-3px;">
                <p class="text-center alignCenter" style="color:#999999;max-width:520px;font-weight:bold">
                    Having a question? We would love to hear from you
                </p>
            </div>
        
        </div>
        <div class="container-fluid">
            <div class="col col-lg-5 setMyHeight" style="background-color: #044cc4;margin-left:-15px;">
                <div class="leftPart">
                    <img src="resources/logo png.png" style="margin-top:30px" class="leftContent" width="70px" height="60px"><br>
                    <img src="resources/text png.png" class="leftContent" width="210px" height="70px">
                    <p style="font-size:10px;margin-right:40px;margin-left:40px;color:white;margin-top:20px;">
                        At carrius we reinvent the way you browse and connect
                        with dealerships to find the car that suits you. Our platform
                        is designed with latest technologies, mainly a one-click
                        live video calling that connects you with the salespeople
                        which allow virtual walktarounds of your desired car and
                        answers to arising questions.
                    </p>
                </div>
                
            </div>
            <div class="col col-lg-7" style="background-color: ;">
                <div class="rightPart">
                   <form method="POST" action="Insert-Data/contactus.php">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-10">
                                        <label for="formLabel" class="control-label">Your Name * </label>
                                        <input type="text" name="yourname" id="yourname" class="form-control" required placeholder="John Doe">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-10">
                                        <label for="formLabel" class="control-label">Email * </label>
                                        <input type="text" name="cu_email" id="cu_email" class="form-control" required placeholder="John@gmail.com">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-10">
                                        <label for="formLabel" class="control-label">Phone Number * </label>
                                        <input type="text" name="cu_phone" id="cu_phone" class="form-control" required placeholder="+16475557865">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-10">
                                        <label for="formLabel" class="control-label">Dealership * </label>
                                        <input type="text" name="cu_dealership" id="cu_dealership" class="form-control" required placeholder="XY Dealership Ltd">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-10">
                                        <label for="formLabel" class="control-label">Topic * </label>
                                        <input type="text" name="cu_topic" id="cu_topic" class="form-control" required placeholder="Topic">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-8">
                                <div class="form-group">
                                    <span class="col col-sm-12">
                                        <label for="formLabel" class="control-label">Message * </label>
                                        <textarea class="form-control" rows="7" name="cu_message" required id="cu_message"></textarea>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-8">
                                <div class="form-group">
                                    <span class="col col-sm-12">
                                        <button class="btnSubmit" data-toggle="modal" data-target="#viewModal" name="btnSubmit" type="submit">Submit</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                   </form> 
                </div>
            </div>
        </div>
        <span class="col col-lg-12 col-xs-12" style="margin-bottom: 30px;">
            <!--<a href="index.php"><button class="goHomePageBtn">Return to Homepage</button></a>-->
            <button class="goHomePageBtn" data-toggle="modal" data-target="#viewCarModal">Modal</button>
        </span>
        
    </div> <!-- End of Wrapper-->
    <!--Message Modal-->
    <div class="modal fade" id="viewCarModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="border-radius:15px;margin-top:3%;">
			<div class="modal-content" style="background-color: #fcfcfc;">
				
				<div class="modal-body" id="car_detail" style="height:310px; overflow:auto;">
					<span style="background-color: #044cc4;width:70px;height:70px;position:absolute;border-radius:50%;top:50px;left:45%"><img src="resources/logo png.png" style="margin-top:6px;margin-left:9px" width="50px" height="50px"></span>
                    <img src="resources/carrius.png" style="fill:#044cc4;margin-top:120px;margin-left:180px" >
                    <span style="display: block;margin-top:10px;margin-left:130px">
                        <i class=""></i> <span style="font-size:14px;font-weight:bold;color:black">Your request has been successfully sent!</span><br>
                        <span style="font-size:14px;font-weight:bold;color:black;text-align:center">Hang tight while we get back to you soon!</span>
                    </span>
                    <button type="button" style="color:white;font-weight:bold;height:30px;background-color: #044cc4;width:85px;margin-top:25px;border:1px solid #044cc4;border-radius:20px;margin-left:240px" data-dismiss="modal">Got it!</button>
                </div>
			</div>
		</div>
	</div>
    <?php
        echo "<br><br><br><br><br><br><br>";
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
</body>
</html>