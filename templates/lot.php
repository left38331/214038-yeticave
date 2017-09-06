<section class="lot-item container">
	<h2><?=$new_lots['lot-name']; ?></h2>
	
	<div class="lot-item__content">
		<div class="lot-item__left">
			<div class="lot-item__image">
				<img src="<?=$url_adress; ?>" width="730" height="548" alt="<?=$new_lots['lot-name']; ?>">
			</div>
			<p class="lot-item__category">Категория: <span><?= $new_lots['category']; ?></span></p>
			<p class="lot-item__description"><?=$new_lots['message']; ?></p>
		</div>
		<div class="lot-item__right">
			<div class="lot-item__state">
				<div class="lot-item__timer timer">
					<?=$new_lots['lot-date']; ?>
				</div>
				<div class="lot-item__cost-state">
					<div class="lot-item__rate">
						<span class="lot-item__amount">Текущая цена</span>
						<span class="lot-item__cost"><?=$new_lots['lot-rate']; ?></span>
					</div>
					<div class="lot-item__min-cost">
						Мин. ставка <span>12 000 р</span>
					</div>
				</div>
				<form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
					<p class="lot-item__form-item">
						<label for="cost">Ваша ставка</label>
						<input id="cost" type="number" name="cost" placeholder="12 000" step="<?=$new_lots['lot-step']; ?>">
					</p>
					<button type="submit" class="button">Сделать ставку</button>
				</form>
			</div>
		</div>
	</div>
</section>