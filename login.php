<?php
session_start();
    include "nav/navbar.php";
    include "nav/head.php";
    include "conn.php";
    if (isset($_GET['login'])) {
        if(isset($_GET['forgot_password'])){
                header("/doit/forgot_password.php");
            }            
        if (!empty($_GET['user'])) {
            
            if (!empty($_GET['password'])) {
                $user = $_GET['user'];
                $password = $_GET['password'];

                $admin_data = mysqli_query($conn_login, "SELECT * FROM `admins` WHERE
                                    `admin_name`='$user' AND `admin_password`='$password';");
                $student_data = mysqli_query($conn_login, "SELECT * FROM `students`
                                    WHERE (`student_name`='$user' OR `student_email`='$user')
                                    AND `student_password`='$password';");
                $teacher_data = mysqli_query($conn_login,"SELECT * FROM `teachers` WHERE
                                    (`teacher_name`='$user' OR `teacher_email`='$user')
                                    AND `teacher_password`='$password';");
                
                $admin_data = mysqli_fetch_assoc($admin_data);
                $student_data = mysqli_fetch_assoc($student_data);
                $teacher_data = mysqli_fetch_assoc($teacher_data);

                if (!empty($admin_data)) {
                    $_SESSION['admin_id'] = $admin_data['admin_id'];
                    header("Location:/doit/admins/admin.php");
                } 
                elseif (!empty($student_data)) {
                    $_SESSION['student_id'] = $student_data['student_id'];
                    header("Location:/doit/students/student_home.php");
                } 
                elseif(!empty($teacher_data)){
                    $_SESSION['teacher_id'] = $teacher_data['teacher_id'];
                    header("Location:/doit/teachers/teacher.php");
                }
                else {
                    echo "<br><center style='color:red;'>This user does not exist</center>";
                }
            } 
            else {
                echo "<br><center style='color:red;'>Please enter the password</center>";
            }
        } 
        else {
            echo "<br><center style='color:red;'>Please enter your username</center>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylelogin.css'>
    <link  rel='stylesheet' type='text/css' media='screen' href='/doit/css/bootstrap.min.css'>

</head>
<body>
    <div class="page">
        <div class=" col-xs-8 col-sm-4 col-md-4 col-lg-4 "></div>
        <div class=" col-xs-8 col-sm-4 col-md-4 col-lg-4" style="margin-top:100px" class="div1" id="div1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2>Login</h2>
                </div>
                <div class="panel-body"style="background-image: url(/doit/images/'غيم1.jpg');">
                    <form action="" method="get">
                        <img src="/doit/images/user.png" width="40px" height="40px" id="smaillimg"/>
                        <input type="text" name="user" placeholder="username or email" autofocus><br>
                        <img src="/doit/images/password.png" width="40px" height="40px" id="smaillimg" />
                        <input type="password" name="password" placeholder="Password"><br>
                        <input type="submit" name="login" value="Login" class="btn btn-primary">
                        <!-- <input type="submit" name="forgot_password" value='forgot password'> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class= "  col-sm-2 col-xs-4  col-md-2 col-lg-2"  ></div>
    
    <script src="/doit/js/bootstrap.min.js"></script>
    <script src='/doit/js-lesson/main.js'></script>
</body>
</html>