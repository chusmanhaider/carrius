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


$d_id=$_GET['id'];
$query="Select * from buyer where buyer_ID='$d_id' AND buyer_Status!='Terminated'";
$re=mysqli_query($connect, $query);
$row=mysqli_fetch_assoc($re);
$fname=$row['buyer_FName'];
$lname=$row['buyer_LName'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<title>Admin Panel-Reset Buyer Password</title>
		<link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
		<link href="Bootstrap/css/thisCSS.css" rel="stylesheet">
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
					<a class="headerLogo" href="ChangePass-Admin.php">
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
                                <a href="#"><i class="fa fa-user fa-fw"></i>Manage Users<span class="fa arrow"></span></a>
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
                        <h1 class="page-header">Reset Buyer Password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
					<div class="col-md-9" style="margin-left:9%">
						<div class="panel panel-default" id="passChangePanel">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-lock fa-fw"></i> Reset Buyer Password</div>
							</div> <!-- /panel-heading -->

							<div class="panel-body">
								<form action="resetbuyerpassword-action.php" id="changePassword" method="post" class="form-horizontal">
									<fieldset>
										<div class="changePasswordMessages"></div>
										
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">First Name</label>
											<div class="col-sm-3">
											  <input type="text" readonly="" value="<?php echo $row['buyer_FName'];?>" class="form-control" id="firstName" name="firstName"/>
											</div>
											<label for="password" class="col-sm-2 control-label">Last Name</label>
											<div class="col-sm-4">
											  <input type="text" readonly="" value="<?php echo $row['buyer_LName'];?>" class="form-control" id="lastName" name="lastName"/>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">Address</label>
											<div class="col-sm-9">
											  <input type="text" readonly="" value="<?php echo $row['buyer_Address'];?>" class="form-control" id="rePassword" name="rePassword"/>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">City</label>
											<div class="col-sm-9">
											  <input type="text" readonly="" value="<?php echo $row['buyer_City'];?>" class="form-control" id="rePassword" name="rePassword"/>
											</div>
										</div>
										
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">New password</label>
											<div class="col-sm-9">
											  <input type="password" maxlength="20" minlength="4" class="form-control" id="rePassword" name="rePassword"/>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">Re-enter new password</label>
											<div class="col-sm-9">
											  <input type="password" maxlength="20" minlength="4" class="form-control" id="reNewPassword" name="reNewPassword"/>
											</div>
										</div>
										<hr>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">Your Password</label>
											<div class="col-sm-9">
											  <input type="password" class="form-control" id="yourPassword" name="yourPassword"/>
											</div>
										</div>
										
										
										<div class="form-group">
											<div class="col-sm-offset-5 col-sm-10">
												<input type="hidden" name="admin_id" id="admin_id" value="<?php echo $result['admin_ID']; ?>" /> 
												<input type="hidden" name="buyer_id" id="buyer_id" value="<?php echo $_GET['id']; ?>" /> 
												<button type="submit" class="btn btn-success"> Save Changes </button>
												<button type="reset" class="btn btn-warning"> Cancel </button>
											</div>
										</div>
									
									</fieldset>
								</form>
							</div>	
						</div>
					</div> 
                </div>
			</div><!-- end of Page Wrapper -->
        </div><!-- end of Wrapper -->
		<!-- jQuery -->
        <script src="Bootstrap/js/jquery.min.js"></script>
		<script src="Bootstrap/js/metisMenu.min.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="Bootstrap/js/startmin.js"></script>
		<script src="Bootstrap\js\project\changePass-ForBuyer.js"></script>
    </body>
</html>
