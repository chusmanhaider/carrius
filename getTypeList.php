<?php
    require_once ("db_connect.php");
    $selectedType = $_GET ['type'];
    $sql="Select * from cars_type Where cType_Status='Available'";
    $result=mysqli_query($connect, $sql);
    $numRows=mysqli_num_rows($result);
    if($selectedType=='')
    {
        if($numRows>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option id='$row[cType_ID]' value='$row[cType_Name]'>".$row['cType_Name']."</option>";
            }
        }
        else
        {
            echo "";
        }
    }
    else{
        if($numRows>0)
        {
            while($rw=mysqli_fetch_assoc($result))
            {
                if($rw['cType_Name']==$selectedType)
                {
                    echo $output = "<option id='$rw[cType_ID]' selected='selected' value='$rw[cType_Name]'>".$rw['cType_Name']."</option>";
                }
                else
                {
                    echo $output= "<option id='$rw[cType_ID]' value='$rw[cType_Name]'>".$rw['cType_Name']."</option>";
                }
                //echo $output;
            }
        }
        else
        {
            echo "";
        }
    }
?>