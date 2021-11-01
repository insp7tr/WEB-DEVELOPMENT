<!-- Menu -->
<?php include('partials/menu.php') ?>

<!-- Main Content Starts here -->
<section class="main-content">
    <div class="wrapper">
        <h1>Update Password for Admin</h1>
        <br> <br>

        <?php   
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" placeholder="Current password"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
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
    
    
    // Step 1: check whether the submit button is functional
    if(isset($_POST['submit']))
    {
        // Step 2: get data into variables
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // Step 3: 
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        // Step 4: execute query
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // what to do after completed
        if($res == TRUE)
        {
            //create a session variable to display message
            $count = mysqli_num_rows($res);
            if($count == 1)
            {
                if($new_password == $confirm_password)
                {
                    $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE)
                    {
                        $_SESSION['change-pass'] = "<div class='success'>Password change successful</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        $_SESSION['change-pass'] = "<div class='error'>Error changing password</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    $_SESSION['pass-not-match'] = "<div class='error'>Password entered was wrong.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        
    }
?>
