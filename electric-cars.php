<html>
<head>
    <title>Carrius - Electric Cars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/used-cars.css" rel="stylesheet">
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper" style="background-color: white;">
        <div class="container">
            <div class="innerBlock">
                <h2 class="text-center alignHeading"><b>Electric Cars</b></h2>
                <hr class="hrUnderStyle" style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-3px;">
                <p class="text-center alignCenter" style="color:#999999;max-width:345px;">
                    Here, you can easily view all electric cars and contact each
                    dealership until you find the right ONE!
                </p>
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
                                echo "<h3 style='text-align:center;color:red;margin-top:40px; margin-bottom:163px;margin-right:8%;'> No electric car found..</h3>";
                            }
                        ?>
                    </span>
                </span>         
            </div>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
</body>
</html>