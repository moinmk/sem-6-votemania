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
    <link rel="stylesheet" type="text/css" href="categories.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="container-fluid row justify-content-center" style="padding:0;margin:0;">
        <div class="col-lg-8 col-md-10 col-sm-12 text-center categorydiv"
            style="background: rgba(255, 255, 255, 0.3);padding:30;">
            <!-- <ul> -->
            <h1 style="color:black">select a category</h1>
            <a href="searchresult.php?category=art">
                <div class="category-item" style="background-image: url('images/art.jpg');">
                    art
                </div>
            </a>
            <a href="searchresult.php?category=bike">
                <div class="category-item" style="background-image: url('images/bike.jpg');">
                    bikes
                </div>
            </a>
            <a href="searchresult.php?category=car">
                <div class="category-item" style="background-image: url('images/car.jpg');">
                    cars
                </div>
            </a>
            <a href="searchresult.php?category=celebrities">
                <div class="category-item" style="background-image: url('friends.jpg');">
                    celebrities
                </div>
            </a>
            <a href="searchresult.php?category=education">
                <div class="category-item" style="background-image: url('images/education.jpg');">
                    education
                </div>
            </a><br>
            <a href="searchresult.php?category=fashion">
                <div class="category-item" style="background-image: url('images/fashion.jpg');">
                    fashion
                </div>
            </a>
            <a href="searchresult.php?category=food">
                <div class="category-item" style="background-image: url('images/food.jpg');">
                    food
                </div>
            </a>
            <a href="searchresult.php?category=movies">
                <div class="category-item" style="background-image: url('images/movie.jpg');">
                    movies
                </div>
            </a>
            <a href="searchresult.php?category=music">
                <div class="category-item" style="background-image: url('images/music.png');">
                    music
                </div>
            </a>
            <a href="searchresult.php?category=news">
                <div class="category-item" style="background-image: url('images/news.jpg');">
                    news
                </div>
            </a><br><a href="searchresult.php?category=politics">
                <div class="category-item" style="background-image: url('images/politics.jpg');">
                    politics
                </div>
            </a>
            <a href="searchresult.php?category=sports">
                <div class="category-item" style="background-image: url('images/sports.jpg');">
                    sports
                </div>
            </a>
            <a href="searchresult.php?category=superheroes">
                <div class="category-item" style="background-image: url('images/superheroes.jpg');">
                    superheroes
                </div>
            </a>
            <a href="searchresult.php?category=technology">
                <div class="category-item" style="background-image: url('images/technology.png');">
                    technology
                </div>
            </a>
            <a href="searchresult.php?category=tv shows">
                <div class="category-item" style="background-image: url('images/friends.jpg');">
                    tv shows
                </div>
            </a><br>
            <!-- </ul> -->
        </div>
    </div>
</body>

</html>

<!-- 
art
bikes
cars
celebrities
education
fashion
food and drinks
movies
music
news
politics
sports
superheroes
technology
tv shows


 -->