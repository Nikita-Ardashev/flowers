<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/buy.css">
    <title>Корзина</title>
</head>

<body>
    <?php
    if (! isset($_COOKIE['email'])) {
        header("Location: ../views/home.php");
        mysqli_close($link);
        return;
    }
    include_once ('../assets/ui/header.php');
    $cookies = $_COOKIE;

    foreach ($cookies as $name => $value) {
        $arr = explode('-', $name);
        if ($arr[0] != 'flower') {
            continue;
        }
        $id = $arr[1];
        echo "Cookie: $id = $value<br>";
    }
    ?>
    <main>
        <div>
            <div>
                <h1>Ваша корзина</h1>
                <div class="items card-flower" data-flower-id="flower-1">
                    <div class="column-name">
                        <p>Количество</p>
                        <p>Цена</p>
                    </div>
                    <div class="item">
                        <div class="flower">
                            <img src="" alt="">
                            <p>Букет “Леди”</p>
                        </div>
                        <div class="info">
                            <div class="calc">
                                <button class="minus" type='button'></button>
                                <input type="number" value='1' min="1" max="100">
                                <button class="plus" type='button'></button>
                            </div>
                            <p class="cost">2100₽</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buy">
                <p>Итого:<b>4300₽</b></p>
                <input type="button" value="Оформить заказ" onclick="postBuy()">
            </div>
        </div>
    </main>
</body>
<script src='/js/calc.js'></script>

</html>