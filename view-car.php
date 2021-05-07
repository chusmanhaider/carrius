<html>
<head>
    <title>Carrius - View Car</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <link href="css/viewCar.css" rel="stylesheet">
    
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper"  style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="iContainer">
                    <span class="col col-lg-7 col-xs-12">
                        <!--<img src="resources/a.jpg" class="img-responsive" id="displayCar">-->
                        <?php include_once 'slider.php';?>
                        <i class="fa fa-heart fa-2x favIcon"></i>
                        <span class="detailUnder">
                            <span class="dealership">
                                <img src="resources/icons png/user (1).png" width="14px" height="14px">
                                <span class="setFontSize">XYZ Dealership Ltd</span>
                            </span>
                            <span class="location">
                                <img src="resources/icons png/pin.png" width="16px" height="16px">
                                <span class="setFontSize">Ontario, Sydney</span>
                            </span>
                            <span class="timing">
                                <img src="resources/icons png/hour.png" width="16px" height="16px">
                                <span class="setFontSize">Monday to Friday 9:00 am to 5:00</span>
                            </span>
                        </span>
                    </span>
                    <span class="col col-lg-5 col-xs-12 addSmallMargin" style="margin-top:-19px">
                        <h3 style="color:black">Name</h3>
                        <p class="infoSetUpper">Year : <?php echo "<span style='font-weight:normal'>2019</span>";?></p>
                        <p class="infoSetUpper">Condition : <?php echo "<span style='font-weight:normal'>Used</span>";?></p>
                        <p class="infoSetUpper">Mileage : <?php echo "<span style='font-weight:normal'>98 Miles</span>";?></p>
                        <p class="infoSetUpper">Average CO<sub>2</sub> Emissions : </p>
                        <img style="margin-top:-7px" src="resources/Updated Icons/co2 bar.png" width="200px">
                        <p style="margin-top:5px;margin-bottom:-4px;" class="infoSetUpper">Price:</p>
                        <span class="priceAlign">
                            <strong> <?php echo "<span style='font-size:25px;font-weight:bold;margin-top:-15px'>$ 750000 </span>";?></strong>
                        </span>
                        <span class="msgDealer">
                            <input type="button" class="msgDealerBtn" value="Message Dealer">
                        </span>
                        <span class="vidCall">
                            <input type="button" class="vidCallBtn" value="Video Call Dealer">
                        </span>
                        <span class="recommendedText">
                            <small class="smallText" style="font-size:11px">Recommended! Only available during <b>Dealership Business
                            <br>hours</b></small><br>
                        </span>
                        <span class="emailYourself">
                            <input type="button" class="emailBtn" value="Email car info to Yourself">
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div><!-- End or Wrapper -->
    <?php
        echo "<br><br><br><br><br><br><br><br>";
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>