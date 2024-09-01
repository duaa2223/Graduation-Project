<?php
session_start();
    include("conn.php");
    if(isset($_SESSION['student_id'])){
        $student_id = $_SESSION['student_id'];
        $student_data = mysqli_query($conn_login,"SELECT * 
                                                FROM `students`
                                                WHERE `student_id` = $student_id");

        $student_data = mysqli_fetch_assoc($student_data);
        
        $lesson_id = $_SESSION['lesson_id'];
        $lesson_data = mysqli_query($conn_content, "SELECT * 
                                                FROM `lessons`
                                                WHERE `lesson_id` = $lesson_id");
        $lesson_data = mysqli_fetch_assoc($lesson_data);

        $quiz_data = mysqli_query($conn_content, "SELECT * 
                                                FROM `quizzes`
                                                WHERE `lesson_id` = $lesson_id");
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
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/styleresult.css'>
        <script src='/doit/js/student_lesson.js'></script>
    </head>
    <body>
        <?php
            if(isset($_GET['submit'])){
                $solved_num = 0;
                $solved_num_correct = 0;
                
                $lesson_complete_num = $lesson_data['complete_num'];
                $lesson_complete_num++;
                
                $student_complete_num = $student_data['complete_num'];
                $student_complete_num++;

                $score = 0;
                $total_score = $student_data['score'];
                $highest_score = $student_data['highest_score'];

                for($i=1; $i<11; $i++){
                    //$current_quiz = mysqli_fetch_array($quiz_data);
                    //$solved_num = $current_quiz['solved_num'];
                    //$solved_num_correct = $current_quiz['solved_num_correct'];
                    //$quiz_order = $current_quiz['quiz_order'];
                    if(isset($_GET["correct$i"]) && $_GET["correct$i"]== 1){
                        $score += 3;
                        $solved_num++;
                        $solved_num_correct++;
                        
                    }
                    else{
                        $solved_num++;
                    }
                    // mysqli_query($conn_content, "UPDATE `quizzes`
                    //             SET `solved_num`=$solved_num,`solved_num_correct`=$solved_num_correct,
                    //             WHERE `lesson_id`=$lesson_id and `quiz_order`=$quiz_order");
                }// correct

                $total_score = $student_data['score'];
                $total_score += $score;


                
                if($_SESSION['lesson_id'] == 1){
                    echo '<div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                    
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                        25% Complete (go on )
                    </div>
                    </div>';
                }
                elseif($_SESSION['lesson_id'] == 2){
                    echo '<div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                        50% Complete (you can do it)
                    </div>
                    </div>';
                }
                elseif($_SESSION['lesson_id'] == 3){
                    echo '<div class="progress">
                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
                        75% Complete (Almost at the end)
                    </div>
                    </div>';
                }
                elseif($_SESSION['lesson_id'] == 4){
                    echo '<div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        100% Complete (Well done.. you did it)
                    </div>
                    </div>';
                }

                echo "<div id='score'>lesson score is " . $score . "/". $_SESSION['quiz_num'] * 3 ."</div><br>";
                echo "<div id='total'>total score is " . $total_score . "</div><br>";
                
                if($highest_score < $score){
                    $highest_score = $score;
                    echo "<div id='score'>This is a new high score!! Good Job<br>";
                    echo "Your new high score is " . $highest_score . "</div><br>";
                }
                else{
                    echo "<div id='score'>High score is " . $highest_score . "</div><br>";
                }

                // badge
                if($score/3 == $_SESSION['quiz_num']){
                    $badge = mysqli_query($conn_content,"SELECT * FROM `earned_badges`
                            WHERE `student_id` = $student_id AND `lesson_id` = $lesson_id");
                    if(mysqli_num_rows($badge) == 0)
                        mysqli_query($conn_content,"INSERT INTO `earned_badges`
                                (`student_id`, `lesson_id`)
                                VALUES ($student_id, $lesson_id)");
    ?>
                    <script>
            var audior = new Audio('/doit/audio/rr.mp3');
            audior.play();
        </script>
        <script>
            function hideUnhide(id){
                const button = document.getElementById(id);
                if (button.style.display=="none"){
                    button.style.display =="block";
                }else{
                    button.style.display ="none";
                }
            }
        </script>
        <div class="butt"  >
        <button class="btn btn-light" id="open" onclick="document.getElementById('myImage').src='/doit/images/k2.jpg';audior.play();hideUnhide('open')"><pre>Open       </pre></button><br>
        <button class="btn btn-light" id="show" onclick="document.getElementById('myImage').src='/doit/images/g.jpeg';audior.play();hideUnhide('show')"> <pre>Show reword</pre></button>
        </div> 
        <center><img  id="myImage" class="imager" class="rounded-top" src="/doit/images/k1.jpg"></center>
        <script src='/doit/js/student_lesson.js'></script>
        <script src="/doit/js/jquery.min.js"></script>
        <script src="/doit/js/bootstrap.min.js"></script>
    <?php

                    mysqli_query($conn_content, "UPDATE `lessons`
                                SET `complete_num`=$lesson_complete_num
                                WHERE `lesson_id`=$lesson_id");
                    mysqli_query($conn_login, "UPDATE `students`
                                SET `score`=$score,`highest_score`=$highest_score,
                                `complete_num`=$student_complete_num
                                WHERE `student_id`=$student_id");
                }
            } // the quiz has been taken
            else{
                echo "Take the quiz";
            }
        ?>
        <button  class="btn btn-light"><a href='student_explanation.php'>Explain answers</a></button>
        
<script src="/doit/js/jquery.min.js"></script>
<script src="/doit/js/bootstrap.min.js"></script>
    </body>
</html>