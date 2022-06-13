<?php require "php/blocks/connect.php";
$id=(int)$_COOKIE['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
</head>
<body>
<?php require "php/header.php"?>
<a href="php/exit.php">Выйти</a>

<p style="color: white;">Мои объявления:</p>
<ul>
<?php $result = mysqli_query($mysql,"SELECT * FROM `event` WHERE User_ID ='$id'");
   while($info = mysqli_fetch_assoc($result)){  ?>
    <li><a href="event.php?id=<?php echo $info['ID_Event']?>"><?php echo $info['Event_name']?></a></li>
<?php }?>
</ul>

</body>
</html>