<nav class="nav">
	<ul class="nav__list container">
		
		<?php 
		foreach ($categories as $val): ?>
		<li class="nav__item">
			<a href="all-lots.html"><?=$val ?></a>
		</li>
		<?php endforeach; ?>
		
	</ul>
</nav>
<form class="<?=$class_form ?>" action="sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
	<h2>Регистрация нового аккаунта</h2>
	<div class="<?=$class_item_email ?>"> <!-- form__item--invalid -->
		<label for="email">E-mail*</label>
		<input id="email" type="text" name="email" placeholder="Введите e-mail" value ="<?=$email ?>">
		<span class="form__error"><?=$error_text ?> <?=$email_error ?></span>
	</div>
	<div class="<?=$class_item_password ?>">
		<label for="password">Пароль*</label>
		<input id="password" type="text" name="password" placeholder="Введите пароль" value ="<?=$password ?>">
		<span class="form__error"><?=$error_text ?></span>
	</div>
	<div class="<?=$class_item_name ?>">
		<label for="name">Имя*</label>
		<input id="name" type="text" name="name" placeholder="Введите имя" value ="<?=$name ?>">
		<span class="form__error"><?=$error_text ?></span>
	</div>
	<div class="<?=$class_item_message ?>">
		<label for="message">Контактные данные*</label>
		<textarea id="message" name="message" placeholder="Напишите как с вами связаться" ><?=$message ?></textarea>
		<span class="form__error"><?=$error_text ?></span>
	</div>
	<div class="<?=$class_file ?>">
		<label>Изображение</label>
		<div class="preview">
			<button class="preview__remove" type="button">x</button>
			<div class="preview__img">
				<img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
			</div>
		</div>
		<div class="form__input-file">
			<input class="visually-hidden" type="file" id="photo2"  name="image">
			<label for="photo2">
				<span>+ Добавить</span>
			</label>
		</div>
	</div>
	<span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
	<button type="submit" class="button">Зарегистрироваться</button>
	<a class="text-link" href="#">Уже есть аккаунт</a>
</form>