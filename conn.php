<?php
    $host       = "localhost";
    $user       = "root";
    $password   = "";
    $db_login   = "loginform";
    $db_content = "content";
    if($conn_login = mysqli_connect($host, $user, $password, $db_login));
        // echo "Connected to login<br>";
    else
         die("Not connected to login". mysqli_error($conn_login));
    if($conn_content = mysqli_connect($host, $user, $password, $db_content)){
        // echo "Connected to content<br>";
    }
    else
         die("Not connected to content". mysqli_error($conn_content));
?>