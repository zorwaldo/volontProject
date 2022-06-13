<?php
   $Mail = filter_var(trim($_POST['Mail']),FILTER_SANITIZE_STRING);
   $Password = filter_var(trim($_POST['Password']),FILTER_SANITIZE_STRING);
   require "blocks/connect.php";
   //Проверка существования пользователя
   $result =  $mysql->query("SELECT * FROM `userinfo` WHERE `User_mail`='$Mail' AND `User_Pass`='$Password'");
   $user = $result->fetch_assoc();
   if(isset($user) == false) {
       echo "User not found";
       exit();
   }
   setcookie('user', $user['User_ID'], time() + 3600 * 24 * 30,"/");
   header('Location: /');
?>
    