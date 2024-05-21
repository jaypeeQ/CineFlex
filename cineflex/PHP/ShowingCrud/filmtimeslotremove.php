<?php
require_once '../../Private/connection.php';
echo '</pre> POST', print_r($_POST), '</pre>';

$sqlreservedelete = "DELETE FROM reservedseat WHERE FkTimeSlotId = :timeslotid ";
$sthreservedelete = $conn->prepare($sqlreservedelete);
$sthreservedelete->bindParam(":timeslotid", $_POST['timeslotid']);
$sthreservedelete->execute();

$sqltimeslotdelete = "DELETE FROM timeslot WHERE TimeslotId = :timeslotid ";
$sthtimeslotdelete = $conn->prepare($sqltimeslotdelete);
$sthtimeslotdelete->bindParam(":timeslotid", $_POST['timeslotid']);
$sthtimeslotdelete->execute();



header('Location: ../../index.php?page=nowshowing');
