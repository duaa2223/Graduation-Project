<?php 
session_start();
    include("conn.php"); 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Signup</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/css/style1.css'>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylesignup.css'>
        <style>
            .error{
                color   :red;
            }
            input:invalid {
                border: 2px dashed red;
            }

            input:invalid:required {
                background-image: linear-gradient(to right, pink, lightgreen);
            }
            input:valid {
                border: 2px solid black;
            }
            input:focus:invalid {
                box-shadow: none;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">DO IT</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/doit/index.php">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li> -->
                        <!-- <li><a href="/doit/teachers/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li> -->
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" >
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228) ;">
                        <div class="panel panel-heading" style="height: 100px;"><center>
                            <h1>Registration</h1></center> 
                        </div>
                        <div class="panel-body">
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" style="padding-left: 20px; padding-right:20px">
                            <label > Your image:</label>
                            <input type="file" name="teacher_picture" class="form-control" accept="image/*" capture="user">
                                <br>
                            <label>Name: </label>
                            <input type="text" name="teacher_name" class="form-control" required pattern="^[a-zA-Z0-9-' _]+$" maxlength="50">
                                <span class='error'>*<?php if(!empty($teacher_name_error)) echo $teacher_name_error?></span><br>
                            <label>Password: </label>
                            <input type="password" name="teacher_password"class="form-control" required maxlength="50" minlength="8">
                                <span class='error'>*<?php if(!empty($teacher_password_error)) echo $teacher_password_error?></span><br>
                            <label>Email: </label>
                            <input type="email" name="teacher_email" class="form-control" required pattern="^[a-A-Z0-9_.]+@[gmail|hotmail|yahoo|server].com$">
                                <span class='error'>*<?php if(!empty($teacher_email_error)) echo $teacher_email_error?></span><br>
                            <label>Phone: </label>
                            <input type="text" name="teacher_phone" class="form-control" required pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$">
                                <span class='error'>*<?php if(!empty($teacher_phone_error)) echo $teacher_phone_error?></span><br>
                            <center>
                            <input type="submit" name="add_teacher" value="Add" class="btn btn-primary">
                            </center>
                            <?php
                                if(isset($_GET['add_teacher'])){
                                    $teacher_name_error = $teacher_password_error = "";
                                    $teacher_email_error = $teacher_phone_error = "";
                                    if(empty($_GET['teacher_name'])){
                                        $teacher_name_error = "Name is required";
                                    }
                                    else {
                                        $teacher_name = $_GET['teacher_name'];
                                        if(!preg_match("/^[a-zA-Z0-9-' _]*$/", $teacher_name))
                                            $teacher_name_error = "Only letters and white space allowed";
                                    }
                                    if(empty($_GET['teacher_password'])){
                                        $teacher_password_error = "Password is required";
                                    }
                                    else {
                                        $teacher_password   = $_GET['teacher_password'];
                                    }
                                    if(empty($_GET['teacher_email'])){
                                        $teacher_email_error    = "Email is required";
                                    }
                                    else {
                                        $teacher_email   = $_GET['teacher_email'];
                                        if(!filter_var($teacher_email, FILTER_VALIDATE_EMAIL))
                                            $teacher_email_error = "Invalid email format";
                                    }
                                    if(empty($_GET['teacher_phone'])){
                                        $teacher_phone_error    = "Phone number is required";
                                    }
                                    else {
                                        $teacher_phone   = $_GET['teacher_phone'];
                                        if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$teacher_phone))
                                            $teacher_phone_error    = "Invalid phone number";
                                    }
                    
                                    function test_input($data){
                                        $data   = trim($data);
                                        $data   = stripslashes($data);
                                        $data   = htmlspecialchars($data);
                                        return $data;
                                    }
                    
                                    $teacher_name    = $_GET['teacher_name'];
                                    $teacher_password = $_GET['teacher_password'];
                                    $teacher_email = $_GET['teacher_email'];
                                    $teacher_phone = $_GET['teacher_phone'];

                                    if(empty($teacher_email_error) && empty($teacher_name_error) && 
                                        empty($teacher_password_error) && empty($teacher_phone_error)){
                                    mysqli_query($conn_login, "INSERT INTO `teachers`
                                    (`teacher_name`, `teacher_password`, 
                                    `teacher_email`, `teacher_phone`)
                                    VALUES ('$teacher_name','$teacher_password',
                                    '$teacher_email','$teacher_phone')");
                                    echo "Teacher added<br>";
                                    }
                                }// submit 
                            ?>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>

        <script src="/doit/js/jquery.min.js"></script>
        <script src="/doit/js/bootstrap.min.js"></script>
    </body>
</html>