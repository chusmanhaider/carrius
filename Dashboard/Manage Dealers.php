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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <title>Admin Panel- Manage Dealers</title>
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
			}
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #135fd7;border-color:#135fd7;">
				<div class="navbar-header">
					<a class="headerLogo" href="Manage Dealers.php">
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
					<h1 class="page-header"><i class="fa fa-users"></i> Dealers</h1>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="page-heading"> <i class="fa fa-edit"></i> Manage Dealers
							<?php
								$count=0;
								$sql = "SELECT * FROM dealer where dealer_Status='Terminated'";
								$qTest=mysqli_query($connect,$sql);
								while($row=mysqli_fetch_assoc($qTest))
								{
									if($row['dealer_Status']=='Terminated')
									{
										$count=$count+1;
									}
								}
								if($count>0)
								{
								?>
								<div class="pull pull-right" style="margin-top:-5px">
									<button class="btn btn-sm btn-danger removedDealers"><span data-toggle='tooltip' title="Removed Dealers List"><i class="fa fa-trash fa-lg"></i></span></button>
								</div>
								<?php
								}
							?>
							
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="div-action pull pull-right" style="padding-bottom:20px;margin-right:20px">
									<button class="btn btn-primary button1" data-toggle="modal" id="addDealerModalBtn" data-target="#addDealerModal"> <i class="fa fa-user-plus"></i> Add Dealer </button>
								</div>
								<div class="pull pull-left" style="margin-left:20px;">
									<a href="Manage Dealers.php" class="btn btn-info">
										<span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh"></span>
									</a>
								</div>
								<div class="pull pull-left" style="margin-left:140px; width:450px">
									<?php
									if(isset($_GET['msg']))
									{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-check'></i> <strong>Success !!</strong> New dealer has been added
										</div>";
									}
									else if(isset($_GET['msgError']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding new dealer
										</div>";
									}
								?>
								</div>
							</div>
							<div class="salesman_table">
							<table class="table table-hover table-striped table-responsive table-bordered" id="dataTables-example">
								<thead>
									<tr>
										<th class="text-center">Full Name</th>
										<th class="text-center">Dealership</th>
										<th class="text-center noDisplay">Type</th>
										<th class="text-center">Location</th>
										<th class="text-center">Status</th>
										<th class="text-center" style="width:16%;">Action</th>
									</tr>
								</thead>
									<tbody>
									<?php
										$counter=1;
										$sql="Select * from dealer where dealer_Status!='Terminated' order by dealer_FName asc";

										$queryresult=mysqli_query($connect,$sql);
										while($row=mysqli_fetch_assoc($queryresult))
										{
									?>
									<tr id="<?php echo $row["dealer_ID"];  ?>">
										<td class="text-center text-capitalize carField"><?php echo $row["dealer_FName"]." ".$row["dealer_LName"];?></td>
										<td class="text-center text-capitalize carField setLargeWidth"><?php echo $row["dealer_Dealership"];?></td>
										<td class="text-center text-capitalize noDisplay"><?php echo $row["dealer_Type"];?></td>
										<td class="text-center text-capitalize carField setLargeWidth"><?php echo $row["dealer_Location"];?></td>
										<td class="text-center">
											<?php
												if($row["dealer_Status"]=='Suspended')
													echo "<label class='label label-danger'>Suspended</label>";
												else if($row["dealer_Status"]=='Active')
													echo "<label class='label label-success'>Active</label>";
												else if($row["dealer_Status"]=='Pending')
												{
													echo "<label class='label label-warning'>Pending</label>";
												
											?>
													<span data-toggle="tooltip" title="Mark Active"><button id="<?php echo $row['dealer_ID'];?>" class='btn btn-success btn-xs markApprove'><i class='fa fa-check' aria-hidden='true'></i></button></span>
													<span data-toggle="tooltip" title="Mark Reject"><button id="<?php echo $row['dealer_ID'];?>" class='btn btn-danger btn-xs markReject'><i class='fa fa-remove' aria-hidden='true'></i></button>
											<?php
												}
												else if($row["dealer_Status"]=='Rejected')
												{
													echo "<label class='label label-danger'>Rejected</label>";
												}
											?>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-circle btn-primary viewDealerDetail" id="<?php echo $row["dealer_ID"];  ?>">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </button>
											<button class="btn btn-sm btn-circle btn-warning updateDealerDetail" id="<?php echo $row["dealer_ID"]; ?>">
                                                <i class="fa fa-edit fa-lg"></i>
                                            </button>
											<button class="btn btn-sm btn-circle btn-danger removeDealerDetail" id="<?php echo $row["dealer_ID"]; ?>">
                                                <i class="fa fa-remove fa-lg"></i>
                                            </button>
											<?php
											
												if($row['dealer_NumCarStock']>0)
												{
													echo "<button class='btn btn-sm btn-circle btn-info dealerCarDetail' id='$row[dealer_ID]'>";
												}
												
												else
												{
													echo "<span data-toggle='tooltip' title='No Car Available'><button class='btn btn-sm btn-circle btn-info disabled dealerCarDetail' style='margin-left:5px;' id='$row[dealer_ID]'>";
												}
											?>
												<i class="fa fa-arrow-right fa-lg"></i>
                                            </button></span>
										</td>
									</tr>
								<?php
									$counter=$counter+1;
									}
								?>
									</tbody>
							</table>
							</div>
						</div>
					</div>
                </div> 
                    <!-- /.col-lg-12 -->
            </div> 
        </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
	
	<!----- Add Dealer Modal -->
	<div class="modal fade" id="addDealerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:50%;margin-top:1%">
			<div class="modal-content" style="padding:3%">
				<form class="form-horizontal" id="submitCategoryForm" action="createDealer.php" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-user"></i> Add Dealer</h4>
					</div>
					<div class="modal-body">
						<div id="add-category-messages">
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#basicInfo">Basic Info</a></li>
							<li><a data-toggle="tab" href="#businessInfo">Dealership Info</a></li>
							<li><a data-toggle="tab" href="#loginInfo">Login</a></li>
							<li><a data-toggle="tab" href="#scheduleInfo">Schedule</a></li>
							<li><a data-toggle="tab" href="#commentInfo">Comment</a></li>
						</ul>
						<div class="tab-content">
							<div id="basicInfo" class="tab-pane fade in active">
								<h3>Basic Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">First Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="firstName" placeholder="First Name" name="firstName" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Last Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="lastName" placeholder="Last Name" name="lastName" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Phone Number *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="60" required id="phoneNumber" placeholder="Phone Number" name="phoneNumber" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Image </label>
									<div class="col-sm-8">
										<input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Dealer Status *</label>
										<div class="col-sm-8">
											<select class="form-control" required id="carStatus" name="carStatus">
												<option value="">Select Dealer Status</option>
												<option value="Active">Active</option>
												<option value="Suspended">Suspended</option>
												<option value="Pending">Pending</option>
											</select>
										</div>
								</div>
							</div>
							<div id="businessInfo" class="tab-pane fade">
								<h3>Dealership Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Dealership/Group Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="160" required id="dealershipGroup" placeholder="XYZ Dealership Ltd" name="dealershipGroup" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Main Location *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="160" required id="dealershipLoc" placeholder="Dealership Location" name="dealershipLoc" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Total Dealerships *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="dealerships" placeholder="Total Dealerships" name="dealerships" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Agents *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="salespeopleAgent" placeholder="Total Agents" name="salespeopleAgent" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Stock *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="carStock" placeholder="Car Stock" name="carStock" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryEName" class="col-sm-3 control-label">Dealership Type *</label>
									<div class="col-sm-8" style="margin-top: 6px;">
										<div class="row">
											<div class="form-check form-check-inline col col-sm-6">
												<input class="form-check-input" type="radio" value="Private Owner" name="dealershipType" id="privateRadio">
												<label class="form-check-label" for="inlineRadio3">Private Owner</label>
											</div>
											<div class="form-check form-check-inline col col-sm-6">
												<input class="form-check-input" type="radio" value="Franchise Group" name="dealershipType" id="franchiseRadio">
												<label class="form-check-label" for="inlineRadio4">Franchise Group</label>
											</div>				
										</div>
										
									</div>
								</div>
							</div>
							<div id="loginInfo" class="tab-pane fade">
								<h3>Login Information</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Email *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="60" required id="email" placeholder="Email" name="email" autocomplete="off">
											<div id="emailCheck" style="color:red;"></div>
										</div>
										
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Username *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="30" required id="username" placeholder="Username" name="username" autocomplete="off">
											<div id="usernameCheck" style="color:red;"></div>
										</div>
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Password *</label>
										<div class="col-sm-7">
											<input type="password" class="form-control" maxlength="36" required id="password" placeholder="Password" name="password" autocomplete="off">
										</div>
										<div class="col-sm-2">
											<span toggle="#password-field tooltip" title="Show/Hide Password" class="fa fa-fw fa-eye field_icon toggle-password fa-2x"></span>
											
										</div>
									</div>
									<div id="passwordCheck" style="color:red;margin-left:165px"></div>
								</div>
							</div>
							<div id="scheduleInfo" class="tab-pane fade">
								<h3>Schdeule</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="row">
										<label for="categoryName" class="col-sm-2 control-label">From Day *</label>
											<div class="col-sm-4">
												<select class="form-control" id="fromDay" name="fromDay">
													<option val="">Select Day</option>
													<option val="Monday">Monday</option>
													<option val="Tuesday">Tuesday</option>
													<option val="Wednesday">Wednesday</option>
													<option val="Thrusday">Thrusday</option>
													<option val="Friday">Friday</option>
													<option val="Saturday">Saturday</option>
													<option val="Sunday">Sunday</option>
												</select>
											</div>
											<label for="categoryName" class="col-sm-2 control-label">To Day *</label>
											<div class="col-sm-4">
												<select class="form-control" id="toDay" name="toDay">
													<option val="">Select Day</option>
													<option val="Monday">Monday</option>
													<option val="Tuesday">Tuesday</option>
													<option val="Wednesday">Wednesday</option>
													<option val="Thrusday">Thrusday</option>
													<option val="Friday">Friday</option>
													<option val="Saturday">Saturday</option>
													<option val="Sunday">Sunday</option>
												</select>
											</div>
									</div>
									
								</div> 
								<div class="form-group">
									<div class="row">
										<label for="categoryName" class="col-sm-2 control-label">From Time</label>
										<div class="col-sm-4">
											<input type="time" class="form-control" id="fromTime" name="fromTime">
										</div>
										<label for="categoryName" class="col-sm-2 control-label">To Time</label>
										<div class="col-sm-4">
											<input type="time" class="form-control" id="toTime" name="toTime">
										</div>
									</div>
								</div>
							</div>
							<div id="commentInfo" class="tab-pane fade">
								<h3>Comment</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Comment </label>
									<div class="col-sm-8">
										<textarea class="form-control" maxlength="1000" rows="10" id="comment" name="comment"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="createCategoryBtn" name="createDealer" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- View ShopKeeper Modal -->
	<div class="modal fade" id="viewDealerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:70%;margin-top:4%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View Dealer</h4>
				</div>
				<div class="modal-body" id="dealer_detail" style="max-height:450px; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Removed Dealership Modal -->
	<div class="modal fade" id="viewRemovedDealerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:90%;margin-top:2%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" style="color:red"><i class="fa fa-remove"></i> Removed Dealers</h4>
				</div>
				<div class="modal-body" id="removeDealership_detail" style="max-height:450px; overflow:auto;width:100%">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- update dealer -->
	<div class="modal fade" id="updateDealerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:65%;">
			<div class="modal-content">
				<form class="form-horizontal" id="update_form" method="POST">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-refresh"></i> Update Dealer</h4>
					</div>
					<div class="modal-body">
						<div id="add-category-messages">
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#upbasicInfo">Basic Info</a></li>
							<li><a data-toggle="tab" href="#upbusinessInfo">Dealership Info</a></li>
							<li><a data-toggle="tab" href="#uploginInfo">Login</a></li>
							<li><a data-toggle="tab" href="#upscheduleInfo">Schedule</a></li>
							<li><a data-toggle="tab" href="#upcommentInfo">Comment</a></li>
						</ul>
						<div class="tab-content">
							<div id="upbasicInfo" class="tab-pane fade in active">
								<h3>Basic Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">First Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="upfirstName" placeholder="First Name" name="upfirstName" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Last Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="uplastName" placeholder="Last Name" name="uplastName" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Phone Number *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="30" required id="upphoneNumber" placeholder="Phone Number" name="upphoneNumber" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Dealer Status *</label>
										<div class="col-sm-8">
											<select class="form-control" required id="upcarStatus" name="upcarStatus">
												<option value="">Select Dealer Status</option>
												<option value="Active">Active</option>
												<option value="Suspended">Suspended</option>
												<option value="Pending">Pending</option>
											</select>
										</div>
								</div>
							</div>
							<div id="upbusinessInfo" class="tab-pane fade">
								<h3>Dealership Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Dealership/Group Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="160" required id="updealershipGroup" placeholder="XYZ Dealership Ltd" name="updealershipGroup" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Main Location *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="160" required id="updealershipLoc" placeholder="Dealership Location" name="updealershipLoc" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Total Dealerships *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="updealerships" placeholder="Total Dealerships" name="updealerships" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Agents *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="upsalespeopleAgent" placeholder="Total Agents" name="upsalespeopleAgent" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Car Stock *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control text-capitalize" min="1" required id="upcarStock" placeholder="Car Stock" name="upcarStock" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryEName" class="col-sm-3 control-label">Dealership Type *</label>
									<div class="col-sm-8" style="margin-top: 6px;">
										<div class="row">
											<div class="form-check form-check-inline col col-sm-6">
												<input class="form-check-input" type="radio" value="Private Owner" name="updealershipType" id="upprivateRadio">
												<label class="form-check-label" for="inlineRadio3">Private Owner</label>
											</div>
											<div class="form-check form-check-inline col col-sm-6">
												<input class="form-check-input" type="radio" value="Franchise Group" name="updealershipType" id="upfranchiseRadio">
												<label class="form-check-label" for="inlineRadio4">Franchise Group</label>
											</div>				
										</div>
										
									</div>
								</div>
							</div>
							<div id="uploginInfo" class="tab-pane fade">
								<h3>Login Information</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Email *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="60" required id="upemail" placeholder="Email" name="upemail" autocomplete="off">
											<div id="emailCheck" style="color:red;"></div>
										</div>
										
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Username *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="30" readonly="" id="upusername" placeholder="Username" name="upusername" autocomplete="off">
											<div id="usernameCheck" style="color:red;"></div>
										</div>
									</div>
									
								</div>
							</div>
							<div id="upscheduleInfo" class="tab-pane fade">
								<h3>Schdeule</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="row">
										<label for="categoryName" class="col-sm-2 control-label">From Day *</label>
											<div class="col-sm-3">
												<select class="form-control" id="upfromDay" name="upfromDay">
													<option val="">Select Day</option>
													<option val="Monday">Monday</option>
													<option val="Tuesday">Tuesday</option>
													<option val="Wednesday">Wednesday</option>
													<option val="Thrusday">Thrusday</option>
													<option val="Friday">Friday</option>
													<option val="Saturday">Saturday</option>
													<option val="Sunday">Sunday</option>
												</select>
											</div>
											<label for="categoryName" class="col-sm-2 control-label">To Day *</label>
											<div class="col-sm-3">
												<select class="form-control" id="uptoDay" name="uptoDay">
													<option val="">Select Day</option>
													<option val="Monday">Monday</option>
													<option val="Tuesday">Tuesday</option>
													<option val="Wednesday">Wednesday</option>
													<option val="Thrusday">Thrusday</option>
													<option val="Friday">Friday</option>
													<option val="Saturday">Saturday</option>
													<option val="Sunday">Sunday</option>
												</select>
											</div>
									</div>
									
								</div> 
								<div class="form-group">
									<div class="row">
										<label for="categoryName" class="col-sm-2 control-label">From Time</label>
										<div class="col-sm-3">
											<input type="time" class="form-control" id="upfromTime" name="upfromTime">
											<span id="fromTime"></span>
										</div>
										<label for="categoryName" class="col-sm-2 control-label">To Time</label>
										<div class="col-sm-3">
											<input type="time" class="form-control" id="uptoTime" name="uptoTime">
										</div>
									</div>
								</div>
							</div>
							<div id="upcommentInfo" class="tab-pane fade">
								<h3>Comment</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Comment </label>
									<div class="col-sm-8">
										<textarea class="form-control" maxlength="1000" rows="10" id="upcomment" name="upcomment"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="dealer_id" id="dealer_id">
						<input type="hidden" name="user_id" value="<?php echo $Id;?>">
						<input type="submit" name="update" id="Update" value="Update" class="btn btn-success" />
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- remove dealer -->
	<div class="modal fade" id="removeSalesmanModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="remove_form" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-trash"></i> Remove Dealership</h4>
					</div>
					<div class="modal-body" style="max-height:450px; overflow:auto;">
						<h4><span style="color:red">Do you want to remove dealer ?</span></h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal"> <i class="glyphicon glyphicon-ok-sign"></i> Close</button>
						<button type="submit" class="btn btn-danger" id="removeSalesmanBtn"><i class="glyphicon glyphicon-remove-sign"> Remove</i></button>
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
		<script type="text/javascript" src="js/Manage Dealers.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#dataTables-example').DataTable({
					responsive: true
				});
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
    </body>
</html>
