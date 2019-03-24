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
    <link rel="stylesheet" type="text/css" href="profile.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        include("navbar.php");
        $query="select * from user_details where uid=$uid";
        $res=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($res)){        
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 profilediv" style="">
                <h1>Profile</h1>
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;overflow-x:auto;">
                    <h5><u>personal details</u></h5>
                    <table class="ml-3">

                        <tr>
                            <td>username:</td>
                            <td><?php echo $row['username'];?></td>
                        </tr>
                        <tr>
                            <td>email:</td>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                            <td>DOB:</td>
                            <td><?php echo date("d/m/Y", strtotime($row['dob']));?></td>
                        </tr>
                        <tr>
                            <td>gender:</td>
                            <td><?php echo $row['gender'];?></td>
                        </tr>
                        <tr>
                            <td>city:</td>
                            <td><?php echo $row['city'];?></td>
                        </tr>
                    </table>
                    <span class="btn btn-regular btn-lg viewresults float-right" id="editbutton"
                        style="float:right;cursor:pointer;display:block">edit details <span class="fas fa-pen"></span></span>
                </div>
                <div class="pollsbyyoudiv" style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;">
                <h5><u>poll hosted by you</u></h5>
                    <?php
                    $totalpollfound=0;
                    $pollquery="select * from poll_details where uid=$uid";
                    $resdata=mysqli_query($connection,$pollquery);
                    while($data=mysqli_fetch_assoc($resdata)){
                        $totalpollfound++;
                    ?>
                    <div class="polls" style="background:rgba(255, 255, 255, 0.3);overflow:auto">
                        <h2><?php echo $data['heading'];?></h2>
                        <p class="ml-4 mt-3" style="text-align: justify">
                            <?php echo $data['description'];?>
                        </p>
                        <!-- created date: 01-01-0001 -->
                        <?php
                        $deadline=strtotime($data['deadline']." ".$data['timeadded']);
                        ?>
                        <a href="pollresult.php?pollid=<?php echo $data['pid'];?>"
                            class="btn btn-regular btn-lg viewresults float-right" role="button" style="display:<?php if(time()-$deadline>0) echo 'block';?>">view results <span
                                class="fas fa-arrow-right"></span></a>
                        <a href="vote.php?pollid=<?php echo $data['pid'];?>"
                            class="btn btn-regular btn-lg viewresults float-right" role="button" style="display:<?php if(time()-$deadline<0) echo 'block';?>">view poll <span
                                class="fas fa-arrow-right"></span></a>
                    </div>
                        <?php
                    }
                    if($totalpollfound==0){
                        echo "<h5>you havent hosted any poll yet</h5>";?>
                        <a href="host.php"
                        class="btn btn-regular btn-lg viewresults float-right" role="button" style="display:block">host a new poll <span
                            class="fas fa-arrow-right"></span></a>
                            <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div id="udetails" class="row" style="margin:0;">
            <div id="udcontent" class="col-12 col-sm-8 col-md-8 col-lg-5" style="margin-top:-5%;">
                <h3 style="font-family: Century gothic;color:rgba(255, 255, 255, 0.87)">edit details</h3>
                <label>username</label><br>
                <input type="text" name="username" value="<?php echo $row['username'];?>" required><br>
                <label>email</label><br>
                <input type="email" name="email" value="<?php echo $row['email'];?>" required><br>
                <label>DOB</label><br>
                <input type="date" name="dob" value="<?php echo $row['dob'];?>" required><br>
                <label>user gender</label><br>
                <select name="gender">
                    <option value="male" <?php if($row['gender']=="male") echo "selected";?>>male</option>
                    <option value="female" <?php if($row['gender']=="female") echo "selected";?>>female</option>
                    <option value="other" <?php if($row['gender']=="other") echo "selected";?>>other</option>
                </select><br>
                <label>city</label><br>
                <input type="text" name="city" value="<?php echo $row['city'];?>" required><br>

                <!-- <label><a href="">change password:</a></label><br>
                old password:<br>
                <input type="text" name="city"><br>
                new password:<br>
                <input type="text" name="city"><br> -->
                <button name="update">UPDATE</button><br>
                <button type="button" id="cancel">CANCEL</button>
            </div>
        </div>
    </form>
    <script>
        $('#cancel').click(function () {
            $("#udetails").css("display", "none");
        });
        $('#editbutton').click(function () {
            $("#udetails").css("display", "block");
        });
        $(window).click(function (event) {
            if (event.target.id == 'udetails') {
                $("#udetails").css("display", "none");
            }
        });

        btn.onclick = function () {
            modal.style.display = "block";
        }
    </script>
    <?php
        }
    ?>
</body>

</html>

<?php
    if(isset($_POST['update'])){
        $uname=$_POST['username'];
        $email=$_POST['email'];
        $date=$_POST['dob'];
        $gender=$_POST['gender'];
        $city=$_POST['city'];
        $query="SELECT * FROM user_details where uid=$uid";//check usernames only if username has been changed
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result);
        if($uname!=$row['username']){
        $query="SELECT * FROM user_details";//check if username is taken
            $result=mysqli_query($connection,$query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($uname==$row["username"]){
                        echo "<script>alert('username is taken');</script>";
                        return false;
                    }    
                }
            }
        }
            $query="update user_details set username='$uname',email='$email',dob='$date',gender='$gender',city='$city' where uid=$uid;";    
            if(mysqli_query($connection,$query)){        
                echo "<meta http-equiv='refresh' content='0'>";
                echo "<script>alert('data is updated');</script>";
            }
    }
?>