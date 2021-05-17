<?php 
session_start();
include("../db_connect.php");
 ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="Bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="Bootstrap/css/fileinput/fileinput.min.css" rel="stylesheet">
		<link href="Bootstrap/css/thisCSS.css" rel="stylesheet">
		<link href="Bootstrap/Sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
		
    </head>
    <body>
        <div class="container">
			<div class="row">
				<a href="../heycar.co.php"><div class="pull-left"><i class="fa fa-home fa-3x"></i></div></a>
			</div>
            <div class="container">
  <h2>Login</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#dealer">Dealer</a></li>
    <li><a data-toggle="tab" href="#buyer">Buyer</a></li>
	<li><a data-toggle="tab" href="#admin">Admin</a></li>
  </ul>

  <div class="tab-content">
    <div id="dealer" class="tab-pane fade in active">
		<h3>Dealer Login</h3>
		<form role="form" method="post" action="#">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" id="dealerUser" placeholder="username" autocomplete="off" name="dealerUser" type="text" autofocus="off">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="password" name="passDealer" type="password" value="">
                </div>
				<input type="submit" class="btn btn-lg btn-success btn-block" id="btnLoginDealer" name="btnLoginDealer" value="Login">
			</fieldset>
        </form>
	</div>
    <div id="buyer" class="tab-pane fade">
      <h3>Buyer Login</h3>
		<form role="form" method="post" action="#">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" id="buyerUser" placeholder="username" value="" name="buyerUser" type="text" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="password" name="buyerPass" type="password" value="">
                </div>
                <input type="submit" class="btn btn-lg btn-success btn-block" id="buyerBtnLogin" name="buyerBtnLogin" value="Login">
            </fieldset>
        </form>
    </div>
    <div id="admin" class="tab-pane fade">
      <h3>Admin Login</h3>
		<form role="form" method="post" action="#">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" id="adminUser" placeholder="username" value="" name="adminUser" type="text" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="password" name="adminPass" type="password" value="">
                </div>
                <input type="submit" class="btn btn-lg btn-success btn-block" id="adminBtnLogin" name="adminBtnLogin" value="Login">
            </fieldset>
        </form>
    </div>
  </div>
</div>
            </div>
        </div>
		<?php
				if(isset($_POST['adminBtnLogin']))
				{
					$user=$_POST['adminUser'];
					$pwd=$_POST['adminPass'];
					$pwd=sha1(md5($pwd));
					$query="Select * from admin where admin_username='$user' && admin_password='$pwd'";
					$data=mysqli_query($connect,$query);
					$rows=mysqli_num_rows($data);
					if($rows==1)
					{
						$_SESSION['loggedInUser']=$user;
						header('location:Admin.php');
					}
					else
						echo "<span class='text-danger' style='margin-left:120px'>Wrong username or password</span>";
				}
		?>
		<?php
				if(isset($_POST['btnLoginDealer']))
				{
					$user=mysqli_real_escape_string($connect,$_POST['dealerUser']);
					$pwd=mysqli_real_escape_string($connect,$_POST['passDealer']);
					$pwd=sha1(md5($pwd));
					$query="Select * from dealer where dealer_Username='$user' && dealer_Password='$pwd' && dealer_Status='Active'";
					$data=mysqli_query($connect,$query);
					$rows=mysqli_num_rows($data);
					if($rows==1)
					{
						$_SESSION['loggedInDealerUser']=$user;
						header('location:Dealer/Dealer.php');
					}
					else
					{
						$sql="Select * from dealer where dealer_Username='$user' && dealer_Password='$pwd' && dealer_Status='Pending'";
						$record=mysqli_query($connect,$sql);
						$result=mysqli_num_rows($record);
						if($result==1)
						{
							echo "<span class='text-danger' style='margin-left:120px'>You are unable just due to your status is not approved yet.</span>";
						}
						else
						{
							$sql_suspend="Select * from dealer where dealer_Username='$user' && dealer_Password='$pwd' && dealer_Status='Suspended'";
							$rec=mysqli_query($connect,$sql_suspend);
							$res=mysqli_num_rows($rec);
							if($res==1)
							{
								echo "<span class='text-danger' style='margin-left:120px'>You are restricted to use this system.</span>";
							}
							else
							{
								$sql_reject="Select * from dealer where dealer_Username='$user' && dealer_Password='$pwd' && dealer_Status='Rejected'";
								$rec=mysqli_query($connect,$sql_reject);
								$res=mysqli_num_rows($rec);
								if($res==1)
								{
									echo "<span class='text-danger' style='margin-left:120px'>You can't use this system.</span>";
								}
								else
								{
									echo "<span class='text-danger' style='margin-left:120px'>Wrong username or password</span>";
								}
								
							}
						}
					}
						
				}
		?>
		<?php
				if(isset($_POST['buyerBtnLogin']))
				{
					$user=mysqli_real_escape_string($connect, $_POST['buyerUser']);
					$pwd_buyer=mysqli_real_escape_string($connect, $_POST['buyerPass']);
					$pwd_buyer=sha1(md5($pwd_buyer));
					$query="Select * from buyer where buyer_Username='$user' AND buyer_Password='$pwd_buyer' AND buyer_Status='Active'";
					$data=mysqli_query($connect,$query);
					$rows=mysqli_num_rows($data);
					if($rows==1)
					{
						$_SESSION['loggedInBuyerUser']=$user;
						header('location:Buyer/Buyer.php');
					}
					else
					{
						$sql="Select * from buyer where buyer_Username='$user' AND buyer_Password='$pwd_buyer' AND buyer_Status='Suspended'";
						$record=mysqli_query($connect,$sql);
						$result=mysqli_num_rows($record);
						if($result==1)
						{
							echo "<span class='text-danger' style='margin-left:120px'>You are suspended. Contact with admin for access.</span>";
							
						}
						else
						{
							$mysql="Select * from buyer where buyer_Username='$user' AND buyer_Password='$pwd_buyer' AND buyer_Status='Terminated'";
							$rec=mysqli_query($connect,$mysql);
							$res=mysqli_num_rows($rec);
							if($res==1)
								echo "<span class='text-danger' style='margin-left:120px'>You have been removed</span>";
							else
								echo "<span class='text-danger' style='margin-left:120px'>Wrong username or password</span>";
						}
					}
						
				}
		?>
        <!-- jQuery -->
        <script src="Bootstrap/js/jquery.min.js"></script>
		<script src="Bootstrap/js/metisMenu.min.js"></script>
		<script src="Bootstrap/js/bootstrap.min.js"></script>
		<script src="Bootstrap/js/startmin.js"></script>
		<script src="Bootstrap/js/fileinput/fileinput.min.js"></script>
		<script src="Bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
		<script src="Bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>
		<script src="Bootstrap/Sweetalert/dist/sweetalert2.all.min.js"></script>
		<script src="Bootstrap/js/project/products.js"></script>
		<script>
			$(document).ready(function() {
				$('#adminUser').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k >= 48 && k <= 57 || k==32;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#dealerUser').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k >= 48 && k <= 57 || k==32;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#buyerUser').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k >= 48 && k <= 57 || k==32;
					if (!ok)
					{
						e.preventDefault();
					}
				});
			});
		</script>
    </body>
</html>
