<?php
session_start();


require_once('functions.php');
require_once('lots_list.php');
require_once('data.php');
// ставки пользователей, которыми надо заполнить таблицу


$hide = 'style="display: none;"';
$fff = 'style="display: none;"';

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];

}




//определяет переданный в параметрах идентификатор и получает по нему соответствующий лот из массива
if (isset($_GET['lot_id'])) {
	$lot_id = $_GET['lot_id'];
	}
else {
	$lot_id = 'undefined';
}

// если lot_id нет в массиве, то выводится ошибка
if (!array_key_exists($lot_id, $equipment)) {
	header('Content-Type: text/html; charset=utf-8'); // чтобы надпись на русском выводилась корректно, а не краказябры
	header("HTTP/1.0 404 Not Found");
	print 'Ошибка 404';
	die();
	}

$lot_content = renderTemplate('templates/lot.php', ['equipment' => $equipment, '$categories' => $categories, 'lot_time_remaining' => $lot_time_remaining, 'lot_id' => $lot_id, 'bets' => $bets, 'is_auth' => $user ]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Выбранный лот', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'lot_content' => $lot_content]);

print($layout_content);


?>


