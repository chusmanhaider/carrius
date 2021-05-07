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
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="resources/a.jpg" alt="Los Angeles" style="width:100%;">
        </div>

        <div class="item">
            <img src="resources/a.jpg" alt="Chicago" style="width:100%;">
        </div>
                                    
        <div class="item">
            <img src="resources/a.jpg" alt="New york" style="width:100%;">
        </div>
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