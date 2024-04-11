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
    </main>
</body>
<script src="/js/orders.js"></script>

</html>