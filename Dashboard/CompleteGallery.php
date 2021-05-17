<?php
session_start();
error_reporting(0);
include("../db_connect.php");
$userProfile=$_SESSION['loggedInUser'];
if($userProfile==true){	
}
else{
	header('location:login.php');
}
$query="Select * from admin where admin_username='$userProfile'";
$data=mysqli_query($connect,$query);
$result=mysqli_fetch_assoc($data);
$Id=$result['admin_ID'];
$Name=$result['admin_Name'];
$adUser=$result['admin_username'];

$car_Id=$_GET['url'];
$qu="Select * from cars INNER JOIN dealer ON dealer.dealer_ID=cars.DealerId
INNER JOIN cars_brand ON cars_brand.carBrand_ID=cars.CarBrandId Where cars.car_ID='$car_Id'";
$d=mysqli_query($connect,$qu);
$res=mysqli_fetch_assoc($d);
$dealer_id=$res['dealer_ID'];
$fullName=$res['dealer_FName']." ".$res['dealer_LName'];
$carName=$res['car_Name'];
$dealership=$res['dealer_Dealership'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Panel- Car's Gallery</title>
        <!-- Bootstrap-->
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
		<style>
			button:disabled {
			cursor: not-allowed;
			pointer-events: all !important;
			}
			.headerLogo{
				float: left;
				margin-top: 5px;
				margin-left: 20px;
			}
			.navbar-top-links>li>a{
				color:white;
			}
			.navbar-top-links>li>a:hover,.navbar-top-links>.open>a,.nav .open>a, .nav .open>a:focus, .nav .open>a:hover{
				background-color: #135fd7;
			}
			.carField{
				overflow: hidden;
				white-space: nowrap;
				max-width: 90px;
				text-overflow: ellipsis;
			}
			@media screen and (max-width: 600px){
					.noDisplay{
					display:none;
					}
					.yesDisplay{
						width: 25%;
					}
					.carField{
					overflow: hidden;
					white-space: nowrap;
					max-width: 5px;
					text-overflow: ellipsis;
				}
                    .addMargin{
                        margin-top: 20px;
                    }
			}
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #135fd7;border-color:#135fd7;">
                <div class="navbar-header">
                    <a class="headerLogo" href="CompleteGallery.php">
						<span class="companyLogo">
							<img src="resources/logo png.png" class="logoImg" width="30px" height="30px"> 
							<img src="resources/text png.png" style="margin-top:5px;margin-left:8px;" width="120px" height="40px">
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
				<li class="dropdown navbar-inverse" style="background-color: #135fd7;border-color:#135fd7;">
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
								<a href="ContactReply.php">
                                    <div>
                                        <i class="fa fa-paper-plane fa-fw"></i> Contact Requests
                                        <span class="pull-right text-muted small">
                                            <button type="button" class="btn btn-danger btn-xs">
                                            Not Replied <span class="badge badge-light">
                                                <?php
                                                    $qw="SELECT * FROM contactus INNER JOIN contactus_reply ON 
													contactus_reply.contactusId=contactus.contact_ID Where contactus.contact_reply_flag = '0'";
                                                    $t=mysqli_query($connect , $qw);
                                                    $rt=mysqli_num_rows($t);
                                                    echo $rt;
                                                ?>
                                                </span>
                                            </button>
                                        </span>
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
									echo $Name;
								?>
							<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <img src="user.jpg" alt="Avatar" class="avatar">
							</li>
							<li class="text-center">
								<?php
									echo "<b><font size='3px' style='overflow:hidden;'>".$Name."</font></b>";
								?>
							</li>
							<li class="text-center">
								<?php
									echo "<small style='overflow:hidden;'>Username :<i>".$adUser."</i></small>";
								?>
							</li>
							<li class="divider"></li>
                            <li><a href="ChangePass-Admin.php"><i class="fa fa-lock fa-fw"></i> Change password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="admin.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
							<li>
                                <a href="Car Brands.php"><i class="fa fa-list fa-fw"></i> Car Brands</a>
                            </li>
							<li>
                                <a href="Cars.php"><i class="fa fa-car fa-fw"></i> Cars</a>
                            </li>
							
							<li>
                                <a href="#"  class="active"><i class="fa fa-user fa-fw"></i>Manage Users<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
                                        <a href="Manage Dealers.php">Dealers</a>
                                    </li>
                                    <li>
                                        <a href="Manage Buyers.php">Buyers</a>
                                    </li>
								</ul>
                            </li>
							
							<li>
                                <a href="News.php"><i class="fa fa-envelope fa-fw"></i> Mailbox & Chat</a>
                            </li>   
                        </ul>
                    </div>
                </div>
            </nav>
		
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header"><?php echo $carName;?> Image List</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="fa fa-list"></i> <?php echo $carName." Image List";?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
								<div class="row">
									<div class="pull pull-left" style="margin-left:20px;">
											<a href="Cars.php" class="btn btn-info">
												<span class="fa fa-arrow-left" data-toggle="tooltip" title="Go Back"></span>
											</a>
									</div>
                                    <div class="pull pull-right" style="margin-right:20px;">
										<button class="btn btn-primary" id="addNewImageBtn" data-toggle="modal" name="<?php echo $_GET['url'];?>" >
											<span class="fa fa-plus" data-toggle="tooltip" title="Add New Image"></span>
										</button>
									</div>
                                    <div class="col col-lg-10 col-md-12 addMargin" style="margin-left: 2%;">
                                        <table class="table table-responsive table-striped table-bordered table-hover" width="50%">
                                            <tr>
                                                <th class="text-center">Car Name</th>
                                                <td class=""><?php echo $res['car_Name'];?></td>
                                                <th class="text-center">Car Brand</th>
                                                <td class=""><?php echo $res['carBrand_Name'];?></td>
                                                <th class="text-center noDisplay">Car Year</th>
                                                <td class="noDisplay"><?php echo $res['car_Year'];?></td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center">First Name</th>
                                                <td><?php echo $res['dealer_FName'];?></td>
                                                <th class="text-center">Last Name</th>
                                                <td><?php echo $res['dealer_LName'];?></td>
                                                <th class="text-center noDisplay">Dealership</th>
                                                <td class="noDisplay"><?php echo $res['dealer_Dealership'];?></td>
                                                
                                            </tr>

                                        </table>
                                    </div>
									
									
									
								</div>
								<div class="productTable">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
												<th class="text-center">Caption</th>
                                                <th class="text-center">Image</th>
												<th class="text-center noDisplay" width="18%">Status</th>
                                                <th class="text-center" width="18%">Date & Time</th>
												<th class="text-center" width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
                                                $cid=$_GET["url"];
												$sql="SELECT * FROM car_gallery
												INNER JOIN cars ON cars.car_ID=car_gallery.CarId
												WHERE (cars.car_Status!='Terminated' AND cars.car_Status!='Deleted') AND cars.car_ID='$cid'";
												
												$queryresult=mysqli_query($connect,$sql);
												while($row=mysqli_fetch_assoc($queryresult))
												{
                                            ?>
											<tr id="<?php echo $row["carGallery_ID"]; ?>">
												<td class="text-center carField"><?php echo $row["carGallery_Caption"];?></td>
												<td class="text-center carField">
                                                    <a data-toggle="modal" id="<?php echo $row['carGallery_ID'];?>" class="viewImageClass" style="cursor:pointer;" data-target="#viewImage"><i id="<?php echo $row['carGallery_ID'];?>" class="fa fa-image fa-2x viewImageClass"></i></a>
                                                </td>
												<td class="text-center noDisplay">
                                                <?php 
                                                    if($row["carGallery_Status"]=="Available")
                                                    {
                                                        echo "<label class='label label-success'>Available</label>";
                                                ?>
                                                        <span data-toggle="tooltip" title="Mark Archived"><button id="<?php echo $row['carGallery_ID'];?>" class='btn btn-danger btn-xs markArchived'><i class='fa fa-archive' aria-hidden='true'></i></button></span>
														
                                                <?php
                                                    }
                                                    else if($row["carGallery_Status"]=="Archived")
													{
														echo "<label class='label label-danger'>Archived</label>";
                                                ?>
                                                        <span data-toggle="tooltip" title="Mark Available"><button id="<?php echo $row['carGallery_ID'];?>" class='btn btn-success btn-xs markAvailable'><i class='fa fa-check' aria-hidden='true'></i></button></span>
																
                                                <?php
													}
                                                    else if($row["carGallery_Status"]=="Not Available")
                                                    {
                                                        echo "<label class='label label-warning'>Not Available</label>";
                                                ?>
                                                        <span data-toggle="tooltip" title="Mark Archived"><button id="<?php echo $row['carGallery_ID'];?>" class='btn btn-danger btn-xs markArchived'><i class='fa fa-archive' aria-hidden='true'></i></button></span>
														
                                                <?php
                                                    }
                                                ?>
                                                </td>
                                                <td class="text-center">
												    <?php 
                                                        $time=$row['carGallery_tStamp'];
                                                        $date = date("d-M-Y g:i A", strtotime($time));
														echo "<span style='font-size:12px;'><i>".$date."</i></span>";
													?>
														
											    </td>
                                                <td class="text-center">
                                                    <?php
                                                        if($row["carGallery_Status"]=="Archived")
                                                        {
                                                    ?>
													<button name="update_image" disabled class="btn btn-sm btn-circle btn-warning update_image" id="<?php echo $row["carGallery_ID"]; ?>">
														<span data-toggle='tooltip' title="You can't edit until Archived"><i class='fa fa-edit fa-lg'></i></span>
													</button>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                    <button name="update_image" class="btn btn-sm btn-circle btn-warning update_image" id="<?php echo $row["carGallery_ID"]; ?>">
														<span data-toggle='tooltip' title="Edit Image Record"><i class='fa fa-edit fa-lg'></i></span>
													</button>
                                                            
                                                    <?php
                                                        }
                                                    ?>
													<button style="margin-left:10px" class="btn btn-sm btn-circle btn-danger removeCarImage" id="<?php echo $row["carGallery_ID"]; ?>">
														<span data-toggle='tooltip' title="Remove Car"><i class='fa fa-remove fa-lg'></i></span>
													</button>
												</td>
											</tr>
											<?php 
												
												}  
											?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
	</div>
    <!-- Add New Image Modal -->
	<div class="modal fade" id="addNewImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width: 40%;">
			<div class="modal-content">
                <form class="form-horizontal" id="submitCategoryForm" action="createImage.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="getCarId" id="getCarId" value="<?php echo $c_id=$_GET["url"];?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Image</h4>
                    </div>
                    <div class="modal-body" id="car_detail" style="max-height:450px; overflow:auto;">
                        <div class="form-group">
                            <label for="categoryName" class="col-sm-3 control-label">Image</label>
							<div class="col-sm-8">
								<input type="file" name="file" id="file" required accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" required autocomplete="off">
							</div>
                        </div>
                        <div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Caption</label>
							<div class="col-sm-8">
								<input type="text" class="form-control text-capitalize" maxlength="45" required id="caption" placeholder="Caption" name="caption" autocomplete="off">
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="createCategoryBtn" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
    <!-- MaxImage Cars Modal -->
	<div class="modal fade" id="maxCarImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width: 45%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> Max Images - Car (Alert)</h4>
				</div>
				<div class="modal-body" id="My_Detail" style="max-height:450px; overflow:auto;text-align:center">
					<h3>Reached upto Max Images for Car</h3>
                    <p style="color: red;">There are maximum image limit for the car is 10 Images</p>
                    <small style="color: red;"><i>You have reached maximum limit. First delete some image and then add again</i></small>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <!-- View Individual Image Modal -->
	<div class="modal fade" id="viewOneImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width: 77%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View Image</h4>
				</div>
				<div class="modal-body" id="image_detail" style="max-height:450px; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>		
    <!-- View Cars Modal -->
	<div class="modal fade" id="viewCarModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width: 77%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View Car Detail</h4>
				</div>
				<div class="modal-body" id="car_detail" style="max-height:450px; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <!-- Update Modal -->
	<div class="modal fade" id="updateImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="update_form" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-pencil"></i> Update Car Image Detail</h4>
					</div>
					<div class="modal-body" style="max-height:450px; overflow:auto;">
                        
						<div class="form-group">
							<label for="updatenewstitle" class="col-sm-3 control-label">Caption </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" required id="updateCaption" name="updateCaption" autocomplete="off">
							</div>
						</div>
						<div class="form-group hideMe">
							<label for="categoryStatus" class="col-sm-3 control-label">Image Status </label>
							<div class="col-sm-8">
								<select class="form-control" required id="upCarStatus" name="upCarStatus">
									<option value="">Select Image Status</option>
									<option value="Available">Available</option>
									<option value="Not Available">Not Available</option>
								</select>
							</div>
						</div>
                        <div class="form-group showMe">
							<label for="updatenewstitle" class="col-sm-3 control-label"></label>
							<div class="col-sm-8" style="color:red;">
                                <h4>Your current status is Archived.</h4>
                                <small><i>First change your status from archived, then you will able to change it.</i></small>
                            </div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="updateImageBtn">Update</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						<input type="hidden" name="image_id" id="image_id" />
                        <input type="hidden" name="admin_id" value="<?php echo $Id;?>">
                        <input type="hidden" name="dealer_id" value="<?php echo $dealer_id;?>">
                        <input type="hidden" name="car_id" value="<?php echo $_GET['url'];?>">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Gallery-->
	<div class="modal fade" id="viewCarImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:90%;margin-top:4%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-photo-o"></i> View Car Image Gallery</h4>
				</div>
				<div class="modal-body" id="car_images_gallery" style="max-height:86%; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
   
		<!-- jQuery -->
        <script src="Bootstrap/js/jquery.min.js"></script>
		<script src="Bootstrap/js/metisMenu.min.js"></script>
    	<script src="Bootstrap/js/bootstrap.min.js"></script>
    	<script src="Bootstrap/js/startmin.js"></script>
    	<script src="Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
    	<script src="Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
		<script src="Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            $('.showMe').hide();
            $('[data-toggle="tooltip"]').tooltip();
            
            function redirect(){
                
                location= "CompleteGallery.php?url=<?php echo $_GET['url'];?>";
            }
            $(document).on('click','#addNewImageBtn',function(){
                //$('#maxCarImageModal').show('modal');
                //data-toggle="modal" data-target="#addNewImage"
                var car_id=$(this).attr("name");
                //alert(car_id);
                $.ajax({  
                    url:"checkCImages.php",  
                    method:"POST",  
                    data:{car_id:car_id},  
                    success:function(data)
                    {
                        var max=10;  
                        //alert(data);
                        if(data<max)
                        {
                            //$('#addNewImageBtn').attr('data-toggle','modal');
                            //$('#addNewImageBtn').attr('data-target','#addNewImageModal');
                            //$('#addNewImageModal').show('modal');
                            $("#addNewImageModal").modal();
                        }
                        else if(data>=max)
                        {
                            //$('#maxCarImageModal').show('modal');
                            $("#maxCarImageModal").modal();
                        }
                    }  
                });  

            });

            $(document).on('click', '.viewImageClass', function()
            {  
                var image_id = $(this).attr("id");
                //alert(image_id);  
                if(image_id != '')  
                {  
                    $.ajax({  
                        url:"selectOneImage.php",  
                        method:"POST",  
                        data:{image_id:image_id},  
                        success:function(data)
                        {  
                            $('#image_detail').html(data);  
                            $('#viewOneImageModal').modal('show');  
                        }  
                    });  
                }            
            });
            $(document).on('click', '.markArchived', function(){  
                var car_image_id = $(this).attr("id"); 
                //alert(car_image_id);
                $.ajax({  
                        url:"carArchived.php",  
                        method:"POST",  
                        data:{car_image_id:car_image_id},  
                        success:function(data){  
                            Swal.fire({
                                position: 'center',
                                type: 'warning',
                                showCloseButton: true,
                                title: 'Image Archived',
                                text:'Car image has been archived.',
                                customClass: 'animated tada',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        setTimeout(function() { redirect(); }, 3000);
                        }  
                }); 
            });
            $(document).on('click', '.markAvailable', function(){  
                var car_image_id = $(this).attr("id"); 
                //alert(car_image_id);
                $.ajax({  
                        url:"carAvailable.php",  
                        method:"POST",  
                        data:{car_image_id:car_image_id},  
                        success:function(data){  
                            Swal.fire({
                                position: 'center',
                                type: 'warning',
                                showCloseButton: true,
                                title: 'Image Available',
                                text:'Car image has been available.',
                                customClass: 'animated tada',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        setTimeout(function() { redirect(); }, 3000);
                        }  
                }); 
            });
            //Remove Car Image 
            $(document).on('click','.removeCarImage',function(){
                car_image_Id=$(this).attr("id");
                //alert(car_image_Id);
                if(confirm('Are you sure to remove this record ?'))
				{
					$.ajax({
						url: 'removeCarImage.php',
						type: 'POST',
						data: {car_image_Id: car_image_Id},
						error: function() {
						 alert('Something is wrong');
						},
						success: function(data)
						{
							$("#"+car_image_Id).remove();
							Swal.fire({
								position: 'center',
								type: 'warning',
								showCloseButton: true,
								title: 'Car Image Deleted',
								text:'Car image deleted permanently ...!!',
								customClass: 'animated tada',
								showConfirmButton: false,
								timer: 3000
							});
							setTimeout(function() { redirect(); }, 3000);
						}
					});
				}
            });
            $(document).on('click', '.update_image', function(){  
		    var car_image_id = $(this).attr("id");
            //alert(car_id);
			$.ajax({
			url:"fetchCar.php",  
			method:"POST",  
			data:{car_image_id:car_image_id},  
			dataType:"json",  
			success:function(data)
			{  
				$('#updateCaption').val(data.carGallery_Caption);
                if(data.carGallery_Status=="Archived")
                {
                    $('.hideMe').hide();
                    $('.showMe').show();
                }
                else
                {
                    $('#upCarStatus').val(data.carGallery_Status);
                   //$('.showMe').hide();
                }
                $('#image_id').val(data.carGallery_ID);
				$('#updateImageModal').modal('show');
            
            }
            });
            });
        
            $('#update_form').on('submit',function(){
                event.preventDefault();
                $.ajax({  
                    url:"updateCarImage.php",  
                    method:"POST",  
                    data:$('#update_form').serialize(),  
                    beforeSend:function(){  
                        $('#updateImageBtn').val("Updating..");  
                    },  
                    success:function(data)
                    {  
                        $('#update_form')[0].reset();  
                        $('#updateImageModal').modal('hide');  
                        $('#productTable').html(data);
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            showCloseButton: true,
                            title: 'Image Detail has been updated',
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
