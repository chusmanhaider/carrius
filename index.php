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
            <a href="what-car-style.php"><button class="headerBtn">What’s my car style?</button></a>
            
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
                                <span><img src="resources/car type/hatchback x.jpg"> <p class="textBrowseCar"><a href="search-car.php?type=Hatchback" class="noUnderline" style="color: grey;">Hatchback</a></p></span>
                                <span><img src="resources/car type/convertible x.jpg"> <p class="textBrowseCar">Convertible</p></span>
                                <span><img src="resources/car type/Electric x.jpg"> <p class="textBrowseCar">Electric</p></span>
                                <span><img src="resources/car type/mini van x.jpg"> <p class="textBrowseCar">Minivan</p></span>
                                <span><img src="resources/car type/pick up x.jpg"> <p class="textBrowseCar">Pickup</p></span>
                                <span><img src="resources/car type/sedan x.jpg"> <p class="textBrowseCar">Sedan</p></span>
                                <span><img src="resources/car type/suv x.jpg" alt="SUV"> <p class="textBrowseCar">SUV</p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br><br>
        <div class="jumbotron jumboo" style="margin-top: 10px;background-color:#F2F2F2">
            <div class="howItWorks">
                <div class="works">
                    <div class="worksContent">
                        <div class="firstWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <h3 style="font-weight:bold">How it Works</h3>
                            <img src="resources/Icons png/click.png" alt="Car Rent" width="120px" height="120px">
                            <p style="font-size:11px;color:#135fd7;font-weight:bold;line-height:13px">*Drive Away your Car Buying<br>
                                Stress in Three Simple Steps</p>
                                        
                        </div>
                        <div class="secondWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <h5 class="isBold">STEP 1</h5>
                            <p style="text-align: center"><img src="resources/Icons png/car-rent.png" alt="Car Rent" width="120px" height="120px"></p>
                            <ul id="ulList">
                                <li style="font-size:14px;color:#135fd7;font-weight:bold">Choose the Right car</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Wide range of cars</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Easy sorting system</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Location based Dealer</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Detailed car information</li>
                            </ul>
                        </div>
                        <div class="thirdWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <h5 class="isBold">STEP 2</h5>
                            <p style="text-align: center"><img src="resources/Icons png/video-conference.png" alt="Video Conference" width="120px" height="120px"></p>
                            <ul id="ulList">
                                <li style="font-size:14px;color:#135fd7;font-weight:bold">One-click Contact</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Connect by ANY device</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">NO APP needed</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Live Video Call</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Message Dealer easily</li>
                            </ul>
                        </div>
                        <div class="clearMe"></div>
                        <div class="fourthWorkContent col-lg-3 col-sm-5 col-xs-5">
                            <h5 class="isBold">STEP 3</h5>
                            <p style="text-align: center"><img src="resources/Icons png/content.png" alt="Content" width="120px" height="120px"></p>
                            <ul id="ulList">
                                <li style="font-size:14px;color:#135fd7;font-weight:bold">Quick Online Form</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Contact sale form</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Car evaluation report</li>
                                <li style="font-size:14px;"><img src="resources/Icons png/checked.png" class="isCheckedLogo">Information sent Securely.</li>
                            </ul>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <!--What are you looking for-->
        <div style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="custom-padding">
                        <div class="browseType">
                            <h2 style="text-align: center;"><b>What are you looking for?</b></h2>
                            <hr style="border: 2px solid #047cf3;width:220px;stroke: #047cf3; fill: #047cf3;margin-top:-3px;align-content:center">
                            <div class="browseByCar">
                                <span><img src="resources/car type/hatchback x.jpg"> <p class="textBrowseCar"><a href="search-car.php?type=Hatchback" class="noUnderline" style="color: grey;">Hatchback</a></p></span>
                                <span><img src="resources/car type/convertible x.jpg"> <p class="textBrowseCar">Convertible</p></span>
                                <span><img src="resources/car type/Electric x.jpg"> <p class="textBrowseCar">Electric</p></span>
                                <span><img src="resources/car type/mini van x.jpg"> <p class="textBrowseCar">Minivan</p></span>
                                <span><img src="resources/car type/pick up x.jpg"> <p class="textBrowseCar">Pickup</p></span>
                                <span><img src="resources/car type/sedan x.jpg"> <p class="textBrowseCar">Sedan</p></span>
                                <span><img src="resources/car type/suv x.jpg" alt="SUV"> <p class="textBrowseCar">SUV</p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Are You -->
        <div class="container-fluid joining" style="margin-top: 30px;color:white">
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
                    <a href="join.php" class="noUnderline"><button class="btn rightPartBtn"><b>JOIN US</b></button></a>
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
                                        <dd class='browseCarDD'><a class='carBrands noUnderline' style=text-decoration:none;' href='All Cars.php?brand=".$var['carBrand_Name']."'>".$var['carBrand_Name']."</a></dd>";
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
</body>
</html>