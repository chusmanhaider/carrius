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
$firstName=$result['buyer_FName'];
$lastName=$result['buyer_LName'];

$fullName=$firstName." ".$lastName;
$Id=$result['buyer_ID'];
$username=$result['buyer_Username'];
$myImage=$result['buyer_Image'];
$status=$result['buyer_Status'];
$email=$result['buyer_Email'];
$cellNum=$result['buyer_CellNumber'];
$comments=$result['buyer_Comments'];

$address=$result['buyer_Address'];
$city=$result['buyer_City'];
$country=$result['buyer_Country'];
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
				background-color: #31708f;
			}
            .navbar-inverse .navbar-toggle{
                border-color:#31708f;
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
                                <a href="Buyer.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
							<li>
                                <a href="All-Cars.php"><i class="fa fa-car fa-fw"></i> All Cars</a>
                            </li>
							<li>
                                <a href="My Fav Car.php"><i class="fa fa-heart fa-fw"></i> My Favourite Cars</a>
                            </li>
                            <li>
                                <a href="Profile.php" class="active"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
							<li>
                                <a href="Contact-Dealer.php"><i class="fa fa-envelope-square fa-fw"></i> Contact Dealer</a>
                            </li> 
                        </ul>
                    </div>
                </div>
            </nav>
		
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Buyer's Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
					<div class="col-md-9" style="margin-left:9%">
						<div class="panel panel-default" id="profileChangePanel">
							<div class="panel-heading">
								<div class="page-heading"> <i class="fa fa-user fa-fw"></i> Buyer's Profile</div>
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
								<form action="Profile-Action.php" method="post" class="form-horizontal" enctype="multipart/form-data" id="changeUsernameForm">
									<fieldset>
										<div class="changeUsenrameMessages"></div>
										<div class="form-group">
											<label for="shopName" class="col-sm-3 control-label">Profile Photo</label>
											<div class="col-sm-5">
												<?php
												//$myImage;
													if($myImage!='' && $myImage==0)
													{
												?>
												<img src="<?php echo $myImage;?>" alt="Avatar" class="profileImage img-thumbnail img-responsive img-rounded">
												<?php
													}
													else
													{
														echo "<span style='color:red;margin-top:10px;'>No Profile Picture Added</span>";
													}
													//echo $myNewImage;
												?>
											</div>
											
										</div>
										<div class="form-group">
											<label for="shopName" class="col-sm-3 control-label">Change Profile Photo</label>
											<div class="col-sm-8">
											<?php
												//$myImage;
													if($myImage!='' && $myImage==0)
													{
												?>
													<input type="file" name="fileOne" id="fileOne" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off"></div>
												<?php
													}
													else
													{
												?>
													<input type="file" name="fileOne" required id="fileOne" accept="image/x-png,image/gif,image/jpeg"  class="form-control text-capitalize" autocomplete="off"></div>
												<?php
													}
												?>
										</div>
										<div class="form-group">
											<label for="shopName" class="col-sm-3 control-label">First Name</label>
											<div class="col-sm-3">
											  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>"/>
											</div>
											<label for="shopName" class="col-sm-2 control-label">Last Name</label>
											<div class="col-sm-3">
											  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>"/>
											</div>
										</div>
										<div class="form-group">
											<label for="shopkeeprName" class="col-sm-3 control-label">Status</label>
											<div class="col-sm-3">
												<select class="form-control" readonly="">
													<option value="<?php echo $status?>"><?php echo $status;?></option> 
												</select>
											</div>
											<label for="username" class="col-sm-2 control-label"><span data-toggle="tooltip" title="Username can't change">Username [<font style="color:red">?</font></span>]</label>
											<div class="col-sm-3">
											  <input type="text" class="form-control"  id="username" readonly="" name="username" value="<?php echo $username ?>"/>
											</div>
										</div>
										<div class="form-group">
											<label for="contactNo" class="col-sm-3 control-label"><span data-toggle="tooltip" title="Cell no should without dashes">Phone # [<font style="color:red">?</font></span>]</span></label>
											<div class="col-sm-3">
											  <input type="text" class="form-control" maxlength="11" min="11" id="cellNo" name="cellNo" value="<?php echo $cellNum; ?>"/>
											</div>
											<label for="email" class="col-sm-2 control-label">Email</label>
											<div class="col-sm-3">
											  <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>"/>
											</div>
										</div>
										<div class="form-group">
											<label for="shopName" class="col-sm-3 control-label">Address</label>
											<div class="col-sm-8">
												<input type="text" name="address" id="address" value="<?php echo $address;?>" required class="form-control text-capitalize" autocomplete="off">
											</div>
										</div>
										<div class="form-group">
											<label for="shopName" class="col-sm-3 control-label">City</label>
											<div class="col-sm-3">
												<input type="text" name="city" id="city" value="<?php echo $city;?>" required class="form-control text-capitalize" autocomplete="off">
											</div>
											<label for="shopName" class="col-sm-1 control-label">Country</label>
											<div class="col-sm-4">
												<select class="form-control" id="country" name="country">
													<option value="<?php echo $country;?>"><?php echo $country;?></option>
													<option value="">Select Country</option>
													<option value="--">Not Specified</option>
													<option value="Afghanistan">Afghanistan</option>
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
										<hr>
										<div class="form-group">
											<label for="password" class="col-sm-3 control-label">Password</label>
											<div class="col-sm-8">
											  <input type="password" class="form-control" id="password" name="password"/>
											</div>
										</div>
									  <div class="form-group">
										<div class="col-sm-offset-5 col-sm-8">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['buyer_ID']; ?>" /> 
											<button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeProfileBtn">Save Changes </button>
											<button class="btn btn-warning" style="margin-left:20px;" type="reset">Cancel</button>
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
