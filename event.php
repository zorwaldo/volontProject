<?php 
//Код ниже позволяет посмотреть отчёт об ошибках php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
require "php/blocks/connect.php";
$id=(int)$_GET['id'];
$userID = (int)$_COOKIE['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head class="page">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Событие</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require "php/header.php"?>
<!-- Запрос на получение информации о событии и вывод информации на страницу -->
<?php $result = mysqli_query($mysql,"SELECT * FROM `event` where ID_Event='$id'");
   while($info = mysqli_fetch_assoc($result)){  ?>
  <section class="Specific">
		<div class="container">
			<h2 class="Specific__title">
            <?php echo $info['Event_name']?>
			</h2>
			<h3 class="Specific__SubName">
				Задачи:<br>
			</h3>
			<p class="Specific__text">
            <?php echo $info['Event_info']?>
			</p>
            <h3 class="Specific__SubName">
				Обязательные навыки:
			</h3>
			<p class="Specific__text">
            <?php echo $info['Event_perks']?>
			</p>
            <h3 class="Specific__SubName">
				Адрес:
			</h3>
			<p class="Specific__text">
            <?php echo $info['Event_Adr']?>
			</p>
			<h3 class="Specific__SubName">
				Бонусы для волонтеров:
			</h3>
			<p class="Specific__text">
            <?php echo $info['Event_Bonus']?>
			</p>
			<h3 class="Specific__SubName">
				Мотивация для волонтеров:
			</h3>
			<p class="Specific__text">
            <?php echo $info['Event_motiv']?>
			</p>
			<h3 class="Specific__SubName">
				Контакты:
			</h3>
			<p class="Specific__text">
            <?php echo $info['Event_Kontakt']?>
			</p>
            <h3 class="Specific__SubName">
				Работодатель:
			</h3>
			<p class="Specific__text">
            <?php echo $info['Kompany_Name']?>
			</p>
            
            
		</div>
	</section>
<!-- Код ниже проверяет 
 1 - Кто просматривает страницу - организатор или волонтёр
 2 - если организатор то выводится список откликнувшихся людей и кнопки для взаимодействия с откликами
 3 - если волонтер то выводится кнопка отклика, либо если отклик был осуществлен выводится надпись
-->
    <?php 
   $isOtcled = false;
    $resultOtcl = mysqli_query($mysql, "SELECT * FROM `ychastie` WHERE User_ID='$userID' AND ID_Event='$id'");
    if($info2 = mysqli_fetch_assoc($resultOtcl)){
        $isOtcled= true;
    }
    
   if($info['User_ID']==$userID){?>
    <section class="Feedback">
		<div class="container">
			<ul class="Feedback__list">
            <?php $result = mysqli_query($mysql,"SELECT * FROM `ychastie` JOIN `userinfo` ON ychastie.User_ID = userinfo.User_ID where ID_Event='$id'");
   while($info = mysqli_fetch_assoc($result)){  ?>
				<li class="Feedback__body">
					<div class="Feedback__item">
						<div class="Feedback__photo">
							<img src="<?php echo $info['User_Pic']?>" width="229" height="229" alt="Аватар">
                            <?php if($info['Worked']=='В процессе работы'){ ?>
                                <form action="php/completework.php" method="post">
                                    <input type="hidden"  name="Evt" value="<?php echo $_GET['id']?>">    
                                        <input type="hidden"  name="Usr" value="<?php echo $info['User_ID']?>">  
                                        <button style="cursor: pointer;" class="Feedback__button" type="submit">Работа выполнена</button>
                                </form><?php }else{?>
                                <form action="php/getwork.php" method="post">
                                        <input type="hidden"  name="Evt" value="<?php echo $_GET['id']?>">    
                                        <input type="hidden"  name="Usr" value="<?php echo $info['User_ID']?>">  
                                        <button style="cursor: pointer;" type="submit" class="Feedback__button">Принять в работу</button>
                                    </form>
                                    <?php }?>
						</div>
					</div>
					<div class="Feedback__item">
						<div class="Feedback__info">
							<p class="Feedback__text">
								<span><?php echo $info['User_Name']?></span> готов(а) помочь
							</p>
                            <h3 class="Feedback__SubName">
								Телефон для связи:
							</h3>
							<p class="Feedback__text">
                            <?php echo $info['User_Phone']?>
							</p>
						</div>
					</div>
				</li>
    
   <?php }?>
   </ul>
</div>
</section>
<!-- Проверка откликался ли уже пользователь на вакансию -->
    <?php }else if($isOtcled==false){?>
        <form action="php/otclick.php" method="post">
        <input type="hidden" id="Evt" name="Evt" value="<?php echo $_GET['id']?>">    
        <button type="submit" class="Feedback__button" style="margin: 0px auto; cursor: pointer;">Откликнуться</button></form>
   <?php }else{?>
    <p style="color: white; text-align: center;">Вы уже откликнулись</p> 
    <?php }?>
    <?php }?>

    
	
</body>
</html>