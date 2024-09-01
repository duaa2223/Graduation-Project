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
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylelesson.css'>
        <script src='/doit/js/jquery.min.js'></script>
        <script src='/doit/js/bootstrap.min.js'></script>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <script src='/doit/js/student_lesson.js'></script>   
    </head>
    <body>
        <?php
            
            if(isset($_GET['lesson_name'])){
                $lesson_name = $_GET['lesson_name'];
        ?>
                <h1 class='lesson_name' ><?php echo $lesson_name?></h1>
        <?php
                $lesson_data        = mysqli_query($conn_content, "SELECT *
                                        FROM `lessons`
                                        WHERE `lesson_name` = '$lesson_name'");
                $lesson_data        = mysqli_fetch_assoc($lesson_data);
                if(!empty($lesson_data)){
                    $lesson_id          = $lesson_data['lesson_id'];
                    $_SESSION['lesson_id'] = $lesson_id;
                    $lesson_content="lesson_content";
                    $image = "image";
                    $current_content = 1;
                    $lesson = "lesson";

                    echo "<form action=student_quiz.php?lesson_name=".$lesson_name.">";

                    if($student_id == 1){
                        echo' <iframe class="responsive-iframe" src="https://www.youtube.com/watch?v=WPltohq_MJA" style="width:700px; height:400px;">
                            </iframe>';
                    }
                    if($student_id == 2){
                        echo ' <iframe class="responsive-iframe" src="https://youtube.com/shorts/6gWrYdv2HhU" style="width:700px; height:400px;">
                            </iframe>';
                    }
                    for($i=1; $i<11; $i++){
                        $current_content = $i;
                        if(!empty($lesson_data["$lesson_content$current_content"])){
                            echo "<br><br><div class='content'>" . $lesson_data["$lesson_content$current_content"]."</div>";
                            if($lesson_data["$image$current_content"] == true){
        ?>
                                <br><br><center><img class='img' src="/doit/images/content/<?php echo $lesson.$lesson_id.$image.$current_content?>.png"></center>
        <?php                    
                            }
                        }//lesson exists 
                    }//for content
        ?>
                    <br><br><a href="student_quiz.php?lesson_name=<?php echo $lesson_name?>"><br><center><button class="btn btn-primary">Quiz</button></center><br></a>
        <?php
                    echo "</form>";
                }// lesson exists
                else{
                    echo "lesson is not exist right now, come again later";
                }

            }// lesson name is sent
            else{
                echo "click a lesson to discover";
            }
        ?>
        </div>
    </body>
</html>