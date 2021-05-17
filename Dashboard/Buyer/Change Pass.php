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
		<title>Buyer Panel-Change Password</title>
		<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="../Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../Bootstrap/css/metisMenu.min.css" rel="stylesheet">
		<link href="../Bootstrap/css/thisCSS.css" rel="stylesheet">
		<style>
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
				background-color: #31708f;
			}
            .navbar-inverse .navbar-toggle{
                border-color:#31708f;
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
                        <h1 class="page-header">Change password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
					<div class="col-md-9" style="margin-left:9%">
						<div class="panel panel-default" id="passChangePanel">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-lock fa-fw"></i> Change password</div>
							</div> <!-- /panel-heading -->

							<div class="panel-body">
								<form action="changePass-action.php" id="changePassword" method="post" class="form-horizontal">
									<fieldset>
										<div class="changePasswordMessages"></div>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">New password</label>
											<div class="col-sm-9">
											  <input type="password" maxlength="36" minlength="8" class="form-control" id="rePassword" name="rePassword"/>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">Re-enter new password</label>
											<div class="col-sm-9">
											  <input type="password" maxlength="36" minlength="8" class="form-control" id="reNewPassword" name="reNewPassword"/>
											</div>
										</div>
										<hr>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">Old password</label>
											<div class="col-sm-9">
											  <input type="password" class="form-control" id="oldPassword" name="oldPassword"/>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-sm-offset-5 col-sm-10">
												<input type="hidden" name="user_id" id="user_id" value="<?php echo $Id; ?>" /> 
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
        <script src="../Bootstrap/js/jquery.min.js"></script>
		<script src="../Bootstrap/js/metisMenu.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/startmin.js"></script>
		<script src="../Bootstrap/js/project/changePass-Dealer.js"></script>
    </body>
</html>
