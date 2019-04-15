<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include 'config/database.php';
include 'config/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Include component before content
    include 'views/components/navigation.php';
    ?>
    <!-- wrap the content with div by default -->
    <div id="content">
        <?php
        // Simple Router from segment
        $page = (isset($_GET['page'])) ? $_GET['page'] : null;

        if ($page != null ) {
            // Check if file exists or not
            if (file_exists("views/pages/{$page}.php")) {
                include "views/pages/{$page}.php";
            } else {
                // If file not found, then show not found page
                include "views/pages/page-not-found.php";
            }
        } else {
            // Default page is home
            include "views/pages/home.php";
        }
        ?>
    </div>
    <?php
    // Include component after content
    include 'views/components/footer.php';
    ?>
</body>
</html>