<?php
include_once ('./link.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];

    $reg = "INSERT INTO `users` (`email`, `password`, `phone`) VALUES ('$email', '$password', '$tel')";
    if (mysqli_query($link, $reg)) {
        header('Location: ../views/login.php');
    } else {
        echo "Ошибка: " . $reg . "<br>" . mysqli_error($link);
    }
}
mysqli_close($link);
?>