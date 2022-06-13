<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
  $opisanie = filter_var(trim($_POST['opisanie']),FILTER_SANITIZE_STRING);
  $adress = filter_var(trim($_POST['adress']),FILTER_SANITIZE_STRING);
  $srochn = filter_var(trim($_POST['srochn']),FILTER_SANITIZE_STRING);
  $srochn=(int)$srochn;
  $skills = filter_var(trim($_POST['skills']),FILTER_SANITIZE_STRING);
  $bonuses = filter_var(trim($_POST['bonuses']),FILTER_SANITIZE_STRING);
  $motivation = filter_var(trim($_POST['motivation']),FILTER_SANITIZE_STRING);
  $contacts = filter_var(trim($_POST['contacts']),FILTER_SANITIZE_STRING);
  $napr = filter_var(trim($_POST['napr']),FILTER_SANITIZE_STRING);
  $Age_OT = (int)($_POST['Age_OT']);
  $Age_DO = (int)($_POST['Age_DO']);


  
  if(!isset($_COOKIE['user'])){
    echo "vam neobhodimo avtorizovatsya!";
  }else{
    $id=(int)$_COOKIE['user'];
    require "blocks/connect.php";
   //Получение имени пользователя
   $result = mysqli_query($mysql,"SELECT * FROM `userinfo` where User_ID='$id'");
   while($info = mysqli_fetch_assoc($result)){
  $KompName = $info['User_Name'];
  }

 $mysql->query("INSERT INTO `event` (`Srochnost_Kod`,`Event_name`,`Event_info`,`Event_Adr`,`Age_OT`,`Age_DO`,`Event_perks`,`Event_bonus`,`Event_motiv`,`Event_Kontakt`,`User_ID`,`Kompany_Name`,`Direcrion`)
VALUES ('$srochn','$name','$opisanie','$adress','$Age_OT','$Age_DO','$skills','$bonuses','$motivation','$contacts','$id','$KompName','$napr')");
$mysql->close();
header('Location: /');
}


?>