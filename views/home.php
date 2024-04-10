<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/card.css">
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">

    <title>Главная</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

<body>
    <?php
    include_once ('../assets/ui/header.php');
    ?>
    <main>
        <div class="swiper">
            <swiper-container slides-per-view="1" pagination="true" pagination="true" space-between="0">
                <swiper-slide><img src="/assets/img/swiper/1.jpg"></swiper-slide>
                <swiper-slide><img src="/assets/img/swiper/2.jpg"></swiper-slide>
            </swiper-container>
        </div>
        <div class="advantages">
            <div>
                <img src="/assets/img/flower.svg" alt="">
                <p>
                    Гарантия качества и
                    бесплатная замена
                    цветов 24 часа
                </p>
            </div>
            <div>
                <img src="/assets/img/boy.svg" alt="">
                <p>Доставка в течение часа</p>
            </div>
            <div>
                <img src="/assets/img/present.svg" alt="">
                <p>Подарки к каждому заказу</p>
            </div>
        </div>
        <div class="discount">
            <h1>Скидки</h1>
            <div>
                <div class="card-flower" data-flower-id="flower-1">
                    <img src="" alt="">
                    <div>
                        <p>Букет “Мишель” </p>
                        <div>
                            <span>
                                <p>4 250</p>
                                <p>2 200</p>
                            </span>
                            <input type="button" class="to-basket" value="Купить">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="/js/buy.js"></script>

</html>