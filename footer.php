<html>
<head>
    <title>Carrius - View Dealership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
	<link href="css/myCSS.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <style>
        .textWhite,.textWhite:hover{
            color: white;
        } 
        .noUnderLine,.noUnderLine:hover{
            text-decoration: none;
        }
        .marginBottom{
            margin-bottom: 6px;
        }
        .flexDir{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 86%;
            
        }
        .linkDiv{
            display: flex;
            flex-direction: column;
            justify-self: flex-start;
           
        }
        .linkContent{
            margin-bottom: 4px;
            clear: both;
            margin-left: 0px;
            font-size: 11px;
        }
        .alignContent{
            margin-left: 43px;
        }
        .btnSubscription{
            background-color: #0483fb;
            border-color: #0483fb;
            border-radius: 5px;
            width: 70px;
            font-weight: bold;
            
        }
        #email_sub:focus{
            box-shadow: 0 0 5px rgba(81, 203, 238, 1);
            
            border: 1px solid red;
        }
        .addSpace{
            display: none;
        }
        .allRight{
            margin-left: 30%;
        }
        .termsUse{
            margin-left: 10%;
        }
        .hrStyle{
            width:99.5%;
        }
        @media (max-width:48em) {
            .hrStyle{
                width:99%;
            }
        }
        /*md (for small laptops - screens equal to or greater than 992px wide)*/
        @media (min-width:992px) and (max-width:1199px){
            #bottomLink{
                margin-right: 60px;
                margin-top:10px;
            }
            .clearMeNo
            {
                display: none;
            }
            .clearMeOK{
               clear: both;
            }
            .setAlign{
                margin-left: 80px;
            }
            .setAlignTwo{
                margin-left: 60px;
            }
            .setAlignQL{
                margin-left: 100px;
            }
            .setAlignRe{
                margin-left: 60px;
            }
        }
        /*sm (for tablets - screens equal to or greater than 768px wide)*/
        @media (min-width:768px) and (max-width:991px){
            #bottomLink{
                margin-right: 60px;
                margin-top:10px;
            }
            .clearMeNo
            {
                display: none;
            }
            .clearMeOK{
               clear: both;
            }
            .setAlign{
                margin-left: 10px;
            }
            .setAlignTwo{
                margin-left: 30px;
            }
        }
        /*xs (for phones - screens less than 768px wide)*/
        @media (min-width:576px) and (max-width:767px){
           
            /*lg (for laptops and desktops - screens equal to or greater than 1200px wide)*/ 
            #clearMe{
               clear: both;
            }
            .setAlignQL{
                margin-left: 60px;
            }
            .setAlignRe{
                margin-left: 60px;
            }
            .setAlign{
                margin-left: 60px;
            }
            .setAlignTwo{
                margin-left: 60px;
            }
            .addMargin{
                margin-left: 20px;
            }
            #bottomLink{
                margin-right: 230px;
            }
        }
        @media (max-width:575px)
        {
            #clearMe{
               clear: both;
            }
            .setAlign{
                margin-left: 40px;
            }
            .setAlignTwo{
                margin-left: 40px;
            }
            /*.setAlignRe{
                margin-left: 10;
            }
            .setAlignQL{
                margin-left: 10px;
            }
            */
            .addSpace{
                display: block;
            }
            #learnMore{
                display: none;
            }
            .alignMask{
                display: none;
            }
            .closeMe{
                margin-left: 4px;
            }
            
            #loginView{
                max-width: 0px;
                margin-left: -100px;
            }
            .termsUse{
                display: block;
                text-align: center;
            }
            #bottomLink{
                margin-top:20px;
            }            
            
        }
        .loginBtns{
            display: inline-block;
        }
        #loginView{
            min-width: 190px; 
        }
        footer{
            position: static;
            bottom: 0;
        }
        .linkContent a:visited{
            text-decoration: none;
            color:white;
        }
        .linkContent a:link{
            text-decoration: none;
            color:white;
        }
        .footerAlign{
            bottom: 0px;
            position: relative;
        }
    </style>
</head>
<body>
    
    <!-- Footer-->
    
    <footer class="bg-primary text-white text-lg-start footerAlign" style="background-color:#044cc4;margin-bottom:0px">
        <!-- Grid container -->
        
        <hr class="hrStyle" style="border: 2px solid #047cf3;background-color:#047cf3;height:4px;stroke: #047cf3; fill: #047cf3;margin-top:-8px;margin-bottom:10px">
                    
        <div class="container-fluid">
            <!--Grid row-->
            <div class="row" style="padding-top: 28px;">
                <!--
                    /*xs (for phones - screens less than 768px wide)*/
                    /*sm (for tablets - screens equal to or greater than 768px wide)*/
                    /*md (for small laptops - screens equal to or greater than 992px wide)*/
                    /*lg (for laptops and desktops - screens equal to or greater than 1200px wide)*/ 
                -->
                <!--Grid column for company-->
                <div class="col-lg-2 col-md-4 col-sm-5 col-10 mb-4 mb-md-0 text-center" style="margin-left: 32px;">
                    <img src="resources/logo png.png" width="60" height="50" style="margin-left:12px;position:static"><br>
                    <img src="resources/text png.png" width="95" height="35">
                    <p style="font-size:x-small">
                        At carrius we reinvent the way you browse and
                        connect with dealerships to find the car that
                        suits you. Our platform is designed with latest
                        technologies, mainly a one-click live video
                        calling that connects you with the salespeople
                        which allow virtual walkarounds of your desired
                        car and answers to arising questions.
                    </p>
                </div>
                <!--Grid column for Quick Links-->
                <div class="addSpace"><div class="col-xs-1"></div></div>
                <div class="col-lg-2 col-md-4 col-sm-3 col-xs-5 mb-4 mb-md-0 addMargin">
                    <h4 class="text-center">Quick Links</h4>
                    <hr style="border: 2px solid #047cf3;width:90px;stroke: #047cf3; fill: #047cf3;margin-top:-8px;margin-bottom:10px">
                    <div class="linkDiv alignContent setAlignQL">
                        <span class="linkContent">
                            <a href="all-cars-model.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Browse all cars</a>
                        </span>
                        <span class="linkContent">
                            <a href="used-cars.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Used cars</a>
                        </span>
                        <span class="linkContent">
                            <a href="new-cars.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> New cars</a>
                        </span>
                        <span class="linkContent">
                            <a href="electric-cars.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Electric cars</a>
                        </span>
                        <span class="linkContent">
                            <a href="favourite-cars.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Favourite cars</a>
                        </span>
                    </div>
                </div>
                <!--Grid column for Resources-->
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-5 mb-4 mb-md-0 addMargin">
                    <h4 class="text-center">Resources</h4>
                    <hr style="border: 2px solid #047cf3;width:85px;stroke: #047cf3; fill: #047cf3;margin-top:-8px;margin-bottom:10px">
                    <div class="linkDiv alignContent setAlignRe">
                        <span class="linkContent">
                            <a href="#!" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> What’s my car style</a>
                        </span>
                        <span class="linkContent">
                            <a href="#!" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Car dealer locator</a>
                        </span>
                        <span class="linkContent">
                            <a href="all-cars-model.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> All cars model</a>
                        </span>
                        <span class="linkContent">
                            <a href="COVID-19.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> COVID-19</a>
                        </span>
                    </div>
                </div>
                <div id="clearMe" class="clearMeOK"></div>
                <div class="addSpace"><div class="col-xs-1"></div></div>
                <!--Grid column for Join Us-->
                <div class="col-lg-1 col-md-3 col-sm-2 col-xs-5 mb-4 mb-md-0 addMargin">
                    <h4 class="text-center">Join Us</h4>
                    <hr style="border: 2px solid #047cf3;width:65px;stroke: #047cf3; fill: #047cf3;margin-top:-8px;margin-bottom:10px">
                    <div class="linkDiv setAlign">
                        <span class="linkContent">
                            <a href="join-us.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> As a dealer</a>
                        </span>
                        <span class="linkContent">
                            <a href="signup-member.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> As a member</a>
                        </span>
                    </div>
                </div>
                <!--Grid column for Carrius-->
                <div class="col-lg-1 col-md-3 col-sm-3 col-xs-5 mb-4 mb-md-0 addMargin">
                    <h4 class="text-center">Carrius.net</h4>
                    <hr style="border: 2px solid #047cf3;width:85px;stroke: #047cf3; fill: #047cf3;margin-top:-8px;margin-bottom:10px">
                    <div class="linkDiv setAlignTwo">
                        <span class="linkContent">
                            <a href="#!" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> About carrius</a>
                        </span>
                        <span class="linkContent">
                            <a href="our-services.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Our services</a>
                        </span>
                        <span class="linkContent">
                            <a href="contact-us.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Contact us</a>
                        </span>
                        <span class="linkContent">
                            <a href="faq.php" class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> FAQs</a>
                        </span>
                    </div>
                </div>
                <div id="clearMe" class="clearMeNo"></div>
                <div class="addSpace"><div class="col-xs-1"></div></div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-10 mb-4 mb-md-0 addMargin">
                    <h4 class="text-center">Subscription and Social media</h4>
                    <hr style="border: 2px solid #047cf3;width:235px;stroke: #047cf3; fill: #047cf3;margin-top:-8px;margin-bottom:10px">
                    <div class="linkDiv alignContent">
                        <span class="linkContent">
                            <a class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Email us at: info@carrius.net</a>
                        </span>
                        <span class="linkContent" style="margin-top: 10px;">
                            <a class="textWhite noUnderLine"><img src="resources/icons png/right-arrow.png" width="10px" height="8px"> Do you want to receive our latest cars offers, advice
                            and news?
                            </a>
                        </span>
                        <form method="POST" onsubmit="return false" id="subForm" enctype="multipart/form-data">
                            <input type="email" name="email_sub" required id="email_sub" style="color:black">
                            <input type="submit" data-toggle="modal" id="btnSub" name="btnSub" class="btnSubscription" value="Sign Up">
                            <br>
                            <small style="font-size: x-small;">By submitting you agree to our privacy policy.</small>
                        </form>
                        <div class="insertEmail"><?php include_once 'file.php';?></div>
                        <div>
                            <a href="https://www.facebook.com/carrius/" target="_blank" class="noUnderline">
                            <img src="resources/Icons png/facebook-app-logo.png" width="20" height="20">
                            </a>
                            <a href="https://www.facebook.com/carrius/" target="_blank" class="noUnderline" style="margin-left:10px">
                            <img src="resources/Icons png/youtube.png" width="20" height="20">
                            </a>
                        </div>
                    </div>
                </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
            <div class="row" id="bottomLink" style="font-size:12px;padding-bottom:10px">
                <span class="allRight">
                    <span class="copyrightD"><i class="fa fa-copyright text-center"></i>&nbsp;&nbsp;<?php echo date("Y");?> &nbsp;&nbsp;&nbsp;www.carrius.net &nbsp;&nbsp;&nbsp;&nbsp;   All rights reserved</span> 
                    <span class="termsUse">Terms of Use | Privacy Policy</span>
                </span>
            </div>
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
       
        <!-- Copyright -->
    </footer>
    <div class="modal fade" id="viewOKModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="border-radius:15px;margin-top:3%;">
            <div class="modal-content" style="background-color: #fcfcfc;">
                <div class="modal-body" id="car_detail" style="height:310px; overflow:auto;">
                    <span style="background-color: #044cc4;width:70px;height:70px;position:absolute;border-radius:50%;top:50px;left:45%"><img src="resources/logo png.png" style="margin-top:6px;margin-left:9px" width="50px" height="50px"></span>
                    <img src="resources/carrius.png" style="fill:#044cc4;margin-top:120px;margin-left:180px" >
                    <span style="display: block;margin-top:10px;margin-left:130px">
                                                    <img src="resources/Bluetick.png"> <span style="font-size:14px;font-weight:bold;color:black">Your have been successfully subscribed!</span><br>
                                                    <span style="font-size:14px;font-weight:bold;color:black;text-align:center">Hang tight while we let to you know about updates!</span>
                    </span>
                    <button type="button" style="color:white;font-weight:bold;height:30px;background-color: #044cc4;width:85px;margin-top:25px;border:1px solid #044cc4;border-radius:20px;margin-left:240px" data-dismiss="modal">Got it!</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewXModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="border-radius:15px;margin-top:3%;">
			<div class="modal-content" style="background-color: #fcfcfc;">
				
				<div class="modal-body" id="car_detail" style="height:310px; overflow:auto;">
					<span style="background-color: #044cc4;width:70px;height:70px;position:absolute;border-radius:50%;top:50px;left:45%"><img src="resources/logo png.png" style="margin-top:6px;margin-left:9px" width="50px" height="50px"></span>
                    <img src="resources/carrius.png" style="fill:#044cc4;margin-top:120px;margin-left:180px" >
                    <span style="display: block;margin-top:10px;margin-left:130px">
                    <i class="fa fa-info-circle fa-1x" style="color: red;"></i> <span style="font-size:14px;font-weight:bold;color:black">Invalid email format</span><br>
                    <i class="fa fa-repeat fa-1x" style="color: red;"></i>  <span style="font-size:14px;font-weight:bold;color:black;text-align:center">Try again with correct email address</span>
                    </span>
                    <button type="button" style="color:white;font-weight:bold;height:30px;background-color: #044cc4;width:85px;margin-top:25px;border:1px solid #044cc4;border-radius:20px;margin-left:240px" data-dismiss="modal">Got it!</button>
                </div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="viewXYModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="border-radius:15px;margin-top:3%;">
			<div class="modal-content" style="background-color: #fcfcfc;">
				
				<div class="modal-body" id="car_detail" style="height:310px; overflow:auto;">
					<span style="background-color: #044cc4;width:70px;height:70px;position:absolute;border-radius:50%;top:50px;left:45%"><img src="resources/logo png.png" style="margin-top:6px;margin-left:9px" width="50px" height="50px"></span>
                    <img src="resources/carrius.png" style="fill:#044cc4;margin-top:120px;margin-left:180px" >
                    <span style="display: block;margin-top:10px;margin-left:130px">
                    <i class="fa fa-info-circle fa-1x" style="color: red;"></i> <span style="font-size:14px;font-weight:bold;color:black">Short Email Length</span><br>
                    <i class="fa fa-repeat fa-1x" style="color: red;"></i>  <span style="font-size:14px;font-weight:bold;color:black;text-align:center">Try again with correct email address</span>
                    </span>
                    <button type="button" style="color:white;font-weight:bold;height:30px;background-color: #044cc4;width:85px;margin-top:25px;border:1px solid #044cc4;border-radius:20px;margin-left:240px" data-dismiss="modal">Got it!</button>
                </div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="viewNoModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="border-radius:15px;margin-top:3%;">
			<div class="modal-content" style="background-color: #fcfcfc;">
				
				<div class="modal-body" id="car_detail" style="height:310px; overflow:auto;">
					<span style="background-color: #044cc4;width:70px;height:70px;position:absolute;border-radius:50%;top:50px;left:45%"><img src="resources/logo png.png" style="margin-top:6px;margin-left:9px" width="50px" height="50px"></span>
                    <img src="resources/carrius.png" style="fill:#044cc4;margin-top:120px;margin-left:180px" >
                    <span style="display: block;margin-top:10px;margin-left:130px">
                    <i class="fa fa-info-circle fa-1x" style="color: red;"></i> <span style="font-size:14px;font-weight:bold;color:black">Your already have been subscribed with this email!</span><br>
                        <span style="font-size:14px;font-weight:bold;color:black;text-align:center">Hang tight while we let to you know about updates!</span>
                    </span>
                    <button type="button" style="color:white;font-weight:bold;height:30px;background-color: #044cc4;width:85px;margin-top:25px;border:1px solid #044cc4;border-radius:20px;margin-left:240px" data-dismiss="modal">Got it!</button>
                </div>
			</div>
		</div>
	</div>
    <!-- Script-->
    <script src="Bootstrap/js/jquery.min.js"></script>
	<script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            var myInterval = setInterval(function () {
                $('#btnSub').attr("data-target","#viewNoModal");
            },30000);

            function redirect(){
                location= $(location).attr('href');
            }
            

            $(document).on('click','#btnSub',function(e){
                //e.preventDefault();
                var email = $('#email_sub').val();
                var emailLen = email.length;
                var emailReg = /^([a-zA-Z0-9_\.\-\+]{6,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!emailReg.test(email))
				{
                    //alert("Email format is incorrect OR short length issue");
                    $('#btnSub').attr("data-target","#viewXModal");
                }
                else if(emailLen<12)
                {
                    //alert(")");
                    $('#btnSub').removeAttr("data-target","#viewXModal");
                    $('#btnSub').attr("data-target","#viewXYModal");   
                }
                else if(emailLen>11 && emailReg.test(email))
                {
                    $.ajax({
						url:"checkSubEmail.php",
						method:"POST",
						data:{email:email},
						success:function(data){
                            event.preventDefault();
                            //alert(data);
                            if(data==0)
                            {
                                $('#btnSub').removeAttr("data-target","#viewNoModal");
                                $('#btnSub').attr("data-target","#viewOKModal");
                                $('#subForm').removeAttr("onsubmit");
                                //redirect();

                                ///add some time delay for onsubmit
                            }
                            else
                            {
                                //$('.insertEmail').css('display,none');
                                //location.reload(false);
                                $('#btnSub').removeAttr("data-target","#viewOKModal");
                                $('#btnSub').attr("data-target","#viewNoModal");
                                
                                    redirect();
                                //$('#btnSub').removeAttr("data-target","#viewXModal");
                                //$('#btnSub').removeAttr("data-target","#viewXYModal");
                                //$('#btnSub').removeAttr("data-target","#viewOKModal");
                                
                               
                                //myInterval();
                            }
                        }
                    });
                }
                
                
            });

           

        });
    </script>
</body>
</html>