<?php
    require_once '../db_connect.php'; 
    if(isset($_POST['createScheduleBtn'])) 
    {
        $dealer_id=mysqli_real_escape_string($connect,$_POST['user_id']);
        if($dealer_id!='')
        {
            //check if timetable already exist
            $sql_test="Select * from business_schedule where DealerId='$dealer_id'";
            $result = mysqli_query($connect, $sql_test);
            $numRows = mysqli_num_rows($result);
            if($numRows==0)
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
                
                $status = "Active";

                if($mon_check=='Closed')
                {
                    $mon_from = ''; 
                    $mon_to = '';
                }

                $sql_from = "INSERT INTO business_fromtime (bsFrom_Mon, bsFrom_Tue, bsFrom_Wed, bsFrom_Thr, bsFrom_Fri, bsFrom_Sat, bsFrom_Sun) VALUES 
                ('$mon_from','$tue_from','$wed_from','$thr_from','$fri_from','$sat_from','$sun_from')";
                
                $sql_to = "INSERT INTO business_totime (bsTo_Mon, bsTo_Tue, bsTo_Wed, bsTo_Thr, bsTo_Fri, bsTo_Sat, bsTo_Sun) VALUES 
                ('$mon_to', '$tue_to', '$wed_to', '$thr_to', '$fri_to', '$sat_to', '$sun_to')";
                
                $sql_check = "INSERT INTO bschedule_check (bSCheck_Mon, bSCheck_Tue, bSCheck_Wed, bSCheck_Thr, bSCheck_Fri, bSCheck_Sat, bSCheck_Sun) 
                VALUES ('$mon_check', '$tue_check', '$wed_check', '$thr_check', '$fri_check', '$sat_check', '$sun_check')"; 

                if(mysqli_query($connect, $sql_from))
                {
                    $from_time_connect = mysqli_insert_id($connect);
                    if(mysqli_query($connect, $sql_to))
                    {
                        $to_time_connect = mysqli_insert_id($connect);
                        if(mysqli_query($connect, $sql_check))
                        {
                            $check_connect = mysqli_insert_id($connect);
                            if($check_connect!='')
                            {
                                $sql_business_t= "INSERT INTO business_schedule (fromTimeId, toTimeId, bS_Status, DealerId, bsCheckId) 
                                VALUES ('$from_time_connect', '$to_time_connect', 'Active', '$dealer_id', '$check_connect')";
                                if(mysqli_query($connect, $sql_business_t))
                                {
                                    header('location:Working-Hours.php?msg=Success');
                                }
                                else
                                {
                                    header('location:Working-Hours.php?msgErr=ErrMsg');
                                }
                            }
                            else
                            {
                                header('location:Working-Hours.php?msgErrCB=ErrCheckBlank');
                            }
                        }
                        else
                        {
                            header('location:Working-Hours.php?msgErrC=ErrCheck');
                        }
                    }
                    else
                    {
                        header('location:Working-Hours.php?msgErrT=ErrTo');
                    }
                }
                else
                {
                    header('location:Working-Hours.php?msgErrF=errMsgFrom');
                }
            }
            else
            {
                //Already has time schedule
                header('location:Working-Hours.php?msgAl=Already');
            }
        }
        else
        {
            header('location:Working-Hours.php?msgErrD=DNotFound');
        }
    }
?>