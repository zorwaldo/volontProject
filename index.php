<?php require "php/blocks/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
	<link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require "php/header.php"?>
    <section class="map">
        <div class="container">
			<!-- Если человек прошел регистрацию выводится уведомление об успешной регистрации -->
			<?php if(isset($_GET['reg'])){?>
			<h3 style="font-size: 22px;">Регистрация прошла успешно!</h3>
			<?php }else if(isset($_GET['evt'])){?>
				<!-- Если человек создал событие выводится уведомление об успешном создании -->
				<h3 style="font-size: 22px;">Событие успешно создано!</h3>
				<?php }?>
            <div class="map__item map__item-left">
							<div class="map__text">
								<!-- Если пользователь не авторизован ссылка ведет на регистрацию. В ином случае на страницу создания события -->
								<a style="text-decoration: none;" href="<?php echo isset($_COOKIE['user'])?"createEvent.php":"rgstr.php"?>" class="map__desk map__desk">
									← Мне нужен волонётр
								</a>
								<p class="map__inf">
									Сервисом пользуются <br> 148 900 волонтёров
								</p>
							</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2248.1907245380776!2d37.52855681583571!3d55.70305648054006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54c67050b4423%3A0xbf693ca773035f5b!2z0JzQk9CjINC40LzQtdC90Lgg0Jwu0JIu0JvQvtC80L7QvdC-0YHQvtCy0LA!5e0!3m2!1sru!2sru!4v1654967776900!5m2!1sru!2sru" width="660" height="660" style="border-radius:50%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							<div class="map__text map__text-right">
								<!-- Если пользователь не авторизован ссылка ведет на регистрацию. В ином случае на страницу поиска событий -->
								<a style="text-decoration: none;" href="<?php echo isset($_COOKIE['user'])?"events.php":"rgstr.php"?>" class="map__desk map__desk-right">
									Готов стать волонтёром →
								</a>
								<p class="map__inf ">
									2 000 человек нуждаются <br> в помощи волонтёров
								</p>
							</div>
						</div>
        </div>
    </section>
</body>
</html>