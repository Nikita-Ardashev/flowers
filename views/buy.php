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
        header("Location: ../views/login.php");
        mysqli_close($link);
        return;
    }
    include_once ('../assets/ui/header.php');
    ?>
    <main>
        <div>
            <div>
                <h1>Ваша корзина</h1>
                <div class="column-name">
                    <p>Количество</p>
                    <p>Цена</p>
                </div>
                <div class="items card-flower">
                    <h2>В данный момент нет товров</h2>
                    <?php
                    include_once ('../php/link.php');
                    $cookies = $_COOKIE;
                    $lastCost = 0;
                    foreach ($cookies as $name => $value) {
                        $arr = explode('-', $name);
                        if ($arr[0] != 'flower') {
                            continue;
                        }
                        $id = $arr[1];
                        $item = $link->query("SELECT * FROM `items` WHERE `id`='$id'")->fetch_assoc();
                        $lastCost += $item['discount'] != null ? $item['cost'] + ($item['discount'] / 100 * $item['cost']) : $item['cost'] * $value;
                        ?>
                        <div class="item card-flower" data-flower-id="flower-<?php print_r($item['id']) ?>"
                            data-first-cost='<?php print_r($item['cost']) ?>'>
                            <input type="button" class="trash">

                            <a href="/views/item.php?id=<?php print_r($item['id']) ?>" class="flower">
                                <img src="<?php print_r($item['img']) ?>" alt="">
                                <p><?php print_r($item['name']) ?></p>
                            </a>
                            <div class="info">
                                <div class="calc">
                                    <button class="minus" type='button'></button>
                                    <input type="number" value='<?php print_r($value) ?>' min="1" max="100">
                                    <button class="plus" type='button'></button>
                                </div>
                                <p class="cost">
                                    <span><?php
                                    print_r($item['discount'] != null ? $item['cost'] + ($item['discount'] / 100 * $item['cost']) : $item['cost']);
                                    ?></span> ₽
                                </p>
                            </div>
                        </div>

                        <?php
                    }
                    $link->close();
                    ?>
                </div>
            </div>

            <div class="buy">
                <p>Итого:<b><span><?php print_r($lastCost) ?></span> ₽</b></p>
                <input type="button" value="Оформить заказ" onclick="postBuy()">
            </div>
        </div>
    </main>
</body>
<script src='/js/calc.js'></script>

</html>