<?php
session_start();
if(isset($_SESSION['admin_id'])){}
else header("Location:/doit/login.php");
include("conn.php");
?>
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
                        <li class="active"><a href="/doit/teachers/teacher.php">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/teachers/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li> -->
                        <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<?php
    include "conn.php";


    if(isset($_GET['teacher_id'])){
        $teacher_id = $_GET['teacher_id'];
        $teacher_data = mysqli_query($conn_login,"SELECT `teacher_id`, `teacher_name`,
                `teacher_email`, `teacher_phone`, `teacher_picture`
                FROM `teachers`
                WHERE `teacher_id` = $teacher_id");
        $teacher_data = mysqli_fetch_assoc($teacher_data);

        $teacher_name = $teacher_data['teacher_name'];
        $teacher_email = $teacher_data['teacher_email'];
        $teacher_phone = $teacher_data['teacher_phone'];
    }
    else{
        session_destroy();
        header("Location:/doit/login.php");
    }
    if(isset($_GET['out'])){
        session_destory();
        header("Location:/doit/login.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Student Profile</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/styleprofile.css'>
    </head>
    <body>

        
        <div class="container" >
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228) ;">
                        <div class="panel panel-heading" style="height: 100px;">
                            <center>
                                <h1>Edit Teacher</h1>
                            </center> 
                        </div>
                        <div class="panel-body">
                        </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" enctype="multipart/form-data" style="padding-left: 20px; padding-right:20px" >  
            <img src="/doit/images/user.jpg" height="100" width="100" style="border:solid black 0.5px; border-radius:50px"><br>
                    <!--get_teacher_picture.php?teacher_id=$row[teacher_id]-->
                <label>Change you picture:</label>
                <input type="file" name="teacher_picture" class="form-control" accept="image/*" capture="user"><br>
                
                <label> ID </label>
                <input  id="id" type="text" name="teacher_id" value="<?php echo $teacher_id?>" class="form-control" readonly><br>
                
                <label>Name: </label>
                <input type="text" name="teacher_name" class="form-control" required pattern="^[a-zA-Z0-9-' _]+$" maxlength="50"
                    value="<?php if(isset($teacher_name)) echo $teacher_name?>">
                    <span class='error'>*<?php if(!empty($teacher_name_error)) echo $teacher_name_error?></span><br>

                <label>Password: </label>
                <input type="password" name="teacher_password"class="form-control" required maxlength="50" minlength="8">
                    <span class='error'>*<?php if(!empty($teacher_password_error)) echo $teacher_password_error?></span><br>
                
                <label>Email: </label>
                <input type="email" name="teacher_email" class="form-control" required pattern="^[a-A-Z0-9_.]+@[gmail|hotmail|yahoo|server].com$"
                    value="<?php if(isset($teacher_email)) echo $teacher_email?>" >
                    <span class='error'>*<?php if(!empty($teacher_email_error)) echo $teacher_email_error?></span><br>
                
                <label>Phone: </label>
                <input type="text" name="teacher_phone" class="form-control" required pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$"
                    value="<?php if(isset($teacher_phone)) echo $teacher_phone?>">
                    <span class='error'>*<?php if(!empty($teacher_phone_error)) echo $teacher_phone_error?></span><br>
                
            <center>
                <input type="submit" name="edit_teacher" value="Save" class="btn btn-primary">
            </center><br>
                
                <?php
                    $teacher_name_error = $teacher_password_error = "";
                    $teacher_email_error = $teacher_phone_error = "";

                    if(isset($_GET['edit_teacher'])){
                        if(isset($teacher_data['teacher_name'])){
                            $teacher_name       = $teacher_data['teacher_name'];
                            $teacher_name = $_GET['teacher_name'];
                            if(!preg_match("/^[a-zA-Z0-9-' ]*$/", $teacher_name))
                                $teacher_name_error = "Only letters and white space allowed";
                        }
                        if(isset($teacher_data['teacher_password'])){
                            $teacher_password   = $teacher_data['teacher_password'];

                        }
                        if(isset($teacher_data['teacher_email'])){
                            $teacher_email      = $teacher_data['teacher_email'];
                            $teacher_email   = $_GET['teacher_email'];
                            if(!filter_var($teacher_email, FILTER_VALIDATE_EMAIL))
                                $teacher_email_error = "Invalid email format";
                        }
                        if(isset($teacher_data['teacher_phone'])){
                            $teacher_phone      = $teacher_data['teacher_phone'];
                            $teacher_phone   = $_GET['teacher_phone'];
                            if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$teacher_phone))
                                $teacher_phone_error    = "Invalid phone number";
                        }
                        if(isset($teacher_data['teacher_picture'])){
                            $teacher_picture    = $teacher_data['teacher_picture'];

                        }

                        if(empty($teacher_name_error) && empty($teacher_password_error) && 
                            empty($teacher_email_error) && empty($teacher_phone_error)){
                            $query="UPDATE `teachers` SET `teacher_id`=$teacher_id,
                                `teacher_name`='$teacher_name',`teacher_password`='$teacher_password',
                                `teacher_email`='$teacher_email',`teacher_phone`='$teacher_phone',
                                `teacher_picture`='$teacher_picture'
                                WHERE `teacher_id`=$teacher_id";

                            mysqli_query($conn_login, $query);
                            echo "teacher updated";
                        }
                        else echo "There is an error in editing";
                        
                    }
                ?>
            </form>
        </div>
    <script src="/doit/js/bootstrap.min.js"></script> 
    <script src="/doit/js/jquery.min.js"></script> 
    </body>
</html>