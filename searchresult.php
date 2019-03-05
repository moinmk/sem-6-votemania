<?php
    session_start();
    date_default_timezone_set("Asia/Kolkata");//set timezone of india
    include('db_connection.php');
    $searchwords=explode(" ",$_REQUEST['strtosearch']);//words array to search
    // print_r($searchwords);
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!-- bootstrap link -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> <!-- Font Awesome link -->
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="result.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        include('navbar.php');
    ?>
    <div class="container-fluid row justify-content-center" style="width:100%;margin:0;">
        <div class="polldiv col-lg-8 justify-content-center">
            <?php
                $query="select * from poll_details";
                $res=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($res)){
                // print_r($row);
                    $found=false;
                    $tagsarray=explode("#",$row['tags']);
                    foreach($searchwords as $keyword){
                        foreach($tagsarray as $tag){
                            // if($keyword!="" &&(strtoupper($keyword)==strtoupper($tag) || strtoupper($keyword)==strtoupper($row['heading']))){//capatalized all keywords with strtoupper function
                            if($keyword!="" && !(strpos(strtoupper($keyword),strtoupper($tag)) || strpos(strtoupper($keyword),strtoupper($row['heading'])))){//capatalized all keywords with strtoupper function
                                $found=true;
                            }
                        }
                    }
                    if($found){
                        $deadline=strtotime($row['deadline']." ".$row['timeadded']); //convert time into seconds
                        if(time()-$deadline<0){ //return seconds in minus for future date so display only those polls which are not expired
            ?>
                            <div class="polls">
                                <h2><?php echo $row['heading']?></h2>
                                <p class="ml-4 mt-3" style="text-align: justify">
                                    <?php echo $row['description'];?>
                                </p>
                                <a href="vote.php?pollid=<?php echo $row['pid'];?>" class="btn btn-regular btn-lg govote float-right" role="button">Go Vote <span class="fas fa-arrow-right"></span></a>
                            </div>
            <?php
                        }
                    }
            }
            if(!$found){
                ?><h1 style="color:black;">no poll found</h1><?php
            }
            ?>
        </div>
    </div>
</body>

</html>