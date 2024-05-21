<?php
session_start();
include '../Private/connection.php';

$sql = 'SELECT Email, Password, IsActive, FkRoleId FROM workers WHERE Email = :email';
$sth = $conn->prepare($sql);
$sth->bindParam(":email", $_POST['email']);
$sth->execute();
$rsLogin = $sth->fetch(PDO::FETCH_ASSOC);

password_verify($_POST['password'], $rsLogin['Password']);

echo $_POST['password'];
echo $rsLogin['Password'];