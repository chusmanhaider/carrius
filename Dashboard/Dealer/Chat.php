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

$firstName=$result['dealer_FName'];
$lastName=$result['dealer_LName'];
$fullName=$result['dealer_FName']." ".$result['dealer_LName'];
$Id=$result['dealer_ID'];
$myImage=$result['dealer_Image'];
$username=$result['dealer_Username'];
$cellNum=$result['dealer_CellNumber'];
$email=$result['dealer_Email'];
$status=$result['dealer_Status'];
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
             .pb-chat-panel {
        border: none;
        margin-bottom: -5px;
    }

    .pb-chat-panel-heading {
        margin-top: -5px;
    }

    .pb-chat-top-icons {
        margin-top: 4px;
    }

    #support_label {
        color: #999;
    }

    .pb-chat-labels {
        font-size: 15px;
    }

    .pb-chat-labels-right {
        margin-bottom: 0;
        margin-right: 5px;
    }


    .pb-chat-labels-left {
        margin-left: 5px;
    }

    .pb-chat-labels-primary {
        margin-right: 5px;
    }

    .pb-chat-fa-user {
        border: 1px solid blue;
        padding: 5px;
        border-radius: 50%;
    }

    .pb-chat-textarea {
        resize: none;
    }

    .pb-chat-dropdown {
        width: 300px;
    }

    .pb-chat-btn-circle {
        border-radius: 35px;
    }

    .pb-btn-circle-div {
        padding-left: 0px;
        margin-top: 12px;
    }
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
			.profileImage{
				width:135px;
				height:190px;
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
                            <li><a href="logoutShop.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="Profile.php" class="active"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
							<li>
                                <a href="Business Profile.php"><i class="fa fa-list fa-fw"></i> Business Profile</a>
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
                        <h1 class="page-header">Dealer's Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
					<div class="col-md-9" style="margin-left:9%">
						<div class="panel panel-default" id="profileChangePanel">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-user fa-fw"></i> Dealer's Profile</div>
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
								<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <h4 class="text-center">Responsive Chat Template</h4>
                <div class="col-xs-6 col-xs-offset-7 col-md-3 col-md-offset-5">
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-comments pull-left">Chat
                        </button>
                        <ul class="dropdown-menu pb-chat-dropdown">
                            <li>
                                <div class="panel panel-info pb-chat-panel">
                                    <div class="panel panel-heading pb-chat-panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <a href="#">
                                                    <label id="support_label">Lorem support</label>
                                                </a>
                                                <a href="#"><span class="fa fa-cog pull-right pb-chat-top-icons"></span></a>
                                                <a href="#"><span class="fa fa-share pull-right pb-chat-top-icons"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form>
                                            <div class="form-group">
                                                <span class="fa fa-lg fa-user pb-chat-fa-user"></span><span class="label label-default pb-chat-labels pb-chat-labels-left">Hi, how are you?</span>
                                            </div>
                                            <hr>
                                            <div class="form-group pull-right pb-chat-labels-right">
                                                <span class="label label-primary pb-chat-labels pb-chat-labels-primary">Hi, i'm fine, you?</span><span class="fa fa-lg fa-user pb-chat-fa-user"></span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <div class="form-group">
                                                <span class="fa fa-lg fa-user pb-chat-labels pb-chat-fa-user"></span><span class="label label-default pb-chat-labels pb-chat-labels-left">I'm great, wanna hangout?</span>
                                            </div>
                                            <hr>
                                            <div class="form-group pull-right pb-chat-labels-right">
                                                <span class="label label-primary pb-chat-labels pb-chat-labels-primary">No, huehuehue</span><span class="fa fa-lg fa-user pb-chat-fa-user"></span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <div class="form-group pull-right pb-chat-labels-right">
                                                <span class="label label-primary pb-chat-labels pb-chat-labels-primary">I'm busy hanging out :D</span><span class="fa fa-lg fa-user pb-chat-fa-user"></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <textarea class="form-control pb-chat-textarea" placeholder="Type your message here..."></textarea>
                                            </div>
                                            <div class="col-xs-2 pb-btn-circle-div">
                                                <button class="btn btn-primary btn-circle pb-chat-btn-circle"><span class="fa fa-chevron-right"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
		<script>
            $(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
				function redirect(){
					location= "Profile.php";
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
