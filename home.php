<?php
	session_start();
	if($_SESSION['id']==""){
        header('location:signuplogin.php');  
    }   
?>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale =1">
            <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  -->
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!-- bootstrap link -->
            <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> <!-- Font Awesome link -->
            <link rel="stylesheet" type="text/css" href="home.css">   
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <ul class="navbar-nav" style="padding-top:12px">
                    <li>
                        <h3>Vote Mania</h3>
                    </li>
                </ul>
                
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars navbar-icons"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <div class="searchbox">
                                <input type="text" name="" class="search-txt" placeholder="Search">
                                <a class="search-btn">
                                    <i class="fas fa-search navbar-icons"></i>
                                </a>
                            </div> 
                    </li>
                    <li class="nav-item">
                        <span id="categories" class="fas fa-th navbar-icons"></span>Categories
                    </li>
                    <li class="nav-item notificationlink">
                        <span class="fas fa-bell navbar-icons"></span>Notification
                        <div class="notificationdiv">
                        <ul style="padding:5px">
                        <li>link</li>
                        <li>link</li>
                        <li>link</li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item notificationlink">
                        <span class="fas fa-user navbar-icons"></span>Profile
                        <div class="notificationdiv" style="margin-left:-10%;width:200px;">
                        <ul style="padding:5px;">
                        <li>link</li>
                        <a href="signuplogin.php"><li>log out</li></a>
                        </ul>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="maindiv row text-center" style="left:50%;top:50%;position:absolute;transform:translate(-50%,-50%);">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center divinmain">
                    <span style="font-size:48;color:black">be a Host</span>
                        <!-- <img src="Mordor.png"> -->
                        <p>
                        <span class="fas fa-quote-left mr-1" style="margin-top:-20px"></span> have an idea in a mind about an amazing poll <span class="fas fa-quote-right ml-2" style="margin-top:-20px"></span>
                        </p>
                        <a href="#" class="btn btn-regular btn-lg hostvotebtn">Host</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center divinmain">
                        <span style="font-size:48;color:black">be a Voter</span>
                        <!-- <img src="Mordor.png"> -->
                        <p>
                        <span class="fas fa-quote-left mr-1" style="margin-top:-20px"></span> want to make a change vote<br> in any poll <span class="fas fa-quote-right ml-2" style="margin-top:-20px"></span>
                        </p>
                        <a href="#" class="btn btn-regular btn-lg hostvotebtn">Vote</a>
                </div>
            </div>
        </div>
    </body>
</html>