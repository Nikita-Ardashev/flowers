<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/item.css">
    <title>Товар</title>
</head>

<body>
    <?php
    include_once ('../assets/ui/header.php');
    ?>
    <main class='card-flower' data-flower-id="flower-1">
        <img class="image" src="" alt="">
        <div class="info">
            <h1>Букет “Леди”</h1>
            <div class="buy">
                <span>
                    <p>3 590 </p>
                    <p>2 100</p>
                </span>
                <div class="calc">
                    <button class="minus"></button>
                    <input type="number" value='1' min="1" max="100">
                    <button class="plus"></button>
                </div>
                <input type="button" class="to-basket" value="В корзину">
            </div>
            <div class="content">
                <ul>
                    <p>Состав букета:</p>
                    <li>Диантус: 25 шт</li>
                    <li>Гипсофила: 3 шт</li>
                </ul>
                <!-- <p>Упаковка: Пленка матовая, Лента атласная</p> -->
                <p>К каждому букету/композиции в подарок мы прикладываем:</p>
                <span>
                    <p>Средство для продления жизни цветов “Bona Forte”</p>
                    <p>Сладкий комплимент</p>
                    <p>Открыточку с вашим пожеланием</p>
                    <p>Брошюру по уходу за букетом</p>
                </span>
            </div>
        </div>
    </main>
</body>
<script src='/js/calc.js'></script>
<script src="/js/buy.js"></script>

</html>