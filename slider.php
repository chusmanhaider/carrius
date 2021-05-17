<html>
    <head>
        <style>
            .glyphicon{
                background-color: #044cc4;
                opacity: 1.5;
                border-radius: 50%;
            }
        </style>
    </head>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
            include_once 'db_connect.php';
            $car_Id = $_GET['id'];
            $sql = "SELECT * from car_gallery where CarId = $car_Id AND carGallery_Status='Available'";
            $res = mysqli_query($connect, $sql);
            $counter=0;
            $numRow = mysqli_num_rows($res);
            while($row = mysqli_fetch_assoc($res))
            {
                while($counter<$numRow)
                {
                    if($counter==0)
                    {
        ?>
        
        <li data-target="#myCarousel" data-slide-to="<?php echo $counter; ?>" class="active"></li>
        
       <?php
                    }
                    else{
        ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $counter; ?>"></li>
        <?php
                    }
                    $counter=$counter+1;
                }
            }
        ?>
        
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
            //include_once 'db_connect.php';
            $car_Id = $_GET['id'];
            $sql_c = "SELECT * from car_gallery where CarId = $car_Id AND carGallery_Status='Available'";
            $result = mysqli_query($connect, $sql_c);
            $count=0;
            $numRows = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result))
            {
                if($count==0)
                {
        ?>
        <div class="item active">
            <img src="<?php 
                    $link_active=$row['carGallery_Image'];
                    $substr=substr($link_active,0,3);
                    if($substr!='../')
                        echo "Dashboard/".$row['carGallery_Image'];
                    else
                    {
                            $newlink_active=substr($link_active,3);
                            echo "Dashboard/".$newlink_active;
                    }
                    ?>" alt="<?php echo $row['carGallery_Caption'];?>" style="width:100%;height:59%">

        </div>
        <?php
                }
                else{
        ?>
        <div class="item">
            <img src="<?php 
                    $link=$row['carGallery_Image'];
                    $substr=substr($link,0,3);
                    if($substr!='../')
                        echo "Dashboard/".$row['carGallery_Image'];
                    else
                    {
                        $newlink=substr($row['carGallery_Image'],3);
                        echo "Dashboard/".$newlink;
                        //echo "<script>alert($newlink);</script>";
                        //echo("<script>alert('PHP: " . $newlink . "');</script>");
                    }
                        
                    ?>" alt="<?php echo $row['carGallery_Caption'];?>" style="width:100%;height:59%"></div>
        <?php
                }
                $count=-2;
            }
        ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php
    //}
?>