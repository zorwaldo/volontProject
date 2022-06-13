<?php
print_r($evetID);
if(!isset($_COOKIE['user'])){
  print_r('Vam neobhodimo avtorizovatsya!');
}else{
  require "blocks/connect.php";
  $id=(int)$_COOKIE['user'];
$evetID=(int)$_POST['Evt'];
 $mysql->query("INSERT INTO `ychastie` (`User_ID`,`ID_Event`)
VALUES ('$id', '$evetID')");
$mysql->close();
if(isset($_POST['events'])){
  header("Location: /events.php");
}else{
  header("Location: /event.php?id=".$evetID);
}
}


?>