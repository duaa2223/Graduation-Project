<?php
session_start();
    if(isset($_SESSION['admin_id']) || isset($_SESSION['teacher_id'])){}
    else header("Location:/project1/login.php");
    include("conn.php");
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
                        <li class="active"><a href="/doit/lessons/all_lessons.php">See all lessons</a></li>
                    
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
                <div class=" col-xs-6 col-sm-3 col-md-3 col-lg-3 ">
                </div>
                <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228)";>
                        <div class="panel panel-heading" style="height: 100px;">
                            <center><h1>Add new lesson</h1></center> 
                        </div>
                        <div class="panel-body">
                        </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" encrypt="multipart/form-data" style="padding-left: 20px; padding-right:20px">
                    <?php
                        $lesson_id  = mysqli_query($conn_content, "show table status from content like 
                                'lessons';");
                        $lesson_id  = mysqli_fetch_assoc($lesson_id);
                        $lesson_id  = $lesson_id['Auto_increment'];
                    ?>
                        <label>Lesson ID</label>
                        <input  id="id" type="text" name="lesson_id" class="form-control" value="<?php echo $lesson_id?>" readonly><br>
                            <!--readonly-->

                        <label for="lesson_name">Lesson name: </label>
                        <input type="text" name="lesson_name" class="form-control" required pattern="^[a-zA-Z-' _]{3,20}$" maxlength="20" 
                                placeholder="only digits, letters, -, _ and spaces are allowed"><br>

                        <label for="lesson_subject">Lesson subject: </label>
                        <input type="text" class="form-control" name="lesson_subject" required maxlength='20'
                                pattern="^[a-zA-Z-' _]{3,20}$"
                                placeholder="only digits, letters, -, _ and spaces are allowed"> <br>
                        
                        <label for="lesson_content1">Lesson content1: </label>
                        <textarea type="text" name="lesson_content1" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 1:</label>
                        <input type="file" name="image1" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content2">Lesson content2: </label>
                            <textarea type="text" name="lesson_content2" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 2:</label>
                        <input type="file" name="image2" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content3">Lesson content3: </label>
                            <textarea type="text" name="lesson_content3" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 3:</label>
                        <input type="file" name="image3" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content4">Lesson content4: </label>
                            <textarea type="text" name="lesson_content4" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 4:</label>
                        <input type="file" name="image4" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content5">Lesson content5: </label>
                            <textarea type="text" name="lesson_content5" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 5:</label>
                        <input type="file" name="image5" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content6">Lesson content6: </label>
                            <textarea type="text" name="lesson_content6" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 6:</label>
                        <input type="file" name="image6" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content7">Lesson content7: </label>
                            <textarea type="text" name="lesson_content7" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 7:</label>
                        <input type="file" name="image7" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content8">Lesson content8: </label>
                            <textarea type="text" name="lesson_content8" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 8:</label>
                        <input type="file" name="image8" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content9">Lesson content9: </label>
                            <textarea type="text" name="lesson_content9" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 9:</label>
                        <input type="file" name="image9" class="form-control" accept="image/*" capture="user" value=1><br>
                            
                        <label for="lesson_content10">Lesson content10: </label>
                            <textarea type="text" name="lesson_content10" rows="20" cols="30"class="form-control"></textarea><br>
                            <label >Lesson image 10:</label>
                        <input type="file" name="image10" class="form-control" accept="image/*" capture="user" value=1><br>
                        
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
                        $lesson = "lesson";
                        $image = "image";
                                
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
                        else $lesson_content1 = "";
                        if(!empty($_GET['lesson_content2'])){
                            $lesson_content2 = $_GET['lesson_content2'];
                        }
                        else $lesson_content2 = "";
                        if(!empty($_GET['lesson_content3'])){
                            $lesson_content3 = $_GET['lesson_content3'];
                        }
                        else $lesson_content3 = "";
                        if(!empty($_GET['lesson_content4'])){
                            $lesson_content4 = $_GET['lesson_content4'];
                        }
                        else $lesson_content4 = "";
                        if(!empty($_GET['lesson_content5'])){
                            $lesson_content5 = $_GET['lesson_content5'];
                        }
                        else $lesson_content5 = "";
                        if(!empty($_GET['lesson_content6'])){
                            $lesson_content6 = $_GET['lesson_content6'];
                        }
                        else $lesson_content6 = "";
                        if(!empty($_GET['lesson_content7'])){
                            $lesson_content7 = $_GET['lesson_content7'];
                        }
                        else $lesson_content7 = "";
                        if(!empty($_GET['lesson_content8'])){
                            $lesson_content8 = $_GET['lesson_content8'];
                        }
                        else $lesson_content8 = "";
                        if(!empty($_GET['lesson_content9'])){
                            $lesson_content9 = $_GET['lesson_content9'];
                        }
                        else $lesson_content9 = "";
                        if(!empty($_GET['lesson_content10'])){
                            $lesson_content10 = $_GET['lesson_content10'];
                        }
                        else $lesson_content10 = "null";

                        if(!empty($_GET['image1'])){
                            $image1 = 1;
                            }
                        else $image1 = 0;
                        if(!empty($_GET['image2'])){
                            $image2 = 1;
                        }
                        else $image2 = 0;
                        if(!empty($_GET['image3'])){
                            $image3 = 1;
                        }
                        else $image3 = 0;
                        if(!empty($_GET['image4'])){
                            $image4 = 1;
                        }
                        else $image4 = 0;
                        if(!empty($_GET['image5'])){
                            $image5 = 1;
                        }
                        else $image5 = 0;
                        if(!empty($_GET['image6'])){
                            $image6 = 1;
                        }
                        else $image6 = 0;
                        if(!empty($_GET['image7'])){
                            $image7 = 1;
                        }
                        else $image7 = 0;
                        if(!empty($_GET['image8'])){
                            $image8 = 1;
                        }
                        else $image8 = 0;
                        if(!empty($_GET['image9'])){
                            $image9 = 1;
                        }
                        else $image9 = 0;
                        if(!empty($_GET['image10'])){
                            $image10 = 1;
                        }
                        else $image10 = 0;
                        

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

                            mysqli_query($conn_content, "INSERT INTO `lessons`(`lesson_name`,
                                    `lesson_subject`, `lesson_content1`, `lesson_content2`,
                                    `lesson_content3`, `lesson_content4`, `lesson_content5`,
                                    `lesson_content6`, `lesson_content7`, `lesson_content8`,
                                    `lesson_content9`, `lesson_content10`, `image1`, `image2`,
                                    `image3`, `image4`, `image5`, `image6`, `image7`, `image8`,
                                    `image9`, `image10`) 
                                    VALUES ('$lesson_name','$lesson_subject','$lesson_content1',
                                    '$lesson_content2','$lesson_content3','$lesson_content4',
                                    '$lesson_content5','$lesson_content6','$lesson_content7',
                                    '$lesson_content8','$lesson_content9','$lesson_content10',
                                    '$image1','$image2','$image3','$image4','$image5',
                                    '$image6','$image7','$image8','$image9','$image10')");
                            echo "Lesson added<br>";
                            }
                    }// submit
                ?>
            </form>
        </div>
    </body>
</html>