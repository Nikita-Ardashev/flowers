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
    include_once ('../php/link.php');
    $id = $_GET['id'];
    $queryItem = $link->query("SELECT * FROM `items` WHERE `id`='$id'");
    $queryDes = $link->query("SELECT * FROM `flower_description` WHERE `flower_id`='$id'");
    if ($queryItem->num_rows == 0) {
        $link->close();
        header('Location: ./home.php');
    }
    $item = $queryItem->fetch_assoc();
    ?>
    <main class='card-flower' data-flower-id="flower-<?php print_r($item['id']) ?>">
        <div class="box-image">
            <img class="image" src="<?php print_r($item['img']) ?>" alt="">
        </div>
        <div class="info">
            <h1><?php print_r($item['name']) ?></h1>
            <div class="buy">
                <span>
                    <?php if ($item['discount'] != null) { ?>
                        <p><?php print_r($item['cost'] + ($item['discount'] / 100 * $item['cost'])) ?>₽</p>
                    <?php } ?>
                    <p><?php print_r($item['cost']) ?>₽</p>
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
                    <?php
                    while ($description = $queryDes->fetch_assoc()) {
                        ?>
                        <li><?php print_r($description['name']) ?>: <?php print_r($description['count']) ?></li>
                        <?php
                    }
                    ?>
                </ul>
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