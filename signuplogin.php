<?php
	session_start();
	$_SESSION['id']="";
?>
<html>
<head>
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- bootstrap link -->
    <link href="fontawesome/css/all.css" rel="stylesheet"> <!-- fontawesome link -->
    <style>
            body{
                background-image: url("1.jpg");
                background-size:cover;
                background-position: center;
                background-attachment: fixed;
                font-family:"Quicksand";
            }
        
            .signup{
                text-align: center;
                background: hsla(0,0%,100%,.3);
                position:absolute;
                border-radius: 10px;
                width:80%;
                left:50%;
                top:50%; 
                transform:translate(-50%,-50%);
                padding:30px 2% 30px 3%;
                box-shadow: -3px -4px 28px 1px rgba(0,0,0,0.75);
                overflow:auto;
            }
            
            input[type=date], input[type=email], input[type=password],select{
                /* background: rgba(56, 56, 56, 0.842);
                border:none; */
                background: transparent;
                border:2px solid rgb(34, 34, 34);
                border-left:0;
                border-radius:0 5px 5px 0;  
                width:75%;
                font-size: 18;
                color:rgb(22, 22, 22);
                padding:5px 10px;    
            }

            input[type=text]{
                background: transparent;
                border:2px solid rgb(34, 34, 34);
                border-left:0;
                border-radius:0 5px 5px 0; 
                width:75%;
                font-size: 18;
                padding:5px 10px; 
                color:rgb(22, 22, 22);;
            }

            input:focus,select:focus{
                background: rgba(56, 56, 56, 0.842);
                color:white;

            }
            .input-group-text{
                background-color:rgba(201, 201, 201, 0.836);
                color:rgb(24, 24, 24);
                font-size: 16;
                font-family:Tahoma;
                border:2px solid rgb(34, 34, 34);
                border-right: 0;
                border-radius: 5px 0 0 5px; 
                width:89px;
            }

            .mainbtn,.linkbtn,.linkbtnreg{
                padding:5px 10px;
                font-size: 22;
                border:2px solid black;
                background-color: transparent;
                color:rgb(12, 12, 12);
                transition-duration: .5s;
                font-family:'Quicksand';
                
            }

            .linkbtn,.linkbtnreg{
                padding:0px;
                font-size: 16;
                border:none;
            }

            .linkbtn:hover,.linkbtnreg:hover{
                color:rgb(212, 212, 212); 
            }

            .mainbtn:hover{
                /* padding:5px 30px; */
                color:rgb(212, 212, 212); 
                border:2px solid rgb(214, 214, 214); 
            }

            .allfieldsmsg{
                color:white;
                display:none;   
            }

           .alertmsg{
                margin-left:90px;
                color:white;
            }

            .email,.confirm,.date,.gender,.city,.usernamemsg,.passwordmsg,.confirmmsg{
                display:none;
            }

        </style>
</head>

<body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validate()">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 signup">
                    <h1 class="heading mb-4" style="font-family:'Quicksand';color:black;">LOGIN</h1>                    
                    <label class="allfieldsmsg">*all fields are mandatory</label><br>
                    <div class="input-group mb-4">
                        <span class="input-group-text input-group-lg ">Username</span>
                        <input type="text" class="username" name="uname"><br>
                        <label class="alertmsg usernamemsg"></label>
                    </div>
                    <div class="input-group mb-4 email">
                        <span class="input-group-text">Email</span>
                        <input type="email" name="email"><br>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="password" name="password"><br>
                        <label class="alertmsg passwordmsg"></label>
                     </div>
                    <div class="input-group mt-4 mb-4 confirm">
                        <span class="input-group-text">Confirm</span>
                        <input type="password" name="confirm"><br>
                        <label class="alertmsg confirmmsg"></label>
                    </div>
                    <div class="input-group mb-4 date">
                        <span class="input-group-text">DOB</span>
                        <input type="date" name="dob" min="2017-08-15" max="2018-08-26"><br>
                    </div>
                    <div class="input-group mb-4 gender">
                        <span class="input-group-text">Gender</span>
                        <select name="gender">
                            <option value="male">male</option><br>
                            <option value="female">female</option><br>
                            <option value="other">other</option><br>
                        </select>
                    </div>
                    <div class="input-group city">
                        <span class="input-group-text input-group-lg">City</span>
                        <input type="text" name="city"><br>
                    </div>
                    <button type="submit" value="login" name="mbtn" class="mt-4 mainbtn">Login <span class="fas fa-sign-in-alt" style="font-size:16px;"></span></button><br>
                    <!-- <button type="submit" class="mt-4 mainbtn">Login</button><br> -->
                    <button type="button" class="mt-3 linkbtn" style="display:none">Already have an account? Login</button>
                    <button type="button" class="mt-3 linkbtnreg">Don't have an account? Register</button>                    
                </div>
            </div>
        </div>
    </form> 
    <script>
        function validate(){
            if($('.mainbtn').val()=='register'){
                if($("[name='uname']").val()=="" || $("[name='email']").val()=="" || $("[name='password']").val()=="" || $("[name='confirm']").val()=="" || $("[name='dob']").val()=="" || $("[name='city']").val()==""){
                    $('.allfieldsmsg').css('display','block');
                    $('.allfieldsmsg').text('*all fields are mandatory');
                    $('.confirmmsg').css('display','none');
                    $('.usernamemsg').css('display','none');
                    return  false;
                }
                if($("[name='password']").val()!=$("[name='confirm']").val()){
                    $('.confirmmsg').css('display','block');
                    $('.confirmmsg').text('*check password');
                    $('.allfieldsmsg').css('display','none');
                    $('.usernamemsg').css('display','none');
                    return false;
                }
            }
            else if($('.mainbtn').val()=='login'){
                if($("[name='uname']").val()=="" || $("[name='password']").val()==""){
                    $('.allfieldsmsg').css('display','block');
                    $('.allfieldsmsg').text('*all fields are mandatory');
                    $('.confirmmsg').css('display','none');
                    $('.usernamemsg').css('display','none');
                    return  false;    
                }
            }
        }
        $(document).ready(function () {
            $(".linkbtn").click(function () {
                $(".email,.confirm,.date,.gender,.city").css('display', 'none');//hide unrequired fields
                $(".heading").html("LOGIN"); 
                $(".username").val("");
                $(".password").val("");
                $(this).css('display', 'none');//hide current link
                $(".linkbtnreg").css('display','');//display registration link
                $(".mainbtn").val("login");
                $(".mainbtn").html('Login <span class="fas fa-sign-in-alt" style="font-size:18px;"></span>');
                $('.allfieldsmsg').css('display','none');
                $('.confirmmsg').css('display','none');
                $('.usernamemsg').css('display','none');
              });
            $(".linkbtnreg").click(function () {
                $(".email,.confirm,.date,.gender,.city").css('display','flex');
                $(".heading").html("SIGNUP");
                $(".username").val("");
                $(".password").val("");
                $(this).css('display', 'none');//hide current link
                $(".linkbtn").css('display', '');//display login link
                $(".mainbtn").val("register");
                $(".mainbtn").html('Register <span class="fas fa-user-plus" style="font-size:16px;"></span>');
                $('.allfieldsmsg').css('display','none');
                $('.confirmmsg').css('display','none');
                $('.usernamemsg').css('display','none');
            });
        });
    </script> 
</body>
</html>
<?php
    include("db_connection.php");
    if(isset($_POST['mbtn'])){
        if($_POST['mbtn']=='register'){
            $uname=$_POST['uname'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confirm=$_POST['confirm'];
            $date=$_POST['dob'];
            $gender=$_POST['gender'];
            $city=$_POST['city'];
           
            $query="SELECT * FROM user_details";//check if username is taken
            $result=mysqli_query($connection,$query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($uname==$row["username"]){
                        echo "<script>$('.usernamemsg').css('display','block');
                        $('.usernamemsg').text('*username is already taken');
                        $('.allfieldsmsg').css('display','none');
                        $('.confirmmsg').css('display','none');
                        </script>";
                        return false;
                        // echo '<script>alert("username is already taken");</script>';
                        //header("location:index.php");
                        // return false;
                    }    
                }
            }
        $query="insert into user_details(username,email,password,dob,gender,city)values('$uname','$email','$password','$date','$gender','$city')";    
        mysqli_query($connection,$query);
        
        }
        elseif($_POST['mbtn']=='login'){
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            if($uname=="" || $password==""){
                echo "<script>$('.allfieldsmsg').css('display','block');
                </script>";
                return false;
            }
            $query="SELECT uid,username,password FROM user_details";
            $result=mysqli_query($connection,$query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($uname==$row["username"] && $password==$row["password"]){
                        $_SESSION["id"]=$row["uid"];                   
                        echo '<script> location.replace("home.php"); </script>';
                        // header("location:redirect.php?id=$id");
                    }    
                }
                echo "<script>$('.allfieldsmsg').css('display','block');
                $('.allfieldsmsg').text('*username or password incorrect');
                </script>";
            }
        }
    }  
?>