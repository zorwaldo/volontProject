<?php require "php/blocks/connect.php";
$id=(int)$_COOKIE['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head class="page">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
</head>
<body>
<?php require "php/header.php"?>
	<section class="Kabinet">
		<div class="container">
			<div class="Kabinet__wrapper">
			<?php $resultUser = mysqli_query($mysql,"SELECT * FROM `userinfo` WHERE User_ID ='$id'");
   				while($infoUser = mysqli_fetch_assoc($resultUser)){ ?>
				<div class="Kabinet__item">
					<img src="<?php echo $infoUser['User_Pic']?>" width="229" height="229" alt="Аватар">
				</div>
				<div class="Kabinet__item">
					<h3 class="Kabinet__Name">
						<?php echo $infoUser['User_Second_Name']." ".$infoUser['User_Name']." ".$infoUser['User_Otchestvo']?>
					</h3>
					<h3 class="Kabinet__SubName">
						Дата рождения
					</h3>
					<p class="Kabinet__text">
						<?php echo $infoUser['User_Birth']?>
					</p>
					<h3 class="Kabinet__SubName">
						Анкеты волонтеров:
					</h3>
					<ul class="Kabinet__list">
						<!-- <li class="Kabinet__object">
							Анкета 1
						</li>
						<li class="Kabinet__object">
							Анкета 2
						</li> -->
						<button class="Kabinet__button">
							<a href="#">Добавить анкету</a>	
						</button>
					</ul>
					<h3 class="Kabinet__SubName">
						События:
					</h3>
					<ul class="Kabinet__list">
						<!-- Ниже идёт запрос на получение участий пользователя в событиях -->
					<?php $result = mysqli_query($mysql,"SELECT * FROM `event` WHERE User_ID ='$id'");
   						while($info = mysqli_fetch_assoc($result)){ ?>
							<li class="Kabinet__object">
								<a style="text-decoration: none;" href="event.php?id=<?php echo $info['ID_Event']?>"><?php echo $info['Event_name']?></a>
							</li>
						<?php }?>
						<button class="Kabinet__button">
						<a href="createEvent.php">Добавить событие</a>	
						</button>
					</ul>
					<h3 class="Kabinet__SubName">
						Достижения:
					</h3>
					<p class="Kabinet__text">
						Добрый человек | Умный помощник | В разработке
					</p>
					<h3 class="Kabinet__SubName">
						Баллы:
					</h3>
					<p class="Kabinet__text">
						<?php echo $infoUser['Bally']?>
					</p>
					<!-- Выход пользователя из аккаунта обрабатывается файлом exit.php -->
						<a href="php/exit.php" style="text-decoration: none; color: white;" class="Kabinet__SubName">Выйти</a>
				</div>
				<?php }?>
			</div>
		</div>
	</section>
</body>
</html>