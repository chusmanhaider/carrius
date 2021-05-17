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
		<title>Admin Panel-Mailbox & Chat</title>
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
								<img src="../Shared/img/user.jpg" alt="Avatar" class="avatar">
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
                                <a href="News.php" class="active"><i class="fa fa-envelope fa-fw"></i> Mailbox & Chat</a>
                            </li>  
                        </ul>
                    </div>
                </div>
			</nav>
			<div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Mailbox & Chat</h1>
                    </div>
                </div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-edit"></i> Manage Mailbox & Chat
                            </div>
							<div class="panel-body">
								<div class="row">
									<div class="pull pull-right" style="padding-bottom:20px;margin-right:20px">
										<button class="btn btn-primary button1" data-toggle="modal" id="postNewsBtn" data-target="#postNewsModal"> <i class="fa fa-bullhorn fa-faw"></i> Post News </button>
									</div>
									<div class="pull pull-left" style="margin-left:20px;">
										<a href="News.php" class="btn btn-info">
											<span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh"></span>
										</a>
									</div>
								</div>
								<div class="dataTable_wrapper">
									<div class="news_table">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th class="text-center">No.</th>
													<th class="text-center">Date</th>
													<th class="text-center">Title</th>
													<th class="text-center">Type</th>
													<th class="text-center">Priority</th>
													<th class="text-center">Status</th>
													<th class="text-center" style="width:15%;">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$counter=1;
												$sql="Select * from post_news";
												$queryresult=mysqli_query($connect,$sql);
												while($row=mysqli_fetch_assoc($queryresult))
												{
											?>
												<tr id="<?php echo $row["newsID"];  ?>">
													<td class="text-center"><?php echo $counter;?></td>
													<td class="text-center">
														<?php 
														echo date("d-m-Y", strtotime($row["newsDate"])); 
														?>
													</td>
													<td class="text-center text-capitalize"><?php echo $row["newsTitle"]; ?></td>
													<td class="text-center">
														<?php
														if($row["newsType"]==1) 
															echo "<label class='label label-success'>Registered Users</label>";
														else
															echo "<label class='label label-warning'>For All</label>";
														?>
													</td>
													<td class="text-center">
														<?php 
														 if($row["newsPri"]==0)
															echo "<label class='label label-info'>Low Priority</label>";
														 else if($row["newsPri"]==1)
															echo "<label class='label label-success'>Normal Priority</label>"; 
														 else
															echo "<label class='label label-danger'>High Priority</label>"; 
														?>
													</td>
													<td class="text-center">
														<?php 
														 date_default_timezone_set('asia/karachi');
														$currDate=date("Y-m-d");
														if($currDate>$row["newsDate"])
														{
															echo "<label class='label label-danger'>Expired</label>";
														}
														else
														{
															echo "<label class='label label-success'>Live</label>";
													} 
														?>
													</td>
													<td class="text-center">
														<button class="btn btn-sm btn-circle btn-primary viewNews" id="<?php echo $row["newsID"];  ?>">
															<i class="fa fa-eye fa-lg"></i>
														</button>
														<button class="btn btn-sm btn-circle btn-warning updateNews" style="margin-left:5px" id="<?php echo $row["newsID"]; ?>">
															<i class="fa fa-edit fa-lg"></i>
														</button>
														<button class="btn btn-sm btn-circle btn-danger removeNews" style="margin-left:5px" id="<?php echo $row["newsID"]; ?>">
															<i class="fa fa-remove fa-lg"></i>
														</button>
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
					</div>
				</div>
			</div>	
		</div>  <!--- End of Wrapper --->
	<!-- Post News Modal --->
	<div class="modal fade" id="postNewsModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="submitProductForm" action="createNews.php" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-bullhorn"></i> Post News</h4>
					</div>
					<div class="modal-body" style="max-height:450px; overflow:auto;">
						<div id="add-news-messages"></div>
						<div class="form-group">
							<label for="newstitle" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-9">
								<input type="text" required class="form-control text-capitalize" id="newstitle" maxlength="50" placeholder="News Title" name="newstitle" autocomplete="off">
							</div>
							<span id="errorTitle" style="margin-left:115px;"></span>
						</div>
						<div class="form-group">
							<label for="newsdesc" class="col-sm-2 control-label">Detail </label>
							<div class="col-sm-9">
								<textarea class="form-control z-depth-1" required id="newsdesc" rows="3" placeholder="Write News Detail here" name="newsdesc" autocomplete="off"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="newsType" class="col-sm-2 control-label">Type </label>
							<div class="col-sm-9">
								<select class="form-control" required id="newsType" name="newsType">
									<option value="">Select News Type</option>
									<option value="1">Registered Users</option>
									<option value="0">For All</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="newsPrio" class="col-sm-2 control-label">Priority </label>
							<div class="col-sm-9">
								<select class="form-control" required id="newsPrio" name="newsPrio">
									<option value="">Select News Priority</option>
									<option value="0">Low Priority</option>
									<option value="1">Normal Priority</option>
									<option value="2">High Priority</option>
								</select>
							</div>
						</div>
						<div class="form-group">
                            <label  for="dateForNews" class="col-sm-2 control-label" data-toggle="tooltip" title="Event date!">Date</label>
                            <div class="col-sm-9">
								<input name="dateForNews" id="dateForNews" type="date" min="<?php date_default_timezone_set('asia/karachi');
								echo date("Y-m-d"); ?>" class="form-control" required="required">
							</div>
                        </div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" disabled id="createNewsBtn">Confirm</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- View News -->
	<div class="modal fade" id="viewNewsModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View News</h4>
				</div>
				<div class="modal-body" id="news_detail" style="max-height:450px; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Update Modal -->
	<div class="modal fade" id="updateNewsModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="update_form" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-pencil"></i> Update News</h4>
					</div>
					<div class="modal-body" style="max-height:450px; overflow:auto;">
						<div class="form-group">
							<label for="updatenewstitle" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" required id="updatenewstitle" name="updatenewstitle" autocomplete="off">
							</div>
							<span id="upErrorTitle" style="margin-left:115px;"></span>
						</div>
						<div class="form-group">
							<label for="updatenewsdesc" class="col-sm-2 control-label">Detail </label>
							<div class="col-sm-9">
								<textarea class="form-control z-depth-1" required id="updatenewsdesc" rows="3" name="updatenewsdesc" autocomplete="off"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="updateNewsType" class="col-sm-2 control-label">Type </label>
							<div class="col-sm-9">
								<select class="form-control" id="updateNewsType" name="updateNewsType">
									<option value="">Select News Type</option>
									<option value="1">Registered Users</option>
									<option value="0">For All</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="updateNewsPrio" class="col-sm-2 control-label">Priority </label>
							<div class="col-sm-9">
								<select class="form-control" id="updateNewsPrio" name="updateNewsPrio">
									<option value="">Select News Priority</option>
									<option value="0">Low Priority</option>
									<option value="1">Normal Priority</option>
									<option value="2">High Priority</option>
								</select>
							</div>
						</div>
						<div class="form-group">
                            <label  for="updateDateForNews" class="col-sm-2 control-label" data-toggle="tooltip" title="Event date!">Date</label>
                            <div class="col-sm-9">
								<input name="updateDateForNews" id="updateDateForNews" type="date" min="<?php date_default_timezone_set('asia/karachi');
								echo date("Y-m-d"); ?>" class="form-control" required="required">
							</div>
                        </div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" disabled id="updateNewsBtn">Update</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						<input type="hidden" name="news_id" id="news_id" />
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
		<script type="text/javascript" src="js/news.js"></script>
	</body>
</html>