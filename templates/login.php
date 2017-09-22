
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
<form class="form container <?=$class_form ?>" action="login.php" method="post"> <!-- form--invalid -->
				<h2>Вход</h2>
				
				
	<?php if ($is_login_password) : ?>
	<p>Теперь вы можете войти, используя свой email и пароль.</p>
	<?php endif; ?>
				
				
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
