<?php

//Just to update the database with old unhashed passwords to new hashed passwords. Manually executed.

include '../Private/connection.php';
$x = 1;

$sql = 'SELECT password, workernumber FROM workers';
$sth = $conn->prepare($sql);
$sth->execute();

while ($rscheck = $sth->fetch(PDO::FETCH_ASSOC)): {
    $id = $rscheck['workernumber'];
    $pass = $rscheck['password'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    if($rscheck['workernumber'] == 4) {
        $sql2 = "UPDATE workers SET password = :password WHERE workernumber = :workernumber";
        $sth2 = $conn->prepare($sql2);
        $sth2->bindParam(":workernumber", $id);
        $sth2->bindParam(":password", $password);
        $sth2->execute();

        if(password_verify($pass, $rscheck['password'])) {
            echo 'user ' . $rscheck['workernumber'] . ' is changed';
        }
    }


}endwhile;
