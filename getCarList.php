<?php
    require_once ("db_connect.php");
    $sql="Select * from cars Where car_Status='Available' AND car_AutoStatus='Active'";
    $result=mysqli_query($connect, $sql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<option id='$row[car_ID]' value='$row[car_Name]'>".$row['car_Name']."</option>";
        }
    }
    else
    {
        echo "";
    }
?>
<script>
    
</script>