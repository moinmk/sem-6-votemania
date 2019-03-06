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
                    <li class="nav-item notificationlink">
                        <a href="home.php">
                            <span id="categories" class="fas fa-th navbar-icons"></span>Categories
                        </a>
                    </li>
                    <?php
                        $query="select * from notification where uid=$uid and status=0";
                        $res=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($res)){
                            print_r($row);
                        }
                    ?>
                    <li class="nav-item notificationlink">
                        <span class="fas fa-bell navbar-icons "></span>Notification<span class="notificationbadge">0</span>
                        <div class="notificationdiv">
                            <ul style="padding:5px">
                                <li>link</li>
                                <li>link</li>
                                <li>link</li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item notificationlink">
                        <span class="fas fa-user navbar-icons"></span>Username
                        <div class="notificationdiv" style="margin-left:-5%;width:150px;text-align:center;">
                            <ul style="padding:5px;">
                                <li>Profile</li>
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
        header("location:searchresult.php?strtosearch=$stringtosearch");
    }
?>