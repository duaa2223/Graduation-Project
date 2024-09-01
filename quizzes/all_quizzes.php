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
                        <!--   <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li>-->
                        <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="div4">
        <table>
            <tr class="quiz-list" >
                <th>Quiz ID</th>
                <th>Lesson ID</th>
                <th>Quiz order</th>
                <th>Quiz question</th>
                <th>answer 1</th>
                <th>answer 2</th>
                <th>answer 3</th>
                <th>answer 4</th>
                <th>correct answer</th>
                <th>how many times solved</th>
                <th>how many times solved correct</th>
                <th>Quiz image</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                if(isset($_GET['quiz_id'])){
                    mysqli_query($conn_content, "DELETE FROM `Quizzes` WHERE quiz_id = $_GET[quiz_id];");
                }

                $quiz_data = mysqli_query($conn_content, "SELECT `quiz_id`, `lesson_id`, `quiz_order`,
                        `quiz_question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer`,
                        `solved_num`, `solved_num_correct`, `quiz_image`
                        FROM `quizzes`");
                while($row=mysqli_fetch_array($quiz_data)){
                  // i want to mark edited row  if(isset($_SESSION['quiz_id']) == $quiz_data['quiz_id'])
                    echo "<tr>";
                    echo "<td>".$row['quiz_id']."</td>";
                    echo "<td>".$row['lesson_id']."</td>";
                    echo "<td>".$row['quiz_order']."</td>";
                    echo "<td>".$row['quiz_question']."</td>";
                    echo "<td>".$row['answer1']."</td>";
                    echo "<td>".$row['answer2']."</td>";
                    echo "<td>".$row['answer3']."</td>";
                    echo "<td>".$row['answer4']."</td>";
                    echo "<td>".$row['correct_answer']."</td>";
                    echo "<td>".$row['solved_num']."</td>";
                    echo "<td>".$row['solved_num_correct']."</td>";
                    echo "<td>".$row['quiz_image']."</td>";
                    echo "<td><a href='all_quizzes.php?quiz_id=$row[quiz_id]'>Delete</a></td>";
                    // echo "<td><a href='edit_quizzes.php?quiz_id=$row[quiz_id]'>Edit</a></td>";
                    echo "</tr>";
                }//fetching every row
            ?>
        </table>
    <br><br>
    </div>
    </body>
</html>