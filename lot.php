<?php
session_start();

require_once('functions.php');
require_once('lots_list.php');
require_once('data.php');
// ставки пользователей, которыми надо заполнить таблицу


if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

//определяет переданный в параметрах идентификатор и получает по нему соответствующий лот из массива
if (isset($_GET['lot_id'])) {
	$lot_id = $_GET['lot_id'];
	$lot_page = '?lot_id='.$lot_id;
}
else {
	$lot_id = 'undefined';
}

$cost = $_POST['cost'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ( $cost  == '') {
		print("сделайте ставку");
	}
	else {
		$info_for_bet['name'] = $equipment[$lot_id]['name'];
		$info_for_bet['cost'] = $_POST['cost'];
		$info_for_bet['time'] =strtotime('now');
		$bet_info[] = $info_for_bet;

		if (isset($_COOKIE['visitcount'])) {
			$bet_info  = json_decode($_COOKIE['visitcount'], true);
			$bet_info[] = $info_for_bet;
		}

		$name_cuca = "visitcount"; 
		$value  = json_encode($bet_info);

		setcookie($name_cuca, $value);
		header("Location: /mylots.php");
	}
}

// проверка, чтобы нельзя было делать ставку на лот дважды 
if (isset($_COOKIE['visitcount'])) {
	$bet_info  = json_decode($_COOKIE['visitcount'], true);
	foreach ($bet_info as $key => $value) {
		if($bet_info[$key]['name'] == $equipment[$lot_id]['name']) {
			$exist = 1;
		} 
	}
}


// если lot_id нет в массиве, то выводится ошибка
if (!array_key_exists($lot_id, $equipment)) {
	header('Content-Type: text/html; charset=utf-8'); // чтобы надпись на русском выводилась корректно, а не краказябры
	header("HTTP/1.0 404 Not Found");
	print 'Ошибка 404';
	die();
	}

$lot_content = renderTemplate('templates/lot.php', ['equipment' => $equipment, '$categories' => $categories, 'lot_time_remaining' => $lot_time_remaining, 'lot_id' => $lot_id, 'bets' => $bets, 'is_auth' => $user, 'lot_page' => $lot_page, 'exist' => $exist]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Выбранный лот', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'lot_content' => $lot_content]);

print($layout_content);


?>


