<?php
session_start();
error_reporting(0);
include("../../db_connect.php");
$dealerUserProfile=$_SESSION['loggedInDealerUser'];
if($dealerUserProfile==true){	
}
else{
	header('location:../Login.php');
}
$query="Select * from dealer where dealer_Username='$dealerUserProfile'";
$data=mysqli_query($connect,$query);
$result=mysqli_fetch_assoc($data);
$fullName=$result['dealer_FName']." ".$result['dealer_LName'];
$Id=$result['dealer_ID'];
$username=$result['dealer_Username'];
$myImage=$result['dealer_Image'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dealer Panel</title>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="../Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../Bootstrap/css/metisMenu.min.css" rel="stylesheet">
		<link href="../Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="../Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="../Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
		<style>
			.news 
			{
				width: 95%;
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
			}
			.headerLogo{
				float: left;
				margin-top: 5px;
				margin-left: 20px;
			}
			.navbar-top-links>li>a{
				color:white;
			}
			.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover,
			.navbar-top-links>li>a:hover,.navbar-top-links>.open>a,.nav .open>a, .nav .open>a:focus, .nav .open>a:hover{
				background-color: #71d1e4;
			}
            .navbar-inverse .navbar-toggle{
                border-color:#337ab7;
            }
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #71d1e4;border-color:#71d1e4;">
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
					<li class="dropdown navbar-inverse" style="background-color: #71d1e4;border-color:#71d1e4;">
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
								<img src="<?php echo $myImage;?>" alt="Profile" class="avatar">
							</li>
							<li class="text-center">
								<?php
									echo "<b><font size='3px' style='overflow:hidden;'>".$fullName."</font></b>";
								?>
							</li>
							<li class="text-center">
								<?php
									echo "<small style='overflow:hidden;'>Username: <i>".$username."</i></small>";
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
                                <a href="Dealer.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
							<li>
                                <a href="My Car.php"><i class="fa fa-car fa-fw"></i> My Cars</a>
                            </li>
                            <li>
                                <a href="Profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
							<li>
                                <a href="Business Profile.php"><i class="fa fa-list fa-fw"></i> Business Profile</a>
                            </li>
                            
							<li>
                                <a href="Help Request.php" class="active"><i class="fa fa-question-circle-o fa-fw"></i> Help</a>
                            </li>  
                        </ul>
                    </div>
                </div>
            </nav>
		
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ask for Help</h1>
                    </div>
                </div>
                <div class="row">
					<div class="col-lg-12">
                        <div class="panel panel-info">
							<div class="panel-heading">
							 <div class="row">
							  <div class="col-md-6"><i class="fa fa-question-circle-o fa-fw"></i> Ask for Help</div>
							 </div>
							</div>
							<div class="panel-body" id="display_request">
								<div class="dataTable_wrapper" id="helpListTable">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-capitalize">Shopkeeper Name</th>
												<th class="text-capitalize text-center">Shop Name</th>
                                                <th class="text-center">Reason</th>
												<th class="text-center">Status</th>
												<th class="text-center">Replied By</th>
												<th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$sql = "SELECT * FROM shopkeepers INNER JOIN question ON shopkeepers.shopkeeper_ID = question.shopkeeper_Id"; 
												$queryresult=mysqli_query($connect,$sql);
												while($row=mysqli_fetch_assoc($queryresult))
												{
                                            ?>
											<tr>
												<td class="text-center text-capitalize"><?php echo $row["shopkeeper_name"];?></td>
												<td class="text-center text-capitalize"><?php echo $row["shopkeeper_shopName"];?></td>
												<td class="text-center">
												<?php 
													$reason=$row["help_Reason"];
													if($reason==0)
														echo "<label class='label label-danger'>Order Delay</label>";
													else if($reason==1)
														echo "<label class='label label-danger'>Product Damage</label>";
													else if($reason==2)
														echo "<label class='label label-danger'>Extra Charges</label>";
													else
														echo "<label class='label label-danger'>Others</label>";
												?>
												</td>
												<td class="text-center">
												<?php
													$status=$row['help_status'];
													if($status==0)
														echo "<label class='label label-danger'>Not Replied</label>";
													else
														echo "<label class='label label-success'>Replied</label>";
												?>
												</td>
												<td class="text-center text-capitalize">
												<?php 
													if($row['salesId']==-1)
														echo "<label class='label label-danger'>Not Replied</label>";
													else if ($row['salesId']!=-1)
													{
														$sal_id=$row['salesId'];
														$t_query="Select * from salesman where salesman_ID='$sal_id'";
														$thisRow=mysqli_query($connect,$t_query);
														$thisRecord=mysqli_fetch_array($thisRow);
														echo "<i><span data-toggle='tooltip' title='Salesman'>".$thisRecord['salesman_name']."</span></i>";
													}
													?>
												</td>
												<td class="text-center">
													<button class="btn btn-sm btn-circle btn-primary viewHelp" id="<?php echo $row["help_ID"];  ?>">
                                                        <i class="fa fa-eye fa-fw"></i>
                                                    </button>
													<?php
														if($row['help_status']==0)
														{
															echo "<button class='btn btn-sm btn-circle btn-info replyHelp' style='margin-left:5px;' id='$row[help_ID]'>";
														}
														else
														{
															echo "<button data-toggle='tooltip' title='Reply Done' class='btn btn-sm btn-circle btn-danger disabled replyHelp' style='margin-left:5px;' id='$row[help_ID]'>";
														}
													?>
														<i class="fa fa-reply fa-fw"></i>
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
						</div>
					</div>
				
				</div>
			</div>
			<!-- View Help request Modal -->
			<div class="modal fade" id="viewHelpModal" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><i class="fa fa-eye"></i> View Help Request</h4>
						</div>
						<div class="modal-body" id="help_detail" style="max-height:450px; overflow:auto;">
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Reply on help --->
			<div class="modal fade" id="replyHelpModal" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" id="reply_help_form" method="POST" enctype="multipart/form-data">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="fa fa-hand-o-right"></i> Reply on help</h4>
							</div>
							<div class="modal-body" style="max-height:450px; overflow:auto;">
								<div class="row form-group">
									<label for="reqDate" class="col-sm-3 control-label">Request Date</label>
									<div class="col-sm-9">
										<input type="text" readonly="" id="reqDate" name="reqDate" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<label for="upName" class="col-sm-3 control-label">Name</label>
									<div class="col-sm-9">
										<input type="text" readonly="" id="upName" name="upName" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<label for="upShopName" class="col-sm-3 control-label">Shop Name</label>
									<div class="col-sm-9">
										<input type="text" readonly="" id="upShopName" name="upShopName" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<label for="upShopAddr" class="col-sm-3 control-label">Address</label>
									<div class="col-sm-9">
										<input type="text" readonly="" id="upShopAddr" name="upShopAddr" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<label for="upReason" class="col-sm-3 control-label">Reason</label>
									<div class="col-sm-9">
										<input type="text"  id="helpReason" readonly="" name="upReason" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<label for="upDetail" class="col-sm-3 control-label">Detail</label>
									<div class="col-sm-9">
										<input type="text" readonly="" id="upDetail" name="upDetail" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<label for="up" class="col-sm-3 control-label">Reply</label>
									<div class="col-sm-9">
										<textarea rows="3" min="10" max="200" class="form-control z-depth-1" placeholder="Write Reply here..." name="reply" id="reply"></textarea>
									</div>
									<span id="replyLength" style="margin-left:160px;"></span> 
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-info" disabled id="replyHelpBtn" autocomplete="off">Reply</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
								<input type="hidden" name="help_id" id="help_id" />
								<input type="hidden" name="sales_id" id="sales_id" value="<?php echo $Id;?>"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <!-- /#wrapper -->

		<!-- jQuery -->
        <script src="../Bootstrap/js/jquery.min.js"></script>
		<script src="../Bootstrap/js/metisMenu.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/startmin.js"></script>
		<script src="../Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
		<script src="../Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
		<script src="../Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<script src="../Bootstrap/js/project/helpRequest.js"></script>
    </body>
</html>
