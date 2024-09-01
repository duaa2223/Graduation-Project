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
        <!-- <style>
            .imageFeatures{
                width:150px;
                height:130px;
            }
        </style>  -->
    </head>
    <body>
        <!-- <script>
            function displayImage(src) {
                var img = document.createElement("img");
                img.src = src;
                img.classList.add("imageFeatures");
                document.body.appendChild(img);
            }
        </script>
        <script>
            var audiot = new Audio('/doit/audio/tt.mp3');
            var audiof = new Audio('/doit/audio/ff.mp3');
        </script>
        <script>
            function hideUnhide(id){
                const button = document.getElementById(id);
                if (button.style.display=="none"){
                    button.style.display ="block";
                }else{
                    button.style.display ="none";
                }
            }
        </script>
        <script>
            function showExplain(){
                var x = document.getElementById("explain");

                if(x.style.display === "none"){
                    x.style.display = "block";
                }
                else{
                    x.style.display = "none";
                }
            }
        </script> -->
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
                        echo "<pre>Question $quiz_order:   ";
                        echo $current_quiz['quiz_question'] . "<br></pre>";
                        if($current_quiz["quiz_image"] == true){
                            echo "<br><img class='img' src=/doit/images/content/$lesson$lesson_id$quiz$quiz_order.png>";
                        }
                        echo "<br><br>";
                        for($j=1; $j<5; $j++){
                            if(!empty($current_quiz["answer$j"])){

                                if($current_quiz["correct_answer"] === "$j"){
                                    
    ?>                            
                                    <!-- <input type="button" class="btn btn-success" onclick="document.getElementById('myImage').src='/doit/images/t.png'; audiot.play(); hideUnhide('ff');hideUnhide('ft')" id='ft' name="correct[<?php /* echo $j?>]" value='<?php echo $current_quiz["answer$j"]*/ ?>'> -->
                                    <input class="btn-check" type='radio'  name="correct<?php echo $quiz_order;?>" value=1>
                                    <label  for="correct<?php echo $quiz_order;?>" class='labelq' class="btn btn-secondary" ><?php echo $current_quiz["answer$j"]?></label>
    
    <?php                            
                                }
                                else{
    ?>
                                    <!-- <input type="button" class="btn btn-success" onclick="document.getElementById('myImage').src='/doit/images/f.png'; audiof.play(); hideUnhide('ff');hideUnhide('ft')" id='ff' value='<?php /*echo $current_quiz["answer$j"]*/?>'> -->
                                        <input type='radio' class="btn-check" name="correct<?php echo $quiz_order;?>" value=0>
                                        <label for="correct<?php echo $quiz_order;?>"  class='labelq' class="btn btn-secondary" ><?php echo $current_quiz["answer$j"]?></label>
    <?php
                                }
                            }
                        }// for quiz options
    
    /*                    for($j=1; $j<5; $j++){
                            if(!empty($current_quiz["answer$j"])){
                                if($current_quiz["$correct_answer"] === "answer$j"){
    ?>
                                    <button type="button" class="btn btn-success" onclick="document.getElementById('myImage').src='/doit/images/t.png'; audiot.play()" name="correct1" value=1><?php echo $current_quiz["answer$j"]?></button>
    <?php                            
                                } // correct answer
                                else{
    ?>
                                    <button type="button" class="btn btn-success" onclick="document.getElementById('myImage').src='/doit/images/f.png'; audiof.play()"><?php echo $current_quiz["answer$j"]?></button>
    <?php
                                } // wrong answer
                            }
                        } // for quiz options
    */                    
                        // echo "<img id=myImage src='/doit/images/w.png' style='width:100px'><br>";
    ?>
                        <!-- <br><button type='button' onclick="showExplain()">Show Explanation</button> -->
                        <br><br>
    <?php
                        echo "<br><br>";
                        echo "<p id='explain' style='display:none;'>". $current_quiz['answer_explanation'] ."</p>";
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