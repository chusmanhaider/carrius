    <head>
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
        <style>
        .styleFavIconName{
            position: absolute;
            top:3%;
            left:73%;
            cursor: pointer;
            text-decoration: none;
        }
        </style>
    </head>
    <body>
        <?php
            include_once "header.php";
        ?>
        <div class="col col-lg-9 specificInfo" style="margin-left:20px">
            <div class="contentBlock">
                <div class="row">
                <?php
                    require_once ("db_connect.php");
                    include_once 'temp_session.php';
                    if(isset($_POST["car_name"])) 
                    {
                        $car_name=$_POST['car_name'];
                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                        dealer.dealer_ID = cars.DealerId
                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                        cars.car_AutoStatus = 'Active' AND cars.car_Name='$car_name'";
                        $result = mysqli_query($connect, $sql_used);
                        $numRows_cars = mysqli_num_rows($result);
                        $count=1;

                    }
                    else if(isset($_POST["val"])) 
                    {
                        $val=$_POST['val'];
                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                        dealer.dealer_ID = cars.DealerId
                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                        cars.car_AutoStatus = 'Active' AND cars.car_NewUsed='$val'";
                        $result = mysqli_query($connect, $sql_used);
                        $numRows_cars = mysqli_num_rows($result);
                        $count=2;

                    }
                    else if(isset($_POST["val_ele"])) 
                    {
                        $val_ele=$_POST['val_ele'];
                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                        dealer.dealer_ID = cars.DealerId
                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                        cars.car_AutoStatus = 'Active' AND cars.car_isElectric='$val_ele'";
                        $result = mysqli_query($connect, $sql_used);
                        $numRows_cars = mysqli_num_rows($result);
                        $count=3;

                    }
                    else if(isset($_POST["val_drive"])) 
                    {
                        $val_drive=$_POST['val_drive'];
                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                        dealer.dealer_ID = cars.DealerId INNER JOIN vehicle_overview ON
                        vehicle_overview.carId=cars.car_ID
                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                        cars.car_AutoStatus = 'Active' AND vehicle_overview.vehOver_DTrain='$val_drive'";
                        $result = mysqli_query($connect, $sql_used);
                        $numRows_cars = mysqli_num_rows($result);
                        $count=4;

                    }
                    else if(isset($_POST["drive_name"])) 
                    {
                        $drive_name=$_POST['drive_name'];
                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                        dealer.dealer_ID = cars.DealerId INNER JOIN vehicle_overview ON
                        vehicle_overview.carId=cars.car_ID
                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                        cars.car_AutoStatus = 'Active' AND vehicle_overview.vehOver_DTrain='$drive_name'";
                        $result = mysqli_query($connect, $sql_used);
                        $numRows_cars = mysqli_num_rows($result);
                        $count=4;

                    }
                        if($numRows_cars > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $selected_car=$row['car_ID'];
                ?>
                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                        <span class="eachBlockCar">
                                            <?php
                                                $sql_images="Select * from car_gallery where carGallery_Status='Available' AND CarId='$selected_car'";
                                                $res = mysqli_query($connect, $sql_images);
                                                $tw = mysqli_fetch_assoc($res);
                                                $link=$tw['carGallery_Image'];

                                                //
                                                    //$carId=$_GET['id'];
                                                    $q_ry="Select * from fav_cars Where favCar_CarId='$selected_car' AND 
                                                    favCar_tmpUser='$tmpUser'";
                                                    $re_qry=mysqli_query($connect, $q_ry);
                                                    $line_favCar=mysqli_fetch_assoc($re_qry);
                                                    $markFav=$line_favCar['favCar_MarkFav'];
                                                    $markStatus=$line_favCar['favCar_Status'];
                                                    if($markFav!="Yes" && $markStatus!="Marked")
                                                    {
                                            ?>
                                            <span class="markFav" name="<?php echo $row['car_ID'];?>" id="<?php echo $tmpUser; ?>"><i class="fa fa-heart fa-lg styleFavIconName" style="color:white"></i></span>
                                            <?php
                                                    }
                                                    else{
                                            ?>
                                            <span class="unMarkFav" name="<?php echo $row['car_ID'];?>" id="<?php echo $tmpUser; ?>"><i class="fa fa-heart fa-lg styleFavIconName" style="color:#047cf3"></i></span>
                                            <?php
                                                    }
                                            ?>
                                            <img src="<?php 
                                                    //$link_active=$row['carGallery_Image'];
                                                    $substr=substr($tw['carGallery_Image'],0,3);
                                                    if($substr!='../')
                                                        echo "Dashboard/".$tw['carGallery_Image'];
                                                    else
                                                    {
                                                        $newlink_active=substr($link,3);
                                                        echo "Dashboard/".$newlink_active;
                                                    }?>" alt="<?php echo $tw['carGallery_Caption'];?>" alt="<?php echo $tw['carGallery_Caption'];?>" width="200px" height="120px">
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
                                                <a class="noUnderline" style="color:white" href="view-car.php?id=<?php echo $row['car_ID'];?>"><button class="viewCarBtn">View the car</button></a>
                                            </span>
                                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                        </span>
                    </div>
                    <?php
                            }
                        }
                        else
                        {
                            if($count==1)
                                echo "<span style='color:red;font-weight:bold;font-size:22px;' class='noCarFound'>No Car Available for this name</span>";
                            else if($count==2)
                                echo "<span style='color:red;font-weight:bold;font-size:22px;' class='noCarFound'>No Car Available for this condition</span>";
                            else if($count==3)
                                echo "<span style='color:red;font-weight:bold;font-size:22px;' class='noCarFound'>No Car Available</span>";
                            else if($count==4)
                                echo "<span style='color:red;font-weight:bold;font-size:22px;' class='noCarFound'>No Car Available for this drivetain</span>";
                        }
                    ?>
                                
                </div>
                                
            </div>
        </div>
    

    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script src="Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
    </body>