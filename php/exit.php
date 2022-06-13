<?php
setcookie('user', $user['User_ID'], time() - 3600 * 24 * 30,"/");
header('Location: /');
?>