<?php
require_once '../../Private/connection.php';
echo '</pre> POST', print_r($_POST), '</pre>';

$sqltimecheck = 'SELECT TimeslotId, FkFilmId FROM timeslot 
                WHERE FkFilmId = :filmid';
$sthtimecheck = $conn->prepare($sqltimecheck);
$sthtimecheck->bindParam(":filmid", $_POST['filmid']);

$sthtimecheck->execute();

while($rstimecheck = $sthtimecheck->fetch(PDO::FETCH_ASSOC)) {

    if($rstimecheck) {
        $sqlreservedelete = "DELETE FROM reservedseat WHERE FkTimeSlotId = :timeslotid ";
        $sthreservedelete = $conn->prepare($sqlreservedelete);
        $sthreservedelete->bindParam(":timeslotid", $rstimecheck['TimeslotId']);
        $sthreservedelete->execute();

        $sqltimeslotdelete = "DELETE FROM timeslot WHERE TimeslotId = :timeslotid ";
        $sthtimeslotdelete = $conn->prepare($sqltimeslotdelete);
        $sthtimeslotdelete->bindParam(":timeslotid", $rstimecheck['TimeslotId']);
        $sthtimeslotdelete->execute();
    }

}

$sqlcinemahalldelete = "DELETE FROM films WHERE FilmId = :filmid ";
$sthcinemahalldelete = $conn->prepare($sqlcinemahalldelete);
$sthcinemahalldelete->bindParam(":filmid", $_POST['filmid']);
$sthcinemahalldelete->execute();

    $sqlposterdelete = "DELETE FROM posters WHERE PosterId = :posterid ";
    $sthposterdelete = $conn->prepare($sqlposterdelete);
    $sthposterdelete->bindParam(":posterid", $_POST['posterid']);
    $sthposterdelete->execute();

header('Location: ../../index.php?page=films');
