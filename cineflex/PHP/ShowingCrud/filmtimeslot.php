
<?php
require_once '../../Private/connection.php';

echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';

//Insert into timeslot table in cineflex database

session_start();
echo '</pre>', print_r($_POST), '</pre>';

$sqltimeslotadd = 'INSERT INTO timeslot (FkFilmId, FkHallId, TimeStart, DateShowing) 
                VALUES ( :filmid, :hallid, :timeslot, :dateshowing)';
$sthtimeslotadd = $conn->prepare($sqltimeslotadd);
$sthtimeslotadd->bindParam(':filmid', $_POST['filmid']);
$sthtimeslotadd->bindParam(':hallid', $_POST['hallid']);
$sthtimeslotadd->bindParam(':timeslot', $_POST['timeslot']);
$sthtimeslotadd->bindParam(':dateshowing', $_POST['dateshowing']);

$sthtimeslotadd->execute();
header('Location: ../../index.php?page=nowshowing');

?>
