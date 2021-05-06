<html>
<head>
    <title>Carrius - Sign Up Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <link href="css/signupMember.css" rel="stylesheet">
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="iContainer">
                    <span class="col col-lg-2 topMargin">
                        <img src="resources/Icons Png/sign upp.png" width="260px" height="260px">
                    </span>
                    <span class="col col-lg-4 topMarginB">
                        <h1 class="text-uppercase text-center  marginLeft" style="color:#044cc4;font-weight:bold">Let's  Get on Board</h1>
                        <span class="col col-lg-12" style="margin-left: 98px;width:106%">
                            <p style="font-size:14px;color:#999999;">Joining us as a memeber will provide you with full access of all the feature of <b>carrius</b>:</p>
                            <p style="font-size:14px;color:#999999;margin-top:-10px">- notify you with the Latest Great Offers</p>
                            <p style="font-size:14px;color:#999999;margin-top:-10px">- Car Advices from Dealership</p>
                            <p style="font-size:14px;color:#999999;margin-top:-10px">- Save Your Favourite List</p>
                        </span>
                    </span>
                    <span class="col col-lg-1"></span>
                    <span class="col col-lg-4 alignMe boxSet">
                        <div class="thisbox">
                            <h4 class="text-center createAccHead"><b>Create an Account</b></h4>
                            <h4 class="text-center memeberSignInHead"><b>Member Sign In</b></h4>
                            <span class="form-group" id="signUpGrp">
                                <form method="POST" action="" id="signUpForm">
                                    <div class="col col-lg-11 col-xs-12">
                                        <input type="text" id="memberName" name="memberName" style="height: 25px;" class="form-control setMarginForm" placeholder="John Doe">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="text" id="" name="" style="height: 25px;" class="form-control setMarginForm" placeholder="johndoe@gmail.com">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="password" id="" name="" style="height: 25px;" class="form-control setMarginForm" placeholder="Password">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="password" id="" name="" style="height: 25px;" class="form-control setMarginForm" placeholder="Repeat Password">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="submit" class="setMarginForm" style="" id="signUpBtn" name="signUpBtn"  value="Sign Up">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12">
                                        <small class="setMarginForm">By submitting you agree to our Terms of services and Privacy Policy</small>
                                    </div>
                                    <div class="col col-lg-11 col-xs-12">
                                        <div class="hr-sect setMarginForm"> or </div>
                                    </div>
                                </form>
                                    <div class="col col-lg-11 col-xs-12">
                                        <input type="button" class="setMarginForm" id="signInBtnDummy" name="signInBtnDummy"  value="Sign In">
                                   </div>
                            </span>
                            <span class="form-group" id="signInGrp">
                                <form method="POST" action="" id="signInForm">
                                    <div class="col col-lg-11 col-xs-12">
                                        <input type="text" id="user_email" name="user_email" style="height: 25px;" required class="form-control setMarginForm" placeholder="Enter your email">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="text" id="user_pass" name="user_pass" style="height: 25px;" required class="form-control setMarginForm" placeholder="Enter your password">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="password" id="" name="" style="height: 25px;" class="form-control setMarginForm" placeholder="Password">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12 addTopMargin">
                                        <input type="submit" class="setMarginForm" style="" id="signInBtn" name="signInBtn"  value="Sign In">
                                    </div>
                                    <div class="col col-lg-11 col-xs-12">
                                        <div class="hr-sect setMarginForm"> or </div>
                                    </div>
                                </form>
                                    <div class="col col-lg-11 col-xs-12">
                                        <input type="button" class="setMarginForm" id="signUpBtnDummy" name="signUpBtnDummy"  value="Sign Up">
                                   </div>
                            </span>
                        </div>
                    </span>
                </div>
                
            </div>
        </div>
        <div class="" style="background-color:white">
            <div class="container">
                <div class="innerBlock">
                    <h3 class="text-center alignHeading"><b>You might be interested in</b></h3>
                    <hr class="hrUnderStyle" style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-3px;">
                    <span class="usedCarDetail">
                        <span class="row">
                            <?php
                                include('db_connect.php');
                                $sql="Select * from cars INNER JOIN dealer ON dealer.dealer_ID=cars.DealerId where cars.car_NewUsed='New' AND cars.car_Status='Available' AND cars.car_AutoStatus!='Pending'";
                                $result=mysqli_query($connect,$sql);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $car_id=$row['car_ID'];
                                        $t="Select * from car_gallery where CarId='$car_id' LIMIT 1";
                                        $res=mysqli_query($connect, $t);
                                        while($rw=mysqli_fetch_assoc($res))
                                        {
                            ?>
                            <span class="col col-lg-4 col-xs-8 eachBlock">
                                <i class="fa fa-heart fa-lg styleFavIcon"><img src="<?php echo $rw['carGallery_Image'];?>" alt="<?php echo $rw['carGallery_Caption'];?>" width="260px" height="150px">
                                <h4><?php echo $row['car_Name'];?></h4>
                                <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>".$row['car_Year']."</span>";?></p>
                                <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'>".$row['car_NewUsed']."</span>";?></p>
                                <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'>".$row['car_Mileage']."</span>";?></p>
                                <p>
                                    <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'>".$row['dealer_Dealership']."</span>";?></span>
                                </p>
                                <p>
                                    <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'>".$row['dealer_Location']."</span>";?></span>
                                </p>
                                <p class="infoSet">Price:</p>
                                <span style="display:inline-block">
                                    <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'>$ ".$row['car_Price']."</span>";?></strong>
                                    <a class="noUnderline" style="color:white" href="viewCar.php?id=<?php echo $row['car_ID'];?>"><button class="viewCarBtn">View the car</button></a>
                                </span>
                                <hr style="border: 3px solid #5d95ef;width:140px;stroke: #5d95ef; fill: #5d95ef;margin-top:12px;margin-bottom:10px">
                            </span>
                            <?php
                                        }
                                    }
                                }
                                else
                                {
                                    echo "<h3 style='' id='noCarFound'> No new car found..</h3>";
                                }
                            ?>
                        </span>
                    </span>   
                </div>
            </div>
        </div>
    </div><!-- End of Wrapper-->
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
            $('.memeberSignInHead').hide();
            $('#signInGrp').hide();
            
            $('#signInBtnDummy').on('click',function(){
                $('.memeberSignInHead').show();
                $('.createAccHead').hide();
                $('#signInGrp').show();
                $('#signUpGrp').hide();
            });
            
            $('#signUpBtnDummy').on('click',function(){
                $('.memeberSignInHead').hide();
                $('.createAccHead').show();
                $('#signInGrp').hide();
                $('#signUpGrp').show(); 
            });

            $('#signInBtn').on('click',function(){
                
            });
        });
    </script>
</body>
</html>
