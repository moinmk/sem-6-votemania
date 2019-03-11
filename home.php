<?php
	session_start();
	if($_SESSION['id']==""){
        header('location:signuplogin.php');  
    }   
    include("db_connection.php");
    $uid=$_SESSION['id'];
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
    <?php
    include("navbar.php");
    ?>
        <div class="container-fluid">
            <div class="maindiv row text-center" style="left:50%;top:50%;position:absolute;transform:translate(-50%,-50%);">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center divinmain">
                    <span style="font-size:48;color:black">be a Host</span>
                        <!-- <img src="Mordor.png"> -->
                        <p>
                        <span class="fas fa-quote-left mr-1" style="margin-top:-20px"></span> have an idea in a mind about an amazing poll <span class="fas fa-quote-right ml-2" style="margin-top:-20px"></span>
                        </p>
                        <a href="host.php" class="btn btn-regular btn-lg hostvotebtn">Host</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center divinmain">
                        <span style="font-size:48;color:black">be a Voter</span>
                        <!-- <img src="Mordor.png"> -->
                        <p>
                        <span class="fas fa-quote-left mr-1" style="margin-top:-20px"></span> want to make a change vote<br> in any poll <span class="fas fa-quote-right ml-2" style="margin-top:-20px"></span>
                        </p>
                        <a href="categories.php" class="btn btn-regular btn-lg hostvotebtn">Vote</a>
                </div>
            </div>
        </div>
    </body>
</html>
