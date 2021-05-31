<?php 
    include_once 'temp_session.php';
    error_reporting();
?>
<html>
    <head>
        <title>Carrius - All Cars Model</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="css/usedCars.css" rel="stylesheet">
        <link href="css/scrollbar.css" rel="stylesheet">
        <style>
            .hrUnderStyle{
                width:276px;
                margin-left: 7px;
            }
        </style>
    </head>
    <body>
        <?php
            include_once "header.php";
        ?>
        <div class="wrapper" style="background-color: white;">
            <div class="container">
                <div class="iContainer">
                    <h4>Browse all car models ready for Sale</h4>
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
                                        <select class="form-control typeSelect">
                                            <option value="">Select Type</option>
                                            <?php
                                                include_once 'getTypeList.php';
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col col-lg-3 col-xs-4" id="priceSelect">
                                        <select class="form-control priceSelect">
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
                                            <option value="100001">Above 100,000 ($)</option>       
                                        </select>
                                    </div>
                                    <div class="col col-lg-1 col-xs-4 allFilters" id="filterResult">
                                        <a href="all-cars-model.php"><button type="button" id="filterResultBtn" name="filterResultBtn" class="btn btn-info"><i class="fa fa-refresh"></i> Clear</button></a> 
                                    </div> 
                                <!--</form>-->
                            </span>
                        </div>
                    </div>
                    <div class="lowerPart">
                        <div class="sortingMenuSide">
                            <?php include_once 'sortingMenuSide.php'; ?>
                        </div>
                        <div class="col col-lg-9 allInfo" style="margin-left:20px">
                            <div class="contentBlock">
                                <div class="row">
                                    <?php
                                        require_once ("db_connect.php");
                                        $sql_used = "SELECT * FROM cars INNER JOIN dealer ON 
                                        dealer.dealer_ID = cars.DealerId
                                        WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
                                        cars.car_AutoStatus = 'Active'";
                                        $result = mysqli_query($connect, $sql_used);
                                        $numRows_cars = mysqli_num_rows($result);
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
                                            <span class="markFav" name="<?php echo $row['car_ID'];?>" id="<?php echo $tmpUser; ?>"><i class="fa fa-heart fa-lg styleFavIcon" style="color:white"></i></span>
                                            <?php
                                                    }
                                                    else{
                                            ?>
                                            <span class="unMarkFav" name="<?php echo $row['car_ID'];?>" id="<?php echo $tmpUser; ?>"><i class="fa fa-heart fa-lg styleFavIcon" style="color:#044cc4"></i></span>
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
                                            echo "<span style='color:red;font-weight:bold;font-size:22px;' class='noCarFound'>No Car Available</span>";
                                        }
                                    ?>
                                
                                </div>
                                
                            </div>
                        </div>
                        <div class="row specificInfo">  
										    
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
        <script src="Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function(){
                function redirect(){
				    location= "all-cars-model.php";
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
                                                text:'Car unmarked as favourite',
                                                customClass: 'animated tada',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });
                                        
                                        setTimeout(function() { redirect(); }, 3000);
                                        }  
                                    }); 
                                
                                    
                });
                //Car-Name wise
                $(document).on('change','#carSelect',function(){
                    //var car_id=$(this).children('option:selected').attr("id");
                    var car_name=$(this).val();
                    //alert(car_id+'  '+car_name); loadDataNameWise
                    //alert(car_name);
                    if(car_name!='')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataNameWise.php",  
							method:"POST",  
							data:{car_name:car_name},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                    }
                });

                //Brand wise
                $(document).on('change','#brandSelect',function(){
                    var brand_id=$(this).children('option:selected').attr("id");
                    //var car_name=$(this).val();
                    //alert(car_id+'  '+car_name); loadDataNameWise
                    //alert(brand_id);
                    if(brand_id!='')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataBrandWise.php",  
							method:"POST",  
							data:{brand_id:brand_id},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                    }
                });

                //
                $.urlParam = function(name){
                    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                    if (results==null){
                    return null;
                    }
                    else{
                    return results[1] || 0;
                    }
                }

                //alert($.urlParam('brand'));
                //alert($.urlParam('brand').length);
                if($.urlParam('brand'))
                {
                    if($.urlParam('brand')!='' && $.urlParam('brand').length!=0)
                    {
                            $('.allInfo').hide();
                            $('.specificInfo').show();
                        var brand_name=$.urlParam('brand');
                        //alert(brand_name);
                        $.ajax({  
                                url:"loadDataBrandWiseU.php",  
                                method:"POST",  
                                data:{brand_name:brand_name},  
                                success:function(data){  
                                    $('.specificInfo').html(data);  
                                }  
                        });
                    }
                }
                else if ($.urlParam('type'))
                {
                    if($.urlParam('type')!='' && $.urlParam('type').length!=0)
                    {
                            $('.allInfo').hide();
                            $('.specificInfo').show();
                        var type_name=$.urlParam('type');
                        //alert(type_name);
                        $.ajax({  
                                url:"loadDataTypeWiseU.php",  
                                method:"POST",  
                                data:{type_name:type_name},  
                                success:function(data){  
                                    $('.specificInfo').html(data);  
                                }  
                        });
                    }
                }
                else if ($.urlParam('wheelDrive'))
                {
                    if($.urlParam('wheelDrive')!='' && $.urlParam('wheelDrive').length!=0)
                    {
                            $('.allInfo').hide();
                            $('.specificInfo').show();
                        var drive_name=$.urlParam('wheelDrive');
                        //alert(drive_name);
                        $.ajax({  
                                url:"loadDataNameWise.php",  
                                method:"POST",  
                                data:{drive_name:drive_name},  
                                success:function(data){  
                                    $('.specificInfo').html(data);  
                                }  
                        });
                    }
                }
                
                
                //Type wise
                $(document).on('change','.typeSelect',function(){
                    var type_id=$(this).children('option:selected').attr("id");
                    //var type_id=$(this).val();
                    //alert(car_id+'  '+car_name); loadDataNameWise
                    //alert(type_id);
                    if(type_id!='' && typeof type_id!='undefined')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataTypeWise.php",  
							method:"POST",  
							data:{type_id:type_id},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                    }
                });
                $(document).on('change','.priceSelect',function(){
                    var price=$(this).children('option:selected').attr("value");
                    //var type_id=$(this).val();
                    //alert(car_id+'  '+car_name); loadDataNameWise
                    //alert(price);
                    if(price!='')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataPriceWise.php",  
							method:"POST",  
							data:{price:price},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                    }
                });
                $(document).on('change','.common_selector',function(){
                    var val=$(this).val();
                    //alert(val);
                    if(val!='')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataNameWise.php",  
							method:"POST",  
							data:{val:val},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                    }
                });

                $(document).on('change','.common_selector_ele',function(){
                    var val_ele=$(this).val();
                    //alert(val);
                    if(val_ele!='')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataNameWise.php",  
							method:"POST",  
							data:{val_ele:val_ele},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                    }
                });
                $(document).on('change','.common_selector_drive:checked',function(){
                    var val_drive=$(this).val();
                    //alert(val_drive);
                    if(val_drive!='')
                    {
                        $('.allInfo').hide();
						$('.specificInfo').show();
						$.ajax({  
							url:"loadDataNameWise.php",  
							method:"POST",  
							data:{val_drive:val_drive},  
							success:function(data){  
								$('.specificInfo').html(data);  
							}  
					   });
                    }
                    else{
                        $('.allInfo').show();
						$('.specificInfo').hide();
                        redirect();
                    }
                });
            });
        </script>
    </body>
</html>
