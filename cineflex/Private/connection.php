<?php
$servername = "localhost";
$username = "cineflex";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=cineflex", $username, $password);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>