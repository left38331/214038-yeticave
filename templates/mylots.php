
			<section class="rates container">

			
				
				
				
				<h2>Мои ставки</h2>
				<table class="rates__list">
					<?php foreach ($decode_array  as $key => $value): ?>
					<tr class="rates__item">
						<td class="rates__info">
							<div class="rates__img">
								<img src="../<?=$value['image'] ?>" width="54" height="40" alt="Сноуборд">
							</div>
							<h3 class="rates__title"><a href="lot.html"><?=$value['name'] ?></a></h3>
						</td>
						<td class="rates__category">
							<?=$value['category'] ?>
						</td>
						<td class="rates__timer">
							<div class="timer timer--finishing"><?=$value['time'] ?></div>
						</td>
						<td class="rates__price">
							<?=$value['cost'] ?>
						</td>
						<td class="rates__time">
							<?=$value['pass_time']?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</section>
