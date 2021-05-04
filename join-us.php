<html>
<head>
    <title>Carrius - Join Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <link href="css/join-us.css" rel="stylesheet">
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper" style="background-color: white;">
        <div class="container">
            <div class="innerBlock">
                <h2 class="text-center alignHeading"><b>Let’s get this started...</b></h2>
                <hr class="hrUnderStyle" style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-3px;">
                <p class="text-center alignCenter" style="color:#999999;max-width:420px;font-weight:bold">
                    Fill in this Quick Form and we shall get back to you as soon as
                    we get your request.
                </p>
            </div>
        </div>
        <div class="container-fluid" style="margin-top:15px;margin-bottom:25px;background-color:#f8f8f8">
            <div class="container setContainer">
                <form method="Post" action="Insert-Data/signUpDealer.php">
                    <div id="innerContainer">
                        <div class="row firstRow">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-8">
                                        <label for="formLabel" class="control-label">First Name *</label>
                                        <input type="text" name="firstName" id="firstName" class="form-control" required placeholder="First Name">
                                    </span>
                                </div>
                            </div>
                            <span class="addSpace"></span>
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-8">
                                        <label for="formLabel" class="control-label">Last Name *</label>
                                        <input type="text" name="lastName" id="lastName" class="form-control" required placeholder="Last Name">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-7">
                                        <label for="formLabel" class="control-label">Email * </label>
                                        <input type="text" name="email" id="email" class="form-control" required placeholder="Joe@gmail.com">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-5">
                                        <label for="formLabel" class="control-label">Phone Number * </label>
                                        <input type="text" name="phoneNumber" id="phoneNumber" required class="form-control" placeholder="+19782992000">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-8">
                                        <label for="formLabel" class="control-label">Dealership Type* </label><br>
                                        <input type="radio" name="dType" value="Private Owner" id="Private" class="Private"> Private Owner
                                        <input type="radio" style="margin-left:35px" name="dType" value="Franchise Group" id="Franchise" class="Franchise"> Franchise Group
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-7">
                                        <label for="formLabel" class="control-label">Dealership/Group Name *</label>
                                        <input type="text" name="dealership" id="dealership" class="form-control" required placeholder="XYZ Dealership Ltd">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-7">
                                        <label for="formLabel" class="control-label">How many Dealerships you have? * </label>
                                        <span class="col col-sm-5">
                                            <input type="number" min="0" style="margin-left: -15px;" name="dealershipTotal" id="dealershipTotal" required class="form-control">
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-9">
                                        <label for="formLabel" class="control-label">Dealership Main Location * </label>
                                        <input type="text" name="dealershipLocation" id="dealershipLocation" required class="form-control" placeholder="Main Location">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-9">
                                        <label for="formLabel" class="control-label">How many Salespeople/Agents you have?* </label>
                                        <span class="col col-sm-4">
                                            <input type="number" min="0" style="margin-left: -15px;" name="salesPeople" id="salesPeople" required class="form-control">
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-7">
                                        <label for="formLabel" class="control-label">How many cars you have in stock?* </label>
                                        <span class="col col-sm-5">
                                            <input type="number" min="0" style="margin-left: -15px;" class="form-control col col-sm-2" name="carStock" id="carStock" class="carStock" required>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <span class="col col-sm-12">
                                        <label for="formLabel" class="control-label">Any comment? </label>
                                        <textarea class="form-control" placeholder="Your Comment..." name="comment" id="comment" rows="6"></textarea>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <button type="submit" name="submitBtn" id="submitBtn" class="submitBtn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid lastDiv">
        <h2 class="lastHeading">Let’s Enjoy this Journey Together!</h2>
        </div>
    </div>
    
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