<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/auth.css">

    <title>Регистрация</title>
</head>

<body>
    <?php
    include_once ('../assets/ui/header.php');
    ?>
    <main>
        <h1>Регистрация</h1>
        <div class="form">
            <div class="fields">
                <div class="field">
                    <p>E-mail:</p>
                    <input type="text" name="email" autocomplete="email" placeholder="Почта">
                </div>
                <div class="field">
                    <p>Телефон:</p>
                    <input type="tel" name="tel" autocomplete='tel' placeholder="Телефон">
                </div>
                <div class="field">
                    <p>Пароль:</p>
                    <input type="password" name="password" autocomplete='new-password' placeholder="Пароль">
                </div>
                <p class="error"></p>
            </div>
            <p>
                Пароль должен быть не менее 6 символов длиной.<br />
                *Поля, обязательные для заполнения.<br />
                Нажимая кнопку « Регистрация» я даю согласие на обработку персональной информации на условиях
                настоящего Пользовательского соглашения.</p>

            <input type="submit" value="Регистрация">
        </div>
    </main>
</body>
<script src="/js/reg.js"></script>

</html>