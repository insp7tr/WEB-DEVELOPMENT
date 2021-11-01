<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts here -->
<section class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['pass-not-match']))
            {
                echo $_SESSION['pass-not-match'];
                unset($_SESSION['pass-not-match']);
            }
            if(isset($_SESSION['change-pass']))
            {
                echo $_SESSION['change-pass'];
                unset($_SESSION['change-pass']);
            }
        ?>
        <br> <br>
        
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
                // query to get all from admin table
                $sql = "SELECT * FROM tbl_admin";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //check whether query is executed or not
                if($res==TRUE)
                {
                    //COUNT rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res); // function to get all the rows in database

                    //check the number of rows
                    if($count>0)
                    {
                        //we have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //using while loop to get all data from database
                            // while loop will run as long as we have data

                            //get individual data
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];

                            //display the values in table
                            ?>

                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $full_name ?></td>
                                <td><?php echo $username ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        //we do not have data in database
                    }
                }
            ?>
        </table>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Main Content Section Ends here -->

<!-- Footer -->
<?php include('partials/footer.php') ?>