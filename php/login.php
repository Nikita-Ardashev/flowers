<?php
include_once ('./link.php');

$email = $_POST["email"];
$password = $_POST["password"];

$login = $link->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
$user = $login->fetch_assoc();
if (count($user) == 0) {
    exit();
}
setcookie('email', $user['email'], time() + 3600 * 8, "/");
header("Location: /");
mysqli_close($link);
?>