<?php
 session_start();
 $uid=$_SESSION['id'];
 $alreadyvoted=0;
 if(isset($_REQUEST['pollid'])){
 $pid=$_REQUEST['pollid'];
}
 include("db_connection.php");
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!-- bootstrap link -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> <!-- Font Awesome link -->
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="vote.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    $query="select userids from poll_details where pid=$pid";
    $res=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($res);
    $ids=$data['userids'];
    $idarray=explode(' ',$ids);
    foreach($idarray as $id){
    if($id==$uid){
        $alreadyvoted=1;
    }
    }
    if($alreadyvoted){
        echo "<script>$(document).ready(function () {
            $('.progress').css('display','block');
        });</script>";
        
    }
    else{
        echo "<script>$(document).ready(function () {
            $('.progress').css('display','none');
        });</script>";

    }
        include("navbar.php");
        $query="select * from poll_details where pid=$pid";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result)){
    ?>
    <form method="POST" action="" id="voteform" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 votediv" style="">
                <div class="mb-4" id="timer" style="text-align: center;"></div>
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;">
                    <h2><?php echo $row['heading'];?></h2>
                    <p class="ml-4 mb-4">
                        <?php echo $row['description'];?>
                    </p>
                </div>
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;">
                    <!-- </div>
                    <div style="background: rgba(255, 255, 255, 0.3);"> -->
                    <label>here's question:</label><br>
                    <label class="ml-4"><?php echo $row['question'];?></label><br>
                </div>
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;">
                
                    <label>options:</label>
                    <?php
                    $qry="select * from options_data where pid=$pid";
                    $res=mysqli_query($connection,$qry);
                    $totalvotes=0;
                    $i=1;
                    while($data=mysqli_fetch_assoc($res)){
                            $totalvotes=$totalvotes+$data['total'];
                            
                    }
                    $qry="select * from options_data where pid=$pid";
                    $res=mysqli_query($connection,$qry);
                    $i=1;
                    while($data=mysqli_fetch_assoc($res)){
                        // if($row['option_type']=="text"){
                            if($row['ansselectionallow']=="single"){
                            ?>   
                                <div class="custom-control custom-radio mt-2 mb-4"  style="margin-left:15%;">
                                    <input type="radio" value="<?php echo $data['oid'];?>" id="option<?php echo $i;?>" name="options" class="custom-control-input">
                                    <label class="custom-control-label" for="option<?php echo $i;?>" style="font-size:20"><?php echo $data['optiontext'];?></label>
                                <br><?php if($row['option_type']=="image"){echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['optionimage'] ).'" width="30%" class="mt-2" style="box-shadow: 0px 10px 20px 1px rgba(0,0,0,0.75);">';}?>
                                </div>
                                <?php
                                    $percentage=floor(($data['total']*100)/$totalvotes);
                                ?>
                                <div class="progress" style="background:rgba(0,0,0,0.30)">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage;?>%;background:rgba(0,0,0,0.8);padding-left:5px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage;?>% voters have chose this option </div>
                                </div>
                                <hr style="background:rgba(0,0,0,0.5);width:80%;height:1px">
                                
                            <?php
                            }
                            elseif($row['ansselectionallow']=="multiple"){
                                ?>    
                                <div class="custom-control custom-checkbox mt-2 mb-4" style="margin-left:15%;">
                                    <input type="checkbox" value="<?php echo $data['oid'];?>" class="custom-control-input" name="options[]" id="option<?php echo $i;?>">
                                    <label class="custom-control-label" for="option<?php echo $i;?>" style="font-size:20"><?php echo $data['optiontext'];?></label>
                                    <br><?php if($row['option_type']=="image"){echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['optionimage'] ).'" width="30%" class="mt-2 " style="box-shadow: 0px 10px 20px 1px rgba(0,0,0,0.75);">';}?>  
                                </div>
                                <?php
                                    $percentage=floor(($data['total']*100)/$totalvotes);
                                ?>
                                <div class="progress" style="background:rgba(0,0,0,0.30)">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage;?>%;background:rgba(0,0,0,0.8);padding-left:5px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage;?>% voters have chose this option </div>
                                </div>
                                <hr style="background:rgba(0,0,0,0.5);width:80%;height:1px">
                               
                            <?php
                            }
                            $i++;
                        }
                        ?>   
                          
                </div>
                <!-- <img src="1.jpg" width="30%" class="ml-5 mt-2"><br> -->
                <button name="submit" class="btn-default btn-lg mt-5 submitbtn">submit</button>
            <!-- script for timer -->
            <script>
                var countDownDate = new Date("<?php echo $row['deadline']." ".$row['timeadded'];?>").getTime();
                // var countDownDate = new Date("3/23/2019 15:37:25").getTime();
                var x = setInterval(function () {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("timer").innerHTML = "<h1>" + days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s" + "</h1><h6>time remaining before poll ends</h6>";
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("timer").innerHTML = "EXPIRED";
                    }
                }, 0);
            </script>

        </div>
    </div>
    <?php
    }
    ?>
</form>
</body>

</html>

<?php

    if(isset($_POST['submit'])){
        if($alreadyvoted){
            echo "<script>alert('you already voted to this poll');</script>";
        }
        else{
        if(empty($_POST['options'])){
            echo "<script>alert('select your answer');</script>";
        }
        else{
            if(is_array($_POST['options'])){
                foreach($_POST['options'] as $optionid){
                    $query="update options_data set total=total+1 where oid=$optionid";
                    mysqli_query($connection,$query);
                    // $query="select userids from options_data where oid=$option";
                    // $res=mysqli_query($connection,$query);
                    // $data=mysqli_fetch_assoc($res);
                    // $ids=$data['userids'];
                    // $idarray=explode(' ',$ids);
                    // foreach($idarray as $id){
                        
                    }
                    $query="update poll_details set userids=concat(userids,' $uid') where pid=$pid"; 
                    mysqli_query($connection,$query);
            }
            else{
                echo $_POST['options'];
                $optionid=$_POST['options'];
                $query="update options_data set total=total+1 where oid=$optionid";
                mysqli_query($connection,$query);
                echo "pdi".$pid;
                $query="update poll_details set userids=concat(userids,' $uid') where pid=$pid"; 
                mysqli_query($connection,$query);    
            }
            
            //meta tag to refresh page
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    }
?>