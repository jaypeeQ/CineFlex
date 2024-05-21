<?php
require_once '../../Private/connection.php';


$sqlcinemaupdate = "UPDATE cinemas 
                        SET Name = :cinemaname, 
                        City = :city, 
                        HouseNumber = :housenumber, 
                        Postcode = :postcode, 
                        PhoneNumber = :phonenumber 
                            WHERE CinemaId = :cinemaid ";
$sthcinemaupdate = $conn->prepare($sqlcinemaupdate);
$sthcinemaupdate->bindParam(":cinemaname", $_POST['cinemaname']);
$sthcinemaupdate->bindParam(":city", $_POST['city']);
$sthcinemaupdate->bindParam(":housenumber", $_POST['housenumber']);
$sthcinemaupdate->bindParam(":postcode", $_POST['postcode']);
$sthcinemaupdate->bindParam(":phonenumber", $_POST['phonenumber']);
$sthcinemaupdate->bindParam(":cinemaid", $_POST['cinemaid']);
$sthcinemaupdate->execute();

header('Location: ../../index.php?page=cinemacrud');
