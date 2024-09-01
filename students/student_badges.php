<?php
session_start();
    include("conn.php");
    if(isset($_SESSION['student_id'])){
        $student_id = $_SESSION['student_id'];
        $student_data = mysqli_query($conn_login,"SELECT * 
                                                FROM `students`
                                                WHERE `student_id` = $student_id");

        $student_data = mysqli_fetch_assoc($student_data);
        
        if(isset($_SESSION['lesson_id'])){
            $lesson_id = $_SESSION['lesson_id'];
            $lesson_data = mysqli_query($conn_content, "SELECT * 
                                                    FROM `lessons`
                                                    WHERE `lesson_id` = $lesson_id");
            $lesson_data = mysqli_fetch_assoc($lesson_data);

            $quiz_data = mysqli_query($conn_content, "SELECT * 
                                                    FROM `quizzes`
                                                    WHERE `lesson_id` = $lesson_id");
        }
    }
    else{
        session_destroy();
        header("Location:/doit/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylebadges.css'>
        <script src='/doit/js/jquery.min.js'></script>
        <script src='/doit/js/bootstrap.min.js'></script>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <script src='/doit/js/student_lesson.js'></script>   
    </head>
    <body>
        <?php
            $badges = mysqli_query($conn_content, "SELECT COUNT(*) AS badges
                    FROM earned_badges
                    WHERE student_id = $student_id");
            $badges = mysqli_fetch_assoc($badges);
            $badges_num = $badges['badges'];

            for($i=1; $i<=$badges_num; $i++){
                echo "<img class='imager' src='/doit/images/g.jpeg'>";
                echo "<br>";
            }
        ?>
    </body>
</html>