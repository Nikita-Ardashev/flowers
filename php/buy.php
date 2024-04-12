<?php
include_once ('./link.php');

if (! isset($_COOKIE['email'])) {
    echo "Пользователь не найден.";
    mysqli_close($link);
    return;
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cookies = $_COOKIE;
    $email = $_COOKIE['email'];
    $isUser = $link->query("SELECT `id` FROM `users` WHERE `email`='$email'");
    if ($isUser->num_rows > 0) {
        $userId = $isUser->fetch_assoc()['id'];
        foreach ($cookies as $name => $count) {
            $arr = explode('-', $name);
            if ($arr[0] != 'flower') {
                continue;
            }
            $itemId = $arr[1];
            $buy = $link->prepare("INSERT INTO `purchase` (`user_id`, `item_id`, `count`) VALUES (?, ?, ?)");
            $buy->bind_param("sss", $userId, $itemId, $count);
            if ($buy->execute()) {
                // header('Location: ../views/login.php');
            } else {
                echo "Ошибка: " . $buy->error;
            }
        }
    } else {
        echo "Пользователь не найден.";
    }
}
mysqli_close($link);
?>