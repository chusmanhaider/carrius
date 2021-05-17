<?php
session_start();
error_reporting(0);
include_once("../db_connect.php");
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

//date_default_timezone_set('asia/karachi');
$currDate=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Panel</title>
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="css/morris.css" rel="stylesheet">
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
                    <a class="headerLogo" href="Admin.php">
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
													contactus_reply.contactusId=contactus.contact_ID Where contactus.contact_reply_flag = '0'";;
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
                                <a href="admin.php" class="active"><i class="fa fa-home fa-fw"></i> Home</a>
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
                        <h1 class="page-header">Home</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-3">
						<?php
							//include("db_connect.php");
							$query="Select * from cars_brand where carBrand_Status!='Not Available' OR carBrand_Status!='Terminated'";
							$data=mysqli_query($connect,$query);
							$numRows_Products=mysqli_num_rows($data);
							if($numRows_Products==0)
							{
						?>
						<div class="panel panel-red">
						<?php
							}
							else if($numRows_Products>0 && $numRows_Products<10)
							{
						?>
						<div class="panel panel-yellow">
						<?php
							}
							else if($numRows_Products>=10)
							{
						?>
						<div class="panel panel-primary">
						<?php
							}
						?>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
										<i class="fa fa-flag fa-stack-2x" style="right:0px"></i>
                                        <i class="fa fa-car fa-4x" style="margin-top:75%"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
                                        <div class="huge"><?php echo $numRows_Products;?></div>
                                        <div>Car Brands</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="Car Brands.php">View Details</a></span>
                                    <span class="pull-right"><a href="Car Brands.php"><i class="fa fa-arrow-circle-right"></i></a></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-3">
						<?php
							//include("db_connect.php");
							$t="Terminated";
							$query="Select * from cars where car_Status!='$t'";
							$data=mysqli_query($connect,$query);
							$numRows_Cars=mysqli_num_rows($data);
							if($numRows_Cars==0)
							{
						?>
						<div class="panel panel-red" style="color:##d9534f">
						<?php
							}
							else if($numRows_Cars>=10)
							{
						?>
                        <div class="panel panel-green" style="color:#green">
						<?php 
							}
							else if($numRows_Cars>0 && $numRows_Cars<10)
							{
						?>
						<div class="panel panel-yellow">
						<?php
							}
						?>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-car fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
                                        <div class="huge"><?php echo $numRows_Cars;?></div>
                                        <div>Cars</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="Cars.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-3">
						<?php
							//include("db_connect.php");
							$query="Select * from dealer where dealer_Status='Active'";
							$data=mysqli_query($connect,$query);
							$numRows_Dealer=mysqli_num_rows($data);
							if($numRows_Dealer==0)
							{
						?>
						<div class="panel panel-red">
						<?php
							}
							else
							{
						?>
						<div class="panel panel-green" style="color:#green">
						<?php
							}
						?>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
                                        <div class="huge"><?php echo $numRows_Dealer;?></div>
                                        <div>Dealers</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="Manage Dealers.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					<div class="col-lg-3 col-md-6 col-3">
						<?php
							$query="Select * from payment";
							$data=mysqli_query($connect,$query);
							$totalAmountRec=0;
							$GtotalAmount=0;
							$RemTotal=0;
							while($amt=mysqli_fetch_array($data))
							{
								if ($amt['GrandTotal_Pay']!=-1 && $amt['Remaining_Pay']!=-1)
								{
									$GtotalAmount=$amt['GrandTotal_Pay']+$GtotalAmount;
									$totalAmountRec=$amt['Received_Pay']+$totalAmountRec;
									$RemTotal=$amt['Remaining_Pay']+$RemTotal;
								}
							}
							$thisResult=floor(($totalAmountRec/$GtotalAmount)*100);
							if($totalAmountRec==0)
							{
							?>
							<div class="panel panel-red">
							<?php
							}
							else if($totalAmountRec!=0 && $thisResult<50)
							{
							?>
							<div class="panel panel-yellow">
							<?php
							}
							else if($totalAmountRec!=0 && $thisResult>=50)
							{
							?>
							<div class="panel panel-green">
							<?php
							}
							?>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right" style="margin-right:0px">
										<div class="huge">
										<?php
										$amountLength=strlen($totalAmountRec);
										if($amountLength>0 && $amountLength<=6)
											echo $totalAmountRec;
										else if($amountLength>6 && $amountLength<=9)
											echo "<font size='6px'>".$totalAmountRec."</font>";
										else if($amountLength>9 && $amountLength<=10)
											echo "<font size='5px'>".$totalAmountRec."</font>";
										
										?>
										</div>
                                        <div>Received (Rs)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
									<span class="pull-left"><a href="Bill.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
				<?php
				$sql = "SELECT * FROM cars Where car_Status='Pending'";
				$result = mysqli_query($connect, $sql);
				$numRows_CarPending=mysqli_num_rows($result);
				
				if($numRows_CarPending>0)
				{
				?>
				<div class="row">
					<div class="col-lg-6 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                Car Pending
                            </div>
							<div class="panel-body">
								<?php
									echo "<div class='alert alert-danger alert-dismissible fade in'><b>
											There are ".$numRows_CarPending." in Pending status
										 <a href='Cars.php'>Visit here !! To update them. </a></b></div>";
								?>
							</div>
                        </div>
                    </div>
				
				<?php
					
				}
				?>
				
            </div> <!-- end of Page Wrapper -->
        </div> <!-- end of Wrapper -->
		
        <!-- jQuery -->
		
        <script src="Bootstrap/js/jquery.min.js"></script>
		<script src="Bootstrap/js/metisMenu.min.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="Bootstrap/js/startmin.js"></script>
		<script src="js/raphael.min.js"></script>
		<script src="js/morris.min.js"></script>
        <script src="js/morris-data.js"></script>
		<script>
			$(document).ready(function(){
				$('#dataTables-example').DataTable({
                        responsive: true
                });
				$('[data-toggle="tooltip"]').tooltip();
			
			});
		</script>
    </body>
</html>
