<?php
session_start();
if(isset($_SESSION['admin_id']) || isset($_SESSION['teacher_id'])){}
else header("Location:/doit/login.php");
include("conn.php");
$lesson_id = $_GET['lesson_id'];
$lesson_data = mysqli_query($conn_content, "SELECT `lesson_id`, `lesson_name`, `lesson_subject`,
        `lesson_content1`, `lesson_content2`, `lesson_content3`, `lesson_content4`, `lesson_content5`,
        `lesson_content6`, `lesson_content7`, `lesson_content8`, `lesson_content9`, `lesson_content10`,
        `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`,
        `image10`, `quizzes_num`, `complete_num`
        FROM `lessons`
        WHERE `lesson_id`= $lesson_id");
$lesson_data = mysqli_fetch_assoc($lesson_data);
if(!isset($_GET['edit_lesson'])){
    $lesson_id          = $lesson_data['lesson_id'];
    $lesson_name        = $lesson_data['lesson_name'];
    $lesson_subject    = $lesson_data['lesson_subject'];
    $lesson_content1    = $lesson_data['lesson_content1'];
    $lesson_content2    = $lesson_data['lesson_content2'];
    $lesson_content3    = $lesson_data['lesson_content3'];
    $lesson_content4    = $lesson_data['lesson_content4'];
    $lesson_content5    = $lesson_data['lesson_content5'];
    $lesson_content6    = $lesson_data['lesson_content6'];
    $lesson_content7    = $lesson_data['lesson_content7'];
    $lesson_content8    = $lesson_data['lesson_content8'];
    $lesson_content9    = $lesson_data['lesson_content9'];
    $lesson_content10   = $lesson_data['lesson_content10'];  

    $image1 = $lesson_data['image1'];
    $image2 = $lesson_data['image2'];
    $image3 = $lesson_data['image3'];
    $image4 = $lesson_data['image4'];
    $image5 = $lesson_data['image5'];
    $image6 = $lesson_data['image6'];
    $image7 = $lesson_data['image7'];
    $image8 = $lesson_data['image8'];
    $image9 = $lesson_data['image9'];
    $image10 = $lesson_data['image10'];

}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Add a new lesson</title>
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
                        <li class="active"><a href="all_lessons.php">See all lessons</a></li>
                    
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
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228)";>
                        <div class="panel panel-heading" style="height: 100px;">
                            <center><h1>Edit lesson</h1></center> 
                        </div>
                        <div class="panel-body">
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" style="padding-left: 20px; padding-right:20px">
                    <?php
                        // $lesson_data = mysqli_query($conn_content, "SELECT `lesson_id`, `lesson_name`,
                        //         `lesson_subject`, `lesson_content1`, `lesson_content2`, `lesson_content3`,
                        //         `lesson_content4`, `lesson_content5`, `lesson_content6`, `lesson_content7`,
                        //         `lesson_content8`, `lesson_content9`, `lesson_content10`, `image1`,
                        //         `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`,
                        //         `image9`, `image10`, `quizzes_num`, `complete_num`
                        //         FROM `lessons`
                        //         WHERE `lesson_id`= $lesson_id")
                    ?>
                    <label>Lesson ID</label>
                        <input  id="id" type="text" name="lesson_id" class="form-control" value="<?php echo $lesson_id?>" readonly><br>
                            <!--readonly-->

                        <label>Lesson name: </label>
                        <input type="text" name="lesson_name" class="form-control" required pattern="^[a-zA-Z-' _]{3,20}$" maxlength="20" value="<?php if(isset($lesson_name
                                )) echo $lesson_name?>" placeholder="only digits, letters, -, _ and spaces are allowed"><br>

                        <label>Lesson subject: </label>
                        <input type="text" class="form-control" name="lesson_subject" value="<?php if(isset(
                                $lesson_subject)) echo $lesson_subject?>" required maxlength='20' pattern="^[a-zA-Z-' _]{3,20}$"
                                placeholder="only digits, letters, -, _ and spaces are allowed"> <br>
                        
                        <label>Lesson content1: </label>
                        <textarea type="text" name="lesson_content1" rows="20" cols="30"class="form-control"><?php echo $lesson_content1?></textarea><br>
                            <label >Lesson image 1:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content2: </label>
                            <textarea type="text" name="lesson_content2" rows="20" cols="30"class="form-control"><?php echo $lesson_content2?></textarea><br>
                            <label >Lesson image 2:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content3: </label>
                            <textarea type="text" name="lesson_content3" rows="20" cols="30"class="form-control"><?php echo $lesson_content3?></textarea><br>
                            <label >Lesson image 3:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content4: </label>
                            <textarea type="text" name="lesson_content4" rows="20" cols="30"class="form-control"><?php echo $lesson_content4?></textarea><br>
                            <label >Lesson image 4:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content5: </label>
                            <textarea type="text" name="lesson_content5" rows="20" cols="30"class="form-control"><?php echo $lesson_content5?></textarea><br>
                            <label >Lesson image 5:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content6: </label>
                            <textarea type="text" name="lesson_content6" rows="20" cols="30"class="form-control"><?php echo $lesson_content6?></textarea><br>
                            <label >Lesson image 6:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content7: </label>
                            <textarea type="text" name="lesson_content7" rows="20" cols="30"class="form-control"><?php echo $lesson_content7?></textarea><br>
                            <label >Lesson image 7:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content8: </label>
                            <textarea type="text" name="lesson_content8" rows="20" cols="30"class="form-control"><?php echo $lesson_content8?></textarea><br>
                            <label >Lesson image 8:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content9: </label>
                            <textarea type="text" name="lesson_content9" rows="20" cols="30"class="form-control"><?php echo $lesson_content9?></textarea><br>
                            <label >Lesson image 9:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label>Lesson content10: </label>
                            <textarea type="text" name="lesson_content10" rows="20" cols="30"class="form-control"><?php echo $lesson_content10?></textarea><br>
                            <label >Lesson image 10:</label>
                        <input type="file" name="lesson_picture" class="form-control" accept="image/*" capture="user" value=1><br>
                        
                    <center><input type="submit" name="add_lesson" value="Add" class="btn btn-primary"></center><br>
                
                <?php
                //add a variable to know the last lesson id
                    if(isset($_GET['add_lesson'])){
                        $lesson_name_error = $lesson_subject_error = $lesson_content1_error = "";
                        $lesson_content2_error = $lesson_content3_error = $lesson_content4_error  = "";
                        $lesson_content5_error = $lesson_content6_error = $lesson_content7_error  = "";
                        $lesson_content8_error = $lesson_content9_error = $lesson_content10_error  = "";
                        $image1_error = $image2_error = $imag3_error = $image4_error = "";
                        $image5_error = $imag6_error = $image7_error = $image8_error = "";
                        $imag9_error = $imag10_error = "";
                                
                        if(empty($_GET['lesson_name'])){
                            $lesson_name_error = "Name is required";
                        } // lesson_name
                        else {
                            $lesson_name = $_GET['lesson_name'];
                            if(!preg_match("/^[a-zA-Z-' _]*$/", $lesson_name))
                                $lesson_name_error = "Only letters and white space allowed";
                        }

                        if(empty($_GET['lesson_subject'])){
                            $lesson_subject_error = "Subject is required";
                        }// lesson_subject
                        else {
                            $lesson_name = $_GET['lesson_name'];
                            if(!preg_match("/^[a-zA-Z-' _]*$/", $lesson_name))
                                $lesson_name_error = "Only letters and white space allowed";
                        }
                        
                        if(!empty($_GET['lesson_content1'])){
                            $lesson_content1 = $_GET['lesson_content1'];
                        }
                        else $lesson_content1 = "null";
                        if(!empty($_GET['lesson_content2'])){
                            $lesson_content2 = $_GET['lesson_content2'];
                        }
                        else $lesson_content2 = "null";
                        if(!empty($_GET['lesson_content3'])){
                            $lesson_content3 = $_GET['lesson_content3'];
                        }
                        else $lesson_content3 = "null";
                        if(!empty($_GET['lesson_content4'])){
                            $lesson_content4 = $_GET['lesson_content4'];
                        }
                        else $lesson_content4 = "null";
                        if(!empty($_GET['lesson_content5'])){
                            $lesson_content5 = $_GET['lesson_content5'];
                        }
                        else $lesson_content5 = "null";
                        if(!empty($_GET['lesson_content6'])){
                            $lesson_content6 = $_GET['lesson_content6'];
                        }
                        else $lesson_content6 = "null";
                        if(!empty($_GET['lesson_content7'])){
                            $lesson_content7 = $_GET['lesson_content7'];
                        }
                        else $lesson_content7 = "null";
                        if(!empty($_GET['lesson_content8'])){
                            $lesson_content8 = $_GET['lesson_content8'];
                        }
                        else $lesson_content8 = "null";
                        if(!empty($_GET['lesson_content9'])){
                            $lesson_content9 = $_GET['lesson_content9'];
                        }
                        else $lesson_content9 = "null";
                        if(!empty($_GET['lesson_content10'])){
                            $lesson_content10 = $_GET['lesson_content10'];
                        }
                        else $lesson_content10 = "null";

                        if(!empty($_GET['image1'])){
                            $image1 = $_GET['image1'];
                        }
                        else $image1 = "null";
                        if(!empty($_GET['image2'])){
                            $image2 = $_GET['image2'];
                        }
                        else $image2 = "null";
                        if(!empty($_GET['image3'])){
                            $image3 = $_GET['image3'];
                        }
                        else $image3 = "null";
                        if(!empty($_GET['image4'])){
                            $image4 = $_GET['image4'];
                        }
                        else $image4 = "null";
                        if(!empty($_GET['image5'])){
                            $image5 = $_GET['image5'];
                        }
                        else $image5 = "null";
                        if(!empty($_GET['image6'])){
                            $image6 = $_GET['image6'];
                        }
                        else $image6 = "null";
                        if(!empty($_GET['image7'])){
                            $image7 = $_GET['image7'];
                        }
                        else $image7 = "null";
                        if(!empty($_GET['image8'])){
                            $image8 = $_GET['image8'];
                        }
                        else $image8 = "null";
                        if(!empty($_GET['image9'])){
                            $image9 = $_GET['image9'];
                        }
                        else $image9 = "null";
                        if(!empty($_GET['image10'])){
                            $image10 = $_GET['image10'];
                        }
                        else $image10 = "null";
                        

                        $lesson_name = $_GET['lesson_name'];
                        $lesson_subject = $_GET['lesson_subject'];

                        if(empty($lesson_name_error) && empty($lesson_subject_error) && 
                            empty($lesson_content1_error) && empty($lesson_content2_error) &&
                            empty($lesson_content3_error) &&  empty($lesson_content4_error)&&
                            empty($lesson_content5_error) &&  empty($lesson_content6_error) &&
                            empty($lesson_content7_error) &&  empty($lesson_content8_error) &&
                            empty($lesson_content9_error) &&  empty($lesson_content10_error) &&
                            empty($image1_error) && empty($image2_error) && empty($image3_error) &&
                            empty($image4_error) && empty($image5_error) && empty($image6_error) &&
                            empty($image7_error) && empty($image8_error) && empty($image9_error) &&
                            empty($image10_error)){

                            mysqli_query($conn_content, "UPDATE `lessons`
                                    SET `lesson_name`='$lesson_name',`lesson_subject`='$lesson_subject ',
                                    `lesson_content1`='$lesson_content1',
                                    `lesson_content2`='$lesson_content2,
                                    `lesson_content3`='$lesson_content3',
                                    `lesson_content4`='$lesson_content4',
                                    `lesson_content5`='$lesson_content5',
                                    `lesson_content6`='$lesson_content6',
                                    `lesson_content7`='$lesson_content7',
                                    `lesson_content8`='$lesson_content8',
                                    `lesson_content9`='$lesson_content9',
                                    `lesson_content10`='$lesson_content10',
                                    `image1`=$image1,`image2`=$image2,`image3`=$image3,
                                    `image4`=$image4,`image5`=$image5,`image6`=$image6,
                                    `image7`=$image7,`image8`=$image8,`image9`=$image9,
                                    `image10`=$image10
                                    WHERE `lesson_id`=$lesson_id");
                            echo "Lesson added<br>";
                            }
                    }// submit
                ?>
            </form>
        </div>
        <script src="/doit/js/jquery.min.js"></script>
        <script src="/doit/js/bootstrap.min.js"></script>
    </body>
</html>