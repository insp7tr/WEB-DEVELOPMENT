    <!-- Menu -->
    <?php include('partials/menu.php') ?>

    <!-- Main Content Starts Here-->
    <section class="main-content">
        <div class="wrapper">
            <h1>Manage Categories</h1>
            <br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <!-- button to add category -->
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

            <br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>John Smith</td>
                    <td>jojosmith</td>
                    <td>
                        <a href="" class="btn-secondary">Update Admin</a>
                        <a href="" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tom Hank</td>
                    <td>hankypanky123</td>
                    <td>
                        <a href="" class="btn-secondary">Update Admin</a>
                        <a href="" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Patricia Abrahams</td>
                    <td>patty1012</td>
                    <td>
                        <a href="" class="btn-secondary">Update Admin</a>
                        <a href="" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>
            </table>
        </div>
    </section>
    <!-- Main Content Ends Here -->

    <!-- Footer -->
    <?php include('partials/footer.php') ?>