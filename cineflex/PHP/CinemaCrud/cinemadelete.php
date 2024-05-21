<?php
require_once '../../Private/connection.php';
echo '</pre> POST', print_r($_POST), '</pre>';

$sqlcinemadeletecheck = 'SELECT * FROM cinemas 
                            INNER JOIN halls ON FkCinemaId = CinemaId 
                            INNER JOIN seats ON HallId = FkHallId 
                                WHERE CinemaId = :cinemaid';
$sthcinemadeletecheck = $conn->prepare($sqlcinemadeletecheck);
$sthcinemadeletecheck->bindParam(":cinemaid", $_POST['cinemaid']);
$sthcinemadeletecheck->execute();

while($rscinemadeletecheck = $sthcinemadeletecheck->fetch(PDO::FETCH_ASSOC)) {
    $sqlcinemaseatsdelete = "DELETE FROM seats WHERE FkHallId = :hallid ";
    $sthcinemaseatsdelete = $conn->prepare($sqlcinemaseatsdelete);
    $sthcinemaseatsdelete->bindParam(":hallid", $rscinemadeletecheck['HallId']);
    $sthcinemaseatsdelete->execute();
}

$sqlcinemadeletecheck2 = 'SELECT * FROM cinemas 
                            INNER JOIN halls ON FkCinemaId = CinemaId 
                            
                                WHERE CinemaId = :cinemaid';
$sthcinemadeletecheck2 = $conn->prepare($sqlcinemadeletecheck2);
$sthcinemadeletecheck2->bindParam(":cinemaid", $_POST['cinemaid']);
$sthcinemadeletecheck2->execute();

while($rscinemadeletecheck2 = $sthcinemadeletecheck2->fetch(PDO::FETCH_ASSOC)) {
    $sqlcinemahalldelete = "DELETE FROM halls WHERE FkCinemaId = :cinemaid ";
    $sthcinemahalldelete = $conn->prepare($sqlcinemahalldelete);
    $sthcinemahalldelete->bindParam(":cinemaid", $rscinemadeletecheck2['CinemaId']);
    $sthcinemahalldelete->execute();
}

    $sqlcinemadelete = "DELETE FROM cinemas WHERE CinemaId = :cinemaid ";
    $sthcinemadelete = $conn->prepare($sqlcinemadelete);
    $sthcinemadelete->bindParam(":cinemaid", $_POST['cinemaid']);
    $sthcinemadelete->execute();

header('Location: ../../index.php?page=cinemacrud');
