<?php 
$equipment = [
0 => [
'name' => '2014 Rossignol District Snowboard',
'category' => 'Доски и лыжи',
'price' => '159999',
'address' => 'img/lot-1.jpg',
'description' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.'
],
1 => [
'name' => 'DC Ply Mens 2016/2017 Snowboard',
'category' => 'Доски и лыжи',
'price' => '10999',
'address' => 'img/lot-2.jpg',
'description' => 'Описание отсутствует'
],
2 => [
'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
'category' => 'Крепления',
'price' => '8000',
'address' => 'img/lot-3.jpg',
'description' => 'Описание отсутствует'
],
3 => [
'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
'category' => 'Ботинки',
'price' => '10999',
'address' => 'img/lot-4.jpg',
'description' => 'Описание отсутствует'
],
4 => [
'name' => 'Куртка для сноуборда DC Mutiny Charocal',
'category' => 'Одежда',
'price' => '7500',
'address' => 'img/lot-5.jpg',
'description' => 'Описание отсутствует'
],
5 => [
'name' => 'Маска Oakley Canopy	',
'category' => 'Разное',
'price' => '5400',
'address' => 'img/lot-6.jpg',
'description' => 'Описание отсутствует'
]
];

$bets = [
	['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
	['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
	['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
	['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];
?>