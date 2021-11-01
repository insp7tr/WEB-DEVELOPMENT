<?php 

    //authorization access control
    // check whether the user is logged in or not
    if(!isset($_SESSION['user'])) // if user session is not set 
    {
        // user is not logged in
        // redirect to login
        $_SESSION['no-login-message'] = "<div class='error'>Please login to access admin</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>