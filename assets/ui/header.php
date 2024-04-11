<link rel="stylesheet" href="/css/fonts.css">
<link rel="stylesheet" href="/css/layout.css">
<header>
    <nav class="first">
        <a href="/views/home.php">Акции</a>
        <a href="/views/delivery.php">Доставка</a>
        <a href="/views/contact.php">Контакты</a>
        <div>
            <?php
            if (isset($_COOKIE['email'])) {
                ?>
                <a href="/php/logout.php">Выйти из аккаунта</a>
                <?php
            } else {
                ?>
                <a href="/views/login.php">Вход</a>
                <a href="/views/reg.php">Регистрация</a>
                <?php
            }
            ?>
        </div>
    </nav>
    <div class="second">
        <a href="/views/home.php"><img src="/assets/img/logo.png" alt="logo"></a>
        <a target="_blank"
            href="https://yandex.ru/maps/44/izhevsk/house/ulitsa_lenina_62/YUoYdAVkSUYGQFtsfXR1dXRhYQ==/?ll=53.224030%2C56.844826&z=17"
            class="nav"><img src="/assets/img/marker.svg" alt="marker"><span>Ижевск ул. Ленина
                62</span></a>
        <a href="tel:+79124584746" class="number"><img src="/assets/img/phone.svg" alt="phone">+7 (912) 458 47 46</a>
        <label class="search">
            <input type="text" placeholder="Найти букетик">
            <img src="/assets/img/search.svg" alt="search">
        </label>
        <a href="/views/buy.php" class="buy"><img src="/assets/img/buy.svg" alt="buy"><span>0</span></a>
    </div>
    <div class="thrid">
        <div class="header-dropdown">
            <p>Повод</p>
            <div class="items">
                <a href="/views/catalog.php?type=birthday">ДЕНЬ РОЖДЕНИЯ</a>
                <a href="/views/catalog.php?type=mothersDay">ДЕНЬ МАТЕРИ</a>
                <a href="/views/catalog.php?type=MarchDay">8 МАРТА</a>
            </div>
        </div>
        <div class="header-dropdown">
            <p>Цветы</p>
            <div class="items">
                <a href="/views/catalog.php?type=roses">РОЗЫ</a>
                <a href="/views/catalog.php?type=gypsophila">ГИПСОФИЛА</a>
                <a href="/views/catalog.php?type=pions">ПИОНЫ</a>
                <a href="/views/catalog.php?type=hydrangeas">ГОРТЕНЗИИ</a>
                <a href="/views/catalog.php?type=tulips">ТЮЛЬПАНЫ</a>
            </div>
        </div>
        <div class="header-dropdown">
            <p>Букеты</p>
            <div class="items">
                <a href="/views/catalog.php?type=upTo1500">БУКЕТЫ ДО 1500 РУБ</a>
                <a href="/views/catalog.php?type=upTo3000">БУКЕТЫ ДО 1500 - 3000 РУБ</a>
            </div>
        </div>
        <div class="header-dropdown">
            <p>Подарки</p>
            <div class="items">
                <a href="/views/catalog.php?type=postcards">ОТКРЫТКИ</a>
                <a href="/views/catalog.php?type=heliumBaloons">ГЕЛИЕВЫЕ ШАРЫ</a>
                <a href="/views/catalog.php?type=candies">СЛАДКИЕ НАБОРЫ/КОНФЕТЫ</a>
            </div>
        </div>
        <a href="/views/catalog.php?type=bouquetsBoxes">
            Букеты в
            коробках
        </a>
        <a href="/views/catalog.php?type=pottedFlower">
            Горшечный цветок
        </a>
        <a href="/views/catalog.php?type=boxesAndBaskets">Ящики и корзины</a>
    </div>
</header>
<script src='/js/basket.js'></script>