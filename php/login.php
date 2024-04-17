<?php
include_once ('./link.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $login = $link->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
    $user = $login->fetch_assoc();
    if ($user == null || count($user) == 0) {
        print_r(false);
        exit();
    }
    setcookie('email', $user['email'], time() + 3600 * 8, "/");
    print_r(true);
}
mysqli_close($link);
?>