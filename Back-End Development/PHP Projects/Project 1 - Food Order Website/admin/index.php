<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Menu -->
    <?php include('partials/menu.php') ?>
    
    <!-- Main Content Section Starts here -->
    <section class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <br><br>
            <?php

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            ?>
            <br><br>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                categories
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Main Content Section Ends here -->
    
    <!-- Footer -->
    <?php include('partials/footer.php') ?>
</body>
</html>