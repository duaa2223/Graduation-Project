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
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylelesson.css'>
        <script src='/doit/js/student_lesson.js'></script>

    </head>
    <body>
    <?php
        if(isset($_SESSION['lesson_id'])){
            $lesson_id = $_SESSION['lesson_id'];
            $quiz_data                   = mysqli_query($conn_content, "SELECT * FROM `quizzes`
                                                    Where `lesson_id` = $lesson_id");
            if(!empty($quiz_data)){
                $image = "image";
                $quiz_order=1;
                $current_quiz = "";
                $lesson = "lesson";
                $quiz = "quiz";
                $score = 0;

                if(mysqli_num_rows($quiz_data) > 0){
                    echo "<form method=get action='student_result.php'>";
                    $quiz_order = 1;
                    while($current_quiz = mysqli_fetch_array($quiz_data)){
                        //$correct_answer = $current_quiz['correct_answer'];
                        echo "<div class='qustion'>";
                        echo "<pre class='q'>Question $quiz_order:   ";
                        echo $current_quiz['quiz_question'] . "<br></pre>";
                        if($current_quiz["quiz_image"] == true){
                            echo "<br><img class='img' src=/doit/images/content/$lesson$lesson_id$quiz$quiz_order.png>";
                        }
                        echo "<br><br>";
                        for($j=1; $j<5; $j++){
                            if(!empty($current_quiz["answer$j"])){

                                if($current_quiz["correct_answer"] === "$j"){
                                    echo "<label class='labelq' class='btn btn-secondary'>";
                                    echo $current_quiz["answer$j"];
                                    if ($current_quiz["correct_answer"] === "$j") {
                                        echo " (Correct Answer)";
                                    echo "</label>";
                                }                          
                                }
                            }
                        }// for quiz options

    ?>
                        <br><br>
    <?php
                        echo "<br><br><p class='labelq' class='btn btn-secondary'>Explanation:</p>";
                        echo "<p id='explain' class='labelq' class='btn btn-secondary'>". $current_quiz['answer_explanation'] ."</p>";
                        echo "</div>";
                        $quiz_order++;
                    } //while quiz
                    
                    echo '<br>'; echo '<br>'; echo '<br>';
                    echo " <center><input class='btn btn-warning' type='submit' name='submit' value='See result'></center> <br> <br>";
                    $_SESSION['quiz_num'] = $quiz_order - 1;
                    echo "</form>";
                }//while quiz
                
            }

        }// linked

        else{
            echo "there is no quiz";
        }
    ?>

    <script src="/doit/js/bootstrap.min.js"></script>
    <script src="/doit/js/bootstrap.min.js"></script>
    </body>
</html>