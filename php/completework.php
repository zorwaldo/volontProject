<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  require "blocks/connect.php";
$id=(int)$_POST['Usr'];
$evetID=(int)$_POST['Evt'];
 $mysql->query("UPDATE `ychastie` SET Worked = 'Работа завершена'
 WHERE User_ID='$id' AND ID_Event = '$evetID'");
 $mysql->query("UPDATE `userinfo` SET Bally = Bally + 5
 WHERE User_ID='$id'");
$mysql->close();
header("Location: /event.php?id=".$evetID);
?>