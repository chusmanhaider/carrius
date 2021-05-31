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
        <title>Dealer Panel - Working Hours</title>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="../Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../Bootstrap/css/metisMenu.min.css" rel="stylesheet">
		<link href="../Bootstrap/css/thisCSS.css" rel="stylesheet">
        <link href="../Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
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
							<?php
                                $sql_test="Select * from business_schedule Inner join
                                bschedule_check on business_schedule.bsCheckId = bschedule_check.bSCheck_ID
                                where business_schedule.DealerId='$Id'";
                                $result = mysqli_query($connect, $sql_test);
                                $numRows = mysqli_num_rows($result);
                            ?>
							<div class="panel-body">
                                <div class="row">
                                    <div class="messages" style="width: 70%;margin-left:10%;display:inline-block;">
                                    <?php
                                        if(isset($_GET['msg']))
                                        {
                                            echo "<div class='alert alert-success alert-dismissible fade in alertSuccess'>
                                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <i class='fa fa-check'></i> <strong>Success !!</strong> Time schedule has been added
                                            </div>";
                                        }
                                        else if(isset($_GET['msgErr']))
                                        {
                                            echo "<div class='alert alert-danger alert-dismissible fade in'>
                                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <i class='fa fa-warning'></i> <strong>Error !!</strong> While adding time schedule
                                            </div>";
                                        }
								    ?>
                                    </div>
                                    <div class="editBtn" style="float:right;margin-right:20px;display:inline-block;">
                                        <?php
                                            if($numRows>0)
                                            {
                                        ?>
                                                <div class="pull pull-right" style="padding-bottom:20px;margin-right:20px">
                                                    <span data-toggle="tooltip" title="Edit Schedule"><button class="btn btn-danger editFormBtn" data-toggle="modal" data-target="#updateScheduleModal" name="<?php echo $Id;?>" id="editFormBtn"> <i class="fa fa-edit fa-faw fa-lg"></i> </button></span>
                                                </div>
                                        <?php
                                            }
                                            else if($numRows==0)
                                            {
                                        ?>
                                                <div class="pull pull-right" style="padding-bottom:20px;margin-right:20px">
                                                    <span data-toggle="tooltip" title="Add Schedule"><button class="btn btn-success addFormBtn" data-toggle="modal" data-target="#addScheduleModal" id="addFormBtn"> <i class="fa fa-plus fa-faw fa-lg"></i></button></span>
                                                </div>
                                        <?php

                                            }
                                        ?>
                                    </div>
                                </div>
                                
                                
                                <div class="row" id="ResultedInfo">
                                    <table class="table table-bordered table-hover table-striped table-responsive workingHrsTable" style="margin-left:10%;width:80%">
                                        <tr>
                                            <th class="text-center">Days</th>
                                            <th class="text-center">From (Time)</th>
                                            <th class="text-center">To (Time)</th>
                                        </tr>
                                        <!-- Monday-->
                                        <?php
                                            $sql_test="Select * from business_schedule Inner join
                                            bschedule_check on business_schedule.bsCheckId = bschedule_check.bSCheck_ID
                                            where business_schedule.DealerId='$Id'";
                                            $result = mysqli_query($connect, $sql_test);
                                            $numRows = mysqli_num_rows($result);
                                            $line = mysqli_fetch_assoc($result);

                                            $isClosed_Mon = $line['bSCheck_Mon'];
                                            $isClosed_Tue = $line['bSCheck_Tue'];
                                            $isClosed_Wed = $line['bSCheck_Wed'];
                                            $isClosed_Thr = $line['bSCheck_Thr'];
                                            $isClosed_Fri = $line['bSCheck_Fri'];
                                            $isClosed_Sat = $line['bSCheck_Sat'];
                                            $isClosed_Sun = $line['bSCheck_Sun'];
                                            
                                            //From Time
                                            $query_from = "Select * from business_fromtime Inner join business_schedule on
                                            business_schedule.fromTimeId = business_fromtime.bsFrom_ID 
                                            where business_schedule.DealerId='$Id'";

                                            $result_from = mysqli_query($connect, $query_from);
                                            $row_from = mysqli_fetch_assoc($result_from);
                                            
                                            //TO TIME
                                            $query_to = "Select * from business_totime Inner join business_schedule on
                                            business_schedule.toTimeId = business_totime.bsTo_ID 
                                            where business_schedule.DealerId='$Id'";

                                            $result_to = mysqli_query($connect, $query_to);
                                            $row_to = mysqli_fetch_assoc($result_to);
                                        ?>
                                        <tr>
                                            <td class="text-center">Monday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Mon=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Mon=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                            <?php
                                                                $mon_time = date("g:i A", strtotime($row_from['bsFrom_Mon'])); 
                                                                echo $mon_time;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $mon_ttime = date("g:i A", strtotime($row_to['bsTo_Mon'])); 
                                                                echo $mon_ttime;
                                                            ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>
                                        <!-- Tuesday-->
                                        <tr>
                                            <td class="text-center">Tuesday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Tue=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Tue=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                        <?php
                                                            $tue_time = date("g:i A", strtotime($row_from['bsFrom_Tue'])); 
                                                            echo $tue_time;
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $tue_ttime = date("g:i A", strtotime($row_to['bsTo_Tue'])); 
                                                            echo $tue_ttime;
                                                        ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>
                                        <!-- Wednesday-->
                                        <tr>
                                            <td class="text-center">Wednesday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Wed=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Wed=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                        <?php
                                                            $wed_time = date("g:i A", strtotime($row_from['bsFrom_Wed'])); 
                                                            echo $wed_time;
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $wed_ttime = date("g:i A", strtotime($row_to['bsTo_Wed'])); 
                                                            echo $wed_ttime;
                                                        ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>
                                        <!-- Thrusday-->
                                        <tr>
                                            <td class="text-center">Thrusday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Thr=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Thr=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                        <?php
                                                            $thr_time = date("g:i A", strtotime($row_from['bsFrom_Thr'])); 
                                                            echo $thr_time;
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $thr_ttime = date("g:i A", strtotime($row_to['bsTo_Thr'])); 
                                                            echo $thr_ttime;
                                                        ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>
                                        <!-- Friday-->
                                        <tr>
                                            <td class="text-center">Friday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Fri=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Fri=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                        <?php
                                                            $fri_time = date("g:i A", strtotime($row_from['bsFrom_Fri'])); 
                                                            echo $fri_time;
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $fri_ttime = date("g:i A", strtotime($row_to['bsTo_Fri'])); 
                                                            echo $fri_ttime;
                                                        ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>
                                        <!-- Saturday-->
                                        <tr>
                                            <td class="text-center">Saturday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Sat=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Sat=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                        <?php
                                                            $sat_time = date("g:i A", strtotime($row_from['bsFrom_Sat'])); 
                                                            echo $sat_time;
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $sat_ttime = date("g:i A", strtotime($row_to['bsTo_Sat'])); 
                                                            echo $sat_ttime;
                                                        ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>
                                        <!-- Sunday-->
                                        <tr>
                                            <td class="text-center">Sunday</td>
                                            <?php
                                                if($numRows==0)
                                                {
                                                    echo "<td class='text-center' colspan='2' style='color:red'><b><i>Business Schedule not set yet</i></b></td>";
                                            
                                                }
                                                else if($numRows>0)
                                                {
                                                    if($isClosed_Sun=='Closed')
                                                    {
                                                        echo "<td class='text-center text-danger' colspan='2'><b><i>Marked as Closed Day</i></b></td>";
                                                    }
                                                    else if($isClosed_Sun=='')
                                                    {
                                            ?>
                                                        <td class="text-center">
                                                        <?php
                                                            $sun_time = date("g:i A", strtotime($row_from['bsFrom_Sun'])); 
                                                            echo $sun_time;
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $sun_ttime = date("g:i A", strtotime($row_to['bsTo_Sun'])); 
                                                            echo $sun_ttime;
                                                        ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                              
                                            ?>
                                        </tr>

                                    </table>
                                </div>
								
                                


							</div> <!-- /panel-body -->		
				</div>
		</div> <!-- /panel -->
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog">
		    <div class="modal-dialog" style="width:45%;margin-top:1%">
			    <div class="modal-content">
				    <form class="form-horizontal" id="submitCategoryForm" action="createSchedule.php" method="POST" enctype="multipart/form-data">
					    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Schedule</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkMondayAdd" id="checkMondayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Monday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required class="form-control MondayTimeAdd" id="AWF_MonTime" name="AWF_MonTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required class="form-control MondayTimeAdd" id="AWT_MonTime" name="AWT_MonTime" value=""/>
								</div>
							</div>
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkTuesdayAdd" id="checkTuesdayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Tuesday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required class="form-control TuesdayTimeAdd" id="AWF_TueTime" name="AWF_TueTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required  class="form-control TuesdayTimeAdd" id="AWT_TueTime" name="AWT_TueTime" value=""/>
								</div>
							</div>
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkWednesdayAdd" id="checkWednesdayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Wednesday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required class="form-control WednesdayTimeAdd" id="AWF_WedTime" name="AWF_WedTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required  class="form-control WednesdayTimeAdd" id="AWT_WedTime" name="AWT_WedTime" value=""/>
								</div>
							</div>
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkThrusdayAdd" id="checkThrusdayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Thrusday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required class="form-control ThrusdayTimeAdd" id="AWF_ThuTime" name="AWF_ThuTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required  class="form-control ThrusdayTimeAdd" id="AWT_ThuTime" name="AWT_ThuTime" value=""/>
								</div>
							</div>
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkFridayAdd" id="checkFridayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Friday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required  class="form-control FridayTimeAdd" id="AWF_FriTime" name="AWF_FriTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required  class="form-control FridayTimeAdd" id="AWT_FriTime" name="AWT_FriTime" value=""/>
								</div>
							</div>
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkSaturdayAdd" id="checkSaturdayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Saturday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required  class="form-control SaturdayTimeAdd" id="AWF_SatTime" name="AWF_SatTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required  class="form-control SaturdayTimeAdd" id="AWT_SatTime" name="AWT_SatTime" value=""/>
								</div>
							</div>
                            <div class="form-group">
								<div class="form-check form-check-inline col col-sm-3" style="margin-left: 30px;">
                                    <input class="form-check-input" type="checkbox" value="Closed" name="checkSundayAdd" id="checkSundayAdd">
                                    <label class="form-check-label" for="inlineRadio3" style="margin-left:10px">Sunday</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" required  class="form-control SundayTimeAdd" id="AWF_SunTime" name="AWF_SunTime" value=""/>
								</div>
								<div class="col-sm-4">
                                    <input type="time" required  class="form-control SundayTimeAdd" id="AWT_SunTime" name="AWT_SunTime" value=""/>
								</div>
							</div>
                        </div>
                        <div class="modal-footer">
						    <input type="hidden" id="user_id" value="<?php echo $Id;?>" name="user_id">
						    <button type="submit" class="btn btn-success" name="createScheduleBtn" id="createScheduleBtn" autocomplete="off"> Confirm</button>
						    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					    </div>
                    </form>
                </div>>
            </div>
        </div>
        <!-- Update-->
        <div class="modal fade" id="updateScheduleModal" tabindex="-1" role="dialog">
		    <div class="modal-dialog" style="width:65%;margin-top:1%">
			    <div class="modal-content">
				    <form class="form-horizontal" id="updateScheduleForm" method="POST" enctype="multipart/form-data">
					    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-refresh"></i> Update Schedule</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Monday-->
							<div class="form-group">
                                <div class="col-sm-5" style="margin-top: 6px;">
                                    <div class="row">
                                        <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                            <input class="form-check-input" type="checkbox" value="Closed" name="checkMonday" id="checkMonday">
                                            <label class="form-check-label" for="inlineRadio3">Monday <i>(Checked, if closed)</span></label>
                                        </div>				
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
								<div class="col-sm-3">
								    <input type="time"  class="form-control MondayTime" id="WF_MonTime" name="WF_MonTime"/>
								</div>
                                <label for="shopAddress" class="col-sm-1 control-label">To</label>
								<div class="col-sm-3">
									<input type="time"  class="form-control MondayTime" id="WT_MonTime" name="WT_MonTime"/>
								</div>

                            </div>
                            <!-- Tuesday -->
                            <div class="form-group">
                                            <div class="col-sm-5" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Closed" name="checkTuesday" id="checkTuesday">
                                                        <label class="form-check-label" for="inlineRadio3">Tuesday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                            </div>
                            <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control TuesdayTime" id="WF_TueTime" name="WF_TueTime"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control TuesdayTime" id="WT_TueTime" name="WT_TueTime"/>
											</div>

                            </div>
                            <!-- Wed -->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Closed" name="checkWednesday" id="checkWednesday">
                                                        <label class="form-check-label" for="inlineRadio3">Wednesday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control WednesdayTime" id="WF_WedTime" name="WF_WedTime"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control WednesdayTime" id="WT_WedTime" name="WT_WedTime"/>
											</div>

                                        </div>
                                        <!-- Thu -->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Closed" name="checkThrusday" id="checkThrusday">
                                                        <label class="form-check-label" for="inlineRadio3">Thrusday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control ThrusdayTime" id="WF_ThuTime" name="WF_ThuTime"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control ThrusdayTime" id="WT_ThuTime" name="WT_ThuTime"/>
											</div>

                                        </div>
                                        <!-- Fri-->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Closed" name="checkFriday" id="checkFriday">
                                                        <label class="form-check-label" for="inlineRadio3">Friday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control FridayTime" id="WF_FriTime" name="WF_FriTime"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control FridayTime" id="WT_FriTime" name="WT_FriTime"/>
											</div>

                                        </div>
                                        <!-- Sat -->
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Closed" name="checkSaturday" id="checkSaturday">
                                                        <label class="form-check-label" for="inlineRadio3">Saturday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control SaturdayTime" id="WF_SatTime" name="WF_SatTime"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control SaturdayTime" id="WT_SatTime" name="WT_SatTime"/>
											</div>

                                        </div>
                                        <!-- Sun -->
                                        <div class="form-group">
                                            <div class="col-sm-5" style="margin-top: 6px;">
                                                <div class="row">
                                                   <div class="form-check form-check-inline col col-sm-9" style="margin-left:20px">
                                                        <input class="form-check-input" type="checkbox" value="Closed" name="checkSunday" id="checkSunday">
                                                        <label class="form-check-label" for="inlineRadio3">Sunday <i>(Checked, if closed)</span></label>
                                                    </div>				
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="shopAddress" class="col-sm-3 control-label">From Time</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control SundayTime" id="WF_SunTime" name="WF_SunTime"/>
											</div>
                                            <label for="shopAddress" class="col-sm-1 control-label">To</label>
											<div class="col-sm-3">
											  <input type="time"  class="form-control SundayTime" id="WT_SunTime" name="WT_SunTime"/>
											</div>

                                        </div>        

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="dealer_id" id="dealer_id" value="<?php echo $Id;?>"/> 
                            <input type="hidden" name="fromTimeId" id="fromTimeId">
                            <input type="hidden" name="toTimeId" id="toTimeId">
                            <input type="hidden" name="checkId" id="checkId">
                            <input type="hidden" name="dealerId" id="dealerId"> 
						    <button type="submit" class="btn btn-success" name="updateScheduleBtn" id="updateScheduleBtn" autocomplete="off"> Confirm</button>
						    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					    </div>
                    </form>
                </div>
            </div>
        </div>
		<!-- jQuery -->
        <script src="../Bootstrap/js/jquery.min.js"></script>
		<script src="../Bootstrap/js/metisMenu.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/startmin.js"></script>
        <script src="../Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<script src="../Bootstrap/js/project/Shopkeeper/Profile.js"></script>
		<script>
            $(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
				function redirect(){
					location= "Working-Hours.php";
				}
                //$("input[type=time]").val('');
                
                //$('.editAbleForm').hide();
                //$('.editableBtns').hide();
                
                
                $(".alert-danger").delay(500).show(10, function() {
					$(this).delay(2000).hide(10, function() {
						$(this).remove();
						redirect();
				    });
				});
                $(".alertSuccess").delay(500).show(10, function() {
					$(this).delay(2000).hide(10, function() {
						$(this).remove();
						redirect();
				    });
				});
                /*
                $('.editFormBtn').on('click',function(){
                    $('.editAbleForm').show();
                    $('#ResultedInfo').hide();
                    $('.editableBtns').show();
                    $('.editBtn').hide();
                });
                
                $('#cancelBtn').on('click',function(){
                    $('.editBtn').show();
                    $('#ResultedInfo').show();
                    $('.editAbleForm').hide();
                });
                */
                /*-------  Days enable disable -- ADD ONLY*/
                $('#checkMondayAdd').on('change',function(){
                    var is_Checked=$(this).prop('checked');
                    if(is_Checked==true)
                    {
                        $('.MondayTimeAdd').attr('disabled',true);
                        $('.MondayTimeAdd').val('');
                    }
                    else
                    {
                        $('.MondayTimeAdd').attr('disabled',false);
                        $('.MondayTimeAdd').attr('required');
                    }
                });

                $('#checkTuesdayAdd').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.TuesdayTimeAdd').attr('disabled',true);
                        $('.TuesdayTimeAdd').val('');
                    }
                    else
                    {
                        $('.TuesdayTimeAdd').attr('disabled',false);
                        $('.TuesdayTimeAdd').attr('required');
                    }
                });

                $('#checkWednesdayAdd').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.WednesdayTimeAdd').attr('disabled',true);
                        $('.WednesdayTimeAdd').val('');
                    }
                    else
                    {
                        $('.WednesdayTimeAdd').attr('disabled',false);
                        $('.WednesdayTimeAdd').attr('required');
                    }
                });

                $('#checkThrusdayAdd').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.ThrusdayTimeAdd').attr('disabled',true);
                        $('.ThrusdayTimeAdd').val('');
                    }
                    else
                    {
                        $('.ThrusdayTimeAdd').attr('disabled',false);
                        $('.ThrusdayTimeAdd').attr('required');
                    }
                });

                $('#checkFridayAdd').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.FridayTimeAdd').attr('disabled',true);
                        $('.FridayTimeAdd').val('');
                    }
                    else
                    {
                        $('.FridayTimeAdd').attr('disabled',false);
                        $('.FridayTimeAdd').attr('required');
                    }
                });

                $('#checkSaturdayAdd').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.SaturdayTimeAdd').attr('disabled',true);
                        $('.SaturdayTimeAdd').val('');
                    }
                    else
                    {
                        $('.SaturdayTimeAdd').attr('disabled',false);
                        $('.SaturdayTimeAdd').attr('required');
                    }
                });

                $('#checkSundayAdd').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.SundayTimeAdd').attr('disabled',true);
                        $('.SundayTimeAdd').val('');
                    }
                    else
                    {
                        $('.SundayTimeAdd').attr('disabled',false);
                        $('.SundayTimeAdd').attr('required');
                    }
                });
                /*------------ Days enable disable -- UPDATE ONLY
                $('#checkMonday').on('change',function(){
                    var is_Checked=$(this).prop('checked');
                    if(is_Checked==true)
                    {
                        $('.MondayTime').attr('disabled',true);
                        $('.MondayTime').val('');
                    }
                    else
                    {
                        $('.MondayTime').attr('disabled',false);
                    }
                });

                $('#checkTuesday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.TuesdayTime').attr('disabled',true);
                        $('.TuesdayTime').val('');
                    }
                    else
                    {
                        $('.TuesdayTime').attr('disabled',false);
                    }
                });

                $('#checkWednesday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.WednesdayTime').attr('disabled',true);
                        $('.WednesdayTime').val('');
                    }
                    else
                    {
                        $('.WednesdayTime').attr('disabled',false);
                    }
                });

                $('#checkThrusday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.ThrusdayTime').attr('disabled',true);
                        $('.ThrusdayTime').val('');
                    }
                    else
                    {
                        $('.ThrusdayTime').attr('disabled',false);
                    }
                });

                $('#checkFriday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.FridayTime').attr('disabled',true);
                        $('.FridayTime').val('');
                    }
                    else
                    {
                        $('.FridayTime').attr('disabled',false);
                    }
                });

                $('#checkSaturday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.SaturdayTime').attr('disabled',true);
                        $('.SaturdayTime').val('');
                    }
                    else
                    {
                        $('.SaturdayTime').attr('disabled',false);
                    }
                });

                $('#checkSunday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.SundayTime').attr('disabled',true);
                        $('.SundayTime').val('');
                    }
                    else
                    {
                        $('.SundayTime').attr('disabled',false);
                    }
                });*/
                ///
                /*-------  Days enable disable -- UPDATE ONLY*/
                $('#checkMonday').on('change',function(){
                    var is_Checked=$(this).prop('checked');
                    if(is_Checked==true)
                    {
                        $('.MondayTime').attr('disabled',true);
                        $('.MondayTime').val('');
                    }
                    else
                    {
                        $('.MondayTime').attr('disabled',false);
                        $('.MondayTime').attr('required','required');
                    }
                });

                $('#checkTuesday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.TuesdayTime').attr('disabled',true);
                        $('.TuesdayTime').val('');
                    }
                    else
                    {
                        $('.TuesdayTime').attr('disabled',false);
                        $('.TuesdayTime').attr('required','required');
                    }
                });

                $('#checkWednesday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.WednesdayTime').attr('disabled',true);
                        $('.WednesdayTime').val('');
                    }
                    else
                    {
                        $('.WednesdayTime').attr('disabled',false);
                        $('.WednesdayTime').attr('required','required');
                    }
                });

                $('#checkThrusday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.ThrusdayTime').attr('disabled',true);
                        $('.ThrusdayTime').val('');
                    }
                    else
                    {
                        $('.ThrusdayTime').attr('disabled',false);
                        $('.ThrusdayTime').attr('required','required');
                    }
                });

                $('#checkFriday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.FridayTime').attr('disabled',true);
                        $('.FridayTime').val('');
                    }
                    else
                    {
                        $('.FridayTime').attr('disabled',false);
                        $('.FridayTime').attr('required','required');
                    }
                });

                $('#checkSaturday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    if(is_CheckedT==true)
                    {
                        $('.SaturdayTime').attr('disabled',true);
                        $('.SaturdayTime').val('');
                    }
                    else
                    {
                        $('.SaturdayTime').attr('disabled',false);
                        $('.SaturdayTime').attr('required','required');
                    }
                });

                $('#checkSunday').on('change',function(){
                    var is_CheckedT=$(this).prop('checked');
                    //alert(is_CheckedT);
                    if(is_CheckedT==true)
                    {
                        $('.SundayTime').attr('disabled',true);
                        $('.SundayTime').val('');
                    }
                    else if(is_CheckedT==false)
                    {
                        $('.SundayTime').attr('disabled',false);
                        $('.SundayTime').attr('required','required');
                    }
                });
                ///Update
                $(document).on('click', '.editFormBtn', function(){  
                    var dealer_id = $(this).attr("name");  
                    //alert(dealer_id);
                    $.ajax({

                        url:"fetchTimeSchedule.php",  
                        method:"POST",  
                        data:{dealer_id:dealer_id},  	
                        dataType:"json",  
                        success:function(data)
                        {
                            //alert(data);`
                            var mon_check = data.bSCheck_Mon;
                            var tue_check = data.bSCheck_Tue;
                            var wed_check = data.bSCheck_Wed;
                            var thr_check = data.bSCheck_Thr;
                            var fri_check = data.bSCheck_Fri;
                            var sat_check = data.bSCheck_Sat;
                            var sun_check = data.bSCheck_Sun;

                            //Monday
                            if(mon_check=='Closed')
                            {
                                $('.MondayTime').attr('disabled',true);
                                $('.MondayTime').val('');
                                $('#checkMonday').prop('checked','checked');
                            }
                            else if(mon_check=='')
                            {
                                $('#WF_MonTime').val(data.bsFrom_Mon);
                                $('#WT_MonTime').val(data.bsTo_Mon);
                            }
                            
                            //Tueday
                            if(tue_check=='Closed')
                            {
                                $('.TuesdayTime').attr('disabled',true);
                                $('.TuesdayTime').val('');
                                $('#checkTuesday').prop('checked','checked');
                            }
                            else if(tue_check=='')
                            {
                                $('#WF_TueTime').val(data.bsFrom_Tue);
                                $('#WT_TueTime').val(data.bsTo_Tue);
                            }

                            //Wednesday
                            if(wed_check=='Closed')
                            {
                                $('.WednesdayTime').attr('disabled',true);
                                $('.WednesdayTime').val('');
                                $('#checkWednesday').prop('checked','checked');
                            }
                            else if(wed_check=='')
                            {
                                $('#WF_WedTime').val(data.bsFrom_Wed);
                                $('#WT_WedTime').val(data.bsTo_Wed);
                            }

                            //Thrusday
                            if(thr_check=='Closed')
                            {
                                $('.MondayTime').attr('disabled',true);
                                $('.MondayTime').val('');
                                $('#checkMonday').prop('checked','checked');
                            }
                            else if(thr_check=='')
                            {
                                $('#WF_ThuTime').val(data.bsFrom_Thr);
                                $('#WT_ThuTime').val(data.bsTo_Thr);
                            }

                            //Friday
                            if(fri_check=='Closed')
                            {
                                $('.FridayTime').attr('disabled',true);
                                $('.FridayTime').val('');
                                $('#checkFriday').prop('checked','checked');
                            }
                            else if(fri_check=='')
                            {
                                $('#WF_FriTime').val(data.bsFrom_Fri);
                                $('#WT_FriTime').val(data.bsTo_Fri);
                            }

                            //Saturday
                            if(sat_check=='Closed')
                            {
                                $('.SaturdayTime').attr('disabled',true);
                                $('.SaturdayTime').val('');
                                $('#checkSaturday').prop('checked','checked');
                            }
                            else if(sat_check=='')
                            {
                                $('#WF_SatTime').val(data.bsFrom_Sat);
                                $('#WT_SatTime').val(data.bsTo_Sat);
                            }

                            //Sunday
                            if(sun_check=='Closed')
                            {
                                $('.SundayTime').attr('disabled',true);
                                $('.SundayTime').val('');
                                $('#checkSunday').prop('checked','checked');
                            }
                            else if(sun_check=='')
                            {
                                $('#WF_SunTime').val(data.bsFrom_Sun);
                                $('#WT_SunTime').val(data.bsTo_Sun);
                            }
                            $('#checkId').val(data.bSCheck_ID);
                            $('#toTimeId').val(data.bsTo_ID);
                            $('#fromTimeId').val(data.bsFrom_ID);
                            $('#dealerId').val(data.DealerId);
                        }
                    });
                });
                $('#updateScheduleForm').on('submit',function(){
                    event.preventDefault();
                    $.ajax({  
                        url:"WorkingHours-Action.php",  
                        method:"POST",  
                        data:$('#updateScheduleForm').serialize(),  
                        beforeSend:function(){  
                            $('#Update').val("Updating..");  
                        },  
                        success:function(data)
                        {  
                            $('#updateScheduleForm')[0].reset();  
                            $('#updateScheduleModal').modal('hide');  
                        //$('#product_table').html(data);
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                showCloseButton: true,
                                title: 'Schedule has been updated',
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
