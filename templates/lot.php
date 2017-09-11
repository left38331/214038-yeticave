<section class="lot-item container">
	<h2><?= $equipment[$lot_id]['name']; ?></h2>
	<div class="lot-item__content">
		<div class="lot-item__left">
			<div class="lot-item__image">
				<img src="<?= $equipment[$lot_id]['address']; ?>" width="730" height="548" alt="<?= $equipment[$lot_id]['name']; ?>">
			</div>
			<p class="lot-item__category">Категория: <span><?= $equipment[$lot_id]['category']; ?></span></p>
			<p class="lot-item__description"><?=$equipment[$lot_id]['description']; ?></p>
		</div>
		<div class="lot-item__right">
			<?php if ($is_auth and !$exist) : ?>
			<div class="lot-item__state" >
				<div class="lot-item__timer timer">
					10:54:12
				</div>
				<div class="lot-item__cost-state">
					<div class="lot-item__rate">
						<span class="lot-item__amount">Текущая цена</span>
						<span class="lot-item__cost"><?= $equipment[$lot_id]['price']; ?></span>
					</div>
					<div class="lot-item__min-cost">
						Мин. ставка <span>12 000 р</span>
					</div>
				</div>
				<form class="lot-item__form" action="lot.php<?=$lot_page ?>" method="post">
					<p class="lot-item__form-item">
						<label for="cost">Ваша ставка</label>
						<input id="cost" type="number" name="cost" placeholder="12 000">
					</p>
					<button type="submit" class="button">Сделать ставку</button>
				</form>
			</div>
			<?php endif; ?>
			<div class="history">
				<h3>История ставок (<span>4</span>)</h3>
				<!-- заполните эту таблицу данными из массива $bets-->
				<table class="history__list">
					<?php foreach ($bets as $val): ?>
					<tr class="history__item">
						<td class="history__name"><?=$val['name']; ?></td>
						<td class="history__price"><?=$val['price']; ?></td>
						<td class="history__time"><?=format_time($val['ts']) ;?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</section>