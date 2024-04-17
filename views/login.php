<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/auth.css">
    <title>Вход</title>
</head>

<body>
    <?php
    include_once ('../assets/ui/header.php');
    ?>
    <main>
        <h1>Авторизация</h1>
        <div class="form">
            <div class="fields">
                <div class="field">
                    <p>E-mail:</p>
                    <input type="text" name="email" autocomplete="email" placeholder="Почта" autocomplete="email">
                </div>
                <div class="field">
                    <p>Пароль:</p>
                    <input type="password" name="password" autocomplete='current-password' placeholder="Пароль"
                        autocomplete="current-password">
                </div>
                <p class='error'>Неправильный email или пароль</p>
            </div>
            <input type="submit" value="Войти">
        </div>
    </main>
</body>
<script src="/js/login.js"></script>

</html>