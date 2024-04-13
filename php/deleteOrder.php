<?php
include_once ('./link.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $orderId = $_GET['id'];
    $deleteOrder = ("DELETE FROM `purchase` WHERE `id`='$orderId'");
    if (mysqli_query($link, $deleteOrder)) {

    } else {
        echo "Ошибка: " . $deleteOrder . "<br>" . mysqli_error($link);
    }
}

mysqli_close($link);
?>