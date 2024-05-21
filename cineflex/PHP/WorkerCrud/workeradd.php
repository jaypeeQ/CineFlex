<?php
require_once '../../Private/connection.php';

session_start();

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

echo '</pre>', print_r($_POST), '</pre>';

$sqlworkeradd = 'INSERT INTO workers (FirstName, Insertion, LastName, BirthDate, PhoneNumber, Email, Password, FkRoleId)
                   VALUES (:firstname, :insertion, :lastname, :birthdate, :phonenumber, :email, :password, 2)';
$sthworkeradd = $conn->prepare($sqlworkeradd);
$sthworkeradd->bindParam(':firstname', $_POST['firstname']);
$sthworkeradd->bindParam(':insertion', $_POST['insertion']);
$sthworkeradd->bindParam(':lastname', $_POST['lastname']);
$sthworkeradd->bindParam(':birthdate', $_POST['birthdate']);
$sthworkeradd->bindParam(':phonenumber', $_POST['phonenumber']);
$sthworkeradd->bindParam(':email', $_POST['email']);
$sthworkeradd->bindParam(':password', $password);

$sthworkeradd->execute();
?>

<?php
header('Location: ../../index.php?page=workerscrud');
?>