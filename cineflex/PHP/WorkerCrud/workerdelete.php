<?php
require_once '../../Private/connection.php';


$sqlcinemaupdate = "UPDATE workers 
                    SET IsActive = 0
                            WHERE WorkerNumber = :workernumber ";
$sthcinemaupdate = $conn->prepare($sqlcinemaupdate);
$sthcinemaupdate->bindParam(":workernumber", $_POST['workernumber']);
$sthcinemaupdate->execute();

echo $_POST['workernumber'];
//header('Location: ../../index.php?page=workerscrud');
