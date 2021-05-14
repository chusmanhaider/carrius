<html>
    <head>
        <title>Carrius - Dealer Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Bootstrap/css/startmin.css" rel="stylesheet">
        <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
        <link href="css/scrollbar.css" rel="stylesheet">
        <link href="css/dealer-profile.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include_once "header.php";
        ?>
        <div class="wrapper" style="background-color: white;margin-bottom:100px">
            <div class="container" style="background-color: white;">
                <div class="row">
                    <div class="iContainer">
                        <span class="col col-lg-3 col-xs-12 leftMenuU"  style="background-color: #f7f7f7;">
                            <span class="leftMenu">
                                <h4 style="color:black">Dealership</h4> <hr style="border: 1px solid grey; margin-top:-4px; stroke: grey; fill: grey;opacity:0.3">
                            </span>
                            <?php
                                include_once 'db_connect.php';
                                $d_id = $_GET['url'];
                                $sql_car = "SELECT * FROM cars 
                                INNER JOIN dealer ON dealer.dealer_ID = cars.DealerId
                                WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' 
                                AND cars.car_AutoStatus = 'Active' AND dealer.dealer_ID = '$d_id'";
                                
                                $res = mysqli_query($connect, $sql_car);
                                while($row = mysqli_fetch_assoc($res))
                                {
                            ?>
                            <span class="logoImgSpan">
                                <img src="resources/Updated Icons/test.png" class="logoImg" width="100px" height="100px" style="border-radius: 50%;">
                            </span>
                            <span class="sinceYearSpan">
                                <small class="sinceYear" style="color:grey">
                                    Since 
                                    <?php 
                                        $time=$row['dealer_tStamp'];
                                        echo $date = date("Y", strtotime($time));
                                    ?>
                                </small>
                            </span>
                            <span class="rating">
                                <span class="fa fa-star fa-2x stars" id="firstStar"></span>
                                <span class="fa fa-star fa-2x stars" id="secStar"></span>
                                <span class="fa fa-star fa-2x stars" id="thirdStar"></span>
                                <span class="fa fa-star fa-2x stars" id="fourthStar"></span>
                                <span class="fa fa-star fa-2x stars" id="fiveStar"></span>
                            </span>
                            <span class="styleDBusiness">
                                <img src="resources/icons png/user (1).png" width="12px" height="12px"> <span class="loctionInfo" style="color:black;margin-top:10px"><?php echo "<span style='font-weight:normal'>".$row['dealer_Dealership']."</span>";?></span>
                            </span>
                            <span class="styleDBusiness">
                                <img src="resources/icons png/pin.png" width="14px" height="14px"> <span class="loctionInfo" style="color:black"><?php echo "<span style='font-weight:normal'>".$row['dealer_Location']."</span>";?></span>
                            </span>
                            <span class="contactDSpan">
                                <input type="button" data-toggle="modal" data-target="#contactDealership" value="Contact Dealership" id="contactDBTn">
                            </span>
                            <?php
                                }
                            ?>
                            <hr style="border: 1px solid grey;stroke: grey; fill: grey;opacity:0.3">
                            <div class="sidebar-nav styleNavBtns">
                                <ul class="nav" id="side-menu">
                                    <li>
                                        <a href="#" id="caravail" class="active activeLink" style="color:grey;"><span class="fa fa-chevron-right" style="color:grey;margin-left:20px"></span> <span style="color:grey;margin-left:30px">Cars Available</span></a>
                                    </li>
                                    <li>
                                        <a href="#" id="aboutdealer" style="color:grey"><span class="fa fa-chevron-right" style="color:grey;margin-left:20px"></span> <span style="color:grey;margin-left:30px">About Us</span></a>
                                    </li>
                                    <li>
                                        <a href="#" id="teamMem" style="color:grey"><span class="fa fa-chevron-right" style="color:grey;margin-left:20px"></span> <span style="color:grey;margin-left:30px">Team Members</span></a>
                                    </li>
                                </ul>
                            </div>
                        </span>
                        <span class="col col-lg-8 col-xs-12">
                            <span class="imgSet">
                                <img src="resources/a.jpg" id="headerImg">
                            </span>
                            <span class="carAvailable">
                                <?php include_once 'carAvailable.php';?>
                            </span>
                            <span class="aboutUsDealer">
                                <?php include_once 'aboutUsDealer.php';?>
                            </span>
                            <span class="teamMember">
                                <?php include_once 'teamMember.php';?>
                            </span>
                        </span>
                        
                    </div>
                </div>
            </div>
        </div> 
        <!--Contact Dealer Modal-->
        <?php include_once 'contactDealerModal.php';?>
        <?php
        echo "";
        include_once "footer.php";
    ?>
        <script src="Bootstrap/js/jquery.min.js"></script>
        <script src="Bootstrap/js/metisMenu.min.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="Bootstrap/js/startmin.js"></script>
        <script>
            $(document).ready(function(){
                $('.carAvailable').show();
                $('.aboutUsDealer').hide();
                $('.teamMember').hide();
                $(document).on('click', '#caravail',function(){
                    $("#caravail").addClass("activeLink");
                    $("#aboutdealer").removeClass("activeLink");
                    $("#teamMem").removeClass("activeLink");
                    $('.carAvailable').show();
                    $('.aboutUsDealer').hide();
                    $('.teamMember').hide();
                
                });

                $(document).on('click', '#aboutdealer',function(){
                    $("#caravail").removeClass("activeLink");
                    $("#aboutdealer").addClass("activeLink");
                    $("#teamMem").removeClass("activeLink");
                    //alert("Dealer");
                    $('.carAvailable').hide();
                    $('.aboutUsDealer').show();
                    $('.teamMember').hide();
                });

                $(document).on('click', '#teamMem',function(){
                    $("#caravail").removeClass("activeLink");
                    $("#aboutdealer").removeClass("activeLink");
                    $("#teamMem").addClass("activeLink");
                    $('.carAvailable').hide();
                    $('.aboutUsDealer').hide();
                    $('.teamMember').show();
                   //alert("Dealer");
                });
            });
        </script>
    </body>
</html>