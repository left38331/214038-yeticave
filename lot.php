<?php
session_start();

require_once('functions.php');

require_once('init.php');

require_once('data.php');


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


$sql_lot = 'SELECT lot_name, 
bet_start,
bet_step,
image,
date_end,
description,
IFNULL(MAX(bets.cost), lots.bet_start) as bet_price,
COUNT(bets.lot_id) as bets_count, 
categories.category
FROM lots
JOIN categories
ON categories.id = lots.category_id
LEFT JOIN bets
ON bets.lot_id = lots.id
WHERE lots.date_end > NOW() 
GROUP BY lots.id
ORDER BY lots.date_end DESC';

$sql_bet = 'SELECT date_add,
cost,
user_id,
lot_id,
users.name
FROM bets
JOIN users
ON users.id = bets.user_id
JOIN lots
ON bets.lot_id = lots.id - 1
WHERE bets.lot_id = ?
ORDER BY bets.date_add DESC
LIMIT 4
';

$lot_info = select_data($con, $sql_lot);
$bet = select_data($con, $sql_bet, [$lot_id]);




$cost = $_POST['cost'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ( $cost  == '') {
		print("сделайте ставку");
	}
	else {
		$info_for_bet['name'] = $lot_info[$lot_id]['lot_name'];
		$info_for_bet['category'] = $lot_info[$lot_id]['category'];
		$info_for_bet['image'] = $lot_info[$lot_id]['image'];
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
		if($bet_info[$key]['name'] == $lot_info[$lot_id]['lot_name']) {
			$exist = 1;
		} 
	}
}


// если lot_id нет в массиве, то выводится ошибка
if (!array_key_exists($lot_id, $lot_info)) {
	header('Content-Type: text/html; charset=utf-8'); // чтобы надпись на русском выводилась корректно, а не краказябры
	header("HTTP/1.0 404 Not Found");
	print 'Ошибка 404';
	die();
	}

$lot_content = renderTemplate('templates/lot.php', ['equipment' => $lot_info, '$categories' => $categories, 'lot_time_remaining' => $lot_time_remaining, 'lot_id' => $lot_id, 'bets' => $bets, 'is_auth' => $user, 'lot_page' => $lot_page, 'exist' => $exist, 'bet' => $bet ]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Выбранный лот', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'lot_content' => $lot_content, 'categories' => $categories]);

print($layout_content);
print_r($bet);


?>


