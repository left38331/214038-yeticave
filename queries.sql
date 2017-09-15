INSERT INTO categories SET category = 'Доски и лыжи';
INSERT INTO categories SET category = 'Крепления';
INSERT INTO categories SET category = 'Ботинки';
INSERT INTO categories SET category = 'Одежда';
INSERT INTO categories SET category = 'Инструменты';
INSERT INTO categories SET category = 'Разное';



INSERT INTO users SET 
date_registration = '2017-09-14 00:00:00',
email = 'ignat.v@gmail.com',
name = 'Игнат',
user_password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',
avatar = 'img/avatar.jpg',
contacts = '9-9-9-99-9999-99999';

INSERT INTO users SET 
date_registration = '2017-09-14 00:00:00',
email = 'kitty_93@li.ru',
name = 'Леночка',
user_password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',
avatar = 'img/avatar.jpg',
contacts = '9-9-9-99-9999-99999';

INSERT INTO users SET 
date_registration = '2017-09-14 00:00:00',
email = 'warrior07@mail.ru',
name = 'Руслан',
user_password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW',
avatar = 'img/avatar.jpg',
contacts = '9-9-9-99-9999-99999';



INSERT INTO lots SET 
date_creat = '2017-09-14 00:00:00',
lot_name = '2014 Rossignol District Snowboard',
description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
image = 'img/lot-1.jpg',
bet_start = '159999',
date_end = '2017-09-15 12:00:00',
bet_step = '100',
number_add_favorits = '0',
category_id = '1',
author_id = '1',
winner_id = null;

INSERT INTO lots SET 
date_creat = '2017-09-14 00:00:00',
lot_name = 'DC Ply Mens 2016/2017 Snowboard',
description = 'Описание отсутствует',
image = 'img/lot-2.jpg',
bet_start = '10999',
date_end = '2017-09-19 12:00:00',
bet_step = '100',
number_add_favorits = '0',
category_id = '1',
author_id = '1',
winner_id = null;

INSERT INTO lots SET 
date_creat = '2017-09-14 00:00:00',
lot_name = 'Крепления Union Contact Pro 2015 года размер L/XL',
description = 'Описание отсутствует',
image = 'img/lot-3.jpg',
bet_start = '8000',
date_end = '2017-09-25 12:00:00',
bet_step = '50',
number_add_favorits = '0',
category_id = '2',
author_id = '2',
winner_id = null;

INSERT INTO lots SET 
date_creat = '2017-09-14 00:00:00',
lot_name = 'Ботинки для сноуборда DC Mutiny Charocal',
description = 'Описание отсутствует',
image = 'img/lot-4.jpg',
bet_start = '10999',
date_end = '2017-09-15 12:00:00',
bet_step = '50',
number_add_favorits = '0',
category_id = '3',
author_id = '2',
winner_id = null;

INSERT INTO lots SET 
date_creat = '2017-09-14 00:00:00',
lot_name = 'Куртка для сноуборда DC Mutiny Charocal',
description = 'Описание отсутствует',
image = 'img/lot-5.jpg',
bet_start = '7500',
date_end = '2017-09-15 12:00:00',
bet_step = '50',
number_add_favorits = '0',
category_id = '4',
author_id = '2',
winner_id = null;

INSERT INTO lots SET 
date_creat = '2017-09-14 00:00:00',
lot_name = 'Маска Oakley Canopy',
description = 'Крутая маска',
image = 'img/lot-6.jpg',
bet_start = '5400',
date_end = '2017-09-18 12:00:00',
bet_step = '50',
number_add_favorits = '0',
category_id = '6',
author_id = '2',
winner_id = null;

INSERT INTO bets SET 
date_add = '2017-09-14 09:00:00',
cost = '11099',
user_id = '2',
lot_id = '2';

INSERT INTO bets SET 
date_add = '2017-09-28 10:30:00',
cost = '1050',
user_id = '1',
lot_id = '2';

INSERT INTO bets SET 
date_add = '2017-09-14 10:30:00',
cost = '8050',
user_id = '1',
lot_id = '3';

INSERT INTO bets SET 
date_add = '2017-09-14 20:30:00',
cost = '8150',
user_id = '3',
lot_id = '3';

INSERT INTO bets SET 
date_add = '2017-09-24 21:00:00',
cost = '8250',
user_id = '2',
lot_id = '3';

INSERT INTO bets SET 
date_add = '2017-10-14 11:30:00',
cost = '8050',
user_id = '1',
lot_id = '1';

INSERT INTO bets SET 
date_add = '2017-09-24 11:30:00',
cost = '18050',
user_id = '1',
lot_id = '5';

INSERT INTO bets SET 
date_add = '2017-09-23 11:30:00',
cost = '12050',
user_id = '3',
lot_id = '5';

INSERT INTO bets SET 
date_add = '2017-12-24 12:30:00',
cost = '12050',
user_id = '2',
lot_id = '4';



/* получить список из всех категорий; */
SELECT category FROM categories;

/* получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории; */
SELECT lot_name, 
bet_start, 
image, 
IFNULL(MAX(bets.cost), lots.bet_start) as bet_price, /* выводим максимальную ставку если она есть, если нет - то начальную ставку */
COUNT(bets.lot_id) as bets_count, /* количество ставок для одного лота */
categories.category
FROM lots
JOIN categories
ON categories.id = lots.category_id
LEFT JOIN bets
ON bets.lot_id = lots.id
WHERE lots.date_end > NOW() /* проверка чтобы лот был не закрыт */
GROUP BY lots.id
ORDER BY lots.date_end DESC 
;

/* обновить название лота по его идентификатору; */
UPDATE lots SET lot_name = 'Новое название'
WHERE id = 6;


/* найти лот по его названию или описанию; */
SELECT * FROM lots
WHERE lot_name = 'Маска Oakley Canopy'
OR description = 'Крутая маска';

/* получить список самых свежих ставок для лота по его идентификатору; */
SELECT * FROM bets
WHERE lot_id = 2
ORDER BY date_add DESC;

