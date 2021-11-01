<!-- Menu -->
<?php include('partials/menu.php') ?>

<!-- Main Content Starts here -->
<section class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br>
        <?php
            // Step 1: Get the id of the selected admin
            $id=$_GET['id'];

            // step 2: create the sql query to get the details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            // step 3: execute the query
            $res = mysqli_query($conn, $sql);

            // step 4: check whether the query is executed or not
            if($res==true)
            {
                // step 5: check whether the data is available or not
                $count = mysqli_num_rows($res);
                
                // step 6: check whther we have data or not
                if($count==1)
                {
                    // step 7: get the details
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    // redirect to previous page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>
        <br> <br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Step 3: sql query to save database
        $sql = "UPDATE tbl_admin SET
            full_name='$full_name',
            username='$username' 
            WHERE id='$id'
        ";

        // Step 4: execute query and save data in database        
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // what to do after completed
        if($res == TRUE)
        {
            //create a session variable to display message
            $_SESSION['update'] = "<div class='success'>Admin Updated successfully</div>";
            //redirect page Manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //create a session variable to display message
            $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
            //redirect page Manage admin
            header('location:'.SITEURL.'admin/update-admin.php');
        }
    }
?>
