<html>
<head>
    <title>Carrius - View Dealership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
	<link href="css/myCSS.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <style>
        .textWhite,.textWhite:hover{
            color: white;
        } 
        .noUnderLine,.noUnderLine:hover{
            text-decoration: none;
        }
        .marginBottom{
            margin-bottom: 6px;
        }
        .flexDir{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 86%;
            
        }
        .linkDiv{
            display: flex;
            flex-direction: column;
            justify-self: flex-start;
           
        }
        .linkContent{
            margin-bottom: 4px;
            clear: both;
            margin-left: 0px;
            font-size: 11px;
        }
        .alignContent{
            margin-left: 43px;
        }
        .btnSubscription{
            background-color: #0483fb;
            border-color: #0483fb;
            border-radius: 5px;
            width: 70px;
            font-weight: bold;
            
        }
        #email_sub:focus{
            box-shadow: 0 0 5px rgba(81, 203, 238, 1);
            
            border: 1px solid red;
        }
        .addSpace{
            display: none;
        }
        .allRight{
            margin-left: 30%;
        }
        .termsUse{
            margin-left: 10%;
        }
        .hrStyle{
            width:99.5%;
        }
        @media (max-width:48em) {
            .hrStyle{
                width:99%;
            }
        }
        @media (min-width:577px) and (max-width:767px){
            #clearMe{
                content: "I am Usman";
            }
            .alignContent{
            display: none;
            }
        }
        @media (max-width:575px)
        {
            #clearMe{
               clear: both;
            }
            .setAlign{
                margin-left: 40px;
            }
            .setAlignTwo{
                margin-left: 40px;
            }
            .addSpace{
                display: block;
            }
            #learnMore{
                display: none;
            }
            .alignMask{
                display: none;
            }
            .closeMe{
                margin-left: 4px;
            }
            
            #loginView{
                max-width: 0px;
                margin-left: -100px;
            }
            
            
        }
        .loginBtns{
            display: inline-block;
        }
        #loginView{
            min-width: 190px; 
        }
        .navbar-top-links>li>a:hover, .navbar-top-links>li>a:focus, .navbar-top-links>.open>a, .navbar-top-links>.open>a:hover, .navbar-top-links>.open>a:focus
        {
            background-color: #044cc4;
        }
        
    </style>
</head>
<body>
    <div id="wrapper">
        <div class="container-fluid navbar-fixed-top" id="topContent">
            <img class="alignMask" src="resources/Icons Png/mask.png" width="30px" height="30px">
            <b>Health precautions and disinfecting measures to keep you safe.</b>
            <a href="COVID-19.php"><button id="learnMore" name="learnMore">Learn More</button></a>
            <a style="color:#3b9ffc"><i class="fa fa-close fa-lg closeMe" id="closeMe"></i></a>
        </div>

        <nav class="navbar navbar-inverse navbar-fixed-top navTop" id="navTop" role="navigation" style="background-color: #044cc4;border-color:#044cc4;">
            <div class="navbar-header">
				<a class="headerLogo" href="index.php">
                    <span class="companyLogo">
						<img src="resources/logo png.png" class="logoImg" width="30px" height="30px"> 
						<img src="resources/text png.png" style="margin-top:5px;margin-left:8px;" width="120px" height="40px">
                    </span>
				</a>
            </div>

           <ul class="nav navbar-right navbar-top-links">
				<li class="dropdown navbar-inverse" style="background-color: #044cc4;border-color:#044cc4;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-heart fa-fw"></i> 0
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Find a Car
                        <b class="caret"></b>
                    </a>
                    <ul style="min-width: auto;" class="dropdown-menu dropdown-user">
                        <li>
                            <a href="used-cars.php">Used Cars</a>
                        </li>
                        <li>
                            <a href="new-cars.php">New Cars</a>
                        </li>
                        <li>
                            <a href="electric-cars.php">Electric Cars</a>
                        </li>
                        <li>
                            <a href="#">Vehicle Research</a>
                        </li>
                        <li>
                            <a href="#">What's my car style</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Why Carrius
                        <b class="caret"></b>
                    </a>
                    <ul style="min-width: auto;" class="dropdown-menu dropdown-user">
                        <li>
                            <a href="how-it-works.php">How it Works?</a>
                        </li>
                        <li>
                            <a href="our-services.php">Our Services</a>
                        </li>
                        <li>
                            <a href="COVID-19.php">COVID-19</a>
                        </li>
                        <li>
                            <a href="contact-us.php">Contact Us</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="border">
                            Sign in
                            <b class="caret"></b>
                        </span>
                    </a>
                    <ul id="loginView" class="dropdown-menu">
                        <span data-toggle="tooltip" title="As Dealer"><a class="firstLink loginBtns" href="join-us.php" role="button"><button class="btn btn-primary btn-xs">Sign Up</button></a></span>
                        <a id="secondLink" class="loginBtns" href="#" role="button"><button class="btn btn-info btn-xs">Sign In</button></a>
                    </ul>
                    
                </li>
            </ul>
        </nav>
        
        
    </div>
    

    <!-- Script-->
    <script src="Bootstrap/js/jquery.min.js"></script>
	<script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('.closeMe').click(function(){
                var id=$(this).attr("id");
                //alert(id);
                if(id="closeMe")
                {
                    $('#topContent').slideUp("slow").remove();
                    //$('#topContent').fadeOut(500);
                    $('#navTop').css('top','0px');
                }
            });
        });
    </script>
</body>
</html>