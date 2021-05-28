<?php
    require_once '../db_connect.php'; 
    if(isset($_POST['createScheduleBtn'])) 
    {
        $dealer_id=mysqli_real_escape_string($connect,$_POST['user_id']);
        if($dealer_id!='')
        {
            $mon_from = mysqli_real_escape_string($connect, $_POST['AWF_MonTime']);
            $mon_to = mysqli_real_escape_string($connect, $_POST['AWT_MonTime']);
            $mon_check = mysqli_real_escape_string($connect, $_POST['checkMondayAdd']);

            $tue_from = mysqli_real_escape_string($connect, $_POST['AWF_TueTime']);
            $tue_to = mysqli_real_escape_string($connect, $_POST['AWT_TueTime']);
            $tue_check = mysqli_real_escape_string($connect, $_POST['checkTuesdayAdd']);

            $wed_from = mysqli_real_escape_string($connect, $_POST['AWF_WedTime']);
            $wed_to = mysqli_real_escape_string($connect, $_POST['AWT_WedTime']);
            $wed_check = mysqli_real_escape_string($connect, $_POST['checkWednesdayAdd']);

            $thr_from = mysqli_real_escape_string($connect, $_POST['AWF_ThuTime']);
            $thr_to = mysqli_real_escape_string($connect, $_POST['AWT_ThuTime']);
            $thr_check = mysqli_real_escape_string($connect, $_POST['checkThrusdayAdd']);

            $fri_from = mysqli_real_escape_string($connect, $_POST['AWF_FriTime']);
            $fri_to = mysqli_real_escape_string($connect, $_POST['AWT_FriTime']);
            $fri_check = mysqli_real_escape_string($connect, $_POST['checkFridayAdd']);

            $sat_from = mysqli_real_escape_string($connect, $_POST['AWF_SatTime']);
            $sat_to = mysqli_real_escape_string($connect, $_POST['AWT_SatTime']);
            $sat_check = mysqli_real_escape_string($connect, $_POST['checkSaturdayAdd']);

            $sun_from = mysqli_real_escape_string($connect, $_POST['AWF_SunTime']);
            $sun_to = mysqli_real_escape_string($connect, $_POST['AWT_SunTime']);
            $sun_check = mysqli_real_escape_string($connect, $_POST['checkSundayAdd']);
            
            if($mon_check=='Closed')
            {
                $mon_from = ''; 
                $mon_to = '';
            }
            $sql_from = "INSERT INTO business_fromtime (bsFrom_Mon, bsFrom_Tue) VALUES ('$mon_from','$tue_from')";
            $sql_to = "INSERT INTO business_totime (bsTo_Mon, bsTo_Tue) VALUES ('$mon_to','$tue_to')";
            if(mysqli_query($connect, $sql_from) && mysqli_query($connect, $sql_to))
            {
                
                    header('location:Working-Hours.php?msg=Success');
                
            }
            
        }
        else
        {
            header('location:Working-Hours.php?msgErrD=DNotFound');
        }
    }
?>