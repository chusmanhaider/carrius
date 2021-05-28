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
$Id=$result['admin_ID'];
$Name=$result['admin_Name'];
$adUser=$result['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Panel - Cars</title>
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
		<style>
			.carField{
				overflow: hidden;
				white-space: nowrap;
				max-width: 80px;
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
				max-width: 10px;
				text-overflow: ellipsis;
			}
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
			
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #135fd7;border-color:#135fd7;">
                <div class="navbar-header">
					<a class="headerLogo" href="Cars.php">
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
                                <a href="Cars.php" class="active"><i class="fa fa-car fa-fw"></i> Cars</a>
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
                        <h1 class="page-header">Cars</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-edit"></i> Manage Cars
								<?php
								$count=0;
								$sql = "SELECT * FROM cars_brand INNER JOIN cars ON cars_brand.carBrand_ID = cars.CarBrandId WHERE cars.car_Status='Terminated' ORDER BY cars.car_tStamp DESC";
								$res=mysqli_query($connect,$sql);
								while($row=mysqli_fetch_assoc($res))
								{
									if($row['car_Status']=="Terminated")
									{
										$count=$count+1;
									}
								}
								
								if($count>0)
								{
								?>
								<div class="pull pull-right" style="margin-top:-5px">
									<button class="btn btn-sm btn-danger removedProducts"><span data-toggle='tooltip' title="Terminated Car List"><i class="fa fa-trash fa-lg"></i></span></button>
								</div>
								<?php
								}
								?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
								<div class="remove-messages">
								<?php
									if(isset($_GET['msg']))
									{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-check'></i> <strong>Success !!</strong> Car has added
										</div>";
									}
									else if(isset($_GET['msgError']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding car
										</div>";
									}
									else if(isset($_GET['msgOther']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding other details
										</div>";
									}
									else if(isset($_GET['msgSuccess']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding other details
										</div>";
									}
									else if(isset($_GET['msgErrorUpdate']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding other details
										</div>";
									}
								?>
								</div>
							<div class="row">
								<div class="pull pull-right" style="padding-bottom:20px;margin-right:20px">
									<button class="btn btn-primary button1" data-toggle="modal" id="addCategoryModalBtn" data-target="#addCategoryModal"> <i class="fa fa-plus fa-faw"></i> Add Car</button>
								</div>
								<div class="pull pull-left" style="margin-left:20px;">
									<a href="Cars.php" class="btn btn-info">
										<span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh"></span>
									</a>
								</div>
							</div>
                            <div class="dataTable_wrapper">
								<div class="category_table">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
												<th class="text-center">Car Name</th>
                                                <th class="text-center noDisplay">Year</th>
												<th class="text-center yesDisplay">Dealer</th>
                                                <th class="text-center yesDisplay">Location</th>
												<th class="text-center noDisplay">Price</th>
												<th class="text-center yesDisplay">Status</th>
												<th class="text-center yesDisplay" style="width:20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php  
												//$sql = "SELECT * FROM cars_brand INNER JOIN cars ON cars_brand.carBrand_ID = cars.CarBrandId WHERE cars.car_Status!='Terminated' AND cars.car_Status!='Deleted' ORDER BY cars.car_Name ASC";
												/*$sql= "SELECT * 
												  ORDER BY cars.car_Name asc
												";*/
												$sql="SELECT * 
												FROM cars
												INNER JOIN dealer
													ON dealer.dealer_ID=cars.DealerId
												INNER JOIN cars_brand
													ON cars_brand.carBrand_ID=cars.CarBrandId
												WHERE (cars.car_Status!='Terminated' AND cars.car_Status!='Deleted')";
												$counter=1;
												$result = mysqli_query($connect, $sql);
												if (mysqli_num_rows($result) > 0) 
												{
													while($var=mysqli_fetch_array($result))
													{ 	
											?>	
													<tr id="<?php echo $var["car_ID"]; ?>">
														<td class="text-center text-capitalize carField" style="width:12%"><?php echo $var["car_Name"]?></td>
														<td class="text-center text-capitalize noDisplay" style="width:12%"><?php echo $var["car_Year"]?></td>
														<td class="text-center text-capitalize carField setLargeWidth" style="width:25%"><span data-toggle="tooltip" title="Edit Dealership"><i role="button" id="<?php echo $var['dealer_ID'];?>" name="<?php echo $var['car_ID']; ?>" class="fa fa-edit updateDealership updateDealerModalBtn" data-toggle="modal" data-target="#updateDealerModal" style="cursor:pointer;color:blue;margin-right:10px;max-width:10px;"></i></span><?php echo $var["dealer_Dealership"];?></td>
														<td class="text-center text-capitalize carField setLargeWidth"><?php echo $var["dealer_Location"]?></td>
														<td class="text-center text-capitalize noDisplay"><?php echo "<small style='font-size:13px;color:#004BB4'>".$var["car_Price"]." $</small>"?></td>
														<td class="text-center">
														<?php
															if($var["car_AutoStatus"]=="Active")
															{
																if($var["car_Status"]=="Available")
																{
																	echo "<label class='label label-success'>Available</label>";
																}
																else if($var["car_Status"]=="Pending")
																{
																	echo "<label class='label label-info'>Pending</label>";
																}
																else if($var["car_Status"]=="Rejected")
																{
																	echo "<label class='label label-danger'>Rejected</label>";
																}
																else if($var["car_Status"]=="Not Available")
																{
																	echo "<label class='label label-warning'>Not Available</label>";
																}
																else if($var["car_Status"]=="Sold")
																{
																	echo "<label class='label label-primary'>Sold</label>";
																}
															} 
															else if($var["car_AutoStatus"]=="Pending")
															{
																if($var["car_Status"]=="Available")
																{
																	echo "<label class='label label-success'>Available</label><span data-toggle='tooltip' title='Your approval required'><i style='margin-left:2px;color:red;' class='fa fa-question-circle'></i></span>";
																}
																else if($var["car_Status"]=="Pending")
																{
																	echo "<label class='label label-info'>Pending</label><span data-toggle='tooltip' title='Your approval required'><i style='margin-left:2px;' class='fa fa-question-circle'></i></span>";
																}
																else if($var["car_Status"]=="Rejected")
																{
																	echo "<label class='label label-danger'>Rejected</label><span data-toggle='tooltip' title='Your approval required'><i style='margin-left:2px;' class='fa fa-question-circle'></i></span>";
																}
																else if($var["car_Status"]=="Not Available")
																{
																	echo "<label class='label label-warning'>Not Available</label><span data-toggle='tooltip' title='Your approval required'><i style='margin-left:2px;' class='fa fa-question-circle'></i></span>";
																}
																
															?>
															<br>
															<div style="margin-top:5px;">
																<span data-toggle="tooltip" title="Mark Available"><button id="<?php echo $var['car_ID'];?>" class='btn btn-success btn-xs markApprove'><i class='fa fa-check' aria-hidden='true'></i></button></span>
																<span data-toggle="tooltip" title="Mark Rejected"><button id="<?php echo $var['car_ID'];?>" class='btn btn-danger btn-xs markReject'><i class='fa fa-remove' aria-hidden='true'></i></button></span>
															</div>
															<?php
															}
															else
															{
																if($var["car_Status"]=="Rejected")
																{
																	echo "<label class='label label-danger'>Rejected</label>";
																}	
															}
															?>
														</td>
														
														<td class="text-center">
															<button class="btn btn-sm btn-circle btn-info view_car_gallery" id="<?php echo $var["car_ID"]; ?>">
																<span data-toggle='tooltip' title="Car Images Gallery"><i class='fa fa-picture-o fa-lg'></i></span>
															</button>
															<button class="btn btn-sm btn-circle btn-primary view_car" id="<?php echo $var["car_ID"]; ?>">
																<span data-toggle='tooltip' title="View Car"><i class='fa fa-eye fa-lg'></i></span>
															</button>
															<button name="<?php echo $var["dealer_FName"]; ?>" class="btn btn-sm btn-circle btn-warning update_car" id="<?php echo $var["car_ID"]; ?>">
																<span data-toggle='tooltip' title="Edit Car Record"><i class='fa fa-edit fa-lg'></i></span>
															</button>
															<button class="btn btn-sm btn-circle btn-danger remove_car" id="<?php echo $var["car_ID"]; ?>">
																<span data-toggle='tooltip' title="Remove Car"><i class='fa fa-remove fa-lg'></i></span>
															</button>
															<button class="btn btn-sm btn-circle btn-secondary complete_gallery" id="<?php echo $var["car_ID"]; ?>">
																<span data-toggle='tooltip' title="Complete Gallery"><i class='fa fa-arrow-right fa-lg'></i></span>
															</button>
														</td>
													</tr>
												<?php
													echo "<input type='hidden' name='dealer_id' id='".$var['dealer_ID']."'>";
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
	<!-- Update Dealer -->
	<div class="modal fade" id="updateDealerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:45%;margin-top:1%">
			<div class="modal-content">
				<form class="form-horizontal" id="update_dealer_form" method="POST"><div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-refresh"></i> Update Dealer</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="admin_id" value="<?php echo $Id;?>">
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">Dealership/GroupName</label>
							<div class="col-sm-7">
								<select class="form-control text-capitalize" required id="updateCarDealerNew" name="updateCarDealerNew">
									<option value="">Select Car Dealership/GroupName</option>
									<?php
										$sql_d="SELECT * from dealer Where dealer_Status!='Terminated'";
										$res=mysqli_query($connect,$sql_d);
										$numROW_Dealer=mysqli_num_rows($res);
										if($numROW_Dealer>0)
										{
											while($var=mysqli_fetch_assoc($res))
											{
									?>
									<option class='text-capitalize' name="<?php echo $var['dealer_ID'];?>" value="<?php echo $var['dealer_Dealership'];?>"><?php echo $var['dealer_Dealership'];?></option>
															
									<?php
											}
										}
										else
											echo "No result found";
									?>
												
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">Dealer Location </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" readonly="" id="selectedDealerLocation" name="selectedDealerLocation">

							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">Enter Your Password </label>
							<div class="col-sm-7">
								<input type="password" class="form-control" id="adminPassword" name="<?php echo $Id;?>">

							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label"></label>
							<div class="col-sm-7">
								<p id="showError"></p>

							</div>
						</div>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="car_id" id="car_id" />
						<input type="hidden" name="currentDealerId" id="currentDealerId">
						<input type="hidden" name="newDealerId" id="newDealerId">
						<input type="submit" name="UpdateDealership" id="UpdateDealership" value="Update" class="btn btn-success" />
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- add car -->
	<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:45%;margin-top:1%">
			<div class="modal-content">
				<form class="form-horizontal" id="submitCategoryForm" action="createCar.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php echo $Id;?>">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Car</h4>
					</div>
					<div class="modal-body">
						<div id="add-category-messages">
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#basicInfo">Basic Information</a></li>
							<li><a data-toggle="tab" href="#vehicleOverview">Vehicle Overview</a></li>
							<li><a data-toggle="tab" href="#keyFeature">Key Features</a></li>
							<li><a data-toggle="tab" href="#image">Image Gallery</a></li>
						</ul>
						<div class="tab-content">
							<div id="basicInfo" class="tab-pane fade in active">
								<h3>Basic Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Name </label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="carName" placeholder="Car Name" name="carName" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Year </label>
									<div class="col-sm-4">
										<select class="form-control" required id="year" name="year">
											<option value="">Select Year</option>
											<option value="2030">2030</option>
											<option value="2029">2029</option>
											<option value="2028">2028</option>
											<option value="2027">2027</option>
											<option value="2026">2026</option>
											<option value="2025">2025</option>
											<option value="2024">2024</option>
											<option value="2023">2023</option>
											<option value="2022">2022</option>
											<option value="2021">2021</option>
											<option value="2020">2020</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="2010">2010</option>
											<option value="2009">2009</option>
											<option value="2008">2008</option>
											<option value="2007">2007</option>
											<option value="2006">2006</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
											<option value="1977">1977</option>
											<option value="1976">1976</option>
											<option value="1975">1975</option>
											<option value="1974">1974</option>
											<option value="1973">1973</option>
											<option value="1972">1972</option>
											<option value="1971">1971</option>
											<option value="1970">1970</option>
											<option value="1969">1969</option>
											<option value="1968">1968</option>
											<option value="1967">1967</option>
											<option value="1966">1966</option>
											<option value="1965">1965</option>
											<option value="1964">1964</option>
											<option value="1963">1963</option>
											<option value="1962">1962</option>
											<option value="1961">1961</option>
											<option value="1960">1960</option>
											<option value="1959">1959</option>
											<option value="1958">1958</option>
											<option value="1957">1957</option>
											<option value="1956">1956</option>
											<option value="1955">1955</option>
											<option value="1954">1954</option>
											<option value="1953">1953</option>
											<option value="1952">1952</option>
											<option value="1951">1951</option>
											<option value="1950">1950</option>
											<option value="1949">1949</option>
											<option value="1948">1948</option>
											<option value="1947">1947</option>
											<option value="1946">1946</option>
											<option value="1945">1945</option>
											<option value="1944">1944</option>
											<option value="1943">1943</option>
											<option value="1942">1942</option>
											<option value="1941">1941</option>
											<option value="1940">1940</option>
											<option value="1939">1939</option>
											<option value="1938">1938</option>
											<option value="1937">1937</option>
											<option value="1936">1936</option>
											<option value="1935">1935</option>
											<option value="1934">1934</option>
											<option value="1933">1933</option>
											<option value="1932">1932</option>
											<option value="1931">1931</option>
											<option value="1930">1930</option>
											<option value="1929">1929</option>
											<option value="1928">1928</option>
											<option value="1927">1927</option>
											<option value="1926">1926</option>
											<option value="1925">1925</option>
											<option value="1924">1924</option>
											<option value="1923">1923</option>
											<option value="1922">1922</option>
											<option value="1921">1921</option>
											<option value="1920">1920</option>
											<option value="1919">1919</option>
											<option value="1918">1918</option>
											<option value="1917">1917</option>
											<option value="1916">1916</option>
											<option value="1915">1915</option>
											<option value="1914">1914</option>
											<option value="1913">1913</option>
											<option value="1912">1912</option>
											<option value="1911">1911</option>
											<option value="1910">1910</option>
											<option value="1909">1909</option>
											<option value="1908">1908</option>
											<option value="1907">1907</option>
											<option value="1906">1906</option>
											<option value="1905">1905</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Car Brand </label>
										<div class="col-sm-4">
											<select class="form-control" required id="selectedCarBrand" name="selectedCarBrand">
												<option value="">Select Brand</option>
												<?php
													$sql="SELECT* FROM cars_brand WHERE carBrand_Status='Available'";
													$resu=mysqli_query($connect,$sql);
													while($t=mysqli_fetch_assoc($resu))
													{
														echo "<option class='text-capitalize' value='".$t['carBrand_ID']."'>".$t['carBrand_Name']."</option>";
													}
												?>
												
											</select>
										</div>
										<label for="categoryStatus" class="col-sm-1 control-label">Type</label>
										<div class="col-sm-3">
											<select class="form-control" required id="selectedCarType" name="selectedCarType">
												<option value="">Select Type</option>
												<?php
													$sql="SELECT* FROM cars_type WHERE cType_Status='Available'";
													$resu=mysqli_query($connect,$sql);
													while($t=mysqli_fetch_assoc($resu))
													{
														echo "<option class='text-capitalize' value='".$t['cType_ID']."'>".$t['cType_Name']."</option>";
													}
												?>
												
											</select>
										</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Mileage</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize" maxlength="200" required id="carMileage" placeholder="Car Mileage" name="carMileage" autocomplete="off">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="Miles" readonly="" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Dealer </label>
									<div class="col-sm-8">
										<select class="form-control carDealer" required id="carDealer" name="carDealer">
											<option value="">Select Dealership/Group Name</option>
												<?php
													$sql="SELECT* FROM dealer WHERE dealer_Status='Active'";
													$resu=mysqli_query($connect,$sql);
													$numRows=mysqli_num_rows($resu);
													if($numRows>0)
													{
														while($t=mysqli_fetch_assoc($resu))
														{
															echo "<option class='text-capitalize' id='".$t['dealer_ID']."' value='".$t['dealer_ID']."'>".$t['dealer_Dealership'].", ".$t['dealer_Location']."</option>";
														}
													}
													else
														echo "<option value=''>No Record Found</option>";
												?>
												
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Price</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize col-sm-3" min="1" maxlength="10" required id="carPrice" placeholder="Car Price" name="carPrice" autocomplete="off">
										<small style="color:grey"><i>Price will be in dollars ($)</i></small>
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="Dollars ($)" readonly="" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Electric</label>
									<div class="col-sm-8" style="margin-top: 6px;">
										<div class="row">
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="Yes" name="isElectric" id="inlineRadio1">
												<label class="form-check-label" for="inlineRadio1">Yes</label>
											</div>
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="No" name="isElectric" id="inlineRadio2">
												<label class="form-check-label" for="inlineRadio2">No</label>
											</div>				
										</div>
										
									</div>
								</div>
								<div class="form-group">
									<label for="categoryEName" class="col-sm-3 control-label">Car Condition</label>
									<div class="col-sm-8" style="margin-top: 6px;">
										<div class="row">
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="New" name="carCondition" id="newRadio">
												<label class="form-check-label" for="inlineRadio3">New</label>
											</div>
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="Used" name="carCondition" id="usedRadio">
												<label class="form-check-label" for="inlineRadio4">Used</label>
											</div>				
										</div>
										
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Car Status </label>
										<div class="col-sm-8">
											<select class="form-control" required id="carStatus" name="carStatus">
												<option value="">Select Car Status</option>
												<option value="Available">Available</option>
												<option value="Not Available">Not Available</option>
												<option value="Sold">Sold</option>
											</select>
										</div>
								</div>
							</div>
							<div id="vehicleOverview" class="tab-pane fade">
								<h3>Vehicle Overview</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Body Type </label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="bodyType" placeholder="Body Type" name="bodyType" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Colour</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="30" required id="carColor" placeholder="Car Colour" name="carColor" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label"> # Doors [<span data-toggle='tooltip' title="Total Number of Doors" style="color:red;">?</span>]</label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" placeholder="Doors" required id="carDoors" name="carDoors" autocomplete="off">
									</div>
									<label for="categoryName" class="col-sm-2 control-label"> <span data-toggle='tooltip' title="Total Number of Seats"># Seats</span></label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" placeholder="Seats" required id="carSeats" name="carSeats" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label"><span data-toggle='tooltip' title="Total Number of Owner"># Owner</span> </label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" required id="carOwner" placeholder="Owner" name="carOwner" autocomplete="off">
									</div>
									<label for="categoryName" class="col-sm-2 control-label">Drivetrain </label>
									<div class="col-sm-3">
										<select class="form-control" required id="carDrivetrain" name="carDrivetrain">
											<option value="">Select</option>
											<option value="AWD">AWD</option>
											<option value="FWD">FWD</option>
											<option value="RWD">RWD</option>
											<option value="4WD">4WD</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Engine Type</label>
									<div class="col-sm-3">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="carEngineType" placeholder="Engine Type" name="carEngineType" autocomplete="off">
									</div>
									<label for="categoryName" class="col-sm-2 control-label"># Gears</label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" max="20" required id="carGear" placeholder="Total Gears" name="carGear" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Fuel Type</label>
									<div class="col-sm-4">
										<select class="form-control" required id="carFuelType" name="carFuelType">
											<option value="">Select Fuel Type</option>
											<option value="CNG">CNG</option>
											<option value="Diesel">Diesel</option>
											<option value="Hybrid">Hybrid</option>
											<option value="Patrol">Patrol</option>
											<hr>
											<option value="Other">Other</option>
										</select>

									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="carFuelTypeOther" placeholder="Fuel Type" name="carFuelType" autocomplete="off">
										
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">CO2 emissions</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize" min="0" required id="carCOEmission" placeholder="CO2 Emissions" name="carCOEmission" autocomplete="off">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="grams/kg" readonly="" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Tank Capacity</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="6" id="tankCapacity" placeholder="Tank Capacity" name="tankCapacity" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Horsepower</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize" min="1" required id="horsepower" placeholder="Horsepower" name="horsepower" autocomplete="off">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="hp" readonly="" >
									</div>
								</div>
								
							</div>
							<div id="keyFeature" class="tab-pane fade">
								<h3>Key Features</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Bluetooth </label>
									<div class="col-sm-8">
										<select class="form-control" id="bluetooth" name="bluetooth">
											<option value="">Select Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Back Camera </label>
									<div class="col-sm-8">
										<select class="form-control" id="backCamera" name="backCamera">
											<option value="">Select Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Alloy Rims </label>
									<div class="col-sm-8">
										<select class="form-control" id="alloyRims" name="alloyRims">
											<option value="">Select Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Sunroof/Moonroof </label>
									<div class="col-sm-8">
										<select class="form-control" id="sunMoonRoof" name="sunMoonRoof">
											<option value="">Select Option</option>
											<option value="Moonroof">Moonroof</option>
											<option value="Sunroof">Sunroof</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Leatherette Seats</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="leatheretteSeats" placeholder="Leatherette Seats" name="leatheretteSeats" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Heated Front Seat(s)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="hFrontSeats" placeholder="Heated Front Seat(s)" name="hFrontSeats" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Lane Departure Warning</label>
									<div class="col-sm-8">
										<select class="form-control" required id="laneDepartureWarning" name="laneDepartureWarning">
											<option value="">Select Lane Departure Warning</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Keyless Entry</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="45" required id="keylessEntry" placeholder="Keyless Entry" name="keylessEntry" autocomplete="off">
									</div>
								</div>
							</div>
							<div id="image" class="tab-pane fade">
								<h3>Image Gallery</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :1*</label>
									<div class="col-sm-5">
										<input type="file" name="fileOne" id="mainImage" required accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" required autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" required id="caption_PicOne" placeholder="Caption" name="caption_PicOne" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :2*</label>
									<div class="col-sm-5">
										<input type="file" name="fileTwo" id="imageTwo" required accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" required autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" required id="caption_PicTwo" placeholder="Caption" name="caption_PicTwo" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :3*</label>
									<div class="col-sm-5">
										<input type="file" name="fileThree" id="imageThree" required accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" required autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" required id="caption_PicThree" placeholder="Caption" name="caption_PicThree" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :4</label>
									<div class="col-sm-5">
										<input type="file" name="fileFour" id="imageFour" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" id="caption_PicFour" placeholder="Caption" name="caption_PicFour" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :5</label>
									<div class="col-sm-5">
										<input type="file" name="fileFive" id="imageFive" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" id="caption_PicFive" placeholder="Caption" name="caption_PicFive" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :6</label>
									<div class="col-sm-5">
										<input type="file" name="fileSix" id="imageSix" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" id="caption_PicSix" placeholder="Caption" name="caption_PicSix" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :7</label>
									<div class="col-sm-5">
										<input type="file" name="fileSeven" id="imageSeven" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" id="caption_PicSeven" placeholder="Caption" name="caption_PicSeven" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Image :8</label>
									<div class="col-sm-5">
										<input type="file" name="fileEight" id="imageEight" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control text-capitalize" maxlength="45" id="caption_PicEight" placeholder="Caption" name="caption_PicEight" autocomplete="off">
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="createCategoryBtn" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- update cars -->
	<div class="modal fade" id="updateCarModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="update_form" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-refresh"></i> Update Car</h4>
					</div>
					<div class="modal-body">
						<div id="add-category-messages">
						<input type="hidden" name="admin_id" value="<?php $Id;?>">
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#updateBasicInfo">Basic Information</a></li>
							<li><a data-toggle="tab" href="#updateVehicleOverview">Vehicle Overview</a></li>
							<li><a data-toggle="tab" href="#updateKeyFeature">Key Features</a></li>
						</ul>
						<div class="tab-content">
							<div id="updateBasicInfo" class="tab-pane fade in active">
								<h3>Basic Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Name </label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="updateCarName" name="updateCarName" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Year </label>
									<div class="col-sm-4">
										<select class="form-control" required id="updateYear" name="updateYear">
											<option value="">Select Year</option>
											<option value="2030">2030</option>
											<option value="2029">2029</option>
											<option value="2028">2028</option>
											<option value="2027">2027</option>
											<option value="2026">2026</option>
											<option value="2025">2025</option>
											<option value="2024">2024</option>
											<option value="2023">2023</option>
											<option value="2022">2022</option>
											<option value="2021">2021</option>
											<option value="2020">2020</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="2010">2010</option>
											<option value="2009">2009</option>
											<option value="2008">2008</option>
											<option value="2007">2007</option>
											<option value="2006">2006</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
											<option value="1977">1977</option>
											<option value="1976">1976</option>
											<option value="1975">1975</option>
											<option value="1974">1974</option>
											<option value="1973">1973</option>
											<option value="1972">1972</option>
											<option value="1971">1971</option>
											<option value="1970">1970</option>
											<option value="1969">1969</option>
											<option value="1968">1968</option>
											<option value="1967">1967</option>
											<option value="1966">1966</option>
											<option value="1965">1965</option>
											<option value="1964">1964</option>
											<option value="1963">1963</option>
											<option value="1962">1962</option>
											<option value="1961">1961</option>
											<option value="1960">1960</option>
											<option value="1959">1959</option>
											<option value="1958">1958</option>
											<option value="1957">1957</option>
											<option value="1956">1956</option>
											<option value="1955">1955</option>
											<option value="1954">1954</option>
											<option value="1953">1953</option>
											<option value="1952">1952</option>
											<option value="1951">1951</option>
											<option value="1950">1950</option>
											<option value="1949">1949</option>
											<option value="1948">1948</option>
											<option value="1947">1947</option>
											<option value="1946">1946</option>
											<option value="1945">1945</option>
											<option value="1944">1944</option>
											<option value="1943">1943</option>
											<option value="1942">1942</option>
											<option value="1941">1941</option>
											<option value="1940">1940</option>
											<option value="1939">1939</option>
											<option value="1938">1938</option>
											<option value="1937">1937</option>
											<option value="1936">1936</option>
											<option value="1935">1935</option>
											<option value="1934">1934</option>
											<option value="1933">1933</option>
											<option value="1932">1932</option>
											<option value="1931">1931</option>
											<option value="1930">1930</option>
											<option value="1929">1929</option>
											<option value="1928">1928</option>
											<option value="1927">1927</option>
											<option value="1926">1926</option>
											<option value="1925">1925</option>
											<option value="1924">1924</option>
											<option value="1923">1923</option>
											<option value="1922">1922</option>
											<option value="1921">1921</option>
											<option value="1920">1920</option>
											<option value="1919">1919</option>
											<option value="1918">1918</option>
											<option value="1917">1917</option>
											<option value="1916">1916</option>
											<option value="1915">1915</option>
											<option value="1914">1914</option>
											<option value="1913">1913</option>
											<option value="1912">1912</option>
											<option value="1911">1911</option>
											<option value="1910">1910</option>
											<option value="1909">1909</option>
											<option value="1908">1908</option>
											<option value="1907">1907</option>
											<option value="1906">1906</option>
											<option value="1905">1905</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Car Brand </label>
										<div class="col-sm-8">
											<select class="form-control" required id="updateCarBrand" name="updateCarBrand">
												<option value="">Select Car Brand</option>
												<?php
													$sql="SELECT* FROM cars_brand WHERE carBrand_Status='Available'";
													$resu=mysqli_query($connect,$sql);
													while($t=mysqli_fetch_assoc($resu))
													{
														echo "<option class='text-capitalize' value='".$t['carBrand_ID']."'>".$t['carBrand_Name']."</option>";
													}
												?>
												
											</select>
										</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Mileage</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize" maxlength="200" required id="updateCarMileage" name="updateCarMileage" autocomplete="off">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="Miles" readonly="" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Dealer <span data-toggle="tooltip" title="Use Edit icon along dealer column to update" style="color:red">[?]</span></label>
									<div class="col-sm-8">
										<select class="form-control" id="updateCarDLoc" disabled name="updateCarDLoc">
												<option value="">Select Car Dealership/GroupName</option>
												<?php
													$sql_d="SELECT * from dealer Where dealer_Status!='Terminated'";
													$res=mysqli_query($connect,$sql_d);
													$numROW_Dealer=mysqli_num_rows($res);
													if($numROW_Dealer>0)
													{
														while($var=mysqli_fetch_assoc($res))
														{
												?>
															<option name="<?php echo $var['dealer_ID'];?>" value="<?php echo $var['dealer_Dealership'];?>"><?php echo $var['dealer_Dealership'];?></option>
															
												<?php
														}
													
													}
													else
														echo "No result found";
												?>
												
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Price</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize col-sm-3" min="1" maxlength="10" required id="updateCarPrice" name="updateCarPrice" autocomplete="off">
										<small style="color:grey"><i>Price will be in dollars ($)</i></small>
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="Dollars ($)" readonly="" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Electric</label>
									<div class="col-sm-8" style="margin-top: 6px;">
										<div class="row">
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="Yes" name="update_isElectric" id="update_isElect_ROne">
												<label class="form-check-label" for="inlineRadio1">Yes</label>
											</div>
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="No" name="update_isElectric" id="update_isElect_RTwo">
												<label class="form-check-label" for="inlineRadio2">No</label>
											</div>				
										</div>
										
									</div>
								</div>
								<div class="form-group">
									<label for="categoryEName" class="col-sm-3 control-label">Car Condition</label>
									<div class="col-sm-8" style="margin-top: 6px;">
										<div class="row">
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="New" name="update_carCondition" id="updateNewRadio">
												<label class="form-check-label" for="inlineRadio3">New</label>
											</div>
											<div class="form-check form-check-inline col col-sm-3">
												<input class="form-check-input" type="radio" value="Used" name="update_carCondition" id="updateUsedRadio">
												<label class="form-check-label" for="inlineRadio4">Used</label>
											</div>				
										</div>
										
									</div>
								</div>
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Car Status </label>
										<div class="col-sm-8">
											<select class="form-control" required id="updateCarStatus" name="updateCarStatus">
												<option value="">Select Car Status</option>
												<option value="Available">Available</option>
												<option value="Not Available">Not Available</option>
												<option value="Sold">Sold</option>
											</select>
										</div>
								</div>
							</div>
							<div id="updateVehicleOverview" class="tab-pane fade">
								<h3>Vehicle Overview</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Body Type </label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="upBodyType" placeholder="Body Type" name="upBodyType">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Colour</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="30" required id="upCarColor" placeholder="Car Colour" name="upCarColor" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label"> # Doors [<span data-toggle='tooltip' title="Total Number of Doors" style="color:red;">?</span>]</label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" placeholder="Doors" required id="upCarDoors" name="upCarDoors" autocomplete="off">
									</div>
									<label for="categoryName" class="col-sm-2 control-label"> <span data-toggle='tooltip' title="Total Number of Seats"># Seats</span></label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" placeholder="Seats" required id="upCarSeats" name="upCarSeats" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label"><span data-toggle='tooltip' title="Total Number of Owner"># Owner</span> </label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" required id="upCarOwner" placeholder="Owner" name="upCarOwner" autocomplete="off">
									</div>
									<label for="categoryName" class="col-sm-2 control-label">Drivetrain </label>
									<div class="col-sm-3">
										<select class="form-control" required id="upCarDrivetrain" name="upCarDrivetrain">
											<option value="">Select</option>
											<option value="AWD">AWD</option>
											<option value="FWD">FWD</option>
											<option value="RWD">RWD</option>
											<option value="4WD">4WD</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Engine Type</label>
									<div class="col-sm-3">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="upCarEngineType" placeholder="Engine Type" name="upCarEngineType" autocomplete="off">
									</div>
									<label for="categoryName" class="col-sm-2 control-label"># Gears</label>
									<div class="col-sm-3">
										<input type="number" class="form-control text-capitalize" min="1" max="20" required id="upcarGear" placeholder="Total Gears" name="upcarGear" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Fuel Type</label>
									<div class="col-sm-4">
										<select class="form-control" required id="upCarFuelType" name="upCarFuelType">
											<option value="">Select Fuel Type</option>
											<option value="CNG">CNG</option>
											<option value="Diesel">Diesel</option>
											<option value="Hybrid">Hybrid</option>
											<option value="Patrol">Patrol</option>
											<hr>
											<option value="Other">Other</option>
										</select>

									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="upCarFuelTypeOther" placeholder="Fuel Type" name="upCarFuelTypeOther" autocomplete="off">
										
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">CO2 emissions</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize" maxlength="40" required id="upCarCOEmission" placeholder="CO2 Emissions" name="upCarCOEmission" autocomplete="off">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="grams/kg" readonly="" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Tank Capacity</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="6" id="upTankCapacity" placeholder="Tank Capacity" name="upTankCapacity" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Horsepower</label>
									<div class="col-sm-5">
										<input type="number" class="form-control text-capitalize" min="1" required id="uphorsepower" placeholder="Horsepower" name="uphorsepower" autocomplete="off">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="hp" readonly="" >
									</div>
								</div>
							</div>
							<div id="updateKeyFeature" class="tab-pane fade">
								<h3>Key Features</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Bluetooth </label>
									<div class="col-sm-8">
										<select class="form-control" id="upBluetooth" name="upBluetooth">
											<option value="">Select Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Back Camera </label>
									<div class="col-sm-8">
										<select class="form-control" id="upBackCamera" name="upBackCamera">
											<option value="">Select Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Alloy Rims </label>
									<div class="col-sm-8">
										<select class="form-control" id="upAlloyRims" name="upAlloyRims">
											<option value="">Select Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Sunroof/Moonroof </label>
									<div class="col-sm-8">
										<select class="form-control" id="upSunMoonRoof" name="upSunMoonRoof">
											<option value="">Select Option</option>
											<option value="Moonroof">Moonroof</option>
											<option value="Sunroof">Sunroof</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Leatherette Seats</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="upleatheretteSeats" placeholder="Leatherette Seats" name="upleatheretteSeats" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Heated Front Seat(s)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="uphFrontSeats" placeholder="Heated Front Seat(s)" name="uphFrontSeats" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Lane Departure Warning</label>
									<div class="col-sm-8">
										<select class="form-control" required id="uplaneDepartureWarning" name="uplaneDepartureWarning">
											<option value="">Select Lane Departure Warning</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Keyless Entry</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="45" required id="upKeylessEntry" placeholder="Keyless Entry" name="upKeylessEntry" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="hidden" name="car_Id" id="car_Id" />
						<input type="hidden" name="updateDealerId" id="updateDealerId">
						<input type="hidden" name="car_overview_Id" id="car_overview_Id" />
						<input type="hidden" name="car_feature_Id" id="car_feature_Id" />
						<input type="submit" name="update" id="Update" value="Update" class="btn btn-success" />
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Removed View Product Modal -->
	<div class="modal fade" id="viewremoveProductModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:90%;margin-top:4%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" style="color:red;"><i class="fa fa-remove"></i> Removed Cars</h4>
				</div>
				<div class="modal-body" id="reproduct_detail" style="max-height:450px; overflow:auto;">
					
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
	<!-- View Cars Images Modal -->
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
	<script type="text/javascript" src="js/products.js"></script>
	
	
	</body>
</html>

