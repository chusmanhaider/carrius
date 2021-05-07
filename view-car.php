<html>
<head>
    <title>Carrius - View Car</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <link href="css/viewCar.css" rel="stylesheet">
    
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper"  style="background-color: white;">
        <div class="container">
            <!-- Upper Row-->
            <div class="row">
                <div class="iContainer">
                    <span class="col col-lg-7 col-xs-12">
                        <!--<img src="resources/a.jpg" class="img-responsive" id="displayCar">-->
                        <?php include_once 'slider.php';?>
                        <i class="fa fa-heart fa-2x favIcon"></i>
                        <span class="detailUnder">
                            <span class="dealership">
                                <img src="resources/icons png/user (1).png" width="14px" height="14px">
                                <span class="setFontSize">XYZ Dealership Ltd</span>
                            </span>
                            <span class="location">
                                <img src="resources/icons png/pin.png" width="16px" height="16px">
                                <span class="setFontSize">Ontario, Sydney</span>
                            </span>
                            <span class="timing">
                                <img src="resources/icons png/hour.png" width="16px" height="16px">
                                <span class="setFontSize">Monday to Friday 9:00 am to 5:00</span>
                            </span>
                        </span>
                    </span>
                    <span class="col col-lg-5 col-xs-12 addSmallMargin" style="margin-top:-19px">
                        <h3 style="color:black">Name</h3>
                        <p class="infoSetUpper">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                        <p class="infoSetUpper">Condition : <?php echo "<span style='font-weight:normal'>Used</span>";?></p>
                        <p class="infoSetUpper">Mileage : <?php echo "<span style='font-weight:normal'>98 Miles</span>";?></p>
                        <p class="infoSetUpper">Average CO<sub>2</sub> Emissions : </p>
                        <img style="margin-top:-7px" src="resources/Updated Icons/co2 bar.png" width="200px">
                        <p style="margin-top:5px;margin-bottom:-4px;" class="infoSetUpper">Price:</p>
                        <span class="priceAlign">
                            <strong> <?php echo "<span style='font-size:25px;font-weight:bold;margin-top:-15px'>$ 750000 </span>";?></strong>
                        </span>
                        <span class="msgDealer">
                            <input type="button" class="msgDealerBtn" value="Message Dealer">
                        </span>
                        <span class="vidCall">
                            <input type="button" class="vidCallBtn" value="Video Call Dealer">
                        </span>
                        <span class="recommendedText">
                            <small class="smallText" style="font-size:11px">Recommended! Only available during <b>Dealership Business
                            <br>hours</b></small><br>
                        </span>
                        <span class="emailYourself">
                            <input type="button" class="emailBtn" value="Email car info to Yourself">
                        </span>
                    </span>
                </div>
            </div>
            <!--First Middle Row (Vehicle Overview)-->

            <!--Second Middle Row (Key Feature)-->
            
            <!--Third Middle Row (Dealership Information)-->

            <!--Last Row-->
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
                                    echo "<h3 style='' id='noCarFound'> No car found..</h3>";
                                }
                            ?>
                        </span>
                    </span>
        
        </div> <!--Container-->
    </div><!-- End or Wrapper -->
    <?php
        echo "<br><br><br><br><br><br><br><br>";
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>