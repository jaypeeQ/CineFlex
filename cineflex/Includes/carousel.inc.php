<!-- Carousel -->
<div class="container mt-3" xmlns="http://www.w3.org/1999/html" style="text-align: center">

<div class="d-flex justify-content-center">


<div id="demo" class="carousel slide" data-bs-ride="carousel" style="max-width: 600px;max-height: 40%">

    <!-- Indicators/dots -->
    <!--<div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="7"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="8"></button>
    </div>-->

    <!-- The slideshow/carousel -->


    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="index.php?page=nowshowing">
                <img src="https://yc.cldmlk.com/wmezace6a8ycqfbe2gjcg9vn0m/1590716150444_ladybird.png" class="d-block" alt="" style="max-height: 800px">
                <div class="carousel-image hidden"></div>
            </a>
        </div>
         <?php

        $sql = "SELECT * FROM films INNER JOIN posters ON posterId = FkPosterId";
        $sth = $conn->prepare($sql);
        $sth->execute();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="carousel-item" style="max-height: 420px;max-width: 30%">
                <form action="Includes/filminfo.inc.php" method="get">
                    <a href="#">
                        <img src="<?= $row['PosterImage'] ?>" alt="<?= $row['Title'] ?>"  style="max-height: 800px;min-width: auto">
                    </a>
                </form>

            </div>


            <?php
        }
        ?>
        <!--<div class="carousel-item">
            <img src="Images/nightattheaquarium.jpg" alt="Night at the Aquarium" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>
        <div class="carousel-item">
            <img src="Images/ark.jpg" alt="Ark" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>
        <div class="carousel-item">
            <img src="Images/lastmanstanding.jpg" alt="Last Man Standing" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>
        <div class="carousel-item">
            <img src="Images/onthejob.jpg" alt="On The Job" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>
        <div class="carousel-item">
            <img src="Images/youarefat.jpg" alt="You Are Fat!" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>
        <div class="carousel-item">
            <img src="Images/raisemeup.jpg" alt="Raise Me Up" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>
        <div class="carousel-item">
            <img src="Images/thecricketglass.jpg" alt="The Cricket Glass" class="d-block"  style="max-height: 768px;
    min-width: auto;">
        </div>-->
    </div>


    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
</div>
</div>