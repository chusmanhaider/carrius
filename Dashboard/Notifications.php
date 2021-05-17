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
$Name=$result['admin_Name'];
$adUser=$result['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Panel-Notifications</title>
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
		</style>
    </head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #135fd7;border-color:#135fd7;">
				<div class="navbar-header">
					<a class="headerLogo" href="Car Brands.php">
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
									echo "<b><font size='4px' style='overflow:hidden;'>".$Name."</font></b>";
								?>
							</li>
							<li class="text-center">
								username : 
								<?php
									echo $adUser;
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
                        <h1 class="page-header">Notifications</h1>
                    </div>
                </div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-edit"></i> Manage Notifications
                            </div>
							<div class="panel-body">
								<div class="row">
									
								</div>
								<div class="dataTable_wrapper">
									<table class="table table-hover table-responsive" style="width:90%;margin-left:5%;">
									<?php
									$query="Select * from notify_bydealer INNER JOIN notifications 
									ON notifications.notify_ID=notify_bydealer.notificationsId
									ORDER BY notifications.notify_tStamp DESC
									";
									$result=mysqli_query($connect, $query);
									while($row=mysqli_fetch_assoc($result))
									{
									?>
                                        <tr>
                                            <th class="carField"><?php echo $row['notify_Title'];?></th>
                                            <td class="carField"><?php echo ucfirst($row['notify_Descp']);?></td>
                                            <td class="carField">
											<?php 
											$time=$row['notify_tStamp'];
											echo $date = date("d-M-Y g:i A", strtotime($time));
											?>
											</td>
                                            <td class="carField"><a href="#viewNotifyModal" class="viewNotify" id="<?php echo $row['notify_ID'];?>" data-toggle="modal">View</a></td>
                                        </tr>
									<?php
									}
									?>
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>  <!--- End of Wrapper --->
	
	<!-- View News -->
	<div class="modal fade" id="viewNotifyModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View Notification Detail</h4>
				</div>
				<div class="modal-body" id="notify_detail" style="max-height:450px; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Update Modal -->
	
	<!-- jQuery -->
    	<script src="Bootstrap/js/jquery.min.js"></script>
		<script src="Bootstrap/js/metisMenu.min.js"></script>
    	<script src="Bootstrap/js/bootstrap.min.js"></script>
    	<script src="Bootstrap/js/startmin.js"></script>
    	<script src="Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
    	<script src="Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
		<script src="Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<script type="text/javascript" src="js/news.js"></script>
		<script>
		$(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
			$(document).on('click', '.viewNotify', function()
			{  
				var notify_id = $(this).attr("id");
				//alert(notify_id); 
				if(notify_id != '')  
				{  
					$.ajax({  
						url:"selectNotification.php",  
						method:"POST",  
						data:{notify_id:notify_id},  
						success:function(data)
						{  
							$('#notify_detail').html(data);  
							$('#viewNotifyModal').modal('show');  
						}  
					});  
				}            
			});
		});
		</script>

	</body>
</html>