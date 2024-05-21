<?php
use CineFlex\Classes\Database\DatabaseClass;
include "Classes\DatabaseClass.php";

$db = new DatabaseClass();
/*echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';*/

$resultsfilm = $db->Select("
    SELECT * FROM films 
    INNER JOIN posters ON PosterId = FkPosterId    
    WHERE Filmid = :filmid", [
    'filmid' => $_POST['filmid'],
]);

foreach($resultsfilm as $film) {
    ?>
        <!--<div class="bg-image">
            <img src="data:image/jpeg;base64,<?/*= base64_encode($film['ImageBlob']) */?>" style="filter: blur(10px); webkit-filter: blur(8px); height: 100%;background-position: center;
  background-repeat: no-repeat;
  background-size: cover">
        </div>-->

    <div class="container shadow-lg p-3 mt-4 mb-5 bg-body rounded"  style=" border-radius: 10px">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                 <div class="container align-self-center p-4">


                 </div>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="row p-4">
            <div class="col-3">
                <img src="data:image/jpeg;base64,<?= base64_encode($film['ImageBlob']) ?>" style="max-height: 320px" >

            </div>
            <div class="col-9">
                <div class="row" style="justify-content: flex-end; -webkit-box-orient: vertical; flex-direction: column; margin-top: 200px">
                    <h4 style="font-size: 34px; font-family: Arial,Helvetica,sans-serif "><b><?= $film['Title'] ?></b></h4>
                </div>

            </div>

        </div>
        <div class="row bg-body rounded"  style=" border-radius: 10px">
            <div class="col-3" style="font-style: italic">
                <h5><?= $film['LengthMinutes'] ?> Minutes</h5>
                <h5><?php $genreselect = $db->Select('SELECT * FROM filmgenre INNER JOIN genre ON FkGenreId = GenreId WHERE FkFilmId = :filmid', [
        'filmid' =>  $_POST['filmid'],
    ]);
    foreach($genreselect AS $genre)
    {
        $filmgenre = $genre['Genre'];
        echo $filmgenre . ", ";

}?></h5>
                <h3><?php $kijkwijzerselect = $db->Select('SELECT * FROM filmkijkwijzer INNER JOIN kijkwijzers ON FkKijkwijzerId = KijkwijzerId WHERE FkFilmId = :filmid', [
        'filmid' =>  $_POST['filmid'],
    ]);
    foreach($kijkwijzerselect AS $kijkwijzer)
    {
         ?>
        <img src="data:image/jpeg;base64,<?= base64_encode($kijkwijzer['KijkwijzerBlob']) ?>" style="height: 40px">
        <?php
    }
?></h3>
            </div>
            <div class="col-9">
                <h3>Description: </h3>
                <h5><?= $film['Description'] ?></h5>
            </div>
        </div>
    </div>
<?php
}

