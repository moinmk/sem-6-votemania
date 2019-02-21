<?php
    session_start();
    $uid=$_SESSION['id'];
    date_default_timezone_set("Asia/Kolkata");//set timezone of india
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!-- bootstrap link -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> <!-- Font Awesome link -->
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="host.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
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
    <div class="container-fluid" style="background:;">

        <h2>Host poll</h2>
        <div class="row">
            <div class="col-lg-4 polldetails">
                <lable>Poll heading:</lable><br>
                <input type="text" name="pollheading" required><br>
                <lable>Poll description:</lable><br>
                <textarea style="currentpollidize:none" name="polldescription"></textarea><br>
                <lable>Question:</lable><br>
                <textarea style="currentpollidize:none" name="question"></textarea><br>
                <lable>Number of options:</lable><br>
                <select class="<!--custom-select--> noofopt" name="noofoptions">
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select><br>

                <!-- script to add otions fileds based on selected number -->
                <script>
                    $(document).ready(function () {
                        $('.noofopt').change(function (e) {
                            $('.optionsimages').empty();
                            for (i = 0; i < $('.noofopt').val(); i++) {
                                $('.optionsimages').append(`<lable>option ` + (i + 1) + `:</lable><br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" id="customFile`+ (i + 1) + `" onchange="fun(this)" name="image`+(i+1)+`">
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div><label class="mt-1">text for option`+ (i + 1) + `:</label>
                    <input type="text" name="text`+(i+1)+`">`);
                            }
                        });

                        $('.noofopt').change(function () {
                            $('.optionstext').empty();
                            for (i = 0; i < $('.noofopt').val(); i++) {
                                $('.optionstext').append(`<lable>option ` + (i + 1) + `:</lable><br>
                                    <input type="text" name="option`+(i+1)+`"><br>
                                `);
                            }
                        });
                    });

                </script>
                <div class="row">
                    <!-- to display both divs in on row -->
                    <div class="col">
                        <lable>Options's type:</lable><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <!-- <div class="custom-control custom-radio custom-control-inline"> to display both radiobutton inline-->
                            <input type="radio" value="text" id="customRadio1" name="opttype"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio1">Text</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="image" id="customRadio2" name="opttype"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Image with text</label>
                        </div><br>
                    </div>
                    <div class="col">
                        <lable>Answer selection allow:</lable><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <!-- <div class="custom-control custom-radio custom-control-inline"> to display both radiobutton inline-->
                            <input type="radio" value="single" id="customRadio3" name="ansselectionallow"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio3">single</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="multiple" id="customRadio4" name="ansselectionallow"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4">multiple</label>
                        </div><br>
                    </div>
                </div>
                <!-- script to display input type file or text based on radio button selection -->
                <script>
                    $(document).ready(function () {
                        $('.polldetails input').on('change', function () {
                            if (($('input[name=opttype]:checked').val()) == 'text') {
                                $('.optionstext').css('display', 'block');
                                $('.optionsimages').css('display', 'none');
                            }
                            else if (($('input[name=opttype]:checked').val()) == "image") {
                                $('.optionsimages').css('display', 'block');
                                $('.optionstext').css('display', 'none');
                            }
                        });
                    });

                </script>
                <lable>Add options:</lable>
                <div class="optionstext">
                    <lable>option 1:</lable><br>
                    <input type="text" name="option1"><br>
                    <lable>option 2:</lable><br>
                    <input type="text" name="option2">
                </div>
                <div class="optionsimages" style="display:none">
                    <lable>option 1:</lable><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile1" onchange="fun(this)"
                            accept="image/x-png,image/gif,image/jpeg" name="image1">
                        <label class="custom-file-label" for="customFile">Choose image</label>
                    </div>
                    <label class="mt-1">text for option 1:</label>
                    <input type="text" name="text1">
                    <lable class="mt-1">option 2:</lable><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile2" onchange="fun(this)"
                            accept="image/x-png,image/gif,image/jpeg" name="image2">
                        <label class="custom-file-label" for="customFile">Choose image</label>
                    </div>
                    <label>text for option 2:</label>
                    <input type="text" name="text2">
                </div>
                <!-- script for display selected file name-->
                <script>
                    // $(document).ready(function () {
                    function fun(currentobj) {
                        //  $('input[type="file"]').change(function (e) {
                        var fileName = currentobj.files[0].name;
                        $(currentobj).siblings('.custom-file-label').text(fileName);//add filename to current inputfile's lable
                        // });
                    }
                        // });
                </script>
                <lable>Deadline(min 24 hrs):</lable>
                <input type="date" value="<?php echo date("Y-m-d",time() + 86400);?>" name="deadline" min="<?php echo date("Y-m-d",time() + 86400);?>">
                <lable>Tags(e.g.#movies#tvshows):</lable>
                <input type="text" name="tags">
                <button name="hostbtn" class="btn btn-regular btn-lg hostbtn">Host</button>
            </div>
        </div>
    </div>
</form>
</body>

</html>

<?php
    include("db_connection.php");
    
    if(isset($_POST['hostbtn'])){
        $pollheading=mysqli_real_escape_string($connection,$_POST['pollheading']);
        $polldescription=mysqli_real_escape_string($connection,$_POST['polldescription']);
        $question=mysqli_real_escape_string($connection,$_POST['question']);
        $noofoptions=mysqli_real_escape_string($connection,$_POST['noofoptions']);
        $optiontype=mysqli_real_escape_string($connection,$_POST['opttype']);
        $ansselectionallow=mysqli_real_escape_string($connection,$_POST['ansselectionallow']);
        $deadline=mysqli_real_escape_string($connection,$_POST['deadline']);
        $tags=mysqli_real_escape_string($connection,$_POST['tags']);
        
        $query="insert into poll_details(uid,heading,description,question,option_type,ansselectionallow,deadline,tags)values('$uid','$pollheading','$polldescription','$question','$optiontype','$ansselectionallow','$deadline','$tags')";
        mysqli_query($connection,$query);
        $currentpollid=mysqli_insert_id($connection);//to get the auto incremented id of poll_details table    

        if($optiontype=="text"){
            for($i=0;$i<$noofoptions;$i++){
                ${"opttext".($i+1)}=$_POST["option".($i+1)];
                $query="insert into options_data(pid,options)values('$currentpollid','${"opttext".($i+1)}')";
                mysqli_query($connection,$query);
                
            }
        }
        elseif($optiontype="image"){
            for($i=0;$i<$noofoptions;$i++){
                // echo ${"optimage".($i+1)};
                ${"optimage".($i+1)}=$image = addslashes(file_get_contents($_FILES['image'.($i+1)]['tmp_name']));
                $extension=pathinfo(($_FILES['image1']['name']),PATHINFO_EXTENSION);
                //echo $extension;
                ${"opttext".($i+1)}=$_POST["text".($i+1)];
                
                $query="insert into options_data(pid,optiontext,optionimage)values('$currentpollid','${"opttext".($i+1)}','${"optimage".($i+1)}')";
                mysqli_query($connection,$query);
                
            }
        }
    }
?>