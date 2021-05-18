<?php
    session_start();
    include_once  'db_connect.php';
    /*
    do{
        $user=rand(1,999999999);
        $flag=false;
        $sql="Select * from fav_cars where favCar_tmpUser='$user' AND favCar_MarkedBy='NonRegisteredUser'";
        $result=mysqli_query($connect, $sql);
        $numRows=mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result))
        {
            if($numRows==0)
            {
                $_SESSION['nonRegisterUser']=$user;
                //break;
                $flag=true;
            }
        }
        
            
        
    }while($flag=false);
    */
    //$user=rand(1,999999999);
    $_SESSION['nonRegisterUser']="NonRegister";
    $tmpUser=$_SESSION['nonRegisterUser'];
?>