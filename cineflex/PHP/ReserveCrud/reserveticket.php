<?php
session_start();


echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';
require_once '../../Private/connection.php';
foreach($_POST['seatid'] AS $key => $seatid) {
    $sqlcinemaadd = 'INSERT INTO reservedseat (FkSeatId, FkUserId, FkTimeSlotId) 
                VALUES (:seatid, :userid, :timeslotid)';
    $sthcinemaadd = $conn->prepare($sqlcinemaadd);
    $sthcinemaadd->bindParam(':seatid', $seatid);
    $sthcinemaadd->bindParam(':userid', $_SESSION['userid']);
    $sthcinemaadd->bindParam(':timeslotid', $_POST['timeslotid']);

    $sthcinemaadd->execute();

    $_SESSION['cinemaname'] = $_POST['cinemaname'];
}

?>

<?php
header('Location: ../../index.php?page=cinemacrudhalls');
?>