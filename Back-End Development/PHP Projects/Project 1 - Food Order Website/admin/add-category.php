<?php
    include('partials/menu.php');
?>

<section class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>
        <form action="" method="POST" enctype=”multipart/form-data”>
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <Input type="text" name="title" placeholder="category title"></Input>
                    </td>
                </tr>
                <tr>
                    <td>Select image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>           
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <Input type="radio" name="featured" value="Yes">Yes</Input>
                        <Input type="radio" name="featured" value="No">No</Input>
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <Input type="radio" name="active" value="Yes">Yes</Input>
                        <Input type="radio" name="active" value="No">No</Input>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        
    </div>
</section>

<?php
    include('partials/footer.php');
?>

<?php

            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                echo $_FILES['image'];
                die();

                /* if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    $source_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/category/".$image_name;
                    $upload = move_uploaded_file($source_path, $dest_path);

                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>failed to upload</div>";
            
                        header('location:'.SITEURL.'admin/add-category.php');
                    
                        //stop the process
                        die();
                    }
                }
                else
                {
                    $image = "";
                } */

                $sql = "INSERT INTO tbl_category SET 
                    title = '$title',
                    image_name = $image;
                    featured = '$featured',
                    active = '$active'
                    ";

                $res = mysqli_query($conn, $sql);

                if($res == TRUE)
                {
                    //create a session variable to display message
                    $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                    //redirect page Manage category
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //create a session variable to display message
                    $_SESSION['add'] = "<div class='error'>Failed to add category</div>";
                    //redirect page add category
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>