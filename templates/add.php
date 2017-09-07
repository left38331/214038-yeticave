<form  class="<?=$class_form ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
	<h2>Добавление лота</h2>
	<div class="form__container-two">
		<div class="<?=$class_item_lot_name ?>"> <!-- form__item--invalid -->
			<label for="lot-name">Наименование</label>
			<input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value ="<?=$name ?>">
			<span class="form__error"><?=$error_text ?></span>
		</div>
		<div class="<?=$class_form_cat ?>">
			<label for="category">Категория</label>
			<select id="category" name="category" >
				<option>Выберите категорию</option>
				<option <?=$selected_1 ?> >Доски и лыжи</option>
				<option <?=$selected_2 ?>>Крепления</option>
				<option <?=$selected_3 ?>>Ботинки</option>
				<option <?=$selected_4 ?>>Одежда</option>
				<option <?=$selected_5 ?>>Инструменты</option>
				<option <?=$selected_6 ?>>Разное</option>
			</select>
			<span class="form__error"><?=$error_text_cat ?></span>
		</div>
	</div>
	<div class="<?=$class_item_message ?> form__item--wide">
		<label for="message">Описание</label>
		<textarea id="message" name="message" placeholder="Напишите описание лота" value =""><?=$message ?></textarea>
		<span class="form__error"><?=$error_text ?></span>
	</div>
	<div class="<?=$class_file ?>"> <!-- form__item--uploaded -->
		<label>Изображение</label>
		<div class="preview">
			<button class="preview__remove" type="button">x</button>
			<div class="preview__img">
				<img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
			</div>
		</div>
		<div class="form__input-file">
			<input class="visually-hidden" type="file" id="photo2" value="" name="lot-image">
			<label for="photo2">
				<span>+ Добавить</span>
			</label>
		</div>
	</div>
	<div class="form__container-three">
		<div class="<?=$class_item_lot_rate ?> form__item--small">
			<label for="lot-rate">Начальная цена</label>
			<input id="lot-rate"  name="lot-rate" placeholder="0" value ="<?=$rate ?>">
			<span class="form__error"><?=$error_text ?></span>
		</div>
		<div class="<?=$class_item_lot_step ?> form__item--small">
			<label for="lot-step">Шаг ставки</label>
			<input id="lot-step"  name="lot-step" placeholder="0" value ="<?=$step?>">
			<span class="form__error"><?=$error_text ?></span>
		</div>
		<div class="<?=$class_item_lot_date ?>">
			<label for="lot-date">Дата завершения</label>
			<input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017" value ="<?=$date ?>">
			<span class="form__error"><?=$error_text ?></span>
		</div>
	</div>
	<span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
	<button type="submit" class="button">Добавить лот</button>
</form>