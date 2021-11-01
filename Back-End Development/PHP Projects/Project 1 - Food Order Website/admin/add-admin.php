<!-- Menu -->
<?php include('partials/menu.php') ?>

<!-- Main Content Starts here -->
<section class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php
            if(isset($_SESSION['add'])){ //checjing if session is set or not
                echo $_SESSION['add'];  // display session message
                unset($_SESSION['add']);    //removes session message
            }
        ?>
        <br> <br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter a username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter a password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<!-- Main Content Ends here -->

<!-- Footer -->
<?php include('partials/footer.php') ?>

<?php
    // Process the value form form and save it in database
    // check whether the submit button is functional


    if(isset($_POST['submit']))
    {
        // get data into variables
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // sql query to save database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // execute query and save data in database        
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // what to do after completed
        if($res == TRUE)
        {
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            //redirect page Manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //create a session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to add admin</div>";
            //redirect page Manage admin
            header('location:'.SITEURL.'admin/add-admin.php');
        }
    }
?>
