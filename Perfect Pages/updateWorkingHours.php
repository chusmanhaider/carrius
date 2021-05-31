<?php
    require_once '../db_connect.php'; 
    if(isset($_POST['updateBtn'])) 
    {
        $dealer_id=mysqli_real_escape_string($connect, $_POST['dealer_id']);
        $entered_password = mysqli_real_escape_string($connect, $_POST['password']);

        $mon_from = mysqli_real_escape_string($connect, $_POST['WF_MonTime']);
	    $mon_to = mysqli_real_escape_string($connect, $_POST['WT_MonTime']);

        $tue_from = mysqli_real_escape_string($connect, $_POST['WF_TueTime']);
	    $tue_to = mysqli_real_escape_string($connect, $_POST['WT_TueTime']);

        $wed_from = mysqli_real_escape_string($connect, $_POST['WF_WedTime']);
	    $wed_to = mysqli_real_escape_string($connect, $_POST['WT_WedTime']);

        $thr_from = mysqli_real_escape_string($connect, $_POST['WF_ThuTime']);
	    $thr_to = mysqli_real_escape_string($connect, $_POST['WT_ThuTime']);

        $fri_from = mysqli_real_escape_string($connect, $_POST['WF_FriTime']);
	    $fri_to = mysqli_real_escape_string($connect, $_POST['WT_FriTime']);

        $sat_from = mysqli_real_escape_string($connect, $_POST['WF_SatTime']);
	    $sat_to = mysqli_real_escape_string($connect, $_POST['WT_SatTime']);

        $sun_from = mysqli_real_escape_string($connect, $_POST['WF_SunTime']);
	    $sun_to = mysqli_real_escape_string($connect, $_POST['WT_SunTime']);

        $entered_password = sha1(md5($entered_password));
        if($dealer_id!='')
        {
            $get_dealer_query = "Select * from dealer where dealer_ID='$dealer_id' AND dealer_Status='Active'";
            $result_dealer = mysqli_query($connect,$get_dealer_query);
            $row_dealer = mysqli_fetch_assoc($result_dealer);
            $dealer_password = $row_dealer['dealer_Password'];
            if($entered_password==$dealer_password && $entered_password!='')
            {
                
            }
            else
            {
                //password not match
                header('location: Working-Hours.php?passMsg=PasswordNotMatch');
            }

        }   
        else
        {
            //Dealer Not found
            header('location: Working-Hours.php?updateMsg=UpdatedProfile');
        }
    }
?>