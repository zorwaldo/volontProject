<?php
print_r($evetID);
if(!isset($_COOKIE['user'])){
  print_r('Vam neobhodimo avtorizovatsya!');
}else{
  //Обработка нажатия отклика. Создание записи об участии волонтёра в событии
  require "blocks/connect.php";
  $id=(int)$_COOKIE['user'];
$evetID=(int)$_POST['Evt'];
 $mysql->query("INSERT INTO `ychastie` (`User_ID`,`ID_Event`)
VALUES ('$id', '$evetID')");
$mysql->close();
if(isset($_POST['events'])){
  //Если человек нажал отклик со страницы списка событий то он вернется обратно к списку событий
  header("Location: /events.php");
}else{
    //Если человек нажал отклик со страницы просмотра подробной информации о событии то он вернется на ту же страницу
  header("Location: /event.php?id=".$evetID);
}
}
?>