<?php
require_once '../../Private/connection.php';


$sqlcinemaupdate = "UPDATE workers 
                    SET FirstName = :firstname,
                        Insertion = :insertion,
                        LastName = :lastname,
                        BirthDate = :birthdate,
                        Email = :email,
                        PhoneNumber = :phonenumber
                            WHERE WorkerNumber = :workernumber ";
$sthcinemaupdate = $conn->prepare($sqlcinemaupdate);
$sthcinemaupdate->bindParam(":firstname", $_POST['firstname']);
$sthcinemaupdate->bindParam(":insertion", $_POST['insertion']);
$sthcinemaupdate->bindParam(":lastname", $_POST['lastname']);
$sthcinemaupdate->bindParam(":birthdate", $_POST['birthdate']);
$sthcinemaupdate->bindParam(":phonenumber", $_POST['phonenumber']);
$sthcinemaupdate->bindParam(":email", $_POST['email']);
$sthcinemaupdate->bindParam(":workernumber", $_POST['workernumber']);
$sthcinemaupdate->execute();

header('Location: ../../index.php?page=workerscrud');
