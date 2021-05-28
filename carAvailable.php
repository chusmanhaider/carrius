<?php 
    include_once 'temp_session.php';
    error_reporting();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
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
                /*if new creates problems then uncomment it
                height:50%;
                margin-top:20px;
                margin-bottom:130px;
                display: grid;
                max-width: 300px;
                margin-left: 35px;*/
                display: grid;
                height:65%;
                margin-top: 20px;
                margin-right: 12px;
                margin-bottom: 40px;
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
            strong{
                color: #135fd7;
                font-weight: bold;
                font-size:18px;
            }
            .viewCarBtn{
                float:right;
                background-color:#044cc4;
                color:white;
                width:95px;
                display:inline-block;
                padding:1px;
                margin-right:-100px;
                font-weight:bold;
                border:2px solid white;
                border-radius:8px;
                
            }
            .loctionInfo{
                color:#135fd7;
                font-size:14px;
                text-transform:capitalize;
            }
            .addBlockTop{
                margin-top: 20px;
                margin-bottom: 10px;
                margin-left: -15px;
            }
            .styleFavIconLower{
                position: absolute;
                top:2%;
                left:80%;
                cursor: pointer;
                text-decoration: none;
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
                    margin-bottom: 40px;
                }
                .styleFavIconLower{
                    position: absolute;
                    top:3%;
                    left:85%;
                    cursor: pointer;
                    text-decoration: none;
                }
                #noCarFound
                {
                    text-align:center;
                    color:red;
                    margin-top:90px; 
                    margin-bottom:60px;
                    margin-right:2%;
                }
                .eachBlock{
                    /*if new creates problems then uncomment it
                    height:50%;
                    margin-top:20px;
                    margin-bottom:130px;
                    display: grid;
                    max-width: 300px;
                    margin-left: 35px;*/
                    display: grid;
                    height:65%;
                    margin-top: 20px;
                    margin-bottom: 30px;
                }
            }
        </style>
    </head>
    <body>
        <span class="row">
            <span style="width:90%" class="col col-lg-12 col-xs-12 styleRow">
                <span class="col col-lg-3 col-xs-12">
                    <p class="showTotalCarNum">
                    <?php
                        include_once 'db_connect.php';
                        $d_id = $_GET['url'];
                        $sql_car = "SELECT * FROM cars 
                        INNER JOIN dealer ON dealer.dealer_ID = cars.DealerId
                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' 
                        AND cars.car_AutoStatus = 'Active' AND dealer.dealer_ID = '$d_id'";
                                                
                        $res = mysqli_query($connect, $sql_car);
                        $numRows = mysqli_num_rows($res);
                        
                        if ($numRows>0)
                        {
                            echo $numRows.' cars Instock';
                        }
                        else
                        {
                            echo "No car available";
                        }
                    ?> 
                    </p>
                </span>
                <span class="col col-lg-4 col-xs-6">
                    <select class="form-control" id="car_brand" style="height: 30px;">
                        <option value="">Select Brand</option>
                        <?php
                            //include('db_connect.php');
                            //include_once 'db_connect.php';
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
                    $d_id = $_GET['url'];
                    $sql="SELECT * from cars 
                    INNER JOIN dealer ON dealer.dealer_ID = cars.DealerId
                    where cars.car_Status='Available' AND 
                    cars.car_AutoStatus='Active' AND 
                    dealer.dealer_ID = '$d_id'";
                    $re = mysqli_query($connect, $sql);
                    $numRows_Car = mysqli_num_rows($re);
                    if($numRows_Car>0)
                    {
                        while($link= mysqli_fetch_assoc($re))
                        {
                            $carId=$link['car_ID'];
                            
                ?>
                    <div class="col col-lg-4 col-xs-6 addBlockTop eachBlock">
                        <span class="eachBlockCar">
                        <?php
                            $sql_images="Select * from car_gallery where carGallery_Status='Available' AND CarId='$carId'";
                            $res = mysqli_query($connect, $sql_images);
                            $tw = mysqli_fetch_assoc($res);
                            $path=$tw['carGallery_Image'];
                            //$carId=$_GET['id'];
                            $q_ry="Select * from fav_cars Where favCar_CarId='$carId' AND 
                            favCar_tmpUser='$tmpUser'";
                            $re_qry=mysqli_query($connect, $q_ry);
                            $line_favCar=mysqli_fetch_assoc($re_qry);
                            $markFav=$line_favCar['favCar_MarkFav'];
                            $markStatus=$line_favCar['favCar_Status'];
                            if($markFav!="Yes" && $markStatus!="Marked")
                            {
                        ?>
                                <span class="markFav" name="<?php echo $link['car_ID'];?>" id="<?php echo $tmpUser; ?>"><i class="fa fa-heart fa-lg styleFavIconLower" style="color:white"></i></span>
                                <?php
                            }
                            else
                            {
                        ?>
                                <span class="unMarkFav" name="<?php echo $link['car_ID'];?>" id="<?php echo $tmpUser; ?>"><i class="fa fa-heart fa-lg styleFavIconLower" style="color:#044cc4"></i></span>
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
                                }?>" alt="<?php echo $link['carGallery_Caption'];?>" width="200px" height="120px">
                            <h4 style="color:black"><?php echo $link['car_Name'];?></h4>
                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>".$link['car_Year']."</span>";?></p>
                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'>".$link['car_NewUsed']."</span>";?></p>
                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'>".$link['car_Mileage']."</span>";?></p>
                            <p>
                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'>".$link['dealer_Dealership']."</span>";?></span>
                            </p>
                            <p>
                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo"><?php echo "<span style='font-weight:normal'>".$link['dealer_Location']."</span>";?></span>
                            </p>
                            <p class="infoSet">Price:</p>
                            <span style="display:inline-block">
                                <strong> <?php echo "<span style='font-size:25px;font-weight:bold;'>$ ".$link['car_Price']."</span>";?></strong>
                                <a class="noUnderline" style="color:white" href="view-car.php?id=<?php echo $link['car_ID'];?>"><button class="viewCarBtn">View Car</button></a>
                            </span>
                            <hr class="hrUnderCarBlock" style="border: 2px solid #5d95ef;stroke: #5d95ef; fill: #5d95ef;">
                        </span>
                    </div>
                    <?php
                            
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
        <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script src="Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on('change','#car_brand',function(){
                    //var val=$(this).child('option:selected').attr("id");
                    var val=$(this).children("option:selected").attr("value");
                    //alert(val);
                });
                function redirect(){
				    location= "dealer-profile.php?url=<?php echo $_GET['url'];?>";
			    }
                $(document).on('click', '.markFav', function(){  
                //var dealer_id = $(this).attr("id"); 
                    var car_id = $(this).attr("name");
                    var tmpuser_id=$(this).attr("id");
                    //alert(tmpuser_id);
                    $.ajax({  
                        url:"carFav.php",  
                        method:"POST",  
                        data:{car_id:car_id,tmpuser_id:tmpuser_id},  
                        success:function(data){
                             
                                Swal.fire({
                                    position: 'center',
                                    type: 'success',
                                    showCloseButton: true,
                                    title: 'Car Favourite',
                                    text:'Car marked as favourite',
                                    customClass: 'animated tada',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            setTimeout(function() { redirect(); }, 3000);
                        }  
                    });
                }); 
                $(document).on('click', '.unMarkFav', function(){  
                                var car_u_id = $(this).attr("name");
                                var buyer_u_id=$(this).attr("id");
                                //alert(car_u_id);
                            
                                $.ajax({  
                                        url:"carNotFav.php",  
                                        method:"POST",  
                                        data:{car_u_id:car_u_id,buyer_u_id:buyer_u_id},  
                                        success:function(data){
                                        
                                            Swal.fire({
                                                position: 'center',
                                                type: 'success',
                                                showCloseButton: true,
                                                title: 'Car Not Favourite',
                                                text:'Car unmarked from favourite list',
                                                customClass: 'animated tada',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });
                                        
                                        setTimeout(function() { redirect(); }, 3000);
                                        }  
                                    }); 
                                
                                    
                });
            });
        </script>
    </body>
</html>