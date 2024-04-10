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
        <form action="/php/login.php" method="post" autocomplete="on">
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
                <label>
                    <input type="checkbox">
                    <p>Запомнить меня</p>
                </label>
            </div>
            <input type="submit" value="Войти">
        </form>
    </main>
</body>

</html>