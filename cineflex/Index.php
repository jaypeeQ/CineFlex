<?php
session_start();
require_once 'Private/connection.php';
use Cineflex\Classes\Database\DBcommands;

?>

<!DOCTYPE>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="main-container">


    <div class="row">
        <header>
        <?php include 'Includes/navbar.inc.php'; ?>

    </header>
    </div>

    <div class="row">

            <main>

            <div>
                <?php

                $page = '';
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $_SESSION['message'] = NULL;
                }
                else {
                    $page = 'home';
                }
                include 'Includes/'.$page.'.inc.php';
                ?>
            </div>
        </main>
        </div>




    </div>

</div>

</body>
</html>
