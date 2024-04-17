<?php
include_once ('./link.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $check_user = "SELECT * FROM `users` WHERE `email` = '$email' OR `phone`='$tel'";
    $result = mysqli_query($link, $check_user);
    if (mysqli_num_rows($result) > 0) {
        echo ('Такой пользователь с email или телефоном уже существует!');
    } else {
        $password = $_POST['password'];
        $reg = "INSERT INTO `users` (`email`, `password`, `phone`) VALUES ('$email', '$password', '$tel')";
        if (mysqli_query($link, $reg)) {
            setcookie('email', $email, time() + 3600 * 8, "/");
        } else {
            echo "Ошибка: " . $reg . "<br>" . mysqli_error($link);
        }
    }
}
mysqli_close($link);
?>