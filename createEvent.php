<!DOCTYPE html>
<html lang="en">
<head class="page">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Создание события</title>
  <link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php require "php/header.php"?>
	<section class="Create">
		<div class="container">
			<form action="php/createEvent.php" method="post">
				<div class="Create__item">
					<label class="Create__title"> Название события</label>
					<input class="forms__input forms__input-create"  type="text" name="name" placeholder="">
				</div>
				<div class="Create__item">
					<label class="Create__title"> Описание события</label>
					<textarea name="opisanie"></textarea>
				</div>
				<div class="Create__item">
					<label class="Create__title"> Адрес события</label>
					<input class="forms__input forms__input-create"  type="text"  name="adress" placeholder="">
				</div>
				<div class="Create__item Create__item-no">
					<label class="Create__title"> Направленность<br> вашего события?</label>
					<div class="Create__radio">
						<label><input  name = "napr" value="Социальная" checked type="radio">Социальная</label>
						<label><input  name = "napr" value="Спортиваня" type="radio">Спортиваня</label>
						<label><input  name = "napr" value="Культурная" type="radio">Культурная</label>
						
					</div>
				</div>
				<div class="Create__item Create__item-no">
					<label class="Create__title">К какому времени<br> нужен волонтёр?</label>
					<div class="Create__radio">
						<label><input name="srochn" checked type="radio" value="0">Срочно</label>
						<label><input name="srochn" type="radio" value="2">В течение недели</label>
						<label><input name="srochn" type="radio" value="3">В течение месяца</label>
					</div>
				</div>
				<div class="Create__item Create__item-no">
					<label class="Create__title">Возраст волонтера от - до?</label>
					<input class="forms__input forms__input-create" style="width:65px; margin-right: 10px;" value="0" type="number" name="Age_OT"> <input class="forms__input forms__input-create"  type="number" style="width:65px"  name="Age_DO" value="100">
				</div>
				<div class="Create__item Create__item-no">
					<label class="Create__title">Требуемые навыки</label>
					<div class="Create__radio">
						<textarea name="skills"></textarea>
					</div>
				</div>
				<div class="Create__item Create__item-no">
					<label class="Create__title">Мотивация</label>
					<div class="Create__radio">
						<textarea name="motivation"></textarea>
					</div>
				</div>
				<div class="Create__item Create__item-no">
					<label class="Create__title">Бонусы волонтёра</label>
					<div class="Create__radio">
						<textarea name="bonuses"></textarea>
					</div>
				</div>
				<div class="Create__item">
					<label class="Create__title"> Ваши контакты</label>
					<textarea name="contacts"></textarea>
				</div>
				<button class="forms__button" type="submit">Готово</button>
			</form>
		</div>
	</section>
</body>
</html>