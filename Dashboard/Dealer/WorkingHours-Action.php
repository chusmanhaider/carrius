<?php
    require_once '../db_connect.php'; 
    if(!empty($_POST)) 
    {
        $dealer_id=mysqli_real_escape_string($connect, $_POST['dealerId']);
        $fromTimeId=mysqli_real_escape_string($connect, $_POST['fromTimeId']);
        $toTimeId=mysqli_real_escape_string($connect, $_POST['toTimeId']);
        $checkId=mysqli_real_escape_string($connect, $_POST['checkId']);

        if($dealer_id!='' && $fromTimeId!='' && $toTimeId!='' && $checkId!='')
        {
            $mon_from = mysqli_real_escape_string($connect, $_POST['WF_MonTime']);
            $mon_to = mysqli_real_escape_string($connect, $_POST['WT_MonTime']);
            $mon_check = mysqli_real_escape_string($connect, $_POST['checkMonday']);

            $tue_from = mysqli_real_escape_string($connect, $_POST['WF_TueTime']);
            $tue_to = mysqli_real_escape_string($connect, $_POST['WT_TueTime']);
            $tue_check = mysqli_real_escape_string($connect, $_POST['checkTuesday']);

            $wed_from = mysqli_real_escape_string($connect, $_POST['WF_WedTime']);
            $wed_to = mysqli_real_escape_string($connect, $_POST['WT_WedTime']);
            $wed_check = mysqli_real_escape_string($connect, $_POST['checkWednesday']);

            $thr_from = mysqli_real_escape_string($connect, $_POST['WF_ThuTime']);
            $thr_to = mysqli_real_escape_string($connect, $_POST['WT_ThuTime']);
            $thr_check = mysqli_real_escape_string($connect, $_POST['checkThrusday']);

            $fri_from = mysqli_real_escape_string($connect, $_POST['WF_FriTime']);
            $fri_to = mysqli_real_escape_string($connect, $_POST['WT_FriTime']);
            $fri_check = mysqli_real_escape_string($connect, $_POST['checkFriday']);

            $sat_from = mysqli_real_escape_string($connect, $_POST['WF_SatTime']);
            $sat_to = mysqli_real_escape_string($connect, $_POST['WT_SatTime']);
            $sat_check = mysqli_real_escape_string($connect, $_POST['checkSaturday']);

            $sun_from = mysqli_real_escape_string($connect, $_POST['WF_SunTime']);
            $sun_to = mysqli_real_escape_string($connect, $_POST['WT_SunTime']);
            $sun_check = mysqli_real_escape_string($connect, $_POST['checkSunday']);

            $sql_from = "UPDATE business_fromtime SET
            bsFrom_Mon = '$mon_from',
            bsFrom_Tue = '$tue_from',
            bsFrom_Wed = '$wed_from',
            bsFrom_Thr = '$thr_from',
            bsFrom_Fri = '$fri_from',
            bsFrom_Sat = '$sat_from',
            bsFrom_Sun = '$sun_from'
            WHERE bsFrom_ID = '$fromTimeId'";

            $sql_to = "UPDATE business_totime SET
            bsTo_Mon = '$mon_to',
            bsTo_Tue = '$tue_to',
            bsTo_Wed = '$wed_to',
            bsTo_Thr = '$thr_to',
            bsTo_Fri = '$fri_to',
            bsTo_Sat = '$sat_to',
            bsTo_Sun = '$sun_to'
            WHERE bsTo_ID = '$toTimeId'";

            $sql_check = "UPDATE bschedule_check SET
            bSCheck_Mon = '$mon_check',
            bSCheck_Tue = '$tue_check',
            bSCheck_Wed = '$wed_check',
            bSCheck_Thr = '$thr_check',
            bSCheck_Fri = '$fri_check',
            bSCheck_Sat = '$sat_check',
            bSCheck_Sun = '$sun_check'
            WHERE bSCheck_ID = '$checkId'";

            if(mysqli_query($connect, $sql_from) && mysqli_query($connect, $sql_to) && mysqli_query($connect, $sql_check))
            {
                header('location: Working-Hours.php?updateMsg=Success');
            }
            else
            {
                header('location: Working-Hours.php?error=error');
            }
            
        }
        else
        {
            //any id is empty
            header('location: Working-Hours.php?updateMsg=iEmpty');
        }

        
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