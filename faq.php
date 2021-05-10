<html>
<head>
    <title>Carrius - FAQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bootstrap/css/startmin.css" rel="stylesheet">
    <link href="Bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Bootstrap/css/metisMenu.min.css" rel="stylesheet">
    <link href="css/scrollbar.css" rel="stylesheet">
    <link href="css/faq.css" rel="stylesheet">
    <style>
      .iContainer{
          max-width:70%;
          margin-left: 15%;
      }
      .collapseMenu{
        font-size:22px;
        background-color: #f7f7f7;
        cursor: pointer;
      }
      .firstMenu{
        padding:7px 60% 7px 20px;
        display: grid;
      }
      .secMenu{
        padding:7px 65.3% 7px 20px;
        display: grid;
      }
      .thirdMenu{
        padding:7px 62% 7px 20px;
        margin-bottom: 20px;
        display: grid;
      }
      
      /*
      .firstMenu:after{
        content: '+';
        display: inline-block;
        float: right;
        margin-right: 75px;
        margin-bottom: 30px;
        font-size: 32px;
        top:0px;
        margin-top: -40px;
        position: relative;
      }
      .secMenu:after{
        content: '+';
        display: inline-block;
        float: right;
        margin-right: -10px;
        margin-bottom: 30px;
        font-size: 32px;
        top:0px;
        margin-top: -40px;
        position: relative;
      }
      .thirdMenu:after{
        content: '+';
        display: inline-block;
        float: right;
        margin-right: 75px;
        margin-bottom: 30px;
        font-size: 32px;
        top:0px;
        margin-top: -40px;
        position: relative;
      }
      .fourthMenu:after{
        content: '+';
        float: right;
        margin-right: 75px;
        margin-bottom: 30px;
        font-size: 32px;
        top:0px;
        margin-top: -40px;
        position: relative;
      }*/
      .fourthMenu{
        padding:7px 67% 7px 20px;
        float: left;
        display: grid;
        margin-top: -20px;
      }
      .cMenuB{
        margin-top: 20px;
      }
      .rightAlignTo{
        display: block;
        float:right;
        margin-right:60px;
        margin-top: 60px;
        margin-bottom: 25px;
      }
      #sendEmail{
        float:right;
        margin-right: 60px;
        width:210px;
        height: 29px;
        color:white;
        border:1px solid #044cc4;
        border-radius: 5px;
        background-color: #044cc4;
        margin-top: 20px;
        margin-bottom: 20px;
      }
    </style>
</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="wrapper" style="background-color: white;">
        <div class="container">
            <div class="innerBlock">
                <h2 class="text-center alignHeading"><b>What is your question about?</b></h2>
                <hr class="hrUnderStyle" style="border: 2px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-3px;">
                <p class="text-center alignCenter" style="color:#999999;max-width:520px;font-weight:bold">
                    We have the answers some of the most popular question you might have...
                </p>
            </div>
            <div class="iContainer">
              <span class="cMenuA">
                <span class="firstMenu collapseMenu" data-toggle="collapse" data-target="#firstMenu">What is carrius.net?</span>
                <div id="firstMenu" class="collapse hideFirst">
                    <?php include_once 'carriusNetQ.php';?>
                </div>
              </span><br>
              <span class="cMenuB">
                <span class="secMenu collapseMenu" data-toggle="collapse" data-target="#secMenu">Live Video Call</span>
                <div id="secMenu" class="collapse hideSec">
                  <?php include_once 'liveVidQ.php';?>
                </div>
              </span><br>
              <span class="cMenuC">
                <span class="thirdMenu collapseMenu" data-toggle="collapse" data-target="#thirdMenu">Dealership Issues</span>
                <div id="thirdMenu" class="collapse hideThird">
                  <?php include_once 'dealerIssueQ.php';?>
                </div>
              </span><br>
              <span class="cMenuD">
                <span class="fourthMenu collapseMenu" data-toggle="collapse" data-target="#fourthMenu">Dealership/Salesagents</span>
                <div id="fourthMenu" class="collapse hideFour">
                  <?php include_once 'dealerSalesAgentQ.php';?>
                </div>
              </span>
              <!-- First Menu-->
              
              <!-- Second Menu-->
             
              <!--Third Menu-->
              
              <!--Fourth Menu-->
              
            </div>
            <div class="rightAlignTo">
                <h4 class="changeColor"><b>Have any other question?</b></h4>
                <input type="button" value="Send Us an Email" id="sendEmail">
            </div>
        </div>
    
    </div> <!-- End of Wrapper-->
    <?php
        echo "<br><br><br><br>";
        include_once "footer.php";
    ?>
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/metisMenu.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/startmin.js"></script>
    <script>
      $(document).ready(function(){
        $('.firstMenu').on('click',function() {
          $('.hideFirst').toggle('collapse');
        });
        $('.secMenu').on('click',function() {
          $('.hideSec').toggle('collapse');
        });
        $('.thirdMenu').on('click',function() {
          $('.hideThird').toggle('collapse');
        });
        $('.fourthMenu').on('click',function() {
          $('.hideFour').toggle('collapse');
        });
      });
    </script>

</body>
</html>