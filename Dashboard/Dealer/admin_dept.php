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
$dealer_id=$_GET['url'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dealer Panel - Administration Department</title>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="../Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
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
			.modal-backdrop fade in{
				height:820px;
			}
			.modal-backdrop fade in{
				height:820px;
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
								<img src="../user.jpg" alt="Avatar" class="avatar">
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
                                <a href="Dealer.php"><i class="fa fa-home fa-fw"></i> Home</a>
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
                                                <a href="Teams.php" class="active"><i class="fa fa-users fa-fw"></i> Team Members</a>
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
                        <h1 class="page-header">Administration Department</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="fa fa-users"></i> Manage Administration Department
								
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
								<div class="remove-messages">
								<?php
									if(isset($_GET['msg']))
									{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-check'></i> <strong>Success !!</strong> Team Member has added
										</div>";
									}
									else if(isset($_GET['msgErr']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding a team member
										</div>";
									}
									else if(isset($_GET['msgOther']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding other details
										</div>";
									}
								?>
								</div>
								<div class="row">
									<div class="pull pull-left" style="margin-left:20px;">
											<a href="Teams.php" class="btn btn-info">
												<span class="fa fa-arrow-left" data-toggle="tooltip" title="Go Back"></span>
											</a>
									</div>
                                    <div class="pull pull-right" style="margin-right:20px;">
										<button class="btn btn-primary" id="addNewMemberBtn" data-toggle="modal" data-target="#addMemberModal" name="<?php echo $_GET['url'];?>" >
											<span class="fa fa-plus" data-toggle="tooltip" title="Add New Member"></span>
										</button>
									</div>
								</div>
                            <div class="dataTable_wrapper" style="margin-top: 2%;">
								<div class="category_table">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
												<th class="text-center">Name</th>
                                                <th class="text-center">Desgination</th>
												<th class="text-center">Member Since</th>
												<th class="text-center">Status</th>
												<th class="text-center" style="width:20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$user_id=$_GET['url'];
                                                $sql_admin="SELECT * from administration_dept where DealerId='$user_id' ORDER BY adDept_DesignPriority ASC";
                                                $res=mysqli_query($connect, $sql_admin);
                                                while($line=mysqli_fetch_assoc($res))
                                                {
                                            ?>
                                            <tr id="<?php echo $line['adDept_ID']; ?>">
                                                <td class="text-center"><?php echo $line['adDept_MemberName'];?></td>
                                                <td class="text-center"><?php echo $line['adDept_Designation'];?></td>
                                                <td class="text-center">
												<?php 
													$originalDate=$line['adDept_MemberSince'];
													$newDate = date("d-M-Y", strtotime($originalDate));
													echo $newDate;
												?>
												</td>
												<td class="text-center">
                                                <?php 
                                                    if($line['adDept_Status']=="Active")
                                                        echo "<label class='label label-success'>Active</label>";
                                                    else if($line['adDept_Status']=="Suspended")
                                                        echo "<label class='label label-warning'>Suspended</label>";
                                                    
                                                ?>
                                                </td>
                                                <td class="text-center">
                                                    
                                                    <button class="btn btn-sm btn-circle btn-warning update_admin_person" name="<?php echo $dealer_id;?>" id="<?php echo $line['adDept_ID']; ?>">
														<span data-toggle='tooltip' title="Update Member"><i class='fa fa-edit fa-lg'></i></span>
													</button>		
													
													<button style="margin-left:10px;" class="btn btn-sm btn-circle btn-danger remove_admin_person" name="<?php echo $dealer_id;?>" id="<?php echo $line['adDept_ID']; ?>">
														<span data-toggle='tooltip' title="Remove Member"><i class='fa fa-remove fa-lg'></i></span>
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
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

        </div>
        <!-- /#wrapper -->

	<!-- add member modal -->
	<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:40%;margin-top:4%">
			<div class="modal-content">
				<form class="form-horizontal" id="submitCategoryForm" action="createAdminDeptMember.php" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Administration Department Member</h4>
					</div>
					<div class="modal-body" id="recar_detail" style="max-height:450px; overflow:auto;">
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Member Name </label>
							<div class="col-sm-8">
								<input type="text" class="form-control text-capitalize" maxlength="50" required id="memberName" placeholder="Member Name" name="memberName" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Desgination </label>
							<div class="col-sm-8">
								<select class="form-control" id="designation" name="designation" required>
									<option value="">Select Desgination</option>
									<option value="General Manager">General Manager</option>
									<option value="Assistance Manager">Assistance Manager</option>
									<option value="Customer Service Manager">Customer Service Manager</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Member Since </label>
							<div class="col-sm-8">
								<input type="date" class="form-control text-capitalize" required id="memberSinceD" name="memberSinceD" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Status </label>
							<div class="col-sm-8">
								<select class="form-control" id="status" name="status" required>
									<option value="">Select Status</option>
									<option value="Active">Active</option>
									<option value="Suspended">Suspended</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="user_id" value="<?php echo $Id;?>" name="dealer_id">
						<button type="submit" class="btn btn-success" name="createAdminMemberBtn" id="createAdminMemberBtn" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Update member modal -->
	<div class="modal fade" id="updateMemberModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:40%;margin-top:4%">
			<div class="modal-content">
				<form class="form-horizontal" id="updateMemberForm" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Update Administration Department Member</h4>
					</div>
					<div class="modal-body" id="recar_detail" style="max-height:450px; overflow:auto;">
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Member Name </label>
							<div class="col-sm-8">
								<input type="text" class="form-control text-capitalize" maxlength="50" required id="upmemberName" placeholder="Member Name" name="upmemberName" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Desgination </label>
							<div class="col-sm-8">
								<select class="form-control" id="updesignation" name="updesignation" required>
									<option value="">Select Desgination</option>
									<option value="General Manager">General Manager</option>
									<option value="Assistance Manager">Assistance Manager</option>
									<option value="Customer Service Manager">Customer Service Manager</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Member Since </label>
							<div class="col-sm-8">
								<input type="date" class="form-control text-capitalize" required id="upmemberSinceD" name="upmemberSinceD" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="categoryName" class="col-sm-3 control-label">Status </label>
							<div class="col-sm-8">
								<select class="form-control" id="upstatus" name="upstatus" required>
									<option value="">Select Status</option>
									<option value="Active">Active</option>
									<option value="Suspended">Suspended</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="dealer_id" value="<?php echo $dealer_id;?>" name="dealer_id">
						<input type="hidden" id="member_id" name="member_id">
						<button type="submit" class="btn btn-success" name="updateAdminMemberBtn" id="updateAdminMemberBtn" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- View Cars Modal -->
	<div class="modal fade" id="viewCarModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width: 77%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View Car Detail</h4>
				</div>
				<div class="modal-body" id="car_detail" style="max-height:450px; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- View Cars Images Modal -->
	<div class="modal fade" id="viewCarImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:90%;margin-top:4%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-photo-o"></i> View Car Image Gallery</h4>
				</div>
				<div class="modal-body" id="car_images_gallery" style="max-height:86%; overflow:auto;">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <!-- jQuery -->
    <script src="../Bootstrap/js/jquery.min.js"></script>
	<script src="../Bootstrap/js/metisMenu.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/startmin.js"></script>
    <script src="../Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
	<script src="../Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../js/teams.js"></script>
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
			function redirect_admin(){
				location= "admin_dept.php?url=<?php echo $Id;?>";
			}
			$(".alert-warning").delay(500).show(10, function() {
				$(this).delay(2000).hide(10, function() {
					$(this).remove();
					redirect_admin();
				});
			});
			$(".alert-success").delay(500).show(10, function() {
				$(this).delay(2000).hide(10, function() {
					$(this).remove();
					redirect_admin();
				});
			});
			$(document).on('click','.remove_admin_person',function(){
				var ad_id=$(this).parents("tr").attr("id");
				//alert(id);
				if(confirm('Are you sure to remove this record ?'))
				{
					$.ajax({
						url: 'removeMember.php',
						type: 'POST',
						data: {ad_id: ad_id},
						error: function() {
							alert('Something is wrong');
						},
						success: function(data) {
							$("#"+ad_id).remove();
							Swal.fire({
								position: 'center',
								type: 'warning',
								showCloseButton: true,
								title: 'Member Deleted',
								text:'Member deleted permanently ...!!',
								customClass: 'animated tada',
								showConfirmButton: false,
								timer: 3000
							});
							setTimeout(function() { redirect_admin(); }, 2000);
						}
					});
				}
			});
			$(document).on('click','.update_admin_person',function(){
				var ad_update_id=$(this).parents("tr").attr("id");
				//alert(ad_update_id);
				$.ajax({  
					url:"fetchMember.php",  
					method:"POST",  
					data:{ad_update_id:ad_update_id},  
					dataType:"json",  
					success:function(data)
					{  
						//$('#updateProductImage').attr('src', ''+data.Product_Image);
						$('#upmemberName').val(data.adDept_MemberName);
						$('#updesignation').val(data.adDept_Designation);
						$('#upmemberSinceD').val(data.adDept_MemberSince);
						$('#upstatus').val(data.adDept_Status);
						var d_id=data.DealerId;
						var mem_id=data.adDept_ID;
						$('#dealer_id').val(d_id);
						$('#member_id').val(mem_id);
						//alert(data.DealerId);
						
						$('#updateMemberModal').modal('show');				
					}  
				});
			});
			$('#updateMemberForm').on('submit',function(){
				event.preventDefault();
				$.ajax({  
					url:"updateMember.php",  
					method:"POST",  
					data:$('#updateMemberForm').serialize(),  
					beforeSend:function(){  
						$('#updateAdminMemberBtn').val("Updating..");  
					},  
					success:function(data)
					{  
						$('#updateMemberForm')[0].reset();  
						$('#updateMemberModal').modal('hide');  
						//$('.category_table').html(data);
						
						Swal.fire({
							position: 'center',
							type: 'success',
							showCloseButton: true,
							title: 'Member has been updated',
							customClass: 'animated tada',
							showConfirmButton: false,
							timer: 3000
						});
						setTimeout(function() { redirect_admin(); }, 1000);
					}  
				});
			});
		});
	</script>

    </body>
</html>
