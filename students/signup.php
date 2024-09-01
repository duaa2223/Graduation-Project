<?php 
session_start();
    include("conn.php"); 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Signup</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='/css/style1.css'>
        <link rel="stylesheet" href="/doit/css/bootstrap.min.css"/>
        <link rel='stylesheet' type='text/css' media='screen' href='/doit/css/stylesignup.css'>
        <style>
            .error{
                color   :red;
            }
            input:invalid {
                border: 2px dashed red;
            }

            input:invalid:required {
                background-image: linear-gradient(to right, pink, lightgreen);
            }
            input:valid {
                border: 2px solid black;
            }
            input:focus:invalid {
                box-shadow: none;
            }
        </style>
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
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="/doit/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        <li><a href="/doit/students/signup.php"><span class="glyphicon glyphicon-user"></span> sign up</a></li>
                        <li><a href="/doit/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" >
            <div class="row">
                <div class=" col-xs-6 col-sm-3 col-md-3 col-lg-3">
                </div>
                <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-info" style="background-color:rgb(185, 223, 228) ;">
                        <div class="panel panel-heading" style="height: 100px;"><center>
                            <h1>Add new student</h1></center> 
                        </div>
                        <div class="panel-body">
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" style="padding-left: 20px; padding-right:20px">
                            <label > Your image:</label>
                            <input type="file" name="student_picture" class="form-control" accept="image/*" capture="user">
                                <br>
                            <label>Name: </label><span class='error'> *</span>
                            <input type="text" name="student_name" class="form-control" required pattern="/^[a-zA-Z0-9'- _]+$/" maxlength="20"
                            placeholder="only digits, letters, -, _ and spaces are allowed, with a maximum of 20 characters">
                                <span class='error'><?php if(!empty($student_name_error)) echo $student_name_error?></span><br>
                            <label>Password: </label><span class='error'> *</span>
                            <input type="password" name="student_password"class="form-control" required maxlength="50" minlength="8">
                                <span class='error'><?php if(!empty($student_password_error)) echo $student_password_error?></span><br>
                            <label>Gender: </label><span class='error'> *</span><br>
                            <label>Male</label>
                            <input type="radio" name="student_gender" value="0" default class="form-control" >
                            <label>Female</label>
                            <input type="radio" name="student_gender" value="1" class="form-control" >
                                <br>
                            <label>Email: </label><span class='error'> *</span>
                            <input type="email" name="student_email" class="form-control" required pattern="^[a-A-Z0-9_.]+@[gmail|hotmail|yahoo|server].com$">
                                <span class='error'><?php if(!empty($student_email_error)) echo $student_email_error?></span><br>
                            <label>Phone: </label><span class='error'> *</span>
                            <input type="text" name="student_phone" class="form-control" required pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$">
                                <span class='error'><?php if(!empty($student_phone_error)) echo $student_phone_error?></span><br>
                            <label>Birthdate: </label><span class='error'> *</span>
                            <input type="date" name="student_birthdate"class="form-control" min="1950-01-01" max="2010-12-31">
                                <span class='error'></span><br>
                            <label>Country: </label><span class='error'> *</span>
                            <input type="text" name="student_country" class="form-control" required pattern="^[a-zA-Z-' ]+$" maxlength="20"
                            placeholder="only digits, letters, -, _ and spaces are allowed, with a maximum of 20 characters">
                                <span class='error'><?php if(!empty($student_country_error)) echo $student_country_error?></span><br>
                            <label>City: </label><span class='error'> *</span>
                            <input type="text" name="student_city" class="form-control" required pattern="^[a-zA-Z-' ]+$" maxlength="20"
                            placeholder="only digits, letters, -, _ and spaces are allowed, with a maximum of 20 characters">
                                <span class='error'><?php if(!empty($student_city_error)) echo $student_city_error?></span><br>
                            <label>Are you a university student?</label><span class='error'> *</span><br>
                            <label>Yes</label>
                            <input type="radio" name="is_university" value="1" default class="form-control"  >
                            <label>No</label>
                            <input type="radio" name="is_university" value="0" class="form-control" > 
                                <span class='error'></span><br>
                            <center>
                                <input type="submit" name="add_student" value="Add" class="btn btn-primary" >
                            </center>
                            <?php
                                if(isset($_GET['add_student'])){
                                    $student_name_error = $student_password_error = $student_gender_error = $student_email_error ="";
                                    $student_email_error = $student_phone_error  = $student_birthdate_error = "";
                                    $student_country_error = $student_city_error = $is_university_error = "";
                                    if(empty($_GET['student_name'])){
                                        $student_name_error = "Name is required";
                                    }
                                    else {
                                        $student_name = $_GET['student_name'];
                                        if(!preg_match("/^[a-zA-Z0-9-' ]*$/", $student_name))
                                            $student_name_error = "Only letters and white space allowed";
                                    }
                                    if(empty($_GET['student_password'])){
                                        $student_password_error = "Password is required";
                                    }
                                    else {
                                        $student_password   = $_GET['student_password'];
                                    }
                                    if(empty($_GET['student_gender'])){
                                        $student_gender_error = "Gender is required";
                                    }
                                    else{
                                        $student_gender = $_GET['student_gender'];
                                        if(!preg_match("/^[a-zA-Z-' ]*$/", $student_gender))
                                            $student_gender_error = "Only letters and white space allowed";
                                    }
                                    if(empty($_GET['student_email'])){
                                        $student_email_error    = "Email is required";
                                    }
                                    else {
                                        $student_email   = $_GET['student_email'];
                                        if(!filter_var($student_email, FILTER_VALIDATE_EMAIL))
                                            $student_email_error = "Invalid email format";
                                    }
                                    if(empty($_GET['student_phone'])){
                                        $student_phone_error    = "Phone number is required";
                                    }
                                    else {
                                        $student_phone   = $_GET['student_phone'];
                                        if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$student_phone))
                                            $student_phone_error    = "Invalid phone number";
                                    }
                                    if(empty($_GET['student_birthdate'])){
                                        $student_birthdate_error = "Birth date is required";
                                    }
                                    else{
                                        $student_birthdate = $_GET['student_birthdate'];
                                    }
                                    if(empty($_GET['student_country'])){
                                        $student_country_error = "Country is required";
                                    }
                                    else {
                                        $student_country = $_GET['student_country'];
                                        if(!preg_match("/^[a-zA-Z-' ]*$/", $student_country))
                                            $student_country_error = "Only letters and white space allowed";
                                    }
                                    if(empty($_GET['student_city'])){
                                        $student_city_error = "City is required";
                                    }
                                    else {
                                        $student_city = $_GET['student_city'];
                                        if(!preg_match("/^[a-zA-Z-' ]*$/", $student_name))
                                            $student_city_error = "Only letters and white space allowed";
                                    }
                                    // country, city, is_university
                                    function test_input($data){
                                        $data   = trim($data);
                                        $data   = stripslashes($data);
                                        $data   = htmlspecialchars($data);
                                        return $data;
                                    }
                                    
                                    $student_name    = $_GET['student_name'];
                                    $student_password = $_GET['student_password'];
                                    $student_gender = $_GET['student_gender'];
                                    $student_email = $_GET['student_email'];
                                    $student_phone = $_GET['student_phone'];
                                    $student_birthdate = $_GET['student_birthdate'];
                                    $student_country = $_GET['student_country'];
                                    $student_city = $_GET['student_city'];
                                    $is_university = $_GET['is_university'];
                                    $student_picture = $_GET['student_picture'];
                                    //birthdate country city is_university


                                    if(empty($student_email_error) && empty($student_name_error) && 
                                        empty($student_password_error) && empty($student_phone_error)){
                                    mysqli_query($conn_login, "INSERT INTO `students`(`student_name`,
                                            `student_password`,`student_gender`, `student_email`,
                                            `student_phone`, `student_birthdate`,`student_picture`,
                                            `student_country`, `student_city`, `is_university`)
                                            VALUES ('$student_name','$student_password','$student_gender',
                                            '$student_email','$student_phone','$student_birthdate',
                                            '$student_picture','$student_country','$student_city',
                                            '$is_university')");
                                    echo "student added<br>";
                                    }
                                }// submit 
                            ?>
                        </form>
                    </div>
                </div>
                <div class=" col-xs-6 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
        </div>

        <script src="/doit/js/jquery.min.js"></script>
        <script src="/doit/js/bootstrap.min.js"></script>
    </body>
</html>