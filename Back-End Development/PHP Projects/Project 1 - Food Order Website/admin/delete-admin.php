<?php
    //Include constants.php file here
    include("../config/constants.php");

    //Step 1: Get the ID of admin to be deleted
    $id = $_GET['id'];

    //Step 2: create sql query to delete
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    
    //Step 3: Execute the query
    $res = mysqli_query($conn, $sql);
    
    //Step 4: Check whether the query executed successfully or not
    if($res==TRUE)
    {
        //Query executed successfully
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        
        //step 5: redirect to admin page with message success or error
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Query did not execute successfully
        //Query executed successfully
        $_SESSION['delete'] = "<div class='success'>Failed to delete admin, try again later</div>";
        
        //step 5: redirect to admin page with message success or error
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    
?>