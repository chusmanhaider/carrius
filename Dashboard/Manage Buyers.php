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
$Id=$result['admin_ID'];
$Name=$result['admin_Name'];
$adUser=$result['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <title>Admin Panel- Manage Buyers</title>
        <!-- Bootstrap-->
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
			@media screen and (max-width: 600px){
					.noDisplay{
					display:none;
					}
					.yesDisplay{
						width: 25%;
					}
					.carField{
					overflow: hidden;
					white-space: nowrap;
					max-width: 5px;
					text-overflow: ellipsis;
				}
			}
		</style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #135fd7;border-color:#135fd7;">
                <div class="navbar-header">
					<a class="headerLogo" href="Manage Buyers.php">
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
                                <a href="admin.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
							<li>
                                <a href="Car Brands.php"><i class="fa fa-list fa-fw"></i> Car Brands</a>
                            </li>
							<li>
                                <a href="Cars.php"><i class="fa fa-car fa-fw"></i> Cars</a>
                            </li>
							
							<li>
                                <a href="#"  class="active"><i class="fa fa-user fa-fw"></i>Manage Users<span class="fa arrow"></span></a>
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
					<h1 class="page-header"><i class="fa fa-users"></i> List of Buyers</h1>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="page-heading"> <i class="fa fa-edit"></i> Manage Buyers
							<?php
								$count=0;
								$sql = "SELECT * FROM buyer where buyer_Status='Terminated'";
								$qTest=mysqli_query($connect,$sql);
								while($row=mysqli_fetch_assoc($qTest))
								{
									if($row['buyer_Status']=='Terminated')
									{
										$count=$count+1;
									}
								}
								if($count>0)
								{
								?>
								<div class="pull pull-right" style="margin-top:-5px">
									<button class="btn btn-sm btn-danger removedBuyers"><span data-toggle='tooltip' title="Removed Buyers List"><i class="fa fa-trash fa-lg"></i></span></button>
								</div>
								<?php
								}
							?>
							
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="div-action pull pull-right" style="padding-bottom:20px;margin-right:20px">
									<button class="btn btn-primary button1" data-toggle="modal" id="addProductModalBtn" data-target="#addBuyerModal"> <i class="fa fa-user-plus"></i> Add Buyer </button>
								</div>
								<div class="pull pull-left" style="margin-left:20px;">
									<a href="Manage Buyers.php" class="btn btn-info">
										<span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh"></span>
									</a>
								</div>
								<div class="pull pull-left" style="margin-left:140px; width:450px">
									<?php
									if(isset($_GET['msg']))
									{
										echo "<div class='alert alert-success alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-check'></i> <strong>Success !!</strong> New buyer has added
										</div>";
									}
									else if(isset($_GET['msgError']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding new buyer
										</div>";
									}
									else if(isset($_GET['msgReason']))
									{
										echo "<div class='alert alert-info alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Success !!</strong> While adding reason for rejection
										</div>";
									}
									else if(isset($_GET['msgReasonError']))
									{
										echo "<div class='alert alert-danger alert-dismissible fade in'>
												 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<i class='fa fa-warning'></i> <strong>Error !!</strong> While adding reason for rejection
										</div>";
									}
								?>
								</div>
							</div>
							<div class="buyer_table">
							<table class="table table-hover table-striped table-responsive table-bordered" id="dataTables-example">
								<thead>
									<tr>
										<th class="text-center">Name</th>
										<th class="text-center">Address</th>
										<th class="text-center">City</th>
										<th class="text-center">Status</th>
										<th class="text-center" style="width:15%;">Action</th>
									</tr>
								</thead>
									<tbody>
									<?php
										$counter=1;
										$sql="Select * from buyer where buyer_Status!='Terminated' order by buyer_FName asc";
										$queryresult=mysqli_query($connect,$sql);
										while($row=mysqli_fetch_assoc($queryresult))
										{
									?>
									<tr id="<?php echo $row["buyer_ID"];  ?>">
										<td class="text-center text-capitalize carField"><?php echo $row["buyer_FName"]." ".$row["buyer_LName"];?></td>
										<td class="text-center text-capitalize carField"><?php echo $row["buyer_Address"];?></td>
										<td class="text-center text-capitalize carField"><?php echo $row["buyer_City"];?></td>
										<td class="text-center">
											<?php
												if($row["buyer_Status"]=='Suspended')
													echo "<label class='label label-danger'>Suspended</label>";
												else if($row["buyer_Status"]=='Active')
													echo "<label class='label label-success'>Active</label>";
												else if($row["buyer_Status"]=='Pending')
												{
													echo "<label class='label label-warning'>Pending</label>";
												
											?>
													<span data-toggle="tooltip" title="Mark Active"><button id="<?php echo $row['buyer_ID'];?>" class='btn btn-success btn-xs markApprove'><i class='fa fa-check' aria-hidden='true'></i></button></span>
													<span data-toggle="tooltip" title="Mark Reject"><button id="<?php echo $row['buyer_ID'];?>" class='btn btn-danger btn-xs markReject'><i class='fa fa-remove' aria-hidden='true'></i></button>
											<?php
												}
												else if($row["buyer_Status"]=='Rejected')
												{
													echo "<label class='label label-danger'>Rejected</label>";
													if($row["buyer_Reject_Reason"]=='')
													{
											?>
													<span data-toggle="tooltip" title="Add Recject Reason"><button id="<?php echo $row['buyer_ID'];?>" data-toggle="modal" data-target="#addReasonModal" class='btn btn-info btn-xs addReason'><i class='fa fa-plus' aria-hidden='true'></i></button></span>
											<?php
													}
												}
											?>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-circle btn-primary viewBuyerDetail" id="<?php echo $row["buyer_ID"];  ?>">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </button>
											<button class="btn btn-sm btn-circle btn-warning updateBuyerDetail" id="<?php echo $row["buyer_ID"]; ?>">
                                                <i class="fa fa-edit fa-lg"></i>
                                            </button>
											<button class="btn btn-sm btn-circle btn-danger removeBuyerDetail" id="<?php echo $row["buyer_ID"]; ?>">
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
                    <!-- /.col-lg-12 -->
            </div> 
        </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
	<!-- Add reason modal -->
	<div class="modal fade" id="addReasonModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:45%;margin-top:1%">
			<div class="modal-content">
				<form class="form-horizontal" action="addReason.php" id="update_dealer_form" method="POST">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-question"></i> Reject Reason</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="admin_id" value="<?php echo $Id;?>">
						<div class="form-group">
							<label for="categoryName" class="col-sm-4 control-label">Reason for Rejection</label>
							<div class="col-sm-7">
								<textarea class="form-control" rows="10" maxlength="1000" id="rejectReason" name="rejectReason"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="get_buyer_id" name="get_buyer_id">
						<input type="submit" name="rejectReasonBtn" id="rejectReasonBtn" value="Update" class="btn btn-success" />
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!----- Add Buyer Modal -->
	<div class="modal fade" id="addBuyerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:50%;margin-top:1%">
			<div class="modal-content" style="padding:3%">
				<form class="form-horizontal" id="submitCategoryForm" action="createBuyer.php" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-user"></i> Add Buyer</h4>
					</div>
					<div class="modal-body">
						<div id="add-category-messages">
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#basicInfo">Basic Info</a></li>
							<li><a data-toggle="tab" href="#loginInfo">Login</a></li>
							<li><a data-toggle="tab" href="#residenceInfo">Residence Info</a></li>
							<li><a data-toggle="tab" href="#commentInfo">Comment</a></li>
						</ul>
						<div class="tab-content">
							<div id="basicInfo" class="tab-pane fade in active">
								<h3>Basic Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">First Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="firstName" placeholder="First Name" name="firstName" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Last Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="lastName" placeholder="Last Name" name="lastName" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Phone Number *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="60" required id="phoneNumber" placeholder="Phone Number" name="phoneNumber" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Image </label>
									<div class="col-sm-8">
										<input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Buyer Status *</label>
										<div class="col-sm-8">
											<select class="form-control" required id="buyerStatus" name="buyerStatus">
												<option value="">Select Buyer Status</option>
												<option value="Active">Active</option>
												<option value="Suspended">Suspended</option>
												<option value="Pending">Pending</option>
											</select>
										</div>
								</div>
							</div>
							<div id="loginInfo" class="tab-pane fade">
								<h3>Login Information</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Email *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="60" required id="email" placeholder="Email" name="email" autocomplete="off">
											<div id="emailCheck" style="color:red;"></div>
										</div>
										
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Username *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="30" required id="username" placeholder="Username" name="username" autocomplete="off">
											<div id="usernameCheck" style="color:red;"></div>
										</div>
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Password *</label>
										<div class="col-sm-7">
											<input type="password" class="form-control" maxlength="36" required id="password" placeholder="Password" name="password" autocomplete="off">
										</div>
										<div class="col-sm-2">
											<span toggle="#password-field tooltip" title="Show/Hide Password" class="fa fa-fw fa-eye field_icon toggle-password fa-2x"></span>
											
										</div>
									</div>
									<div id="passwordCheck" style="color:red;margin-left:165px"></div>
								</div>
							</div>
							<div id="residenceInfo" class="tab-pane fade">
								<h3>Residence Info</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Address *</label>
										<div class="col-sm-8">
											<textarea class="form-control" maxlength="200" required id="address" placeholder="Address" name="address" rows="3"></textarea>
										</div>
										
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">City *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="30" required id="city" placeholder="City" name="city" autocomplete="off">
											
										</div>
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Country *</label>
										<div class="col-sm-8">
											<select class="form-control" id="country" name="country">
												<option value="">Select Country</option>
    											<option value="--">Not Specified</option>
												<option value="Afganistan">Afghanistan</option>
												<option value="Albania">Albania</option>
												<option value="Algeria">Algeria</option>
												<option value="American Samoa">American Samoa</option>
												<option value="Andorra">Andorra</option>
												<option value="Angola">Angola</option>
												<option value="Anguilla">Anguilla</option>
												<option value="Antigua & Barbuda">Antigua & Barbuda</option>
												<option value="Argentina">Argentina</option>
												<option value="Armenia">Armenia</option>
												<option value="Aruba">Aruba</option>
												<option value="Australia">Australia</option>
												<option value="Austria">Austria</option>
												<option value="Azerbaijan">Azerbaijan</option>
												<option value="Bahamas">Bahamas</option>
												<option value="Bahrain">Bahrain</option>
												<option value="Bangladesh">Bangladesh</option>
												<option value="Barbados">Barbados</option>
												<option value="Belarus">Belarus</option>
												<option value="Belgium">Belgium</option>
												<option value="Belize">Belize</option>
												<option value="Benin">Benin</option>
												<option value="Bermuda">Bermuda</option>
												<option value="Bhutan">Bhutan</option>
												<option value="Bolivia">Bolivia</option>
												<option value="Bonaire">Bonaire</option>
												<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
												<option value="Botswana">Botswana</option>
												<option value="Brazil">Brazil</option>
												<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
												<option value="Brunei">Brunei</option>
												<option value="Bulgaria">Bulgaria</option>
												<option value="Burkina Faso">Burkina Faso</option>
												<option value="Burundi">Burundi</option>
												<option value="Cambodia">Cambodia</option>
												<option value="Cameroon">Cameroon</option>
												<option value="Canada">Canada</option>
												<option value="Canary Islands">Canary Islands</option>
												<option value="Cape Verde">Cape Verde</option>
												<option value="Cayman Islands">Cayman Islands</option>
												<option value="Central African Republic">Central African Republic</option>
												<option value="Chad">Chad</option>
												<option value="Channel Islands">Channel Islands</option>
												<option value="Chile">Chile</option>
												<option value="China">China</option>
												<option value="Christmas Island">Christmas Island</option>
												<option value="Cocos Island">Cocos Island</option>
												<option value="Colombia">Colombia</option>
												<option value="Comoros">Comoros</option>
												<option value="Congo">Congo</option>
												<option value="Cook Islands">Cook Islands</option>
												<option value="Costa Rica">Costa Rica</option>
												<option value="Cote DIvoire">Cote DIvoire</option>
												<option value="Croatia">Croatia</option>
												<option value="Cuba">Cuba</option>
												<option value="Curaco">Curacao</option>
												<option value="Cyprus">Cyprus</option>
												<option value="Czech Republic">Czech Republic</option>
												<option value="Denmark">Denmark</option>
												<option value="Djibouti">Djibouti</option>
												<option value="Dominica">Dominica</option>
												<option value="Dominican Republic">Dominican Republic</option>
												<option value="East Timor">East Timor</option>
												<option value="Ecuador">Ecuador</option>
												<option value="Egypt">Egypt</option>
												<option value="El Salvador">El Salvador</option>
												<option value="Equatorial Guinea">Equatorial Guinea</option>
												<option value="Eritrea">Eritrea</option>
												<option value="Estonia">Estonia</option>
												<option value="Ethiopia">Ethiopia</option>
												<option value="Falkland Islands">Falkland Islands</option>
												<option value="Faroe Islands">Faroe Islands</option>
												<option value="Fiji">Fiji</option>
												<option value="Finland">Finland</option>
												<option value="France">France</option>
												<option value="French Guiana">French Guiana</option>
												<option value="French Polynesia">French Polynesia</option>
												<option value="French Southern Ter">French Southern Ter</option>
												<option value="Gabon">Gabon</option>
												<option value="Gambia">Gambia</option>
												<option value="Georgia">Georgia</option>
												<option value="Germany">Germany</option>
												<option value="Ghana">Ghana</option>
												<option value="Gibraltar">Gibraltar</option>
												<option value="Great Britain">Great Britain</option>
												<option value="Greece">Greece</option>
												<option value="Greenland">Greenland</option>
												<option value="Grenada">Grenada</option>
												<option value="Guadeloupe">Guadeloupe</option>
												<option value="Guam">Guam</option>
												<option value="Guatemala">Guatemala</option>
												<option value="Guinea">Guinea</option>
												<option value="Guyana">Guyana</option>
												<option value="Haiti">Haiti</option>
												<option value="Hawaii">Hawaii</option>
												<option value="Honduras">Honduras</option>
												<option value="Hong Kong">Hong Kong</option>
												<option value="Hungary">Hungary</option>
												<option value="Iceland">Iceland</option>
												<option value="Indonesia">Indonesia</option>
												<option value="India">India</option>
												<option value="Iran">Iran</option>
												<option value="Iraq">Iraq</option>
												<option value="Ireland">Ireland</option>
												<option value="Isle of Man">Isle of Man</option>
												<option value="Israel">Israel</option>
												<option value="Italy">Italy</option>
												<option value="Jamaica">Jamaica</option>
												<option value="Japan">Japan</option>
												<option value="Jordan">Jordan</option>
												<option value="Kazakhstan">Kazakhstan</option>
												<option value="Kenya">Kenya</option>
												<option value="Kiribati">Kiribati</option>
												<option value="Korea North">Korea North</option>
												<option value="Korea Sout">Korea South</option>
												<option value="Kuwait">Kuwait</option>
												<option value="Kyrgyzstan">Kyrgyzstan</option>
												<option value="Laos">Laos</option>
												<option value="Latvia">Latvia</option>
												<option value="Lebanon">Lebanon</option>
												<option value="Lesotho">Lesotho</option>
												<option value="Liberia">Liberia</option>
												<option value="Libya">Libya</option>
												<option value="Liechtenstein">Liechtenstein</option>
												<option value="Lithuania">Lithuania</option>
												<option value="Luxembourg">Luxembourg</option>
												<option value="Macau">Macau</option>
												<option value="Macedonia">Macedonia</option>
												<option value="Madagascar">Madagascar</option>
												<option value="Malaysia">Malaysia</option>
												<option value="Malawi">Malawi</option>
												<option value="Maldives">Maldives</option>
												<option value="Mali">Mali</option>
												<option value="Malta">Malta</option>
												<option value="Marshall Islands">Marshall Islands</option>
												<option value="Martinique">Martinique</option>
												<option value="Mauritania">Mauritania</option>
												<option value="Mauritius">Mauritius</option>
												<option value="Mayotte">Mayotte</option>
												<option value="Mexico">Mexico</option>
												<option value="Midway Islands">Midway Islands</option>
												<option value="Moldova">Moldova</option>
												<option value="Monaco">Monaco</option>
												<option value="Mongolia">Mongolia</option>
												<option value="Montserrat">Montserrat</option>
												<option value="Morocco">Morocco</option>
												<option value="Mozambique">Mozambique</option>
												<option value="Myanmar">Myanmar</option>
												<option value="Nambia">Nambia</option>
												<option value="Nauru">Nauru</option>
												<option value="Nepal">Nepal</option>
												<option value="Netherland Antilles">Netherland Antilles</option>
												<option value="Netherlands">Netherlands (Holland, Europe)</option>
												<option value="Nevis">Nevis</option>
												<option value="New Caledonia">New Caledonia</option>
												<option value="New Zealand">New Zealand</option>
												<option value="Nicaragua">Nicaragua</option>
												<option value="Niger">Niger</option>
												<option value="Nigeria">Nigeria</option>
												<option value="Niue">Niue</option>
												<option value="Norfolk Island">Norfolk Island</option>
												<option value="Norway">Norway</option>
												<option value="Oman">Oman</option>
												<option value="Pakistan">Pakistan</option>
												<option value="Palau Island">Palau Island</option>
												<option value="Palestine">Palestine</option>
												<option value="Panama">Panama</option>
												<option value="Papua New Guinea">Papua New Guinea</option>
												<option value="Paraguay">Paraguay</option>
												<option value="Peru">Peru</option>
												<option value="Phillipines">Philippines</option>
												<option value="Pitcairn Island">Pitcairn Island</option>
												<option value="Poland">Poland</option>
												<option value="Portugal">Portugal</option>
												<option value="Puerto Rico">Puerto Rico</option>
												<option value="Qatar">Qatar</option>
												<option value="Republic of Montenegro">Republic of Montenegro</option>
												<option value="Republic of Serbia">Republic of Serbia</option>
												<option value="Reunion">Reunion</option>
												<option value="Romania">Romania</option>
												<option value="Russia">Russia</option>
												<option value="Rwanda">Rwanda</option>
												<option value="St Barthelemy">St Barthelemy</option>
												<option value="St Eustatius">St Eustatius</option>
												<option value="St Helena">St Helena</option>
												<option value="St Kitts-Nevis">St Kitts-Nevis</option>
												<option value="St Lucia">St Lucia</option>
												<option value="St Maarten">St Maarten</option>
												<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
												<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
												<option value="Saipan">Saipan</option>
												<option value="Samoa">Samoa</option>
												<option value="Samoa American">Samoa American</option>
												<option value="San Marino">San Marino</option>
												<option value="Sao Tome & Principe">Sao Tome & Principe</option>
												<option value="Saudi Arabia">Saudi Arabia</option>
												<option value="Senegal">Senegal</option>
												<option value="Seychelles">Seychelles</option>
												<option value="Sierra Leone">Sierra Leone</option>
												<option value="Singapore">Singapore</option>
												<option value="Slovakia">Slovakia</option>
												<option value="Slovenia">Slovenia</option>
												<option value="Solomon Islands">Solomon Islands</option>
												<option value="Somalia">Somalia</option>
												<option value="South Africa">South Africa</option>
												<option value="Spain">Spain</option>
												<option value="Sri Lanka">Sri Lanka</option>
												<option value="Sudan">Sudan</option>
												<option value="Suriname">Suriname</option>
												<option value="Swaziland">Swaziland</option>
												<option value="Sweden">Sweden</option>
												<option value="Switzerland">Switzerland</option>
												<option value="Syria">Syria</option>
												<option value="Tahiti">Tahiti</option>
												<option value="Taiwan">Taiwan</option>
												<option value="Tajikistan">Tajikistan</option>
												<option value="Tanzania">Tanzania</option>
												<option value="Thailand">Thailand</option>
												<option value="Togo">Togo</option>
												<option value="Tokelau">Tokelau</option>
												<option value="Tonga">Tonga</option>
												<option value="Trinidad & Tobago">Trinidad & Tobago</option>
												<option value="Tunisia">Tunisia</option>
												<option value="Turkey">Turkey</option>
												<option value="Turkmenistan">Turkmenistan</option>
												<option value="Turks & Caicos Is">Turks & Caicos Is</option>
												<option value="Tuvalu">Tuvalu</option>
												<option value="Uganda">Uganda</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Ukraine">Ukraine</option>
												<option value="United Arab Erimates">United Arab Emirates</option>
												<option value="United States of America">United States of America</option>
												<option value="Uraguay">Uruguay</option>
												<option value="Uzbekistan">Uzbekistan</option>
												<option value="Vanuatu">Vanuatu</option>
												<option value="Vatican City State">Vatican City State</option>
												<option value="Venezuela">Venezuela</option>
												<option value="Vietnam">Vietnam</option>
												<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
												<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
												<option value="Wake Island">Wake Island</option>
												<option value="Wallis & Futana Is">Wallis & Futana Is</option>
												<option value="Yemen">Yemen</option>
												<option value="Zaire">Zaire</option>
												<option value="Zambia">Zambia</option>
												<option value="Zimbabwe">Zimbabwe</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div id="commentInfo" class="tab-pane fade">
								<h3>Comment</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Comment </label>
									<div class="col-sm-8">
										<textarea class="form-control" maxlength="1000" rows="10" id="comment" name="comment"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="createBuyerBtn" name="createBuyer" autocomplete="off"> Confirm</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- View Buyer Modal -->
	<div class="modal fade" id="viewBuyerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:70%;margin-top:4%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-eye"></i> View Buyer</h4>
				</div>
				<div class="modal-body" id="buyer_detail">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Removed View Buyer Modal -->
	<div class="modal fade" id="viewremoveSalesmanModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:60%;margin-top:4%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" style="color:red"><i class="fa fa-remove"></i> Removed Salesman</h4>
				</div>
				<div class="modal-body" id="removeSalesman_detail" style="max-height:450px; overflow:auto;width:100%">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- update Buyer -->
	<div class="modal fade" id="updateBuyerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:50%;margin-top:1%">
			<div class="modal-content" style="padding:3%">
				<form class="form-horizontal" id="submitBuyerForm" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Update Buyer</h4>
					</div>
					<div class="modal-body">
						<div id="add-category-messages">
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#upbasicInfo">Basic Info</a></li>
							<li><a data-toggle="tab" href="#uploginInfo">Login</a></li>
							<li><a data-toggle="tab" href="#upresidenceInfo">Residence Info</a></li>
							<li><a data-toggle="tab" href="#upcommentInfo">Comment</a></li>
						</ul>
						<div class="tab-content">
							<div id="upbasicInfo" class="tab-pane fade in active">
								<h3>Basic Information</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">First Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="upfirstName" placeholder="First Name" name="upfirstName" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Last Name *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="40" required id="uplastName" placeholder="Last Name" name="uplastName" autocomplete="off">
									</div>
								</div>
								
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Phone Number *</label>
									<div class="col-sm-8">
										<input type="text" class="form-control text-capitalize" maxlength="60" required id="upphoneNumber" placeholder="Phone Number" name="upphoneNumber" autocomplete="off">
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="categoryStatus" class="col-sm-3 control-label">Buyer Status *</label>
										<div class="col-sm-8">
											<select class="form-control" required id="upbuyerStatus" name="upbuyerStatus">
												<option value="">Select Buyer Status</option>
												<option value="Active">Active</option>
												<option value="Suspended">Suspended</option>
												<option value="Pending">Pending</option>
												<option value="Rejected">Rejected</option>
											</select>
										</div>
								</div>
							</div>
							<div id="uploginInfo" class="tab-pane fade">
								<h3>Login Information</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Email *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="60" required id="upemail" placeholder="Email" name="upemail" autocomplete="off">
											<div id="emailCheck" style="color:red;"></div>
										</div>
										
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Username *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="30" readonly="" required id="upusername" placeholder="Username" name="upusername" autocomplete="off">
											<div id="usernameCheck" style="color:red;"></div>
										</div>
									</div>
									
									<div id="passwordCheck" style="color:red;margin-left:165px"></div>
								</div>
							</div>
							<div id="upresidenceInfo" class="tab-pane fade">
								<h3>Residence Info</h3>
								<div class="form-group" style="margin-left: 10px;">
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Address *</label>
										<div class="col-sm-8">
											<textarea class="form-control" maxlength="200" required id="upaddress" placeholder="Address" name="upaddress" rows="3"></textarea>
										</div>
										
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">City *</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" maxlength="30" required id="upcity" placeholder="City" name="upcity" autocomplete="off">
											
										</div>
									</div>
									<div class="form-group">
										<label for="categoryName" class="col-sm-3 control-label">Country *</label>
										<div class="col-sm-8">
											<select class="form-control" id="upcountry" name="upcountry">
												<option value="">Select Country</option>
    											<option value="--">Not Specified</option>
												<option value="Afganistan">Afghanistan</option>
												<option value="Albania">Albania</option>
												<option value="Algeria">Algeria</option>
												<option value="American Samoa">American Samoa</option>
												<option value="Andorra">Andorra</option>
												<option value="Angola">Angola</option>
												<option value="Anguilla">Anguilla</option>
												<option value="Antigua & Barbuda">Antigua & Barbuda</option>
												<option value="Argentina">Argentina</option>
												<option value="Armenia">Armenia</option>
												<option value="Aruba">Aruba</option>
												<option value="Australia">Australia</option>
												<option value="Austria">Austria</option>
												<option value="Azerbaijan">Azerbaijan</option>
												<option value="Bahamas">Bahamas</option>
												<option value="Bahrain">Bahrain</option>
												<option value="Bangladesh">Bangladesh</option>
												<option value="Barbados">Barbados</option>
												<option value="Belarus">Belarus</option>
												<option value="Belgium">Belgium</option>
												<option value="Belize">Belize</option>
												<option value="Benin">Benin</option>
												<option value="Bermuda">Bermuda</option>
												<option value="Bhutan">Bhutan</option>
												<option value="Bolivia">Bolivia</option>
												<option value="Bonaire">Bonaire</option>
												<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
												<option value="Botswana">Botswana</option>
												<option value="Brazil">Brazil</option>
												<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
												<option value="Brunei">Brunei</option>
												<option value="Bulgaria">Bulgaria</option>
												<option value="Burkina Faso">Burkina Faso</option>
												<option value="Burundi">Burundi</option>
												<option value="Cambodia">Cambodia</option>
												<option value="Cameroon">Cameroon</option>
												<option value="Canada">Canada</option>
												<option value="Canary Islands">Canary Islands</option>
												<option value="Cape Verde">Cape Verde</option>
												<option value="Cayman Islands">Cayman Islands</option>
												<option value="Central African Republic">Central African Republic</option>
												<option value="Chad">Chad</option>
												<option value="Channel Islands">Channel Islands</option>
												<option value="Chile">Chile</option>
												<option value="China">China</option>
												<option value="Christmas Island">Christmas Island</option>
												<option value="Cocos Island">Cocos Island</option>
												<option value="Colombia">Colombia</option>
												<option value="Comoros">Comoros</option>
												<option value="Congo">Congo</option>
												<option value="Cook Islands">Cook Islands</option>
												<option value="Costa Rica">Costa Rica</option>
												<option value="Cote DIvoire">Cote DIvoire</option>
												<option value="Croatia">Croatia</option>
												<option value="Cuba">Cuba</option>
												<option value="Curaco">Curacao</option>
												<option value="Cyprus">Cyprus</option>
												<option value="Czech Republic">Czech Republic</option>
												<option value="Denmark">Denmark</option>
												<option value="Djibouti">Djibouti</option>
												<option value="Dominica">Dominica</option>
												<option value="Dominican Republic">Dominican Republic</option>
												<option value="East Timor">East Timor</option>
												<option value="Ecuador">Ecuador</option>
												<option value="Egypt">Egypt</option>
												<option value="El Salvador">El Salvador</option>
												<option value="Equatorial Guinea">Equatorial Guinea</option>
												<option value="Eritrea">Eritrea</option>
												<option value="Estonia">Estonia</option>
												<option value="Ethiopia">Ethiopia</option>
												<option value="Falkland Islands">Falkland Islands</option>
												<option value="Faroe Islands">Faroe Islands</option>
												<option value="Fiji">Fiji</option>
												<option value="Finland">Finland</option>
												<option value="France">France</option>
												<option value="French Guiana">French Guiana</option>
												<option value="French Polynesia">French Polynesia</option>
												<option value="French Southern Ter">French Southern Ter</option>
												<option value="Gabon">Gabon</option>
												<option value="Gambia">Gambia</option>
												<option value="Georgia">Georgia</option>
												<option value="Germany">Germany</option>
												<option value="Ghana">Ghana</option>
												<option value="Gibraltar">Gibraltar</option>
												<option value="Great Britain">Great Britain</option>
												<option value="Greece">Greece</option>
												<option value="Greenland">Greenland</option>
												<option value="Grenada">Grenada</option>
												<option value="Guadeloupe">Guadeloupe</option>
												<option value="Guam">Guam</option>
												<option value="Guatemala">Guatemala</option>
												<option value="Guinea">Guinea</option>
												<option value="Guyana">Guyana</option>
												<option value="Haiti">Haiti</option>
												<option value="Hawaii">Hawaii</option>
												<option value="Honduras">Honduras</option>
												<option value="Hong Kong">Hong Kong</option>
												<option value="Hungary">Hungary</option>
												<option value="Iceland">Iceland</option>
												<option value="Indonesia">Indonesia</option>
												<option value="India">India</option>
												<option value="Iran">Iran</option>
												<option value="Iraq">Iraq</option>
												<option value="Ireland">Ireland</option>
												<option value="Isle of Man">Isle of Man</option>
												<option value="Israel">Israel</option>
												<option value="Italy">Italy</option>
												<option value="Jamaica">Jamaica</option>
												<option value="Japan">Japan</option>
												<option value="Jordan">Jordan</option>
												<option value="Kazakhstan">Kazakhstan</option>
												<option value="Kenya">Kenya</option>
												<option value="Kiribati">Kiribati</option>
												<option value="Korea North">Korea North</option>
												<option value="Korea Sout">Korea South</option>
												<option value="Kuwait">Kuwait</option>
												<option value="Kyrgyzstan">Kyrgyzstan</option>
												<option value="Laos">Laos</option>
												<option value="Latvia">Latvia</option>
												<option value="Lebanon">Lebanon</option>
												<option value="Lesotho">Lesotho</option>
												<option value="Liberia">Liberia</option>
												<option value="Libya">Libya</option>
												<option value="Liechtenstein">Liechtenstein</option>
												<option value="Lithuania">Lithuania</option>
												<option value="Luxembourg">Luxembourg</option>
												<option value="Macau">Macau</option>
												<option value="Macedonia">Macedonia</option>
												<option value="Madagascar">Madagascar</option>
												<option value="Malaysia">Malaysia</option>
												<option value="Malawi">Malawi</option>
												<option value="Maldives">Maldives</option>
												<option value="Mali">Mali</option>
												<option value="Malta">Malta</option>
												<option value="Marshall Islands">Marshall Islands</option>
												<option value="Martinique">Martinique</option>
												<option value="Mauritania">Mauritania</option>
												<option value="Mauritius">Mauritius</option>
												<option value="Mayotte">Mayotte</option>
												<option value="Mexico">Mexico</option>
												<option value="Midway Islands">Midway Islands</option>
												<option value="Moldova">Moldova</option>
												<option value="Monaco">Monaco</option>
												<option value="Mongolia">Mongolia</option>
												<option value="Montserrat">Montserrat</option>
												<option value="Morocco">Morocco</option>
												<option value="Mozambique">Mozambique</option>
												<option value="Myanmar">Myanmar</option>
												<option value="Nambia">Nambia</option>
												<option value="Nauru">Nauru</option>
												<option value="Nepal">Nepal</option>
												<option value="Netherland Antilles">Netherland Antilles</option>
												<option value="Netherlands">Netherlands (Holland, Europe)</option>
												<option value="Nevis">Nevis</option>
												<option value="New Caledonia">New Caledonia</option>
												<option value="New Zealand">New Zealand</option>
												<option value="Nicaragua">Nicaragua</option>
												<option value="Niger">Niger</option>
												<option value="Nigeria">Nigeria</option>
												<option value="Niue">Niue</option>
												<option value="Norfolk Island">Norfolk Island</option>
												<option value="Norway">Norway</option>
												<option value="Oman">Oman</option>
												<option value="Pakistan">Pakistan</option>
												<option value="Palau Island">Palau Island</option>
												<option value="Palestine">Palestine</option>
												<option value="Panama">Panama</option>
												<option value="Papua New Guinea">Papua New Guinea</option>
												<option value="Paraguay">Paraguay</option>
												<option value="Peru">Peru</option>
												<option value="Phillipines">Philippines</option>
												<option value="Pitcairn Island">Pitcairn Island</option>
												<option value="Poland">Poland</option>
												<option value="Portugal">Portugal</option>
												<option value="Puerto Rico">Puerto Rico</option>
												<option value="Qatar">Qatar</option>
												<option value="Republic of Montenegro">Republic of Montenegro</option>
												<option value="Republic of Serbia">Republic of Serbia</option>
												<option value="Reunion">Reunion</option>
												<option value="Romania">Romania</option>
												<option value="Russia">Russia</option>
												<option value="Rwanda">Rwanda</option>
												<option value="St Barthelemy">St Barthelemy</option>
												<option value="St Eustatius">St Eustatius</option>
												<option value="St Helena">St Helena</option>
												<option value="St Kitts-Nevis">St Kitts-Nevis</option>
												<option value="St Lucia">St Lucia</option>
												<option value="St Maarten">St Maarten</option>
												<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
												<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
												<option value="Saipan">Saipan</option>
												<option value="Samoa">Samoa</option>
												<option value="Samoa American">Samoa American</option>
												<option value="San Marino">San Marino</option>
												<option value="Sao Tome & Principe">Sao Tome & Principe</option>
												<option value="Saudi Arabia">Saudi Arabia</option>
												<option value="Senegal">Senegal</option>
												<option value="Seychelles">Seychelles</option>
												<option value="Sierra Leone">Sierra Leone</option>
												<option value="Singapore">Singapore</option>
												<option value="Slovakia">Slovakia</option>
												<option value="Slovenia">Slovenia</option>
												<option value="Solomon Islands">Solomon Islands</option>
												<option value="Somalia">Somalia</option>
												<option value="South Africa">South Africa</option>
												<option value="Spain">Spain</option>
												<option value="Sri Lanka">Sri Lanka</option>
												<option value="Sudan">Sudan</option>
												<option value="Suriname">Suriname</option>
												<option value="Swaziland">Swaziland</option>
												<option value="Sweden">Sweden</option>
												<option value="Switzerland">Switzerland</option>
												<option value="Syria">Syria</option>
												<option value="Tahiti">Tahiti</option>
												<option value="Taiwan">Taiwan</option>
												<option value="Tajikistan">Tajikistan</option>
												<option value="Tanzania">Tanzania</option>
												<option value="Thailand">Thailand</option>
												<option value="Togo">Togo</option>
												<option value="Tokelau">Tokelau</option>
												<option value="Tonga">Tonga</option>
												<option value="Trinidad & Tobago">Trinidad & Tobago</option>
												<option value="Tunisia">Tunisia</option>
												<option value="Turkey">Turkey</option>
												<option value="Turkmenistan">Turkmenistan</option>
												<option value="Turks & Caicos Is">Turks & Caicos Is</option>
												<option value="Tuvalu">Tuvalu</option>
												<option value="Uganda">Uganda</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Ukraine">Ukraine</option>
												<option value="United Arab Erimates">United Arab Emirates</option>
												<option value="United States of America">United States of America</option>
												<option value="Uraguay">Uruguay</option>
												<option value="Uzbekistan">Uzbekistan</option>
												<option value="Vanuatu">Vanuatu</option>
												<option value="Vatican City State">Vatican City State</option>
												<option value="Venezuela">Venezuela</option>
												<option value="Vietnam">Vietnam</option>
												<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
												<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
												<option value="Wake Island">Wake Island</option>
												<option value="Wallis & Futana Is">Wallis & Futana Is</option>
												<option value="Yemen">Yemen</option>
												<option value="Zaire">Zaire</option>
												<option value="Zambia">Zambia</option>
												<option value="Zimbabwe">Zimbabwe</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div id="upcommentInfo" class="tab-pane fade">
								<h3>Comment</h3>
								<div class="form-group">
									<label for="categoryName" class="col-sm-3 control-label">Comment </label>
									<div class="col-sm-8">
										<textarea class="form-control" maxlength="1000" rows="10" id="upcomment" name="upcomment"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="buyer_id" id="buyer_id">
						<input type="hidden" name="admin_id" id="admin_id" value="<?php echo $Id;?>">
						<input type="submit" name="update" id="Update" value="Update" class="btn btn-success" />
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Removed Dealership Modal -->
	<div class="modal fade" id="viewRemovedBuyerModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" style="width:90%;margin-top:2%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" style="color:red"><i class="fa fa-remove"></i> Removed Dealers</h4>
				</div>
				<div class="modal-body" id="removeBuyer_detail" style="max-height:450px; overflow:auto;width:100%">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
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
		<script type="text/javascript" src="js/Manage Buyers.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#dataTables-example').DataTable({
					responsive: true
				});
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
    </body>
</html>
