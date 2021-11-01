<?php

    include("../config/constants.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section class="login">
        <h1 class="text-center">login</h1>
        <br>
        <?php

        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }

        ?>
        <br><br>
        <form action="" method="POST" class="text-center">
            Username: 
            <input type="text" name="username" placeholder="Enter Username">    
            <br><br>
            Password:   
            <input type="password" name="password" placeholder="enter password">    
            <br><br>
            <input type="submit" name="submit" value="login" class="btn-primary">
            <br><br>
        </form>

        <p class="text-center">created by <a href="www.google.com">M.T. Patel</a></p>
    </section>
</body>
</html>

<?php

    //check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process logins
        //get data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql to check whether the user with username and password exists
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute query
        $res = mysqli_query($conn, $sql);

        //count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //found
            $_SESSION['login'] = "<div class='success'> login successful </div>";
            $_SESSION['user'] = $username; //check whether the user is logged or not and logout will unset it
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //not found
            $_SESSION['login'] = "<div class='error' class='text-center'> username or pass did not match </div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>