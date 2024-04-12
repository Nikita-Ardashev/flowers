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
                <div class="items">
                    <h2>В данный момент нет товаров</h2>
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
                        $priceWithDiscount = $item['cost'] - ($item['discount'] / 100 * $item['cost']);
                        $lastCost += ($item['discount'] != null ? $priceWithDiscount : $item['cost']) * $value;
                        ?>
                        <div class="item card-flower" data-flower-id="flower-<?php echo ($item['id']) ?>"
                            data-first-cost='<?php echo ($priceWithDiscount) ?>'>
                            <input type="button" class="trash">

                            <a href="/views/item.php?id=<?php echo ($item['id']) ?>" class="flower">
                                <img src="<?php echo ($item['img']) ?>" alt="">
                                <p><?php echo ($item['name']) ?></p>
                            </a>
                            <div class="info">
                                <div class="calc">
                                    <button class="minus" type='button'></button>
                                    <input type="number" value='<?php echo ($value) ?>' min="1" max="100">
                                    <button class="plus" type='button'></button>
                                </div>
                                <p class="cost">
                                    <span><?php
                                    echo (($item['discount'] != null ? $priceWithDiscount : $item['cost']) * $value);
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
                <p>Итого:<b><span><?php echo ($lastCost) ?></span> ₽</b></p>
                <input type="button" value="Оформить заказ" onclick="postBuy()">
            </div>
        </div>
    </main>
</body>
<script src='/js/calc.js'></script>

</html>