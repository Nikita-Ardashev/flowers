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
            $search = $_GET['search'] ?? $_GET['type'];
            $items = $link->query("SELECT * FROM `items` WHERE `type`='$search' OR `name` LIKE '%$search%'");
            if ($items->num_rows > 0) {
                while ($item = $items->fetch_assoc()) {
                    ?>
                    <div class="card-flower" data-flower-id="flower-<?php echo ($item['id']) ?>">
                        <a href="/views/item.php?id=<?php echo ($item['id']) ?>"> <img src="<?php echo ($item['img']) ?>"
                                alt="">
                        </a>
                        <div>
                            <p><?php echo ($item['name']) ?> </p>
                            <div>
                                <span>
                                    <?php if ($item['discount'] != null) { ?>
                                        <p><?php echo ($item['cost']) ?></p>
                                    <?php } ?>
                                    <p><?php echo ($item['cost'] - ($item['discount'] / 100 * $item['cost'])) ?></p>

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
<script src="/js/catalog.js"></script>

</html>