<?php
session_start();
require_once '../Private/connection.php';

foreach ($_POST as $post => $val)
echo "<pre>", print_r("$post, $val"), "</pre>";


$firstname = $_POST['firstname'];
$insertion = $_POST['insertion'] ?: null;
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$housenumber = $_POST['housenumber'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sqlregisterusers = 'INSERT INTO users (Email, Password, FirstName, Insertion, LastName, City, HouseNumber, PhoneNumber, Postcode, birthdate) 
                VALUES (:email, :password, :firstname, :insertion, :lastname, :city, :housenumber, :phonenumber, :postcode, :birthdate)';
$sthregisterusers = $conn->prepare($sqlregisterusers);
$sthregisterusers->bindParam(':email', $email);
$sthregisterusers->bindParam(':password', $password);
$sthregisterusers->bindParam(':firstname', $firstname);
$sthregisterusers->bindParam(':insertion', $insertion);
$sthregisterusers->bindParam(':lastname', $lastname);
$sthregisterusers->bindParam(':city', $city);
$sthregisterusers->bindParam(':housenumber', $housenumber);
$sthregisterusers->bindParam(':phonenumber', $phonenumber);
$sthregisterusers->bindParam(':postcode', $postcode);
$sthregisterusers->bindParam(':birthdate', $birthdate);

$sthregisterusers->execute();

header('Location: ../Index.php');