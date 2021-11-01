<?php
    //Start Session
    session_start();

    //create constants and store non repeating values
    define('SITEURL', 'http://127.0.0.1/Project%207%20-%20Food%20Order%20Website%20(H,C,P)/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'project-7');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASS) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
?>