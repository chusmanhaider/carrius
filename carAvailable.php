<html>
    <head>
        <style>
            .changeColor{
                color:black;
            }
            .showTotalCarNum{
                color:#044cc4;
                font-weight: bold;
                text-align: center;
            }
            
            .styleRow{
                background-color: #f7f7f7;
                height: 40px;
                margin-top: 10px;
                width:450px;
                line-height: 40px;
                border-radius: 5px;
            }
            .form-control{
                height: 30px;
                line-height: 40px;
                margin-top: 5px;
            }
            #noCarFound
            {
                text-align:center;
                color:red;
                margin-top:20px; 
                margin-bottom:140px;
                margin-right:2%;
            }
            .eachBlock{
                height:50%;
                margin-top:20px;
                margin-bottom:130px;
                display: grid;
                max-width: 300px;
                margin-left: 35px;
            }
            .styleFavIcon{
                position: absolute;
                top:4%;
                left:99%;
                cursor: pointer;
                text-decoration: none;
            }
            .infoSet{
                color:grey;
                font-weight: bold;
                font-size:14px;
            }
            .viewCarBtn{
                float:right;
                background-color:#044cc4;
                color:white;
                width:115px;
                display:inline-block;
                padding:1px;
                margin-right:55px;
                font-weight:bold;
                border:2px solid white;
                border-radius:8px;
                
            }
            @media (max-width:575px){
                .daysRoutineEl{
                    text-align: center;
                }
                .showTotalCarNum{
                    color:#044cc4;
                    font-weight: bold;
                }
                .styleRow{
                    background-color: #f7f7f7;
                    border-radius: 5px;
                    width:120%;
                    height:30px;
                    line-height: 30px;
                    margin-left: -10px;
                }
                #noCarFound
                {
                    text-align:center;
                    color:red;
                    margin-top:90px; 
                    margin-bottom:60px;
                    margin-right:2%;
                }
            }
        </style>
    </head>
    <body>
        <span class="row">
            <span style="width:90%" class="col col-lg-12 col-xs-12 styleRow">
                <span class="col col-lg-3 col-xs-12">
                    <p class="showTotalCarNum">333 cars Instock</p>
                </span>
                <span class="col col-lg-4 col-xs-6">
                    <select class="form-control" id="car_brand" style="height: 30px;">
                        <option value="">Select Brand</option>
                        <?php
                            //include('db_connect.php');
                            include_once 'db_connect.php';
                            $sql_brand="SELECT * FROM cars_brand WHERE carBrand_Status='Available'";
                            $result_brand=mysqli_query($connect, $sql_brand);
                            while($row_brand=mysqli_fetch_assoc($result_brand))
                            {
                                echo "<option value='$row_brand[carBrand_ID]'>".$row_brand['carBrand_Name']."</option>";
                            }
                        ?>
                    </select>
                </span>
                <span class="col col-lg-4 col-xs-6">
                    <select class="form-control" style="height: 30px;">
                        <option value="">Select Model</option>
                    </select>
                </span>
            </span>
        </span>
        <span class="row">
            <span class="usedCarDetail">
                <span class="row">
                <?php
                    
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
        </span>
        <script>
            $(document).ready(function(){
                $(document).on('change','#car_brand',function(){
                    //var val=$(this).child('option:selected').attr("id");
                    var val=$(this).children("option:selected").attr("value");
                    //alert(val);
                });
            });
        </script>
    </body>
</html>