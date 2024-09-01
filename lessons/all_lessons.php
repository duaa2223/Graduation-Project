<?php
session_start();
if(isset($_SESSION['admin_id']) || isset($_SESSION['teacher_id'])){}
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
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylealllesson.css'>
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
                        <li><a href="/doit/login.php/"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="div4">
        <table>
            <tr class="lesson-list" >
                <th>Lesson ID</th>
                <th>Lesson name</th>
                <th>Lesson subject</th>
                <th>Lesson content 1</th>
                <th>Image 1</th>
                <th>Lesson content 2</th>
                <th>Image 2</th>
                <th>Lesson content 3</th>
                <th>Image 3</th>
                <th>Lesson content 4</th>
                <th>Image 4</th>
                <th>Lesson content 5</th>
                <th>Image 5</th>
                <th>Lesson content 6</th>
                <th>Image 6</th>
                <th>Lesson content 7</th>
                <th>Image 7</th>
                <th>Lesson content 8</th>
                <th>Image 8</th>
                <th>Lesson content 9</th>
                <th>Image 9</th>
                <th>Lesson content 10</th>
                <th>Image 10</th>
                <th>Number of quizzes</th>
                <th>Number of students completed the lesson</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                if(isset($_GET['lesson_id'])){
                    mysqli_query($conn_content, "DELETE FROM `lessons` 
                                WHERE lesson_id = $_GET[lesson_id];");
                    echo "lesson deleted<br>";
                }

                $lesson_data = mysqli_query($conn_content, "SELECT `lesson_id`, `lesson_name`,
                        `lesson_subject`, `lesson_content1`, `lesson_content2`, `lesson_content3`,
                        `lesson_content4`, `lesson_content5`, `lesson_content6`, `lesson_content7`,
                        `lesson_content8`, `lesson_content9`, `lesson_content10`, `image1`, `image2`,
                        `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`,
                        `quizzes_num`, `complete_num`
                        FROM `lessons`");
                while($row=mysqli_fetch_array($lesson_data)){
                  // i want to mark edited row  if(isset($_SESSION['lesson_id']) == $lesson_data['lesson_id'])
                    echo "<tr>";
                    echo "<td>".$row['lesson_id']."</td>";
                    echo "<td>".$row['lesson_name']."</td>";
                    echo "<td>".$row['lesson_subject']."</td>";
                    echo "<td>".$row['lesson_content1']."</td>";
                    echo "<td>".$row['image1']."</td>";
                    echo "<td>".$row['lesson_content2']."</td>";
                    echo "<td>".$row['image2']."</td>";
                    echo "<td>".$row['lesson_content3']."</td>";
                    echo "<td>".$row['image3']."</td>";
                    echo "<td>".$row['lesson_content4']."</td>";
                    echo "<td>".$row['image4']."</td>";
                    echo "<td>".$row['lesson_content5']."</td>";
                    echo "<td>".$row['image5']."</td>";
                    echo "<td>".$row['lesson_content6']."</td>";
                    echo "<td>".$row['image6']."</td>";
                    echo "<td>".$row['lesson_content7']."</td>";
                    echo "<td>".$row['image7']."</td>";
                    echo "<td>".$row['lesson_content8']."</td>";
                    echo "<td>".$row['image8']."</td>";
                    echo "<td>".$row['lesson_content9']."</td>";
                    echo "<td>".$row['image9']."</td>";
                    echo "<td>".$row['lesson_content10']."</td>";
                    echo "<td>".$row['image10']."</td>";
                    echo "<td>".$row['quizzes_num']."</td>";
                    echo "<td>".$row['complete_num']."</td>";
                    echo "<td><a href='all_lessons.php?lesson_id=$row[lesson_id]'>Delete</a></td>";
                    // echo "<td><a href='edit_lessons.php?lesson_id=$row[lesson_id]'>Edit</a></td>";
                    echo "</tr>";
                }//fetching every row
            ?>
        </table>
    </div>
    
    </body>
</html>