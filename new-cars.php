<html>
    <head>
        <title>Carrius - New Cars</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="css/usedCars.css" rel="stylesheet">
        <link href="css/scrollbar.css" rel="stylesheet">
        
    </head>
    <body>
        <?php
            include_once "header.php";
        ?>
        <div class="wrapper" style="background-color: white;">
            <div class="container">
                <div class="iContainer">
                    <h4>Browse all <b>New Car</b> models ready for Sale</h4>
                    <hr class="hrUnderStyle" style="border: 1px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-8px;">
                    <div class="sortingMenuUpper">
                        <div class="row">
                            <div class="col col-lg-3 col-xs-12">
                                <select class="form-control" id="carSelect">
                                    <option value="">Select Car Name</option>
                                    <?php
                                        include_once 'getCarList.php';
                                    ?>
                                </select>
                            </div>
                            <span id="formArea">
                                <!--<form id="form" method="POST">-->
                                    <div class="col col-lg-2 col-xs-6">
                                        <select class="form-control" id="brandSelect">
                                            <option value="">Select Brand</option>
                                            <?php
                                                include_once 'getBrandList.php';
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col col-lg-2 col-xs-6" id="typeSelect">
                                        <select class="form-control">
                                            <option value="">Select Type</option>
                                            <?php
                                                include_once 'getTypeList.php';
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col col-lg-3 col-xs-4" id="priceSelect">
                                        <select class="form-control">
                                            <option value="">Select Maximum Price</option>
                                            <option value="5000">Below 5000 ($)</option>
                                            <option value="10000">5001 - 10,000 ($)</option>
                                            <option value="20000">10,001 - 20,000 ($)</option>
                                            <option value="30000">20,001 - 30,000 ($)</option>
                                            <option value="40000">30,001 - 40,000 ($)</option>
                                            <option value="50000">40,001 - 50,000 ($)</option>
                                            <option value="60000">50,001 - 60,000 ($)</option>
                                            <option value="70000">60,001 - 70,000 ($)</option>
                                            <option value="80000">70,001 - 80,000 ($)</option>
                                            <option value="90000">80,001 - 90,000 ($)</option>
                                            <option value="100000">90,001 - 100,000 ($)</option>
                                            <option value="Maximum">Above 100,000 ($)</option>       
                                        </select>
                                    </div>
                                    <div class="col col-lg-1 col-xs-4 allFilters" id="filterResult">
                                        <button type="submit" id="filterResultBtn" name="filterResultBtn" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button> 
                                    </div> 
                                <!--</form>-->
                            </span>
                        </div>
                    </div>
                    <div class="lowerPart">
                        <div class="sortingMenuSide">
                            <?php include_once 'sortingMenuSide.php'; ?>
                        </div>
                        <div class="col col-lg-9" style="margin-left:20px">
                            <div class="contentBlock">
                                <div class="row">
                                    <?php
                                        require_once ("db_connect.php");
                                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                                        dealer.dealer_ID = cars.DealerId
                                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                                        cars.car_AutoStatus = 'Active' AND cars.car_NewUsed='New'";
                                        $result = mysqli_query($connect, $sql_used);
                                        $numRows_cars = mysqli_num_rows($result);
                                        if($numRows_cars > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                    ?>
                                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                                        <span class="eachBlockCar">
                                            <i class="fa fa-heart fa-lg styleFavIcon"></i>
                                            <img src="<?php echo "";?>" alt="<?php echo "";?>" width="200px" height="120px">
                                            <h4>Car Names</h4>
                                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p>
                                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Ltd</span>
                                            </p>
                                            <p>
                                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Lahore</span>
                                            </p>
                                            <p class="infoSet">Price:</p>
                                            <span style="display:inline-block">
                                                <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'></span>";?>$ 75000</strong>
                                                <a class="noUnderline" style="color:white" href="viewCar.php?id=<?php echo "";?>"><button class="viewCarBtn">View the car</button></a>
                                            </span>
                                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                                        </span>
                                    </div>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<span style='color:red;font-weight:bold;font-size:22px;' class='noCarFound'>No New Car Available</span>";
                                        }
                                    ?>
                                <!--
                                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                                        <span class="eachBlockCar">
                                            <i class="fa fa-heart fa-lg styleFavIcon"></i>
                                            <img src="<?php echo "";?>" alt="<?php echo "";?>" width="200px" height="120px">
                                            <h4>Car Names</h4>
                                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p>
                                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Ltd</span>
                                            </p>
                                            <p>
                                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Lahore</span>
                                            </p>
                                            <p class="infoSet">Price:</p>
                                            <span style="display:inline-block">
                                                <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'></span>";?>$ 75000</strong>
                                                <a class="noUnderline" style="color:white" href="viewCar.php?id=<?php echo "";?>"><button class="viewCarBtn">View the car</button></a>
                                            </span>
                                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                                        </span>
                                    </div>
                                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                                        <span class="eachBlockCar">
                                            <i class="fa fa-heart fa-lg styleFavIcon"></i>
                                            <img src="<?php echo "";?>" alt="<?php echo "";?>" width="200px" height="120px">
                                            <h4>Car Names</h4>
                                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p>
                                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Ltd</span>
                                            </p>
                                            <p>
                                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Lahore</span>
                                            </p>
                                            <p class="infoSet">Price:</p>
                                            <span style="display:inline-block">
                                                <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'></span>";?>$ 75000</strong>
                                                <a class="noUnderline" style="color:white" href="viewCar.php?id=<?php echo "";?>"><button class="viewCarBtn">View the car</button></a>
                                            </span>
                                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                                        </span>
                                    </div>
                                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                                        <span class="eachBlockCar">
                                            <i class="fa fa-heart fa-lg styleFavIcon"></i>
                                            <img src="<?php echo "";?>" alt="<?php echo "";?>" width="200px" height="120px">
                                            <h4>Car Names</h4>
                                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p>
                                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Ltd</span>
                                            </p>
                                            <p>
                                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Lahore</span>
                                            </p>
                                            <p class="infoSet">Price:</p>
                                            <span style="display:inline-block">
                                                <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'></span>";?>$ 75000</strong>
                                                <a class="noUnderline" style="color:white" href="viewCar.php?id=<?php echo "";?>"><button class="viewCarBtn">View the car</button></a>
                                            </span>
                                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                                        </span>
                                    </div>
                                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                                        <span class="eachBlockCar">
                                            <i class="fa fa-heart fa-lg styleFavIcon"></i>
                                            <img src="<?php echo "";?>" alt="<?php echo "";?>" width="200px" height="120px">
                                            <h4>Car Names</h4>
                                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'></span>";?></p>
                                            <p>
                                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Ltd</span>
                                            </p>
                                            <p>
                                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'></span>";?>XYZ Dealership Lahore</span>
                                            </p>
                                            <p class="infoSet">Price:</p>
                                            <span style="display:inline-block">
                                                <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'></span>";?>$ 75000</strong>
                                                <a class="noUnderline" style="color:white" href="viewCar.php?id=<?php echo "";?>"><button class="viewCarBtn">View the car</button></a>
                                            </span>
                                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                                        </span>
                                    </div>
                                -->
                                </div>
                                
                            </div>
                        </div>
                    
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
    </body>
</html>
