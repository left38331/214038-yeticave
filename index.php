<?php 
require_once('functions.php');

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';


// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = strtotime('now');

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining

// функция вывода времени в формате ЧЧ:ММ, с учетом добавления 0 перед цифрой, если цифра меньше 10
function time_add_zero($start, $end) {
	$remaining_seconds = $end - $start;
	$remaining_hours_integer = floor($remaining_seconds / 3600);
	$remaining_minusts_integer = floor($remaining_seconds / 60) - $remaining_hours_integer * 60;
	if ($remaining_hours_integer < 10) {
		$remaining_hours_integer = '0' . $remaining_hours_integer;
	}
	if ($remaining_minusts_integer < 10) {
		$remaining_minusts_integer = '0' . $remaining_minusts_integer;
	}
	return $remaining_hours_integer . ':' . $remaining_minusts_integer;
}
$lot_time_remaining = time_add_zero($now, $tomorrow);

$categories = ['Доски и лыжи','Крепления','Ботинки','Одежда','Инструменты','Разное'];

$equipment = [
	0 => [
		'name' => '2014 Rossignol District Snowboard',
		'category' => 'Доски и лыжи',
		'price' => '159999',
		'address' => 'img/lot-1.jpg'
	],
	1 => [
		'name' => 'DC Ply Mens 2016/2017 Snowboard',
		'category' => 'Доски и лыжи',
		'price' => '10999',
		'address' => 'img/lot-2.jpg'
	],
	2 => [
		'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
		'category' => 'Крепления',
		'price' => '8000',
		'address' => 'img/lot-3.jpg'
	],
	3 => [
		'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
		'category' => 'Ботинки',
		'price' => '10999',
		'address' => 'img/lot-4.jpg'
	],
	4 => [
		'name' => 'Куртка для сноуборда DC Mutiny Charocal',
		'category' => 'Одежда',
		'price' => '7500',
		'address' => 'img/lot-5.jpg'
	],
	5 => [
		'name' => 'Маска Oakley Canopy	',
		'category' => 'Разное',
		'price' => '5400',
		'address' => 'img/lot-6.jpg'
	]
];

$page_content = renderTemplate('templates/index.php', ['equipment' => $equipment, '$categories' => $categories, 'lot_time_remaining' => $lot_time_remaining]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Главная', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'page_content' => $page_content]);

print($layout_content);
?>