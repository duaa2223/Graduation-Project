<?php
session_start();
    include "conn.php";

    if(isset($_SESSION['teacher_id'])){
        $teacher_id = $_SESSION['teacher_id'];
        $teacher_data = mysqli_query($conn_login, "SELECT `teacher_id`, `teacher_name`, `teacher_password`
                                                FROM `teachers`
                                                WHERE `teacher_id` = $teacher_id");
        $teacher_data = mysqli_fetch_assoc($teacher_data);
    }
    else{ 
        session_destroy();
        header("Location:/doit/login.php");
    }
    if(isset($_GET['out'])){
        session_destroy();
        header("Location:/doit/login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' media='screen' href='/doit/css/bootstrap.min.css'>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Teacher</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css//styleteatcher.css'>
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
                <li class="active"><a href="/doit/teachers/teacher.php">Home</a></li>
                <li class="active"><a href="/doit/teachers/teacher_profile.php">Profile</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li>-->
                <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
            </div>
        </div>
    </nav>


<!--class="active"-->
    <div class="col-sm-3">
        <ul class="nav nav-pills nav-stacked">
            <li class='active'><a href="/doit/students/all_students.php">Show all students</a></li>
            <li><a href='/doit/students/signup.php'>Add a new student</a></li>
            <li class='active'><a href="/doit/lessons/all_lessons.php">Show all lessons</a></li>
            <li><a href="/doit/lessons/add_new_lesson.php">Add a new lesson</a></li>
            <li class='active'><a href="/doit/quizzes/all_quizzes.php">Show all quizzes</a></li>
            <li><a href="/doit/quizzes/add_new_quiz.php">Add a new quiz</a></li>
        </ul>
    </div>
    <script src="/doit/js/bootstrap.min.js"></script> 
    <script src="/doit/js/jquery.min.js"></script> 
</body>
</html>

