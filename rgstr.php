<?php require "php/blocks/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
</head>
</head>
<body>
    <?php require "php/header.php"?>
    <section class="Reg">
    <div class="container">
<form action="php/check.php" method="post"> 
    <input class="forms__input" type="text" name="name" placeholder="Имя"> <br>
    <input class="forms__input" type="text" name="lastname" placeholder="Фамилия"><br>
    <input class="forms__input" type="text"  name="fathname" placeholder="Отчество"><br>
    <input class="forms__input" type="email" name="Mail" placeholder="Почта"><br>
    <input class="forms__input" type="text" name="Phonenum" placeholder="Телефон"><br>
    <input class="forms__input" type="date" name="BirthDate" placeholder="Дата рождения"><br>
    <input class="forms__input" type="password" name="Password" placeholder="Пароль"><br>
    <button class="forms__button forms__button-reg" type="submit">Отправить</button>
    <a class="forms__link forms__link-reg" href="auth.php">Войти</a>
</form>
</div>
    </section>
</body>
</html>