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
$dealership_group=$result['dealer_Dealership'];
$loc=$result['dealer_Location'];
$dType=$result['dealer_Type'];
$agent=$result['dealer_NumAgent'];
$totalDealership=$result['dealer_DealerNum'];
$stock=$result['dealer_NumCarStock'];
$fromDay=$result['dealer_WorkFromDay'];
$toDay=$result['dealer_WorkToDay'];
$fromTime=$result['dealer_WorkFromTime'];
$toTime=$result['dealer_WorkToTime'];
$myImage=$result['dealer_Image'];

$s_query="Select * from business_schdeule INNER JOIN days ON days.day_ID=business_schdeule.DaysId where business_schdeule.DealerId='$Id'";
$da=mysqli_query($connect,$s_query);


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
									echo "<b><font size='4px' style='overflow:hidden;'>".$fullName."</font></b>";
								?>
							</li>
							<li class="text-center">
								username : 
								<?php
									echo $username;
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
                                <a href="Dealer.php" class="active"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
							<li>
                                <a href="My Car.php"><i class="fa fa-car fa-fw"></i> My Cars</a>
                            </li>
                            <li>
                                <a href="Contact-Buyer.php"><i class="fa fa-users fa-fw"></i> Contact Buyers</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cog fa-fw"></i>Account Setting<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
                                        <a href="Profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-cog fa-fw"></i> Business Setting<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="Business Profile.php"><i class="fa fa-user-md fa-fw"></i> Business Profile</a>
                                            </li>
                                            <li>
                                                <a href="Working-Hours.php"><i class="fa fa-calendar-times-o fa-fw"></i> Working Hours</a>
                                            </li>
                                            <li>
                                                <a href="Teams.php"><i class="fa fa-users fa-fw"></i> Team Members</a>
                                            </li>
                                        </ul>
                                    </li>
								</ul>
                            </li>
							<li>
                                <a href="Help.php"><i class="fa fa-question-circle-o fa-fw"></i> Help</a>
                            </li>
                             
                        </ul>
                    </div>
                </div>
            </nav>
		
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Working Hours</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
					<div class="col-md-9" style="margin-left:9%">
						<div class="panel panel-default" id="profileChangePanel">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-calendar-times-o fa-fw"></i> Working Hours</div>
							</div> <!-- /panel-heading -->
							
							<div class="panel-body">
								<?php
									if(isset($_GET['updateMsg']))
									{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-check'></i> <strong>Success !!</strong> Profile has been updated successfully
										</div>";
									}
									else if(isset($_GET['msgError']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-error'></i> <strong>Error !!</strong> While updating your profile
										</div>";
									}
									else if(isset($_GET['passMsg']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> Password doesn&apos;t match.
										</div>";
									}
									else if(isset($_GET['passEmptyMsg']))
									{
										echo "<div class='alert alert-warning alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Warning !!</strong> Enter your password to update your profile.
										</div>";
									}
								?>
								<form action="WorkingHours-Action.php" method="post" class="form-horizontal" id="changeUsernameForm">
									<fieldset>
										<div class="changeUsenrameMessages"></div>
                                        <?php
                                            while($line=mysqli_fetch_assoc($da))
                                            {
                                        ?>
                                        <!-- Monday-->
										<div class="form-group">
                                            <div class="col-sm-5" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Monday" name="checkMonday" id="checkMonday">
                                                        <label class="form-check-label" for="inlineRadio3"><?php echo $line['day_Day'];?> <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_MonTime" name="WF_MonTime" value="<?php $from_Time=$line['bs_FromTime']; $formated_time = date("H:i", strtotime($from_Time)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_MonTime" name="WT_MonTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <!-- Tuesday -->
                                        <div class="form-group">
                                            <div class="col-sm-5" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Tuesday" name="checkTuesday" id="checkTuesday">
                                                        <label class="form-check-label" for="inlineRadio3">Tuesday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_TueTime" name="WF_TueTime" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_TueTime" name="WT_TueTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
                                        <!-- Wed -->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Wednesday" name="checkWednesday" id="checkWednesday">
                                                        <label class="form-check-label" for="inlineRadio3">Wednesday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_WedTime" name="WF_WedTime" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_WedTime" name="WT_WedTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
                                        <!-- Thu -->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Thrusday" name="checkThrusday" id="checkThrusday">
                                                        <label class="form-check-label" for="inlineRadio3">Thrusday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_ThuTime" name="WF_ThuTime" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_ThuTime" name="WT_ThuTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
                                        <!-- Fri-->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Friday" name="checkFriday" id="checkFriday">
                                                        <label class="form-check-label" for="inlineRadio3">Friday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_FriTime" name="WF_FriTime" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_FriTime" name="WT_FriTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
                                        <!-- Sat -->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Saturday" name="checkSaturday" id="checkSaturday">
                                                        <label class="form-check-label" for="inlineRadio3">Saturday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_SatTime" name="WF_Satime" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_SatTime" name="WT_SatTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
                                        <!-- Sun -->
                                        <div class="form-group">
                                            <div class="col-sm-5" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Sunday" name="checkSunday" id="checkSunday">
                                                        <label class="form-check-label" for="inlineRadio3">Sunday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_SunTime" name="WF_SunTime" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_SunTime" name="WT_SunTime" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>

                                        </div>
									  <div class="form-group">
										<div class="col-sm-offset-5 col-sm-10">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['dealer_ID']; ?>" /> 
										  <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeProfileBtn">Save Changes </button>
                                          <button type="reset" style="margin-left:10px;" class="btn btn-warning" id="cancelBtn">Cancel</button>
                                        </div>
									  </div>
									</fieldset>
								</form>


							</div> <!-- /panel-body -->		
				</div>
		</div> <!-- /panel -->
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

		<!-- jQuery -->
        <script src="../Bootstrap/js/jquery.min.js"></script>
		<script src="../Bootstrap/js/metisMenu.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/startmin.js"></script>
		<script src="../Bootstrap/js/project/Shopkeeper/Profile.js"></script>
		<script>
            $(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
				function redirect(){
					location= "Working-Hours.php";
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
                
                
            });
        </script>
    </body>
</html>
