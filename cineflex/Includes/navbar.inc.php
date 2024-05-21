<?php //link template ?>
<!--<li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
</li>-->

<!-- Black background with white text -->
<nav class="navbar navbar-expand-sm navbar-grey" style="color: #dc3545; background-color: #F6F2F6">`
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=home">
            <img src="Images/cineflex%20logo%203.png" style="max-height: 64px">
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php?page=nowshowing">Now Showing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php?page=comingsoon">Coming Soon</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=films">Films</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=cinemas">Cinemas</a>
            </li>
            <?php
            if (!isset($_SESSION['loggedin'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=register">Register</a>
                </li>
            <?php }
            if (isset($_SESSION['loggedin'])) {
                if ($_SESSION['loggedin'] == true) {
                    if(isset($_SESSION['roleid'])) {


                if ($_SESSION['roleid'] >= 1) { ?>
                            <li class="nav-item">
                                <a class="btn btn-warning nav-link" href="index.php?page=managecrud">Manage</a>
                            </li>

                <?php

                }
            }
                }?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=logout">Logout</a>
            </li> <?php
            }
            ?>

        </ul>
    </div>
</nav>

