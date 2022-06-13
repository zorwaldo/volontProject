<?php require "php/blocks/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
</head>
</head>
<body>
    <?php require "php/header.php"?>
    <section class="Entry">
    <div class="container">
    <form class="forms" action="php/authcheck.php" method="post"> 
        <input class="forms__input" type="email" name="Mail" placeholder="Почта"><br>
        <input class="forms__input" type="password" name="Password" placeholder="Пароль"><br>
        <button class="forms__button" type="submit">Отправить</button><br>
        <a class="forms__link" href="rgstr.php">Зарегистрироваться</a>
    </section>
    </div>
</form>
</body>
</html>