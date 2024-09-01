<?php
session_start();
if(isset($_SESSION['admin_id']));
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
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/teachers/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li>-->
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
                <th>Email</th>
                <th>Phone</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                if(isset($_GET['teacher_id'])){
                    mysqli_query($conn_login, "DELETE FROM `teachers` 
                        WHERE teacher_id = $_GET[teacher_id];");
                    echo "teacher deleted";
                }

                $teacher_data = mysqli_query($conn_login, "SELECT `teacher_id`, `teacher_name`,
                        `teacher_email`, `teacher_phone`, `teacher_picture`
                        FROM `teachers`");
                while($row=mysqli_fetch_array($teacher_data)){
                    echo "<tr>";
                    echo "<td><img src='get_teacher_picture.php?teacher_id=$row[teacher_id]' height='150' width='100'></td>";
                    echo "<td>".$row['teacher_id']."</td>";
                    echo "<td>".$row['teacher_name']."</td>";
                    echo "<td>".$row['teacher_email']."</td>";
                    echo "<td>".$row['teacher_phone']."</td>";
                    echo "<td><a href='all_teachers.php?teacher_id=$row[teacher_id]'>Delete</a></td>";
                    // echo "<td><a href='edit_teacher.php?teacher_id=$row[teacher_id]'>Edit</a></td>";
                    echo "</tr>";
                }//fetching every row
        ?>
        </table>
    </div>

    </center>

    </body>
</html>