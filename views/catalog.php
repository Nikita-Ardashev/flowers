<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/catalog.css">
    <link rel="stylesheet" href="/css/card.css">
    <title>Каталог</title>
</head>

<body>
    <?php
    include_once ('../assets/ui/header.php');
    ?>
    <main>
        <h1>Каталог</h1>
        <div>
            <?php
            include_once ('../php/link.php');
            $isSearch = isset($_GET['search']);
            $category = $_GET['type'] ?? $_GET['search'];
            $items = $link->query("SELECT * FROM `items` WHERE `type`='$category'");
            if ($items->num_rows > 0) {
                while ($item = $items->fetch_assoc()) {
                    ?>
                    <div class="card-flower" data-flower-id="flower-<?php print_r($item['id']) ?>">
                        <img src="<?php print_r($item['id']) ?>" alt="">
                        <div>
                            <p><?php print_r($item['name']) ?> </p>
                            <div>
                                <span>
                                    <p><?php print_r($item['cost'] + ($item['discount'] / 100 * $item['cost'])) ?></p>
                                    <p><?php print_r($item['cost']) ?></p>
                                </span>
                                <input type="button" class="to-basket" value="Купить">
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo ('Пока нет таких товаров');
            }
            $link->close();
            ?>
        </div>
    </main>
</body>
<script src="/js/buy.js"></script>

</html>