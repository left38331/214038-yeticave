
			<nav class="nav">
				<ul class="nav__list container">
					<li class="nav__item">
						<a href="all-lots.html">Доски и лыжи</a>
					</li>
					<li class="nav__item">
						<a href="all-lots.html">Крепления</a>
					</li>
					<li class="nav__item">
						<a href="all-lots.html">Ботинки</a>
					</li>
					<li class="nav__item">
						<a href="all-lots.html">Одежда</a>
					</li>
					<li class="nav__item">
						<a href="all-lots.html">Инструменты</a>
					</li>
					<li class="nav__item">
						<a href="all-lots.html">Разное</a>
					</li>
				</ul>
			</nav>
<form class="form container <?=$class_form ?>" action="login.php" method="post"> <!-- form--invalid -->
				<h2>Вход</h2>
	<div class=" <?=$class_item_email ?>"> <!-- form__item--invalid -->
					<label for="email">E-mail*</label>
		<input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$email ?>">
		<span class="form__error"><?=$error_email ?></span>
				</div>
	<div class="form__item--last <?=$class_item_password ?>">
					<label for="password">Пароль*</label>
		<input id="password" type="text" name="password" placeholder="Введите пароль" value="<?=$password ?>">
		<span class="form__error"><?=$error_password ?></span>
				</div>
				<button type="submit" class="button">Войти</button>
			</form>
