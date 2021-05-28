<html>
<head>
    <title>Carrius - Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <style>
        #lookingForHr,#drivetainHr{
            width:390px;
            margin-top:-3px;
            align-content:center;
        }
        @media (max-width:575px){
            #lookingForHr{
                width:280px;
                margin-top:-3px;
                align-content:center;
            } 
            .drivetain{
                margin-left: 10%;
            }
            #drivetainHr{
                width:300px;
                margin-top:-3px;
                align-content:center;
            }
            #drivetainHeading{
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper" style="background-color: white;">
        <img src="resources/Hompage picture.jpg" width="100%">
        <div class="left-center">
            Shaping the <i>FUTURE</i><br>
            of car shopping<br>
            <i>FOREVER</i>...<br>
            <a href="#myCarStyle"><button class="headerBtn">What’s my car style?</button></a>
            
        </div>
        <br>
        <div style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="custom-padding">
                        <div class="browseType">
                            <h3><b>Browse by Car Type</b></h3>
                            <hr style="border: 2px solid #047cf3;width:170px;stroke: #047cf3; fill: #047cf3;margin-top:-3px;float:left;margin-left:14px">
                            <div class="browseByCar">
                                <span><img src="resources/car type/hatchback x.jpg"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Hatchback" class="noUnderline" style="color: grey;">Hatchback</a></p></span>
                                <span><img src="resources/car type/suv x.jpg" alt="SUV"> <p class="textBrowseCar"><a href="all-cars-model.php?type=SUV" class="noUnderline" style="color: grey;">SUV</a></p></span>
                                <span><img id="specificCarImg" src="resources/car type/Electric x.jpg"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Electric" class="noUnderline" style="color: grey;">Electric</a></p></span>
                                <span><img src="resources/car type/mini van x.jpg"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Minivan" class="noUnderline" style="color: grey;">Minivan</a></p></span>
                                <span><img src="resources/car type/pick up x.jpg"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Pickup" class="noUnderline" style="color: grey;">Pickup</a></p></span>
                                <span><img src="resources/car type/sedan x.jpg"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Sedan" class="noUnderline" style="color: grey;">Sedan</a></p></span>
                                <span><img src="resources/car type/jeep.png"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Jeep" class="noUnderline" style="color: grey;">Jeep</a></p></span>
                            
                                <span><img id="specificCarImgTwo" src="resources/car type/convertible x.jpg"> <p class="textBrowseCar"><a href="all-cars-model.php?type=Convertible" class="noUnderline" style="color: grey;">Convertible</a></p></span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br><br>
        <!-- Deleted
        <div class="jumbotron jumboo" style="margin-top: 10px;background-color:#F2F2F2">
            <div class="howItWorks">
                <div class="works">
                    <div class="worksContent">
                        <div class="firstWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <h3 style="font-weight:bold">How it Works</h3>
                            <hr style="border: 2px solid #047cf3;width:120px;stroke: #047cf3; fill: #047cf3;margin-top:-3px;float:left;margin-left:10px">
                            
                            <img src="resources/Updated Icons/Group-2x.png" style="margin-left: 20px;" alt="Car Rent" width="120px" height="120px">
                            <p style="font-size:11px;color:#135fd7;font-weight:bold;line-height:13px">*Drive Away your Car Shopping<br>
                                Stress in Three Simple Steps</p>
                                        
                        </div>
                        <div class="secondWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <img src="resources/Updated Icons/choose-right-car.png" alt="Car Rent">
                            <img src="resources/Updated Icons/right-arrow.png" alt="Car Rent">
                        </div>
                        <div class="thirdWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <img src="resources/Updated Icons/one-click-contact.png" alt="Video Conference">
                            
                        </div>
                        <div class="clearMe"></div>
                        <div class="fourthWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <img src="resources/Updated Icons/Online-Form.png" alt="Content">
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        -->
        <div class="container-fluid" style="margin-top: 10px;background-color:#F2F2F2;padding-top:15px;padding-bottom: 20px;">
            <div class="container">
                <div class="custom-padding markNewHeight">
                    <div class="row">
                        <div class="col col-lg-3 col-xs-6" style="padding-bottom: -10px;">
                            <h3><b>How it works?</b></h3>
                            <hr style="border: 2px solid #047cf3;width:125px;stroke: #047cf3; fill: #047cf3;margin-top:-10px;margin-left:10px">
                            <img src="resources/Updated Icons/Group-2x.png" class="marginMe" width="150px" height="120px">
                            <p style="font-size:11px;font-weight:bold;line-height:13px;margin-top:5px;">*Drive Away your Car Shopping<br>
                                Stress in Three Simple Steps</p>
                        </div>
                        <div class="col col-lg-3 col-xs-6" style="padding-bottom: -10px;">
                            <img src="resources/Updated Icons/car-rent@2x.png" style="align-content:center" class="marginMe" width="120px" height="100px">
                            <h4><b>Choose the right car</b></h4>
                            <p class="text-center" style="color:grey;font-size:14px;">
                                We provide a great sorting
                                system to easily choose from our
                                wide range of cars from location
                                based certified Dealerships.
                            </p>
                        </div>
                        <div class="col col-lg-3 col-xs-6" style="padding-bottom: -10px;">
                            <img src="resources/Updated Icons/video-conference@2x.png" class="marginMe" width="120px" height="100px">
                            <h4><b>One Click-contact</b></h4>
                            <p class="text-center" style="color:grey;font-size:14px;">
                                Once you got your car, we
                                connect you with a Salesman
                                within minutes using ANY devices.
                                NO APP needed, through carrius
                                Live Video Call Room. 
                            </p>
                        </div>
                        <div class="col col-lg-3 col-xs-6" style="padding-bottom: -10px;">
                            <img src="resources/Updated Icons/Group 1339@2x.png" class="marginMe" width="120px" height="100px">
                            <h4><b>Quick Online Form</b></h4>
                            <p class="text-center" style="color:grey;font-size:14px;">
                                If you have a deal, you just have
                                to fill in a simple contact sale
                                form and you will be few steps
                                away from driving your car home!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--What drivetrain fits your need-->
        <div style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="custom-padding">
                        <div class="browseType drivetain">
                            <h2 style="text-align: center;" id="drivetainHeading"><b>What Drivetrain fits your need?</b></h2>
                            <hr style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;" id="drivetainHr">
                            <div class="row">
                                <div class="col col-lg-3 col-xs-6">
                                    <span class="imgPortion">
                                        <img src="resources/Updated Icons/fwd.png" style="margin-bottom: 20px;">
                                    </span>
                                    <span class="imgSecPortion addNegMar">
                                        <h4><b>Front Wheel Drive</b></h4>
                                        <span class="alignText">
                                            <p class="colorGrey fontSize">Great Efficient Fuel</p>
                                            <p class="colorGrey fontSize">Light Snow/Rain</p>
                                            <p class="colorGrey fontSize">Good Traction</p>
                                            <p class="colorGrey fontSize">Easy to Control Car <br>(New Driver)</p>
                                        </span>
                                        
                                    </span>
                                    <span class="lowerBtn">
                                        <a style="text-decoration:none" target="_blank" href="all-cars-model.php?wheelDrive=fwd"><input type="button" value="Select FWD" id="selectFWD"></a>
                                    </span>
                                </div>
                                <div class="col col-lg-3 col-xs-6">
                                    <span class="imgPortion addMar">
                                        <img src="resources/Updated Icons/rwd.png" style="margin-bottom: 20px;">
                                    </span>
                                    <span class="imgSecPortion addNegMar">
                                        <h4><b>Rear Wheel Drive</b></h4>
                                        <span class="alignText">
                                            <p class="colorGrey fontSize">Fuel Efficient</p>
                                            <p class="colorGrey fontSize">Light Rain/Dry Climate</p>
                                            <p class="colorGrey fontSize">Average Traction</p>
                                            <p class="colorGrey fontSize">High Performance</p>
                                        </span>
                                        
                                    </span>
                                    <span class="lowerBtn addMar">
                                        <a style="text-decoration:none" target="_blank" href="all-cars-model.php?wheelDrive=rwd"><input type="button" value="Select RWD" id="selectRWD"></a>
                                    </span>
                                </div>
                                <div class="col col-lg-3 col-xs-6">
                                    <span class="imgPortion addMar">
                                        <img src="resources/Updated Icons/awd.png" style="margin-bottom: 20px;">
                                    </span>
                                    <span class="imgSecPortion addNegMar">
                                        <h4><b>All Wheel Drive</b></h4>
                                        <span class="alignText">
                                            <p class="colorGrey fontSize">Poor Fuel Efficient</p>
                                            <p class="colorGrey fontSize">Light Snow/Rain</p>
                                            <p class="colorGrey fontSize">Great Traction</p>
                                            <p class="colorGrey fontSize">Precide Balance</p>
                                        </span>
                                        
                                    </span>
                                    <span class="lowerBtn addMar">
                                        <a style="text-decoration:none" target="_blank"  href="all-cars-model.php?wheelDrive=awd"><input type="button" value="Select AWD" id="selectAWD"></a>
                                    </span>
                                </div>
                                <div class="col col-lg-3 col-xs-6">
                                    <span class="imgPortion addMar">
                                        <img src="resources/Updated Icons/4wd.png" style="margin-bottom: 20px;">
                                    </span>
                                    <span class="imgSecPortion addNegMar">
                                        <h4><b>Four Wheel Drive</b></h4>
                                        <span class="alignText">
                                            <p class="colorGrey fontSize">Poor Fuel Efficient</p>
                                            <p class="colorGrey fontSize">Off Road/Rough Terrain</p>
                                            <p class="colorGrey fontSize">Great Traction</p>
                                            <p class="colorGrey fontSize">2WD/4WD Selector</p>
                                        </span>
                                        
                                    </span>
                                    <span class="lowerBtn addMar">
                                        <a style="text-decoration:none" target="_blank" href="all-cars-model.php?wheelDrive=4wd"><input type="button" value="Select 4WD" id="selectFourWD"></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--What are you looking for?-->
        <div class="container-fluid" id="myCarStyle" style="background-color: #f7f7f7;">
            <div class="container">
                <div class="custom-padding markHeight">
                    <h2 style="text-align: center;" id="changeFontSize"><b>What are you looking for?</b></h2>
                    <hr style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;" id="lookingForHr">
                    <div class="row">
                        <span class="addPad">
                            <img src="resources/Updated Icons/Group 1367@2x.png" style="width:71px;height:100px;margin-left:30px">
                            <img src="resources/Updated Icons/Group 1368@2x.png" class="marginLeftImg" style="width:95px;height:100px;margin-left:33px">
                            <img src="resources/Updated Icons/Group 1369@2x.png" class="marginLeftImg" style="width:82px;height:100px;margin-left:33px">
                            <img src="resources/Updated Icons/Group 1370@2x.png" class="marginLeftImg" style="width:82px;height:100px;margin-left:33px">
                            <img src="resources/Updated Icons/Group 1371@2x.png" class="marginLeftImg" style="width:90px;height:100px;margin-left:33px">
                            <img src="resources/Updated Icons/Group 1372@2x.png" class="marginLeftImg" style="width:82px;height:100px;margin-left:33px">
                            <img src="resources/Updated Icons/Group 1373@2x.png" class="marginLeftImg" style="width:90px;height:100px;margin-left:33px">
                        </span>
                    </div> 
                </div>
            </div>
        </div>
        <!-- Are You -->
        <div class="container-fluid joining" style="color:white">
            <div class="row">
                <div class="col col-lg-6 col-sm-6 joinBuyer" style="background-color: #0087FF;">
                    <h3 class="leftHeading"><b>Are you a buyer?</b></h3>
                    <p class="leftPara">
                        Carrius offers a wide range of vehicles and a great sorting system,
                        you can browse our cars and you can communicate the way you
                        want to communicate with your local or a remote dealership. It has
                        alway been your choice!
                    </p>
                    <button class="btn leftPartBtn"><b>Browse cars</b></button>
                </div>
                <div class="col col-lg-6 col-sm-6 joinDealer" style="background-color: #004FC3;">
                    <h3 class="rightHeading"><b>Are you a dealer?</b></h3>
                    <p class="rightPara">
                        Carrius creates huge opportunities for dealership to step up and<br>
                        switch fast lane for generating more leads and we believe that the<br>
                        habits of car buyers are changing for good in the near future.
                    </p><br><br>
                    <a href="join-us.php" class="noUnderline"><button class="btn rightPartBtn"><b>JOIN US</b></button></a>
                </div>
            </div>
        </div>
        <div class="browseCarBrand" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="custom-padding">
                        <div class="">
                            <h3 style="text-align: center;margin-right:10px"><b>Browse by car brands</b></h3>
                            <hr style="border: 2px solid #047cf3;width:220px;stroke: #047cf3; fill: #047cf3;margin-top:-3px;align-content:center">
                            <div class="browseByCarBrand">
                                <dl class="browseCarDL">
                                    <?php
                                        require_once('db_connect.php');
                                        $sql = "SELECT* FROM cars_brand where carBrand_Status='Available' order by carBrand_Name asc";
                                        $counter=1;
                                        $result = mysqli_query($connect, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                        while($var=mysqli_fetch_array($result))
                                        { 	
                                        echo "
                                        <dd class='browseCarDD'><a class='carBrands noUnderline' style=text-decoration:none;' href='all-cars-model.php?brand=".$var['carBrand_Name']."'>".$var['carBrand_Name']."</a></dd>";
                                        }
                                        }
                                        else
                                        {
                                        echo "<h3 style='color:red'>No Car Brand Found</h3>";
                                        }
                                    ?>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End of Wrapper -->
    <div class="addBreak">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    
    <?php
        echo "<br><br><br><br><br>";
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script>
    $(document).ready(function(){
        
        $(document).on('click', '.headerBtn', function(e) {
            // target element id
            var id = $(this).attr('href');

            // target element
            var $id = $(id);
            if ($id.length === 0) {
                return;
            }

            // prevent standard hash navigation (avoid blinking in IE)
            e.preventDefault();

            // top position relative to the document
            var pos = $(id).offset().top - 10;

            // animated top scrolling
            $('body, html').animate({scrollTop: pos});
        });
    });
    </script>
</body>
</html>