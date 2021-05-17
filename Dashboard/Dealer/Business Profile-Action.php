<?php 
require_once '../../db_connect.php';

if($_POST) {

	$grpname = mysqli_real_escape_string($connect, $_POST['grpName']);
	$loc = mysqli_real_escape_string($connect, $_POST['mainLoc']);
	$dealership = mysqli_real_escape_string($connect, $_POST['t_Dealership']);
	$agent = mysqli_real_escape_string($connect, $_POST['d_Agents']);
	$cStock = mysqli_real_escape_string($connect, $_POST['carStock']);
	$dType = mysqli_real_escape_string($connect, $_POST['dealershipType']);
    $workFrom= mysqli_real_escape_string($connect, $_POST['workFrom']);
    $toWork = mysqli_real_escape_string($connect, $_POST['toWork']);

	$workFromTime=$_POST['WF_Time'];
    $toWorkTime = $_POST['WT_Time'];

	$pass = mysqli_real_escape_string($connect, $_POST['password']);
	$pass = sha1(md5($pass));
	$userId = mysqli_real_escape_string($connect, $_POST['user_id']);
	if($pass!='')
	{
		$sql ="SELECT * FROM dealer WHERE dealer_ID = {$userId}";
		if($query = $connect->query($sql))
		{
			while($result = $query->fetch_assoc())
			{
				if($pass == $result['dealer_Password'])
				{
					$updateSql = "UPDATE dealer SET 
                    dealer_Dealership = '$grpname', 
                    dealer_Location='$loc', 
                    dealer_DealerNum='$dealership', 
                    dealer_NumAgent='$agent', 
                    dealer_NumCarStock='$cStock',
                    dealer_Type = '$dType', 
                    dealer_WorkFromDay='$workFrom', 
                    dealer_WorkToDay='$toWork',
					dealer_WorkFromTime='$workFromTime', 
                    dealer_WorkToTime='$toWorkTime',
                    dealer_Password='$pass' 
                    WHERE dealer_ID = {$userId} AND dealer_Password='$pass'";
					if($connect->query($updateSql) === TRUE) 
					{
						header('location: Business Profile.php?updateMsg=UpdatedProfile');
					} 
					else 
					{
						header('location: Business Profile.php?msgError=NotUpdateProfile');
					}
				}
				else
				{
					header('location: Business Profile.php?passMsg=PasswordNotMatch');
				}
				
			}
		}
	}
	else
	{
		header('location: Business Profile.php?passEmptyMsg=PasswordEmpty');
	}
}

?>