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
        <title>Add a new quiz</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/styleaddlesson.css'>
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
                        <li class="active"><a href="all_quizzes.php">See all quizzes</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li> -->
                        <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" >
            <div class="row">
                <div class=" col-xs-6 col-sm-3 col-md-3 col-lg-3">
                </div>
                <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228)";>
                        <div class="panel panel-heading" style="height: 100px;">
                        <center>
                            <h1>Add new quiz</h1>
                        </center> 
                        </div>
                        <div class="panel-body">
                        </div>
                    <form action="" method="get" style="padding-left: 20px; padding-right:20px">
                    <?php
                        $quiz_id  = mysqli_query($conn_content, "show table status from content like 
                                'quizzes';");
                        $quiz_id  = mysqli_fetch_assoc($quiz_id);
                        $quiz_id  = $quiz_id['Auto_increment'];
                        
                    ?>
                        <label>Quiz ID</label>
                        <input  id="id" type="text" name="quiz_id" class="form-control" value="<?php echo $quiz_id?>"><br>
                            <!--readonly-->
                        <label>Lesson ID</label>
                        <input  id="id" type="text" name="lesson_id" class="form-control"><br>
                        
                        <label>Quiz order: </label>
                        <input type="text" name="quiz_order" class="form-control"><br>
                        
                        <label>Quiz Question: </label>
                        <input type="text" class="form-control" name="quiz_question"> <br>
                        
                        <label >Quiz image:</label>
                        <input type="file" name="quiz_image" class="form-control" accept="image/*" capture="user"><br>
                        
                        <label>Answer 1: *</label>
                        <input type="text" class="form-control" name="answer1"> <br>

                        <label>Answer 2: *</label>
                        <input type="text" class="form-control" name="answer2"> <br>

                        <label>Answer 3: *</label>
                        <input type="text" class="form-control" name="answer3"> <br>

                        <label>Answer 4: </label>
                        <input type="text" class="form-control" name="answer4"> <br>

                        <label>Correct answer: </label>
                        <input type="text" class="form-control" name="correct_answer"> <br>

                        <label>Explanation: </label>
                        <textarea type="text" name="answer_explanation" rows="20" cols="30"class="form-control"></textarea><br>

                        <center>
                            <input type="submit" name="add_quiz" value="Add" class="btn btn-primary">
                        </center><br>
                
                <?php
                //add a variable to know the last quiz id
                    if(isset($_GET['add_quiz'])){
                        $quiz_order_error = $quiz_question_error = $quiz_answer1_error ="";
                        $quiz_answer2_error = $quiz_answer3_error = $quiz_answer4_error = "";
                        $correct_answer_error = $answer_explanation_error = "";
                        $lesson_id = $_GET['lesson_id'];
                        if(empty($_GET['quiz_order'])){
                            $quiz_order_error = "Name is required";
                        }
                        else {
                            $quiz_order = $_GET['quiz_order'];
                        }
                        if(empty($_GET['quiz_question'])){
                            $quiz_question_error = "Name is required";
                        }
                        else {
                            $quiz_question = $_GET['quiz_question'];
                        }
                        if(empty($_GET['answer1'])){
                            $answer1_error = "Name is required";
                        }
                        else {
                            $answer1 = $_GET['answer1'];
                        }
                        if(empty($_GET['answer2'])){
                            $answer2 = "Name is required";
                        }
                        else {
                            $answer2 = $_GET['answer2'];
                        }
                        if(empty($_GET['answer3'])){
                            $answer3_error = "Name is required";
                        }
                        else {
                            $answer3 = $_GET['answer3'];
                        }
                        if(empty($_GET['answer4'])){
                            $answer4 = "";
                        }
                        else {
                            $answer4 = $_GET['answer4'];
                        }
                        if(empty($_GET['correct_answer'])){
                            $correct_answer_error = "Name is required";
                        }
                        else {
                            $correct_answer = $_GET['correct_answer'];
                        }
                        if(empty($_GET['answer_explanation'])){
                            $answer_explanation = "";
                        }
                        else {
                            $answer_explanation = $_GET['answer_explanation'];
                        }
                        if($_GET['quiz_image'])
                            $quiz_image = 1;
                        else
                            $quiz_image = 0;
                        mysqli_query($conn_content,"INSERT INTO `quizzes`(`lesson_id`, `quiz_order`, 
                                `quiz_question`, `answer1`, `answer2`, `answer3`, `answer4`,
                                `correct_answer`, `answer_explanation`,`quiz_image`)
                                VALUES ($lesson_id,$quiz_order,'$quiz_question','$answer1',
                                '$answer2','$answer3','$answer4','$correct_answer',
                                '$answer_explanation','$quiz_image')");
                            echo "quiz added";
                    }        
                ?>
            </form>
        </div>
    </body>
</html>