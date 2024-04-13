<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/orders.css">
    <title>Заказы</title>
</head>

<body>
    <?php
    include_once ('../assets/ui/header.php');
    ?>
    <main>
        <div class="filter">
            <div class="dropdown">
                <label>
                    <input type="button" value="По статусу">
                    <img src="/assets/img/arrow.svg" alt="">
                </label>
                <div class="items">
                    <span>1</span>
                </div>
            </div>
            <div class="dropdown">
                <label>
                    <input type="button" value="По дате заказа">
                    <img src="/assets/img/arrow.svg" alt="">
                </label>
                <div class="items">
                    <span>2</span>
                </div>
            </div>
            <div class="dropdown">
                <label>
                    <input type="button" value="По исполнителю">
                    <img src="/assets/img/arrow.svg" alt="">
                </label>
                <div class="items">
                    <span>3</span>
                </div>
            </div>
        </div>
        <div class="orders">
            <?php
            include_once ('../php/link.php');
            $ordersQuery = $link->query("SELECT * FROM `purchase`");
            $data = mysqli_fetch_all($ordersQuery, MYSQLI_ASSOC);
            $result = array_reduce($data, function ($acc, $item) {
                $acc[$item['user_id']][] = $item;
                return $acc;
            }, []);
            // $result = array_reduce(($result), function ($acc, $item) {
            //     $acc[$item['created_at']][] = $item;
            //     return $acc;
            // }, []);
            $orders = array_values($result);
            foreach ($orders as $order) {
                $onlyUser = $order[0];
                $user = $link->query("SELECT * FROM `users` WHERE `id`='$onlyUser[user_id]'")->fetch_assoc();
                $date = $order[0]['created_at'];
                ?>
                <div class="modal-box">
                    <div class="modal">
                        <input type="button" class="close-cross close">
                        <h3><?php echo ($user['email']) ?></h3>
                    </div>
                </div>
                <div class="order">
                    <label class="edit">
                        <input type="checkbox" hidden>
                    </label>
                    <label class="delete">
                        <input type="checkbox" hidden>
                    </label>
                    <h2><?php echo ($user['email']) ?></h2>
                    <ul>
                        <?php
                        $lastCost = 0;
                        foreach ($order as $item) {
                            $itemQuery = $link->query("SELECT * FROM `items` WHERE `id`='$item[item_id]'")->fetch_assoc();
                            $cost = ($itemQuery['discount'] != null ? $itemQuery['cost'] - ($itemQuery['cost'] * $itemQuery['discount'] / 100) : $itemQuery['cost']);
                            $lastCost += $cost * $item['count'];
                            ?>
                            <li data-order-id="<?php echo ($item['id']) ?>">
                                <p> <input type="button" class="delete-order">
                                    <?php echo ($itemQuery['name']) ?><input type="number" data-cost="<?php echo ($cost) ?>"
                                        readonly min="1" max="100" value="<?php echo $item['count'] ?>">шт -
                                    <span><?php echo ($cost * $item['count']) ?></span>₽
                                </p>
                                <p>Дата создания:
                                    <?php echo ($date) ?>
                                </p>
                            </li>
                            <?php
                        } ?>
                    </ul>
                    <p class="last-cost">Стоимость <span><?php echo ($lastCost) ?></span> ₽</p>
                </div>
                <?php
            }
            $link->close();
            ?>
        </div>
    </main>
</body>
<script src="/js/orders.js"></script>

</html>