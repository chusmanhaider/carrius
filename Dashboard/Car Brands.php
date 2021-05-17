<?php
session_start();
//error_reporting(0);
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
$Name=$result['admin_Name'];
$adUser=$result['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Panel- Car Brands</title>
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
		<style>
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
			
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #135fd7;border-color:#135fd7;">
                <div class="navbar-header">
					<a class="headerLogo" href="Car Brands.php">
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
                                <a href="Car Brands.php" class="active"><i class="fa fa-list fa-fw"></i> Car Brands</a>
                            </li>
							<li>
                                <a href="Cars.php"><i class="fa fa-car fa-fw"></i> Cars</a>
                            </li>
							
							<li>
                                <a href="Registered User.php"><i class="fa fa-user fa-fw"></i>Manage Users<span class="fa arrow"></span></a>
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
                        <h1 class="page-header">Car Brands</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-edit"></i> Manage Car Brands
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
								<div class="remove-messages">
									<?php
										if(isset($_GET['errorMsg']))
										{
											echo "<span class='text-danger'>Error while adding a car</span>";
										}
										else if(isset($_GET['msg']))
										{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											Car added successfully
										</div>";
										}
									?>
								</div>
							<div class="row">
									<div class="div-action pull pull-right" style="padding-bottom:20px;margin-right:20px">
										<button class="btn btn-primary button1" data-toggle="modal" id="addCategoryModalBtn" data-target="#addCategoryModal"> <i class="fa fa-plus fa-faw"></i> Add Car Brand </button>
									</div>
									<div class="pull pull-left" style="margin-left:20px;">
										<a href="Car Brands.php" class="btn btn-info">
											<span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh"></span>
										</a>
									</div>
								</div>
                            <div class="dataTable_wrapper">
								<div class="category_table">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
												<th class="text-center">No.</th>
                                                <th class="text-center">Brand Name</th>
                                                <th class="text-center">Brand Status</th>
												<th class="text-center">Added On</th>
												<th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php  
												$sql = "SELECT* FROM cars_brand order by carBrand_Name asc";
												$counter=1;
												$result = mysqli_query($connect, $sql);
												if (mysqli_num_rows($result) > 0) 
												{
													while($var=mysqli_fetch_array($result))
													{ 	
											?>	
													<tr id="<?php echo $var["carBrand_ID"]; ?>">
														<td class="text-center"><?php echo $counter;?></td>
														<td class="text-center text-capitalize"><?php echo $var["carBrand_Name"]?></td>
														<td class="text-center">
															<?php 
																if($var["carBrand_Status"]=="Available")
																{
																	echo "<label class='label label-success'>Available</label>";
																}
																else if($var["carBrand_Status"]=="Not Available")
																{
																	echo "<label class='label label-warning'>Not Available</label>";
																}
																else if($var["carBrand_Status"]=="Terminated")
																{
																	echo "<label class='label label-danger'>Terminated</label>";
																}
															?>
														</td>
														<td class="text-center">
															<?php 
															echo "<small style='color:#004BB4'><i>".$var['carBrand_tStamp']."</i></small>";?>
														</td>
														<td class="text-center">
															<button class="btn btn-sm btn-circle btn-warning update_cate" id="<?php echo $var["carBrand_ID"]; ?>">
																<i class='fa fa-edit fa-lg'></i>
															</button>
															<button style="margin-left:4%" class="btn btn-sm btn-circle btn-danger remove_cate" id="<?php echo $var["carBrand_ID"]; ?>">
																<i class='fa fa-remove fa-lg'></i>
															</button>
														</td>
													</tr>
												<?php
													$counter=$counter+1;
													}
												}
											?>	
                                        </tbody>
                                    </table>
									</div>
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
        <!-- /#wrapper -->
	<!-- add category -->
	<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="submitCategoryForm" action="createBrand.php" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Car Brand</h4>
					</div>
					<div class="modal-body" style="max-height:450px; overflow:auto;">
						<div id="add-category-messages">
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Brand Name </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control text-capitalize" maxlength="50" required id="categoryName" placeholder="Brand Name" name="categoryName" autocomplete="off">
							</div>
							<span id="avail" style="margin-left:215px;"></span>
							<span id="lengthcheck" class="text-danger" style="margin-left:215px;">Brand Name is too short</span>
						</div>
						<div class="form-group">
							<label for="categoryStatus" class="col-sm-3 control-label">Brand Status </label>
							<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-8">
									<select class="form-control" disabled required id="categoryStatus" name="categoryStatus">
										<option value="">Select Brand Status</option>
										<option value="Available">Available</option>
										<option value="Not Available">Not Available</option>
										
									</select>
								</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" disabled class="btn btn-success" id="createCategoryBtn" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- update product -->
	<div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="update_form" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Update Brand Name</h4>
					</div>
					<div class="modal-body" style="max-height:450px; overflow:auto;">
						<div class="form-group">
							<label for="updateCategoryName" class="col-sm-3 control-label">Brand Name </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control text-capitalize"  id="updateCategoryName" autocomplete="off" name="updateCategoryName">
							</div>
							<span id="availUpdate" style="margin-left:215px;"></span>
							<span id="lengthcheckUpdate" class="text-danger" style="margin-left:215px;">Brand Name is too short</span>
						</div> 
						<div class="form-group">
							<label for="categoryStatus" class="col-sm-3 control-label">Brand Status </label>
							<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-8">
									<select class="form-control" required id="updateCategoryStatus" name="updateCategoryStatus">
										<option value="">Select Brand Status</option>
										<option value="Available">Available</option>
										<option value="Not Available">Not Available</option>
										<option value="Terminated">Terminated</option>
									</select>
								</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="category_id" id="category_id" />
						<input type="submit" name="update" id="Update" disabled value="Update" class="btn btn-success" />
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
					</div>
				</form>
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
	<script type="text/javascript" src="js/category.js"></script>
    </body>
</html>

