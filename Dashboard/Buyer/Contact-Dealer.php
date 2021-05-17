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
        <title>Buyer Panel</title>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="../Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../Bootstrap/css/metisMenu.min.css" rel="stylesheet">
		<link href="../Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="../Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
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
			.news 
			{
				width: 95%;
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
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
								<img src="<?php echo $myImage;?>" alt="Profile" class="avatar">
							</li>
							<li class="text-center">
								<?php
									echo "<b><font size='3px' style='overflow:hidden;'>".$fullName."</font></b>";
								?>
							</li>
							<li class="text-center">
								<?php
									echo "<small style='overflow:hidden;'>Username: <i>".$username."</i></small>";
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
                                <a href="Contact-Dealer.php" class="active"><i class="fa fa-envelope-square fa-fw"></i> Contact Dealer</a>
                            </li>  
                        </ul>
                    </div>
                </div>
            </nav>
		
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact Dealer</h1>
                    </div>
                </div>
                <div class="row">
					<div class="col-lg-12">
                        <div class="panel panel-info">
							<div class="panel-heading">
							 <div class="row">
							  <div class="col-md-6"><i class="fa fa-envelope-square fa-fw"></i> Contact Dealer</div>
							 </div>
							</div>
							<div class="panel-body" id="display_request">
							<div class="remove-messages">
								<?php
									if(isset($_GET['msg']))
									{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-check'></i> <strong>Success !!</strong> Contacted Dealer successfully
										</div>";
									}
									else if(isset($_GET['msgError']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While contacting dealer
										</div>";
									}
									else if(isset($_GET['msgErr1'],$_GET['msgErr2'],$_GET['msgErr3'],$_GET['msgErr4'],$_GET['msgErr5']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While contacting dealer
										</div>";
									}
								?>
								</div>
								<div class="row">
									<div class="pull pull-right" style="padding-bottom:20px;margin-right:20px">
										<button class="btn btn-primary button1" data-toggle="modal" id="addRequesModalBtn" data-target="#addRequestModal"> <i class="fa fa-envelope-square fa-faw"></i> Contact Dealer</button>
									</div>
									<div class="pull pull-left" style="margin-left:20px;">
										<a href="Contact-Dealer.php" class="btn btn-info">
											<span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh"></span>
										</a>
									</div>
								</div>
								<div class="dataTable_wrapper" id="helpListTable">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-capitalize">Name</th>
												<th class="text-capitalize text-center">Dealership</th>
												<th class="text-capitalize text-center">Location</th>
                                                <th class="text-center" style="width: 15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$sql = "SELECT * FROM dealer 
												INNER JOIN cars ON dealer.dealer_ID = cars.DealerId
                                                WHERE dealer.dealer_Status='Active' GROUP BY dealer.dealer_ID"; 
												$queryresult=mysqli_query($connect,$sql);
												while($row=mysqli_fetch_assoc($queryresult))
												{
                                            ?>
											<tr id="<?php echo $row['dealer_ID'];?>">
												<td class="text-center text-capitalize carField"><?php echo $row["dealer_FName"]." ".$row["dealer_LName"];?></td>
												<td class="text-center text-capitalize carField"><?php echo $row["dealer_Dealership"];?></td>
												<td class="text-center text-capitalize carField"><?php echo $row["dealer_Location"];?></td>
												
												<td class="text-center">
                                                    <button class="btn btn-sm btn-circle btn-primary contactDealer" id="<?php echo $row["dealer_ID"]; ?>">
														<span data-toggle='tooltip' title="Contact Dealer"><i class='fa fa-envelope-square fa-lg'></i></span>
													</button>
													
													<button style="margin-left:10px;" class="btn btn-sm btn-circle btn-info view_detail" id="<?php echo $row["dealer_ID"]; ?>">
														<span data-toggle='tooltip' title="View Contact Detail"><i class='fa fa-arrow-right fa-lg'></i></span>
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
					</div>
				
				</div>
			</div>
			<!-- Add Request-->
			<div class="modal fade" id="addRequestModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" style="width:65%;margin-top:1%">
					<div class="modal-content">
						<form class="form-horizontal" id="submitCategoryForm" action="createContactDealer.php" method="POST" enctype="multipart/form-data">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="fa fa-envelope-square"></i> Contact Dealer</h4>
							</div>
							<div class="modal-body" id="" style="max-height:450px; overflow:auto;">
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Dealership </label>
									<div class="col-sm-4">
                                        <select class="form-control text-capitalize" required id="carDealerContact" name="carDealerContact">
                                            <option value="" id="">Select Car Dealership/GroupName</option>
                                            <?php
                                                $sql_d="SELECT * from dealer Where dealer_Status!='Terminated'";
                                                $res=mysqli_query($connect,$sql_d);
                                                $numROW_Dealer=mysqli_num_rows($res);
                                                if($numROW_Dealer>0)
                                                {
                                                    while($var=mysqli_fetch_assoc($res))
                                                    {
                                            ?>
                                            <option class='text-capitalize' name="<?php echo $var['dealer_ID'];?>" id="<?php echo $var['dealer_ID'];?>" value="<?php echo $var['dealer_Dealership'];?>"><?php echo $var['dealer_Dealership'];?></option>
                                                                    
                                            <?php
                                                    }
                                                }
                                                else
                                                    echo "No result found";
                                            ?>
                                                        
                                        </select>
									</div>
                                    <label for="categoryName" class="col-sm-1 control-label">Location </label>
									<div class="col-sm-4">
                                        <input type="text" disabled name="location" id="location" class="form-control" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Contact Number </label>
									<div class="col-sm-4">
										<input type="text" disabled name="cellNum" id="cellNum" class="form-control" >
									</div>
                                    <label for="categoryName" class="col-sm-1 control-label">Email </label>
									<div class="col-sm-4">
                                        <input type="text" disabled name="email" id="email" class="form-control" >
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-2 control-label">Message </label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="4" required name="requestMsg" id="requestMsg"></textarea>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" id="user_id" value="<?php echo $Id;?>" name="user_id">
								<input type="hidden" id="dealer_id" name="dealer_id">
								<button type="submit" class="btn btn-success" name="createCategoryBtn" id="createCategoryBtn" autocomplete="off"> Confirm</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Contact Specific Dealer -->
			<div class="modal fade" id="contactDealerModal" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" id="replyTo" method="POST">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="fa fa-envelope-square"></i> Contact Dealership</h4>
							</div>
							<div class="modal-body" id="contact_detail" style="max-height:450px; overflow:auto;">
								<table class="table table-bordered table-hover table-responsive">
									<tr>
										<th style="width:25%">Dealer Name</th>
										<td id="fullName" name="fullName"></td>
									</tr>
									<tr>
										<th style="width:25%">Email</th>
										<td id="emailDealer" name="emailDealer"></td>
									</tr>
									<tr>
										<th style="width:25%">Contact No</th>
										<td id="contactDealer" name="contactDealer"></td>
									</tr>
									<tr>
										<th style="width:25%">Dealership</th>
										<td id="dealership" name="dealership"></td>
									</tr>
									
								</table>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Contact Message</label>
									<div class="col-sm-8">
										<textarea class="form-control" required rows="5" id="replyTo" name="replyTo"></textarea>
									</div>
								</div>
								
							</div>
							<div class="modal-footer">
								<input type="hidden" id="dealerId" name="dealerId">
								<input type="hidden" id="buyer_id" name="buyer_id" value="<?php echo $Id;?>">
								<input type="submit" name="reply" id="Reply" value="Send Message" class="btn btn-success reply" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>

				</div>
			</div>
			<!-- View Help request Modal -->
			<div class="modal fade" id="viewHelpModal" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><i class="fa fa-eye"></i> View Help Request</h4>
						</div>
						<div class="modal-body" id="help_detail" style="max-height:450px; overflow:auto;">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Update Request-->
			<div class="modal fade" id="updateRequestModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" style="width:45%;margin-top:1%">
					<div class="modal-content">
						<form class="form-horizontal" id="update_form" method="POST">
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $Id;?>">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="fa fa-plus"></i> Update Request</h4>
							</div>
							<div class="modal-body" id="" style="max-height:450px; overflow:auto;">
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Title </label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="80" required id="updateRequestTitle" placeholder="Request Title" name="updateRequestTitle" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Message </label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="4" name="updateRequestMsg" id="updateRequestMsg"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Priority </label>
									<div class="col-sm-8">
										<select class="form-control" name="updateRequestPriority" id="updateRequestPriority">
											<option value="">Select Priority</option>
											<option value="High">High</option>
											<option value="Normal">Normal</option>
											<option value="Low">Low</option>
										</select>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<input type="hidden" id="user_id" value="<?php echo $Id;?>" name="user_id">
								<input type="hidden" name="contactus_Id" id="contactus_Id" />
								<input type="submit" name="update" id="Update" value="Update" class="btn btn-success" />
								<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <!-- /#wrapper -->

		<!-- jQuery -->
        <script src="../Bootstrap/js/jquery.min.js"></script>
		<script src="../Bootstrap/js/metisMenu.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/startmin.js"></script>
		<script src="../Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
		<script src="../Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
		<script src="../Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<!--<script src="../Bootstrap/js/project/helpRequest.js"></script>-->
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
			$('#dataTables-example').DataTable
			({
                responsive: true
            });
			function redirect(){
				location= "Contact-Dealer.php";
			}
            $(document).on('click','.view_detail',function(){
			    var dealer_id = $(this).attr("id");
			    location= "Contact-Dealer-Detail.php?url="+ dealer_id;
			    //alert(location);
		    });
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
			$(document).on('click', '.view_help', function()
			{  
				var help_id = $(this).attr("id");
				//alert(help_id);  
				if(help_id != '')  
				{  
					$.ajax({  
						url:"selectHelp.php",  
						method:"POST",  
						data:{help_id:help_id},  
						success:function(data)
						{  
							$('#help_detail').html(data);  
							$('#viewHelpModal').modal('show');  
						}  
					});  
				}            
			});
			$(document).on('click', '.remove_help', function(){  
				var id=$(this).parents("tr").attr("id");
				alert(id);
				if(confirm('Are you sure to remove this record ?'))
				{
					$.ajax({
							url: 'removeRequest.php',
							type: 'POST',
							data: {id: id},
							error: function() {
								alert('Something is wrong');
							},
							success: function(data) {
									$("#"+id).remove();
									Swal.fire({
										position: 'center',
										type: 'warning',
										showCloseButton: true,
										title: 'Request Removed',
										text:'Request removed permanently ...!!',
										customClass: 'animated tada',
										showConfirmButton: false,
										timer: 3000
									});
									setTimeout(function() { redirect(); }, 2000);
							}
							});
				}
			});
			$(document).on('click', '.update_help', function(){  
				var help_id = $(this).attr("id");  
				//alert(help_id);
				$.ajax({

					url:"fetchHelp.php",  
					method:"POST",  
					data:{help_id:help_id},  	
					dataType:"json",  
					success:function(data)
					{
						//$('#updateCarName').val(data.car_Name);
						//alert(data.contact_topic);
						$('#updateRequestTitle').val(data.contact_topic);
						$('#updateRequestMsg').val(data.contact_message);
						$('#updateRequestPriority').val(data.contactus_priority);

						$('#contactus_Id').val(data.contact_ID);
						$('#updateRequestModal').modal('show');
					}
				});
			});
			$('#update_form').on('submit',function(){
				event.preventDefault();
				$.ajax({  
					url:"updateHelp.php",  
					method:"POST",  
					data:$('#update_form').serialize(),  
					beforeSend:function(){  
						$('#Update').val("Updating..");  
					},  
					success:function(data)
					{  
						$('#update_form')[0].reset();  
						$('#updateCarModal').modal('hide');  
					//$('#product_table').html(data);
						Swal.fire({
							position: 'center',
							type: 'success',
							showCloseButton: true,
							title: 'Request has been updated',
							customClass: 'animated tada',
							showConfirmButton: false,
							timer: 3000
						});
						setTimeout(function() { redirect(); }, 1000);
					}  
				});
			});

		$('#carDealerContact').on('change',function () {
			var dealer_id = $(this).children("option:selected").attr("id");
			//alert(dealer_id);
			if(dealer_id!='')
			{
				$.ajax({
				url:"fetchContactDetail.php",  
				method:"POST",  
				data:{dealer_id:dealer_id},  	
				dataType:"json",  
				success:function(data)
				{
					//$('#updateCarName').val(data.car_Name);
						//alert(data.contact_topic);
					$('#location').val(data.dealer_Location);
					$('#email').val(data.dealer_Email);
					$('#cellNum').val(data.dealer_CellNumber);

					$('#dealer_id').val(data.dealer_ID);
					$('#addRequestModal').modal('show');
					
				}
				});
			}
			else
			{
				$('#location').val("");
				$('#email').val("");
				$('#cellNum').val("");
			}
			
		});
		$(document).on('click', '.contactDealer', function(){  
                var dealerId = $(this).attr("id");
                //var car_id = $(this).attr("name");
                //alert(dealerId);
				$.ajax({
						url:"fetchCarDealer.php",  
						method:"POST",  
						data:{dealerId:dealerId},  
						dataType:"json",  
						success:function(data)
						{
							//alert(data);
							//alert(data.dealer_FName);
							var fullName=data.dealer_FName+" "+data.dealer_LName;
							$('#fullName').html(fullName);
							//$('#carName').html(data.car_Name);
							$('#emailDealer').html(data.dealer_Email);
							$('#contactDealer').html(data.dealer_CellNumber);
							var dealership=data.dealer_Dealership+ ", "+data.dealer_Location;
							$('#dealership').html(dealership);
							$('#dealerId').val(dealerId);
							//$('#replyTo').val(dealerId);
							//alert(dealerId);
							//$('#car_id').val(data.car_ID);
							$('#contactDealerModal').modal('show');
						}
				});
        
        });
		$('#replyTo').on('submit',function(){
            event.preventDefault();
            $.ajax({  
                url:"contactDealerGeneral.php",  
                method:"POST",  
                data:$('#replyTo').serialize(),  
                beforeSend:function(){  
                    $('#Reply').val("Sending..");  
                },  
                success:function(data)
                {  
                    $('#replyTo')[0].reset();  
                    $('#contactDealerModal').modal('hide');  
                    //$('#product_table').html(data);
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        showCloseButton: true,
                        title: 'Successfully contacted with dealer',
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
