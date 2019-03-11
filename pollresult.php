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
    <link rel="stylesheet" type="text/css" href="pollresult.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="canvasjs/canvasjs.min.js"></script>
    <?php
    $qry="select * from poll_details where pid=19 ";
    $result=mysqli_query($connection,$qry);
    $data=mysqli_fetch_assoc($result);
    $optionsquery="select * from options_data where pid=19";
    $qryres=mysqli_query($connection,$optionsquery);
    
    ?>

    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {


                animationEnabled: true,
                toolTip: {
                    // enabled:false,
                    fontColor: "white"
                },
                theme: "dark2",
                backgroundColor: "rgba(255,255,255,.60)",

                title: {
                    text: "<?php echo $data['heading'];?>",
                    fontColor: "black",
                    fontFamily: "Quicksand",

                },
                //dataPointMaxWidth: 40,
                axisY: {
                    // labelFontSize: 25,
                    labelFontColor: "black",
                    suffix: " votes",
                    labelFontFamily: "Quicksand",
                    // gridColor: "gray",
                },
                axisX: {
                    // labelFontSize: 25,
                    // labelAutoFit:false,
                    labelWrap: true,
                    // labelMaxWidth:,
                    labelAngle: 0,
                    labelFontColor: "black",
                    labelFontFamily: "Quicksand",
                },
                data: [
                    {
                        // Change type to "pie","column","doughnut", "line", "splineArea", etc.
                        type: "column",
                        // showInLegend:"true",
                        color: "rgba(0,0,0,0.85)",
                        legendText: "{label}",
                        indexLabelFontSize: 16,
                        // indexLabel: "{label} - #percent%",
                        dataPoints: [
                            <?php
                            $highest=0;
                            while($optdata=mysqli_fetch_assoc($qryres)){
                                if($optdata['total']>$highest){
                                    $highest=$optdata['total'];
                                    $optval=$optdata['optiontext'];
                                }
                            ?>
                            { label: "<?php echo $optdata['optiontext']?>", y: <?php echo $optdata['total'];?> },
                            <?php
                            }
                            ?>
                            // { label: "blackpanther", y: 8 },
                            // { label: "logan", y: 9 },
                            // { label: "mango", y: 10 },
                            // { label: "grape", y: 2, indexLabel: "2 votes", indexLabelFontColor: "black", indexLabelFontFamily: "Quicksand" }
                        ]
                    }
                ]
            });
            chart.render();
        }
    </script>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center" style="">
                <div class="col-lg-8 col-md-10 cl-sm-12 p-3 pollresultdiv">
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;">
                    <h2 class="ml-2 mt-2"><?php echo $data['heading'];?></h2>
                </div>
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;">
                    <h5 class="ml-2">what was the question:</h5>
                    <h4 class="ml-4 mt-3"><?php echo $data['question'];?></h4>
                </div>
                <div style="background: rgba(255, 255, 255, 0.3);padding:30px;margin-top:20px;">
                    <h2 class="ml-2 mb-3">Result :</h2>
                    <div id="chartContainer">
                    </div><br>
                    <h3 style="position:relative;left:50%;display:inline-block;transform:translate(-50%)"><?php echo $optval; ?> got the
                        highest votes</h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>