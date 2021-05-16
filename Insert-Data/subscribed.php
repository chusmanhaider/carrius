<?php
    include_once '../db_connect.php';
    $email=mysqli_real_escape_string($connect, $_POST['email_sub']);
    //$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if(isset($_POST['btnSub']))
    {
        $status="Subscribed";
        $que="Select * from subscribers where sub_Email='$email' AND sub_Status='$status'";
        $rt=mysqli_query($connect,$que);
        $numRow=mysqli_num_rows($rt);
        if($numRow==0)
        {
            $sql="INSERT INTO subscribers (sub_Email, sub_Status) VALUES ('$email','$status')";
            if(mysqli_query($connect,$sql))
            {
                //$output="Success";
                header("location:../index.php?su=mg");
                
                
            }
        }
        else
        {
            //$output="Success";
            header("location:../index.php?suX=mgN");
            
            
        }
        
    }
    //echo $output;
?>