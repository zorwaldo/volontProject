<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $lastname = filter_var(trim($_POST['lastname']),FILTER_SANITIZE_STRING);
    $fathname = filter_var(trim($_POST['fathname']),FILTER_SANITIZE_STRING);
    $Mail = filter_var(trim($_POST['Mail']),FILTER_SANITIZE_STRING);
    $Password = filter_var(trim($_POST['Password']),FILTER_SANITIZE_STRING);
    $Phone = filter_var(trim($_POST['Phonenum']),FILTER_SANITIZE_STRING);
    $BirthDate = filter_var(trim($_POST['BirthDate']),FILTER_SANITIZE_STRING);
  if(mb_strlen($Mail)<5 || mb_strlen($Mail)>90){
      echo "Недопустимая длина логина";
      exit();
  }else if(mb_strlen($Password)<5 || mb_strlen($Password)>50){
      echo "Недопустимая длина пароля (от 6 до 50 символов)";
      exit();
  }
require "blocks/connect.php";
 //Проверка существует ли аккаунт с такой почтой
  $result =  $mysql->query("SELECT * FROM `userinfo` WHERE `User_mail`='$Mail'");
     $user = $result->fetch_assoc();
     if(isset($user) == true) {
         echo "Почтовый адрес уже используется";
         exit();
     }
 $mysql->query("INSERT INTO `userinfo` (`User_Name`,`User_mail`,`User_Phone`,`User_Birth`,`User_Pass`,`User_Second_Name`,`User_Otchestvo`)
VALUES ('$name', '$Mail', '$Phone', '$BirthDate','$Password', '$lastname', '$fathname')");
$mysql->close();
header('Location: /');
?>