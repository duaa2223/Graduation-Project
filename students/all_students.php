<?php
session_start();
if(isset($_SESSION['admin_id']) || isset($_SESSION['teacher_id']));
else header("Location:/doit/login.php");
include("conn.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/styleallstudent.css'>
        <script src='main.js'></script>
    </head>
    <body>
        <nav class="navbar navbar-default" style="width:200%">
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
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li>-->
                        <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <center><div class="div4">
        <table>
            <tr class="lesson-list" >
                <th>Picture</th>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birthdate</th>
                <th>Country</th>
                <th>City</th>
                <th>At University?</th>
                <th>Score</th>
                <th>Highest score</th>
                <th>number of completed lessons</th>
                <th></th>
                <?php if(isset($_SESSION['admin_id']))?>
                <th></th>
            </tr>
            <?php

                $student_data = mysqli_query($conn_login, "SELECT `student_id`, `student_name`,
                        `student_gender`, `student_email`, `student_phone`,`student_birthdate`,
                        `student_picture`, `student_country`, `student_city`, `is_university`, `score`,
                        `highest_score`, `complete_num`
                        FROM `students`");
                while($row=mysqli_fetch_array($student_data)){
                    echo "<tr>";
                    echo "<td><img src='get_student_picture.php?student_id=$row[student_id]' height='150' width='100'></td>";
                    echo "<td>".$row['student_id']."</td>";
                    echo "<td>".$row['student_name']."</td>";
                    if($row['student_gender']==0)
                    echo "<td>Male</td>";
                    else
                    echo "<td>Female</td>";
                    echo "<td>".$row['student_email']."</td>";
                    echo "<td>".$row['student_phone']."</td>";
                    echo "<td>".$row['student_birthdate']."</td>";
                    echo "<td>".$row['student_country']."</td>";
                    echo "<td>".$row['student_city']."</td>";
                    if($row['is_university']==1)
                        echo "<td>Yes</td>";
                    else
                        echo "<td>No</td>";
                    echo "<td>".$row['score']."</td>";
                    echo "<td>".$row['highest_score']."</td>";
                    echo "<td>".$row['complete_num']."</td>";
                    echo "<td><a href='all_students.php?student_id=$row[student_id]'>Delete</a></td>";
                    // if(isset($_SESSION['admin_id']))
                    //     echo "<td><a href='edit_student.php?student_id=$row[student_id]'>Edit</a></td>";
                    echo "</tr>";
                }//fetching every row
                if(isset($_GET['student_id'])){
                    if(mysqli_query($conn_login, "DELETE FROM `Students` 
                        WHERE student_id = $_GET[student_id];"))
                        echo "student deleted";
                    else 
                    echo "Cannot delete this student";
                }

        ?>
        </table>
    </div>
    </center>
    <script src="/doit/js/bootstrap.min.js"></script> 
    <script src="/doit/js/jquery.min.js"></script> 
    </body>
</html>