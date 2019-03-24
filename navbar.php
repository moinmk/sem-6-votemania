<?php
date_default_timezone_set("Asia/Kolkata");
$currentpage=basename($_SERVER['PHP_SELF']);

?>
<form method="POST" action="" id="searchform" autocomplete="off">
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav" style="padding-top:12px">
                <li>
                    <h3>Vote Mania</h3>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars navbar-icons"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item notificationlink">
                        <div class="searchbox">
                            <input type="text" name="searchtxt" class="search-txt" placeholder="Search poll">
                            <button class="search-btn" name="searchbtn">
                                <i class="fas fa-search navbar-icons"></i>
                            </button>
                            <!-- script to do nothing if searchbox is empty -->
                            <script>
                            $('#searchform').submit(function(e) {
                                if (!$('.search-txt').val()) {
                                    e.preventDefault();
                                }       
                            });
                            </script>
                        </div>
                    </li>
                    <li class="nav-item notificationlink <?php if($currentpage=="home.php") echo 'active'?>">
                        <a href="home.php">
                            <span class="fas fa-home navbar-icons"></span>Home
                        </a>
                    </li>
                    <li class="nav-item notificationlink <?php if($currentpage=="categories.php") echo 'active'?>">
                        <a href="categories.php">
                            <span id="categories" class="fas fa-th navbar-icons"></span>Categories
                        </a>
                    </li>
                   
                    <li class="nav-item notificationlink">
                        <span class="fas fa-bell navbar-icons "></span>Notification<span class="notificationbadge noofnotification">0</span>
                        <div class="notificationdiv">
                            <ul style="padding:5px" class="notification">
                            <script>
                            function notify() {
                                    $.ajax({
                                        url: 'notification.php',        
                                        data: "", 
                                        dataType: '',
                                        success: function (data) {  
                                            //  alert(data);
                                            var receiveddata=data.split('|');
                                            $(".notification").html(receiveddata[0]);//notifications
                                            
                                            $(".noofnotification").html(receiveddata[1]);//no of newnotifications
                                        }
                                    });
                                }
                                $(document).ready(notify); // Call on page load
                                setInterval(notify, 5000); //run code every 5 sec
                            </script>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item notificationlink <?php if($currentpage=="profile.php") echo 'active'?>">
                    <?php 
                    $qryres=mysqli_query($connection,"select username from user_details where uid=$uid");
                    $arr=mysqli_fetch_assoc($qryres);
                    ?>
                        <span class="fas fa-user navbar-icons"></span><?php echo $arr['username']?>
                        <div class="notificationdiv" style="margin-left:-5%;width:150px;text-align:center;">
                            <ul style="padding:5px;">
                                <a href="profile.php">
                                    <li>Profile</li>
                                </a>
                                <a href="signuplogin.php">
                                    <li><span class="fas fa-sign-out-alt"></span> log out</li>
                                </a>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</form>
<?php
    if(isset($_POST['searchbtn'])){
        $stringtosearch=mysqli_real_escape_string($connection,$_POST['searchtxt']);
        // header("location:searchresult.php?strtosearch=$stringtosearch");
        echo '<script>location.replace("searchresult.php?strtosearch='.$stringtosearch.'");</script>';
    }
?>