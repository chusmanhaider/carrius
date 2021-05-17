<?php
session_start();
error_reporting(0);
include("../../db_connect.php");
$buyerUserProfile=$_SESSION['loggedInBuyerUser'];
if($buyerUserProfile==true){	
}
else{
	header('location:../Login.php');
}
$query="Select * from buyer where buyer_Username='$buyerUserProfile'";
$data=mysqli_query($connect,$query);
$result=mysqli_fetch_assoc($data);
$fullName=$result['buyer_FName']." ".$result['buyer_LName'];
$Id=$result['buyer_ID'];
$username=$result['buyer_Username'];
$myImage=$result['buyer_Image'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<title>Buyer Panel-All Cars</title>
		<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="../Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="../Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="../Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
		<style>
			.headerLogo{
				float: left;
				margin-top: 5px;
				margin-left: 20px;
			}
            .infoSet{
                font-weight: bold;
                font-size:14px;
            }
			.navbar-top-links>li>a{
				color:white;
			}
			.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover,
			.navbar-top-links>li>a:hover,.navbar-top-links>.open>a,.nav .open>a, .nav .open>a:focus, .nav .open>a:hover{
				background-color: #31708f;
			}
            .navbar-inverse .navbar-toggle{
                border-color:#31708f;
            }
            .product-grid4,.product-grid4 .product-image4{position:relative}
            .product-grid4{font-family:Poppins,sans-serif;text-align:center;border-radius:5px;overflow:hidden;z-index:1;transition:all .3s ease 0s}
            .product-grid4:hover{box-shadow:0 0 10px rgba(0,0,0,.2)}
            .product-grid4 .product-image4 a{display:block}
            .product-grid4 .product-image4 img{width:100%;height:250px}
            .product-grid4 .pic-1{opacity:1;transition:all .5s ease-out 0s}
            .product-grid4 .social{width:180px;padding:0;margin:0 auto;list-style:none;position:absolute;right:0;left:0;top:50%;transform:translateY(-50%);transition:all .3s ease 0s}
            .product-grid4 .social li{display:inline-block;opacity:0;transition:all .7s}
            .product-grid4 .social li:nth-child(1){transition-delay:.15s}
            .product-grid4 .social li:nth-child(2){transition-delay:.3s}
            .product-grid4 .social li:nth-child(3){transition-delay:.45s}
            .product-grid4:hover .social li{opacity:1}
            .product-grid4 .social li a{color:#222;background:#fff;font-size:17px;line-height:36px;width:40px;height:36px;border-radius:2px;margin:0 5px;display:block;transition:all .3s ease 0s}
            .product-grid4 .social li a:hover{color:#fff;background:#16a085}
            .product-grid4 .social li a:after,.product-grid4 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:20px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
            .product-grid4 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
            .product-grid4 .social li a:hover:after,.product-grid4 .social li a:hover:before{opacity:1}
            .product-grid4 .product-discount-label,.product-grid4 .product-new-label{color:#fff;background-color:#16a085;font-size:13px;font-weight:800;text-transform:uppercase;line-height:45px;height:45px;width:45px;border-radius:50%;position:absolute;left:4px;top:10px;transition:all .3s}
            .product-grid4 .product-discount-label{left:auto;right:10px;background-color:#d7292a}
            .product-grid4:hover .product-new-label{opacity:0}
            .product-grid4 .product-content{padding:25px}
            .product-grid4 .title{font-size:15px;font-weight:400;text-transform:capitalize;margin:0 0 7px;transition:all .3s ease 0s}
            .product-grid4 .title a{color:#222}
            .product-grid4 .title a:hover{color:#16a085}
            .product-grid4 .price{color:#16a085;font-size:17px;font-weight:700;margin:0 2px 15px 0;display:block}
            .product-grid4 .price span{color:#909090;font-size:13px;font-weight:400;letter-spacing:0;text-decoration:line-through;text-align:left;vertical-align:middle;display:inline-block}
            .product-grid4 .add-to-cart{border:1px solid #e5e5e5;display:inline-block;padding:10px 20px;color:#888;font-weight:600;font-size:14px;border-radius:4px;transition:all .3s}
            .product-grid4:hover .add-to-cart{border:1px solid transparent;background:#16a085;color:#fff}
            .product-grid4 .add-to-cart:hover{background-color:#505050;box-shadow:0 0 10px rgba(0,0,0,.5)}
            @media only screen and (max-width:700px){.product-grid4{margin-bottom:30px}
            }
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #31708f;border-color:#31708f;">
                <div class="navbar-header">
					<a class="headerLogo" href="#">
						<span class="companyLogo">
							<img src="../resources/logo png.png" class="logoImg" width="30px" height="30px"> 
							<img src="../resources/text png.png" style="margin-top:5px;margin-left:8px;" width="120px" height="40px">
						</span>
					</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
				<li class="dropdown navbar-inverse" style="background-color: #31708f;border-color:#31708f;">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="Notifications.php">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> Notifications
                                        <span class="pull-right text-muted small"></span>
                                    </div>
                                </a>
                            </li>
                            
                            <li>
                                <a href="News.php">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            
                            
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="Notifications.php">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> 
								<?php
									echo $fullName;
								?>
							<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
								<img src="<?php echo $myImage;?>" alt="Avatar" class="avatar">
							</li>
							<li class="text-center">
								<?php
									echo "<b><font size='3px' style='overflow:hidden;'>".$fullName."</font></b>";
								?>
							</li>
							<li class="text-center">
								<?php
									echo "<small style='overflow:hidden;'>Username :<i>".$username."</i></small>";
								?>
							</li>
							<li class="divider"></li>
                            <li><a href="Change Pass.php"><i class="fa fa-lock fa-fw"></i> Change password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
				<!--- Side Menu --->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
                            <li>
                                <a href="Buyer.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
							
							<li>
                                <a href="All-Cars.php"><i class="fa fa-car fa-fw"></i> All Cars</a>
                            </li>
							<li>
                                <a href="My Fav Car.php"><i class="fa fa-heart fa-fw"></i> My Favourite Cars</a>
                            </li>
                            <li>
                                <a href="Profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
							<li>
                                <a href="Contact-Dealer.php"><i class="fa fa-envelope-square fa-fw"></i> Contact Dealer</a>
                            </li> 
                        </ul>
                    </div>
                </div>
            </nav>
		
            <div id="page-wrapper">
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">My Favourite Cars</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="page-heading"> <i class="fa fa-car fa-fw"></i> My Favourite Cars
                                <?php
                                    $count=0;
                                    $sql = "SELECT * FROM cars where car_Status='Terminated'";
                                    $qTest=mysqli_query($connect,$sql);
                                    while($row=mysqli_fetch_assoc($qTest))
                                    {
                                        if($row['car_Status']=='Terminated')
                                        {
                                            $count=$count+1;
                                        }
                                    }
                                    if($count>0)
                                    {
                                    ?>
                                    <div class="pull pull-right" style="margin-top:-5px">
                                        <button class="btn btn-sm btn-danger removedCars"><span data-toggle='tooltip' title="Removed Cars List"><i class="fa fa-trash fa-lg"></i></span></button>
                                    </div>
                                    <?php
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4 pull pull-left" style="float:left;">
                                        <label for=""><b>Brand Search</b></label>
                                    </div>
                                    
                                    <div class="col-sm-4 pull pull-left" style="float:left;">
                                       <label for=""><b>Car Name Search</b></label>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="col-sm-4 pull pull-left" style="float:left;">
                                        <select name="prodc" class="form-control text-capitalize" id="prodc">  
                                            <option value="">All Brands</option>  
                                            <?php
                                                //$sql = "SELECT DISTINCT Product_Name FROM products where Product_Status='1' OR Product_Status='2' OR Product_Status='0' order by Product_Name asc";  
                                                $sql="Select * from cars_brand where carBrand_Status='Available'";
                                                $result = mysqli_query($connect, $sql);  
                                                while($row = mysqli_fetch_array($result))  
                                                {  
                                                    echo "<option class='text-capitalize' id='".$row['carBrand_ID']."' value='".$row['carBrand_Name']."'>".$row['carBrand_Name']."</option>";  
                                                }
                                            ?>  
                                        </select>
                                    </div>
                                    <div class="col-sm-4 pull pull-left" style="float:left;">
                                        <select name="prodc" class="form-control text-capitalize" id="prodc">  
                                            <option value="">Select Car Name</option>  
                                            <?php
                                                //$sql = "SELECT DISTINCT Product_Name FROM products where Product_Status='1' OR Product_Status='2' OR Product_Status='0' order by Product_Name asc";  
                                                $sql="Select * from cars where car_Status='Available' AND car_AutoStatus='Active'";
                                                $result = mysqli_query($connect, $sql);  
                                                while($row = mysqli_fetch_array($result))  
                                                {  
                                                    echo "<option class='text-capitalize' id='".$row['car_ID']."' value='".$row['car_Name']."'>".$row['car_Name']."</option>";  
                                                }
                                            ?>  
                                        </select>
                                    </div>
                                    
                                </div>									
                                <div class="row" id="show_product">  
                                                
                                </div>
                                <div class="news_table">
                                        <?php
                                            
                                            $sql="SELECT * 
												FROM cars
												INNER JOIN cars_brand
													ON cars_brand.carBrand_ID=cars.CarBrandId
                                                INNER JOIN dealer
													ON dealer.dealer_ID=cars.DealerId
                                                INNER JOIN fav_cars
													ON fav_cars.favCar_CarId=cars.car_ID 
                                                WHERE (cars.car_Status='Available' AND cars_brand.carBrand_Status='Available' AND
                                                cars.car_AutoStatus='Active')
                                                AND (fav_cars.favCar_Status='Marked' AND fav_cars.favCar_MarkFav='Yes')";
                                                
                                                $queryre=mysqli_query($connect,$sql);
                                                $numRows_FavCars=mysqli_num_rows($queryre);

                                            if($numRows_FavCars>0)
                                            {
                                                while($row=mysqli_fetch_assoc($queryre))
                                                {
                                                    $a=0;
                                                    //$size=$row['Product_Size'];
                                                    //$cate=$row['cate_name'];
                                                    //$pName=$row['Product_Name'];
                                                /* $sq = "SELECT * 
                                                    FROM cars
                                                    INNER JOIN cars_brand
                                                        ON cars_brand.carBrand_ID=cars.CarBrandId
                                                    INNER JOIN dealer
                                                        ON dealer.dealer_ID=cars.DealerId    
                                                    WHERE cars.car_Status='Available' AND cars_brand.carBrand_Status='Available' order by cars_brand.carBrand_Name ASC";  
                                                    $que=mysqli_query($connect,$sq);
                                                    $numRow=mysqli_num_rows($que);*/
                                                    $numRow=mysqli_num_rows($queryre);
                                                    if($numRow>=1)
                                                    {
                                                        
                                            ?>
                                                        <div class="col-md-4 col-sm-5">
                                                            <div class="product-grid4" style="margin-top:10px">
                                                                <nav aria-label="breadcrumb">
                                                                <ol class="breadcrumb" style="background-color:#91f191;">
                                                                    <li class="breadcrumb-item active" aria-current="page"><?php echo "<b  style='color:black;text-align:center' class='text-capitalize'>".$row['carBrand_Name']."</b>";?></li>
                                                                </ol>
                                                                
                                                                </nav>
                                                                <div class="product-content bg-info">
                                                                    <?php
                                                                        $sql_gallery="Select * from car_gallery INNER JOIN cars ON car_gallery.CarId=cars.car_ID Where car_gallery.carGallery_Status='Available'";
                                                                        $rew=mysqli_query($connect, $sql_gallery);
                                                                        $line=mysqli_fetch_assoc($rew);
                                                                        $path=$line['carGallery_Image'];
                                                                        $substr=substr($path,0,3);
                                                                        if($substr=='../')
                                                                        {
                                                                    ?>
                                                                    <img src="<?php echo $line['carGallery_Image'] ?>" style="width:100%;height:120px;">
                                                                    <?php
                                                                        }
                                                                        else
                                                                        {
                                                                    ?>
                                                                    <img src="<?php echo "../".$line['carGallery_Image'] ?>" style="width:100%;height:120px;">

                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    <h3 class="text-capitalize"><?php echo $row['car_Name'];?> <a href="Buyer.php"><i style="font-size: 1.7rem;cursor:pointer" class="fa fa-external-link fa-2x"></i></a></h3>
                                                                    <div class="">
                                                                        <span>
                                                                            <p class="infoSet">Year : <?php echo "<span style='font-weight:normal'>".$row['car_Year']."</span>";?></p>
                                                                            <p class="infoSet">Condition : <?php echo "<span style='font-weight:normal'>".$row['car_NewUsed']."</span>";?></p>
                                                                            <p class="infoSet">Mileage : <?php echo "<span style='font-weight:normal'>".$row['car_Mileage']." Miles</span>";?></p>
                                                                            <p class="infoSet">Dealer : <?php echo "<span style='font-weight:normal'>".$row['dealer_Dealership']."</span>";?></p>
                                                                            <button  type="button" name="<?php echo $row['car_ID'];?>" class="btn btn-info contactDealer" id="<?php echo $row["dealer_ID"]; ?>">
                                                                                Contact Dealer
                                                                            </button>
                                                                            <?php
                                                                                $carId=$row['car_ID'];
                                                                                $q_ry="Select * from fav_cars Where favCar_CarId='$carId' AND favCar_BuyerId='$Id'";
                                                                                $re_qry=mysqli_query($connect, $q_ry);
                                                                                $line_favCar=mysqli_fetch_assoc($re_qry);
                                                                                $markFav=$line_favCar['favCar_MarkFav'];
                                                                                $markStatus=$line_favCar['favCar_Status'];
                                                                                if($markFav!="Yes" && $markStatus!="Marked")
                                                                                {
                                                                            ?>
                                                                            <span>
                                                                                <span role="button" name="<?php echo $row['car_ID'];?>" class="markFav" id="<?php echo $Id; ?>" type="button" style="margin-left: 5px;cursor:pointer"><i class="fa fa-heart fa-2x b_Id" id="<?php echo $Id;?>" data-toggle="tooltip" title="Mark Favourite"></i></span>
                                                                            </span>
                                                                            <?php
                                                                                }
                                                                                else
                                                                                {
                                                                            ?>
                                                                            <span>
                                                                                <span role="button" name="<?php echo $row['car_ID'];?>" class="unMarkFav" id="<?php echo $Id; ?>" type="button" style="margin-left: 5px;cursor:pointer"><i style="color:red" class="fa fa-heart fa-2x un_b_Id" id="<?php echo $Id;?>" data-toggle="tooltip" title="Remove from Favourite List"></i></span>
                                                                                
                                                                            </span>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </span>
                                                                        
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                            <?php
                                                    }
                                                
                                                }
                                             
                                            }
                                            else
                                            {
                                                echo "<br><span style='margin-top:20px;color:red;font-size:24px;text-align:center;margin-left:320px;'>No Car is added in favourite list</span>";
                                            } 
                                        ?>
                                </div>
                            </div>
                                
                            </div>
                    </div>
				</div>
                </div>
			</div><!-- end of Page Wrapper -->
        </div><!-- end of Wrapper -->
    <div class="modal fade" id="contactDealerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="replyTo" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-envelope-square"></i> Contact Dealership</h4>
					</div>
					<div class="modal-body" id="contact_detail" style="max-height:450px; overflow:auto;">
						<table class="table table-bordered table-hover table-responsive">
							<tr>
								<th style="width:25%">Dealer Name</th>
								<td id="fullName" name="fullName"></td>
							</tr>
                            <tr>
								<th style="width:25%">Car Name</th>
								<td id="carName" name="carName"></td>
							</tr>
							<tr>
								<th style="width:25%">Email</th>
								<td id="email" name="email"></td>
							</tr>
							<tr>
								<th style="width:25%">Dealership</th>
								<td id="dealership" name="dealership"></td>
							</tr>
							
						</table>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Contact Message</label>
							<div class="col-sm-8">
								<textarea class="form-control" required rows="5" id="replyTo" name="replyTo"></textarea>
							</div>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="hidden" id="car_id" name="car_id">
                        <input type="hidden" id="dealer_id" name="dealer_id">
						<input type="hidden" id="buyer_id" name="buyer_id" value="<?php echo $Id;?>">
						<input type="submit" name="reply" id="Reply" value="Send Message" class="btn btn-success reply" />
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>

		</div>
	</div>
		<!-- jQuery -->
        <script src="../Bootstrap/js/jquery.min.js"></script>
        <script src="../Bootstrap/js/metisMenu.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/startmin.js"></script>
        <script src="../Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
        <script src="../Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<!--<script src="../Bootstrap/js/project/changePass-Dealer.js"></script>-->
        <script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
			$('#dataTables-example').DataTable
			({
                responsive: true
            });
			function redirect(){
				location= "My Fav Car.php";
			}
			$(".alert-warning").delay(500).show(10, function() {
				$(this).delay(2000).hide(10, function() {
					$(this).remove();
					redirect();
				});
			});
            $(".alert-success").delay(500).show(10, function() {
				$(this).delay(2000).hide(10, function() {
					$(this).remove();
					redirect();
				});
			});
            /*
            $('#cateWise').on('change',function(){
					$('#prodc').val("");
					$('#brand').attr('disabled',false);
					$('#prodc').attr('disabled',true);
					$('.news_table').show();
					$('#show_product').hide();
				});
				$('#proWise').on('change',function(){
					$('#brand').val("");
					$('#brand').attr('disabled',true);
					$('#prodc').attr('disabled',false);
					$('.news_table').show();
					$('#show_product').hide();
				});
                */
            //
            $(document).on('click', '.markFav', function(){  
                //var dealer_id = $(this).attr("id"); 
                var car_id = $(this).attr("name");
                var buyer_id=$(this).attr("id");
                //alert(car_id);
                $.ajax({  
                    url:"carFav.php",  
                    method:"POST",  
                    data:{car_id:car_id,buyer_id:buyer_id},  
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
                            //$(".markFav").css("color","red");
                        setTimeout(function() { redirect(); }, 3000);
                    }  
                }); 
                
               
            });

            //Unmark Fav
            $(document).on('click', '.unMarkFav', function(){  
                var car_u_id = $(this).attr("name");
                var buyer_u_id=$(this).attr("id");
                //alert(car_id);
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
                                text:'Car removed from favourite list',
                                customClass: 'animated tada',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            
                        setTimeout(function() { redirect(); }, 3000);
                        }  
                    }); 
                
               
            });
            $(document).on('click', '.contactDealer', function(){  
                var dealer_id = $(this).attr("id");
                var car_id = $(this).attr("name");
                //alert(dealer_id);
                $.ajax({
                    url:"fetchCarDealer.php",  
                    method:"POST",  
                    data:{car_id:car_id,dealer_id:dealer_id},  
                    dataType:"json",  
                    success:function(data)
                    {
                        //alert(data);
                        //alert(data.dealer_FName);
                        var fullName=data.dealer_FName+" "+data.dealer_LName;
                        $('#fullName').html(fullName);
                        $('#carName').html(data.car_Name);
                        $('#email').html(data.dealer_Email);
                        var dealership=data.dealer_Dealership+ ", "+data.dealer_Location;
                        $('#dealership').html(dealership);
                        $('#dealer_id').val(data.dealer_ID);
                        $('#car_id').val(data.car_ID);
                        $('#contactDealerModal').modal('show');
                    }
                });
        
            }); 
            $('#replyTo').on('submit',function(){
            event.preventDefault();
            $.ajax({  
                url:"contactDealer.php",  
                method:"POST",  
                data:$('#replyTo').serialize(),  
                beforeSend:function(){  
                    $('#Reply').val("Sending..");  
                },  
                success:function(data)
                {  
                    $('#replyTo')[0].reset();  
                    $('#contactDealerModal').modal('hide');  
                    //$('#product_table').html(data);
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        showCloseButton: true,
                        title: 'Successfully contacted with dealer',
                        customClass: 'animated tada',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    setTimeout(function() { redirect(); }, 1000);
                }  
            });
        });      
    });
        </script>
    </body>
</html>
