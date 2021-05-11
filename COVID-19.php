<html>
<head>
    <title>Carrius - COVID-19</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <style>
        .wrapper{
            top:82px;
            position: relative;
        }
        #innerContainer{
            width: 92%;
            margin-left: 11%;
        }
        .lastDiv:after{
            background-color: white;
        }
        #headingAlign{
            margin-left: 5%;
        }
        .hrUnderStyle{
            width:500px;
            margin-left: 75px;
        }
        .setFont{
            font-size:30px;
        }
        .browseBtn{
            color: white;
            font-weight: bold;
            font-size:18px;
            width:180px;
            height:40px;
            background-color: #044cc4;
            margin-left:30%;
            margin-top:20px;
            border:1px solid #044cc4;
            border-radius: 6px;
        }
        /* width */
        
        @media (max-width:575px){
            .wrapper{
                top:123px;
                position: relative;
            }
            .hrUnderStyle{
                width:200px;
                margin-left: 15%;
            }
            .setFont{
                font-size: 24px;
            }
            .browseBtn{
                margin-left:22%;
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper">
        <div class="container-fluid" style="background-color: white;">
            <div class="container" style="margin-top:15px;margin-bottom:25px">
                <div  id="innerContainer">
                    <h2 id="headingAlign">What does <b>COVID-19</b> means for car buyers?</h2>
                        <span class="col col-lg-8 col-sm-12 col-xs-12">
                            <hr class="hrUnderStyle" style="border: 2px solid #0884fc;stroke: #0884fc; fill: #0884fc;margin-top:-3px;">
                            <p style="color:grey;max-width:94%;font-size:16px">
                                Many dealership are struggling hard during this pandemic and they are working around
                                the clock so that they can help buyers purchase a car. With respect to all the COVID
                                rules, it is getting quite hard and time consuming for dealerships to sell their cars. And for
                                Buyers, it is even getting harder and stressful to go outside in this climate but it is number
                                one priority for both parties to wear a mask, sanitize and respect social distancing. Be
                                sure to be always on the look for any COVID rules.
                            </p>
                        </span>
                        <span class="col col-lg-3 col-sm-6 col-xs-6">
                            <img src="resources/Icons png/covid-19.png" width="120px" height="120px">
                        </span>
                    
                </div>
                
            </div>
        </div>
        <div class="container" style="margin-top:15px;margin-bottom:25px;background-color:#f8f8f8">
            <div  id="innerContainer">
                <span class="col col-lg-12 col-xs-12">
                    <h2 style="padding-top: 25px;">
                        <b>Why should you buy and not buy a car right now?</b>
                    </h2>
                    <p style="color:grey;max-width:84%;font-size:18px;margin-top:25px">
                        Things are gradually changing and people are being more conscious about their health and safety.
                        We have a lot of commuter that are turning to buying a car for personal use to grocery shop, individual
                        travel and most importantly to go to work. Buying a car can be overwhelming, especially if
                        you are a first-time car buyer and in this period of time, it can be quite hard for someone to purchase
                        a car. However, we beleieve it can be done remotely and safely.
                    </p>
                </span>
                <span class="col col-lg-12 col-xs-12">
                    <h2 style="padding-top: 25px;">
                        <b>Car-shopping remotely</b>
                    </h2>
                    <p style="color:grey;max-width:84%;font-size:18px;margin-top:25px">
                        Finding the right car is a delicate decision and you need to be comfortable and not in any way
                        under stress. That is why at carrius.net, with all the latest technologies we provide a safer and
                        better way to shop for cars. Dealships have their listings on our marketplace and a few clicks away,
                        you can be connected to a salesperson that can give you a walkaround of your desired car and also
                        answer to your arising questions. All you need is a device that has internet connection and can
                        access our website. ( No download/No app needed)
                    </p>
                </span>
                <span class="col col-lg-12 col-xs-12">
                    <h2 style="padding-top: 25px;">
                        <b>Filling up an online form?</b>
                    </h2>
                    <p style="color:grey;max-width:84%;font-size:18px;margin-top:25px">
                        After speaking with a live agent and you are interested in getting more information about the car or
                        you would like to book a test drive or an on site visit we can arrange that for you. You will have to fill
                        in a simple user-friendly contact sale form where you will have an email follow up with us. Also, Interested
                        car’s evaluation report can be sent to customer upon request.
                    </p>
                </span>
                <span class="col col-lg-12 col-xs-12">
                    <h2 style="padding-top: 25px;">
                        <b>Test Drive/On site Visit?</b>
                    </h2>
                    <p style="color:grey;max-width:84%;font-size:18px;margin-top:25px">
                        Depending on local area restrictions, some dealerships are offering Car Test Drive. This means you
                        buy the car remotely and then can Test Drive the car outside of the dealership with a COVID
                        secure handover - including sanitation of the car. This can be done by speaking with salesperson.
                    </p>
                </span>
            </div>
        </div>
        <div class="container-fluid lastDiv" style="background-color: white;">
            <div class="container" style="margin-top:25px;margin-bottom:25px">
                <div  id="innerContainer">
                    <span class="col col-lg-12 col-xs-12">
                        <p class="setFont" style="color: #044cc4;font-weight:bold;max-width:88%;text-align:center">
                            With these services provided, customers adhere to the rules
                            and regulations of COVID-19, enabling a more safer way for
                            car shopping and most importantly contributing a lot in
                            eradicating the virus.  
                        </p>
                    </span>
                    <span class="col col-lg-12 col-xs-12" style="margin-bottom: 30px;">
                        <a href="all-cars-model.php"><button class="browseBtn">Browse Cars</button></a>
                    </span>
                </div>
            </div>
        </div>
    </div> <!-- End of Wrapper --->
    <!-- -->
    
    <?php
        echo "<br><br><br><br>";
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
</body>
</html>