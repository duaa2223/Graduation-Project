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
                        <li class="active"><a href="/doit/students/student_home.php">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li> -->
                        <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<?php
session_start();
    include "conn.php";

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
    if(isset($_GET['out'])){
        session_destory();
        header("Location:/doit/login.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Student Profile</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/styleprofile.css'>
    </head>
    <body>

        
        <div class="container" >
            <div class="row">
                <div class=" col-xs-6 col-sm-3 col-md-3 col-lg-3">
                </div>
                <div class="col-sm-6 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228) ;">
                        <div class="panel panel-heading" style="height: 100px;">
                            <center>
                                <h1>Student Profile</h1>
                            </center> 
                        </div>
                        <div class="panel-body">
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" enctype="multipart/form-data" style="padding-left: 20px; padding-right:20px" >  
            <img src="/doit/images/user.jpg" height="100" width="100" style="border:solid black 0.5px; border-radius:50px"><br>
                    <!--get_student_picture.php?student_id=$row[student_id]-->
                <label>Change you picture:</label>
                <input type="file" name="student_picture"  class="form-control" accept="image/*" capture="user"><br>
                
                <label> ID </label>
                <input  id="id" type="text" name="student_id" value="<?php echo $student_id?>" class="form-control" readonly><br>
                
                <label>Name: </label>
                <input type="text" name="student_name" class="form-control" value="<?php echo $student_data['student_name'];?>"><br>
                
                <label for="student_gender">Gender: </label><br><br>
                <label for="Male" >Male</label>
                <input type="radio" name="student_gender" class="form-control" value="0" <?php if ($student_data['student_gender'] == 0) echo 'checked'; ?>><br>
                <label for='Female'>Female</label>
                <input type="radio" name="student_gender" value="1" class="form-control" <?php if ($student_data['student_gender'] == 1) echo 'checked'; ?>><br>
                
                <label>Email: </label>
                <input type="email" name="student_email"  class="form-control" value="<?php echo $student_data['student_email']?>"> <br>
                
                <label>Phone: </label>
                <input type="text" name="student_phone" class="form-control" value="<?php echo $student_data['student_phone']?>" min="1950-01-01" max="2010-12-31"> <br>
                
                <label>Birthdate: </label>
                <input type="date" name="student_birthdate" class="form-control" value="<?php echo $student_data['student_birthdate']?>"><br>
                
                <label>Country: </label>
                <input type="text" name="student_country" class="form-control" value="<?php echo $student_data['student_country'];?>"><br>
                
                <label>City: </label>
                <input type="text" name="student_city" class="form-control"  value="<?php echo $student_data['student_city'];?>"><br>
                
                <label for="is_university">Are you a student at university? </label>
                <input type="radio" name="is_university" value=1 class="form-control" <?php if ($student_data['is_university'] == 1) echo 'checked'; ?>><br>
                <label>YES</label>
                <input type="radio" name="is_university" value=0 class="form-control" <?php if ($student_data['is_university'] == 0) echo 'checked'; ?>><br>
                <label>NO</label>
            <center>
                <input type="submit" name="edit_student" value="Save" class="btn btn-primary">
            </center><br>
                
                <?php
                    if(isset($_GET['edit_student'])){
                        $student_name_error = $student_password_error = $student_gender_error = $student_email_error ="";
                        $student_email_error = $student_phone_error  = $student_birthdate_error = "";
                        $student_country_error = $student_city_error = $is_university_error = "";

                        if(isset($student_data['student_name'])){
                            $student_name       = $student_data['student_name'];
                            $student_name = $_GET['student_name'];
                            if(!preg_match("/^[a-zA-Z-' ]*$/", $student_name))
                                $student_name_error = "Only letters and white space allowed";
                        }
                        if(isset($student_data['student_password'])){
                            $student_password   = $student_data['student_password'];

                        }
                        if(isset($student_data['student_gender'])){
                            $student_gender     = $student_data['student_gender'];

                        }
                        if(isset($student_data['student_email'])){
                            $student_email      = $student_data['student_email'];
                            $student_email   = $_GET['student_email'];
                            if(!filter_var($student_email, FILTER_VALIDATE_EMAIL))
                                $student_email_error = "Invalid email format";
                        }
                        if(isset($student_data['student_phone'])){
                            $student_phone      = $student_data['student_phone'];
                            $student_phone   = $_GET['student_phone'];
                            if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$student_phone))
                                $student_phone_error    = "Invalid phone number";
                        }
                        if(isset($student_data['student_birthdate'])){                        
                            $student_birthdate  = $student_data['student_birthdate'];

                        }
                        if(isset($student_data['student_picture'])){
                            $student_picture    = $student_data['student_picture'];

                        }
                        if(isset($student_data['student_country'])){
                            $student_country    = $student_data['student_country'];
                            $student_country = $_GET['student_country'];
                            if(!preg_match("/^[a-zA-Z-' ]*$/", $student_country))
                                $student_country_error = "Only letters and white space allowed";
                        }
                        if(isset($student_data['student_city'])){
                            $student_city       = $student_data['student_city'];

                        }
                        if(isset($student_data['is_university'])){
                            $is_university      = $student_data['is_university'];
                            $student_city = $_GET['student_city'];
                            if(!preg_match("/^[a-zA-Z-' ]*$/", $student_name))
                                $student_city_error = "Only letters and white space allowed";
                        }

                        $query="UPDATE `students` 
                        SET `student_name`='$student_name', `student_password`='$student_password',
                        `student_gender`='$student_gender',`student_email`='$student_email',
                        `student_phone`='$student_phone',`student_birthdate`='$student_birthdate',
                        `student_picture`='$student_picture',`student_country`='$student_country',
                        `student_city`='$student_city',`is_university`='$is_university'";

                        mysqli_query($conn_login, $query);
                    }
                ?>
            </form>
        </div>
    </body>
</html>
