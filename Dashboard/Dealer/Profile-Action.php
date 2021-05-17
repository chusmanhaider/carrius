<?php 
require_once '../../db_connect.php';

if($_POST) {

	$fname = mysqli_real_escape_string($connect, $_POST['firstName']);
	$lname = mysqli_real_escape_string($connect, $_POST['lastName']);
	$mail = mysqli_real_escape_string($connect, $_POST['email']);
	$cell = mysqli_real_escape_string($connect, $_POST['cellNo']);
	$pass = $_POST['password'];
	$userId = mysqli_real_escape_string($connect, $_POST['user_id']);

	
	$filename = explode('.', $_FILES['fileOne']['name']);
	$filename = $filename[count($filename)-1];
	$location = '../Uploads/'.uniqid(rand()).'.'.$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	//$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileOne']['tmp_name'],$location)){
			$url_one = $location;
		}
	}
	

	$pass=sha1(md5($pass));

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
                    dealer_FName = '$fname', 
					dealer_LName='$lname', 
                    dealer_Email='$mail',
					dealer_CellNumber ='$cell',
					dealer_Image = '$url_one'
                    WHERE dealer_ID = {$userId} AND dealer_Password='$pass'";
					if($connect->query($updateSql) === TRUE) 
					{
						header('location: Profile.php?updateMsg=UpdatedProfile');
						/*$sql_img="INSERT INTO dealer (dealer_Image) VALUES ('$url_one') WHERE dealer_ID = '$userId' AND dealer_Password='$pass'";
						if(mysqli_query($connect, $sql_img))
						{
							header('location: Profile.php?updateMsg=UpdatedProfile');
						}
						else
						{
							header('location: Profile.php?updateImg=ErrorImg');
						}
						*/
						
					} 
					else 
					{
						header('location: Profile.php?msgError=NotUpdateProfile');
					}
				}
				else
				{
					header('location: Profile.php?passMsg=PasswordNotMatch');
				}
				
			}
		}
	}
	else
	{
		header('location: Profile.php?passEmptyMsg=PasswordEmpty');
	}
}

?>