<?php
session_start();
include '../Private/connection.php';

$sql = 'SELECT Email, Password, IsActive, UserId FROM users WHERE Email = :email';
$sth = $conn->prepare($sql);
$sth->bindParam(":email", $_POST['email']);
$sth->execute();

$rsLogin = $sth->fetch(PDO::FETCH_ASSOC);
if(!$rsLogin) {
    $_SESSION['error'] = "Failed to login: Incorrect email/password.";
    header('Location: ../index.php?page=login');
    echo $_SESSION['error'];
}
elseif($rsLogin['IsActive'] == 1) {

    if(password_verify($_POST['password'], $rsLogin['Password'])) {
        //$_SESSION['message'] = $_POST['password'] . ' ' .$rsLogin['password'];
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $rsLogin['UserId'];
        $_SESSION['loginfirst'] = '';

        header('Location: ../index.php?page=home');
        var_dump($_POST['password']);
        echo 'you logged in';

    }else {
        $_SESSION['error'] = "Failed to login: Incorrect email/password.";
        header('Location: ../index.php?page=login');
        echo $_SESSION['error'];
    }
}elseif($rsLogin['IsActive'] == 0) {
    $_SESSION['error'] = "Failed to log in. User is inactive.";
    echo $_SESSION['error'];

    header('Location: ../index.php?page=login');

}else {
    header('Location: ../index.php?page=login');

}
echo '<pre>', print_r($_SESSION), '</pre>';
echo '<pre>', print_r($rsLogin), '</pre>';
?>