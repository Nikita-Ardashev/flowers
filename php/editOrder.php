<?php
include_once ('./link.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $orderId = $_GET['id'];
    $orderCount = $_GET['count'];
    $editOrder = ("UPDATE `purchase` SET `count`='$orderCount' WHERE `id`='$orderId'
    ");
    if (mysqli_query($link, $editOrder)) {

    } else {
        echo "Ошибка: " . $reg . "<br>" . mysqli_error($link);
    }
}

mysqli_close($link);
?>