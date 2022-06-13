<!-- Файл подключения шапки сайта -->
<header class="page-header">
		<div class="container">
			<nav class="navigation">
				<ul class="navigation__list">
					<li class="navigation__item">
						<a class="navigation__link" href="index.php">
							Главная
						</a>
					</li>
					<li class="navigation__item">
						<a class="navigation__link" href="events.php">
							События
						</a>
					</li>
					<li class="navigation__item">
						<a class="navigation__link" href="createEvent.php">
							Создать событие
						</a>
					</li>
				</ul>
				<!-- Если пользователь авторизован выводится ссылка на личный кабинет. В ином случае на авторизацию -->
				<?php if(isset($_COOKIE['user'])){ ?>
					<a class="Login" href="user.php">
					Личный кабинет
				</a>
					<?php }else{?>
				<a class="Login" href="auth.php">
					Войти
				</a>
				<?php }?>
			</nav>
		</div>
	</header>