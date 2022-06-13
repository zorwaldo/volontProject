<?php require "php/blocks/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head class="page">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>События</title>
	<link rel="shortcut icon" href="/pics/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require "php/header.php"?>
  <section class="map map-events">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2248.1907245380776!2d37.52855681583571!3d55.70305648054006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54c67050b4423%3A0xbf693ca773035f5b!2z0JzQk9CjINC40LzQtdC90Lgg0Jwu0JIu0JvQvtC80L7QvdC-0YHQvtCy0LA!5e0!3m2!1sru!2sru!4v1654967776900!5m2!1sru!2sru" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
	<section class="Events">
		<div class="container">
			<div class="Events__wrapper">
				<div class="Events__item">
					<fieldset class="Events__question">
						<legend>
							Направленность события?
						</legend>
						<div class="Event__wrapper">
							<label><input type="radio">Спортиваня</label>
							<label><input type="radio">Культурная</label>
							<label><input type="radio">Социальная</label>
							<label><input type="radio">Офигенная</label>
						</div>
					</fieldset>
					<fieldset class="Events__question">
						<legend>
							К какому времени нужен волонтер?
						</legend>
						<div class="Event__wrapper">
							<label><input type="radio">Срочно</label>
							<label><input type="radio">В течение недели</label>
							<label><input type="radio">В течение месяца</label>
						</div>
					</fieldset>
					<fieldset class="Events__question">
						<legend>
							Возраст волонтера?
						</legend>
						<div class="Event__wrapper">
							<label><input type="radio">До 16</label>
							<label><input type="radio">16-54</label>
							<label><input type="radio">От 64</label>
							<label><input type="radio">Любой</label>
						</div>
					</fieldset>
					<fieldset class="Events__question">
						<legend>
							Нужны ли волонтеру дополнительные навыки?
						</legend>
						<div class="Event__wrapper">
							<label><input type="radio">Нет</label>
							<label><input type="radio">Да</label>
						</div>
					</fieldset>
					<fieldset class="Events__question">
						<legend>
							Получит ли волонтер мотивацию? (сувениры,<br>грамоты,оплата).
						</legend>
						<div class="Event__wrapper">
							<label><input type="radio">Нет</label>
							<label><input type="radio">Да</label>
						</div>
					</fieldset>
					<button class="Events__button">
						Применить фильтры
					</button>
					<button class="Events__button">
						Очистить фильтры
					</button>
				</div>
				<div class="Events__item">
				<?php 
				$id=(int)$_COOKIE['user'];
				$result = mysqli_query($mysql,"SELECT DISTINCT event.* FROM `event` LEFT JOIN `userinfo` ON event.User_ID = userinfo.User_ID LEFT JOIN `ychastie` on `userinfo`.User_ID = `ychastie`.User_ID");
   	while($info = mysqli_fetch_assoc($result)){  
	$isOtcled = false;
	$evtID = (int)$info['ID_Event'];
    $resultOtcl = mysqli_query($mysql, "SELECT * FROM `ychastie` WHERE User_ID='$id' AND ID_Event='$evtID'");
    if($info2 = mysqli_fetch_assoc($resultOtcl)){
        $isOtcled= true;
    }
	?>
					<div class="descr">
						<div class="descr__item">
							<a href="event.php?id=<?php echo $info['ID_Event']?>" style="text-decoration: none;" class="descr__title">
							<?php echo $info['Event_name']?>
   							</a>
							<p class="descr__text">
							<?php echo $info['Event_info']?>
							</p>
							<p class="desk__param desk__param-border">
								Возраст: <?php echo $info['Age_OT']?> - <?php echo $info['Age_DO']?>
							</p>
							<p class="desk__param">
								Работодатель: <?php echo $info['User_Name'] ?>
							</p>
							<p class="desk__param">
								Параметр: Значение
							</p>
						<?php if($isOtcled==false) {?>
							<form action="php/otclick.php" method="post">
        						<input type="hidden"  name="Evt" value="<?php echo $info['ID_Event']?>">  
								<input type="hidden"  name="events" value="events">   
        						<button class="Events__button Events__button-desk " type="submit">Откликнуться</button>
								</form>
							<?php }else{?>
								<p class="desk__param">
								Вы уже откликнулись на эту вакансию
							</p>
								<?php }?>

							
						</div>
					</div>
					<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>