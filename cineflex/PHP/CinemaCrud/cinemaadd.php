<?php
require_once '../../Private/connection.php';

session_start();
echo '</pre>', print_r($_POST), '</pre>';

$sqlcinemaadd = 'INSERT INTO cinemas (Name, City, HouseNumber, Postcode, PhoneNumber) 
                VALUES ( :name, :city, :housenumber, :postcode, :phonenumber)';
$sthcinemaadd = $conn->prepare($sqlcinemaadd);
$sthcinemaadd->bindParam(':name', $_POST['cinemaname']);
$sthcinemaadd->bindParam(':city', $_POST['city']);
$sthcinemaadd->bindParam(':housenumber', $_POST['housenumber']);
$sthcinemaadd->bindParam(':postcode', $_POST['postcode']);
$sthcinemaadd->bindParam(':phonenumber', $_POST['phonenumber']);

$sthcinemaadd->execute();

$_SESSION['cinemaname'] = $_POST['cinemaname'];
?>

<?php
header('Location: ../../index.php?page=cinemacrudhalls');
?>