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
                    <input type="button" class="edit">
                    <input type="button" class="delete">
                    <h2><?php echo ($user['email']) ?></h2>
                    <ul>
                        <?php
                        $lastCost = 0;
                        foreach ($order as $item) {
                            $itemQuery = $link->query("SELECT * FROM `items` WHERE `id`='$item[item_id]'")->fetch_assoc();
                            $lastCost += $itemQuery['discount'] != null ? $itemQuery['cost'] - ($itemQuery['discount'] * $itemQuery['cost'] / 100) : $itemQuery['cost'];
                            ?>
                            <li><?php echo ($itemQuery['name'] . ' - ' . $item['count']) ?>шт
                                <?php echo (' ' . $itemQuery['discount'] != null ? $itemQuery['cost'] - ($itemQuery['cost'] * $itemQuery['discount'] / 100) : $itemQuery['count']) ?>₽
                                <p>Дата создания:
                                    <?php echo ($date) ?>
                                </p>
                            </li>
                            <?php
                        } ?>
                    </ul>
                    <p>Стоимость <?php echo ($lastCost) ?> ₽</p>
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