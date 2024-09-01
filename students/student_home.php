<?php
session_start();
    include("conn.php");
    if(isset($_SESSION['student_id'])){
        $student_id = $_SESSION['student_id'];
        $student_data = mysqli_query($conn_login,"SELECT * 
                                                FROM `students`
                                                WHERE `student_id` = $student_id");
        $student_data = mysqli_fetch_assoc($student_data);
    }
    else{
        session_destroy();
        header("Location:/doit/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <script src='/doit/js-lesson/student_lesson.js'></script>
        <script src="/doit/js/jquery.min.js"></script>
        <script src="/doit/js/bootstrap.min.js"></script>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="/doit/css/stylehome.css">
    </head>
    <body class="body">
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
                    <li><a href="student_profile.php">Profile</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                    <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li> -->
                    <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="page">
        <div class=" col-xs-4 col-sm-2 col-md-2 col-lg-2" style="margin-top: 2%;">
        <form>
            <ul class="list">
                <li title="Introduction to Trees">
                    <input type="hidden" name="lesson_name" value="Introduction to trees" title="Introduction to trees">
                    <a href="student_lessons.php?lesson_name=Introduction%20to%20trees" target='lessons'><img src="../images/1.png" class="img"></a>
                </li>
                <li title="Application of Trees">
                    <input type="hidden" name="lesson_name" value="Application of trees" title="Application of trees">
                    <a href="student_lessons.php?lesson_name=Applications of trees" target="lessons"><img src="../images/2.png" class="img" ></a>
                </li>
                <li title="Tree Traversal">
                    <input type="hidden" name="lesson_name" value="Tree traversal" title="Tree traversal">
                    <a href="student_lessons.php?lesson_name=Tree traversal" target="lessons"><img src="../images/3.png" class="img"></a>
                </li>
                <li title="Spanning Tree">
                    <input type="hidden" name="lesson_name" value="Spanning trees" title="Spanning tree"">
                    <a href="student_lessons.php?lesson_name=Spanning trees" target="lessons"><img src="../images/4.png" class="img"></a>
                </li>
            </ul>
        </form>
        </div>
        
    
        <div  class="col-xs-20 col-sm-10 col-md-10 col-lg-10"  > 
            <iframe src="student_lessons.php" name="lessons"  strcolling="yes" height="550px" width="85%"> </iframe>
            <iframe src="student_badges.php" name="badges"  strcolling="yes" height="550px" width="13%"> </iframe>
        </div>
        </div>
        
    </body>
</html>
<!-- <li title="Introduction to Trees">
                    <input type="hidden" name="lesson_name" value="Introduction to Trees">
                    <a href="#" target='lessons' onclick="loadLesson('Introduction to Trees')"><img src="../images/1.png"></a>
                </li> -->