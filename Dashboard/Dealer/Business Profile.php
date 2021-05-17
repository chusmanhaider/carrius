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
                                                <a href="Working-Hours.php"><i class="fa fa fa-calendar-times-o fa-fw"></i> Working Hours</a>
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
                        <h1 class="page-header">Business Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
					<div class="col-md-9" style="margin-left:9%">
						<div class="panel panel-default" id="profileChangePanel">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-user fa-fw"></i> Business Profile</div>
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
								<form action="Business Profile-Action.php" method="post" class="form-horizontal" id="changeUsernameForm">
									<fieldset>
										<div class="changeUsenrameMessages"></div>
										<div class="form-group">
											<label for="shopName" class="col-sm-3 control-label">Dealership/Group Name</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control" id="grpName" name="grpName" value="<?php echo $dealership_group; ?>"/>
											</div>
										</div>
										<div class="form-group">
											<label for="shopkeeprName" class="col-sm-3 control-label">Main Location</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control" id="mainLoc" name="mainLoc" value="<?php echo $loc; ?>"/>
											</div>
										</div>
										<div class="form-group">
											<label for="shopAddress" class="col-sm-3 control-label">Total Dealerships</label>
											<div class="col-sm-2">
											  <input type="number"  class="form-control" maxlength="6" min="0" id="t_Dealership" name="t_Dealership" value="<?php echo $totalDealership; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">Agents</label>
											<div class="col-sm-2">
											  <input type="number"  class="form-control" maxlength="6" min="0" id="d_Agents" name="d_Agents" value="<?php echo $agent; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">Stock</label>
											<div class="col-sm-2">
											  <input type="number"  class="form-control" maxlength="60" id="carStock" name="carStock" value="<?php echo $stock; ?>"/>
											</div>
										</div>
                                        
										<div class="form-group">
                                            <label for="categoryEName" class="col-sm-3 control-label">Dealership Type</label>
                                            <div class="col-sm-8" style="margin-top: 6px;">
                                                <div class="row">
                                                   
                                                    <div class="form-check form-check-inline col col-sm-6">
                                                        <?php
                                                        if($dType=="Private Owner")
                                                        {
                                                        ?>
                                                        <input class="form-check-input" type="radio" value="Private Owner" checked="checked" name="dealershipType" id="privateRadio">
                                                       <?php
                                                        }
                                                        else if($dType=="Franchise Group")
                                                        {
                                                        ?>
                                                          <input class="form-check-input" type="radio" value="Private Owner" name="dealershipType" id="privateRadio">
                                                        <?php
                                                        }
                                                        ?>
                                                        <label class="form-check-label" for="inlineRadio3">Private Owner</label>
                                                    </div>
                                                    <div class="form-check form-check-inline col col-sm-6">
                                                        <?php
                                                        if($dType=="Franchise Group")
                                                        {
                                                        ?>
                                                        <input class="form-check-input" type="radio" value="Franchise Group" checked="checked" name="dealershipType" id="franchiseRadio">
                                                        <?php
                                                        }
                                                        else if($dType=="Private Owner")
                                                        {
                                                        ?>
                                                        <input class="form-check-input" type="radio" value="Franchise Group" name="dealershipType" id="franchiseRadio">
                                                        
                                                        <?php
                                                        }
                                                        ?>
                                                        <label class="form-check-label" for="inlineRadio4">Franchise Group</label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
										<div class="form-group">
											<label for="contactNo" class="col-sm-3 control-label">Work From <i>(Day)</i></label>
											<div class="col-sm-3">
                                                <select class="form-control" name="workFrom">
                                                    <option value="<?php echo $fromDay;?>"><?php echo $fromDay;?></option>
                                                    <?php
                                                        $n=0;
                                                        $days = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                                                        $arrlength = count($days);
                                                        while($n<$arrlength)
                                                        {
                                                            if($days[$n]!=$fromDay)
                                                            {
                                                               echo "<option value='$days[$n]'>".$days[$n]."</option>";
                                                               
                                                            }
                                                            $n++;
                                                        }
                                                    ?>
                                                    
                                                </select>
											</div>
                                            <label for="email" class="col-sm-2 control-label">Work To <i>(Day)</i></label>
											<div class="col-sm-3">
                                                <select class="form-control" name="toWork">
                                                    <option value="<?php echo $toDay;?>"><?php echo $toDay;?></option>
                                                    <?php
                                                        $n=0;
                                                        $days_to = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                                                        $arrlen = count($days_to);
                                                        while($n<$arrlen)
                                                        {
                                                            if($days_to[$n]!=$toDay)
                                                            {
                                                               echo "<option value='$days[$n]'>".$days_to[$n]."</option>";
                                                               
                                                            }
                                                            $n++;
                                                        }
                                                    ?>
                                                    
                                                </select>
                                            </div>
										</div>
										<div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">Work From<i>(Time)</i></label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WF_Time" name="WF_Time" value="<?php $formated_time = date("H:i", strtotime($fromTime)); echo $formated_time; ?>"/>
											</div>
                                            <label for="shopAddress" class="col-sm-2 control-label">Work To<i>(Time)</i></label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control" id="WT_Time" name="WT_Time" value="<?php $formated_time_t = date("H:i", strtotime($toTime)); echo $formated_time_t; ?>"/>
											</div>
                                        </div>
                                        <hr>
										<div class="form-group">
											<label for="password" class="col-sm-2 control-label">Password</label>
											<div class="col-sm-9">
											  <input type="password" class="form-control" id="password" name="password"/>
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
					location= "Business Profile.php";
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
