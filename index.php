<?php 
require_once('functions.php');
require_once('lots_list.php');

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



$content = renderTemplate('templates/index.php', ['equipment' => $equipment, '$categories' => $categories, 'lot_time_remaining' => $lot_time_remaining]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Главная', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'link' => '', 'content' => $content]);

print($layout_content);
?>